buttonsArray=document.getElementsByClassName("buttons")

for(let i=1;i<=buttonsArray.length;i++)
{
    itemButton=document.getElementById("buttonProduct"+i)
    itemButton.onclick=()=>{

        quantity=prompt("Please enter quantity neededs")
        if(quantity > 0)
        {
            const data = { key1: i, quantity: quantity};
        
                fetch('addToCart.php', {
                method: 'POST',
                body: JSON.stringify(data),
                headers: {
                    'Content-Type': 'application/json'
                }
                })
                .then(response => response.text())
                .then(data => {
                console.log('Data sent successfully:', data);

                if(data==1)
                {
                    alert("please login first")
                    window.location.href = 'loginForm.php';
                }
                })
                .catch(error => {
                console.error('Error sending data:', error);
                });
            }
            else
            {
                alert("Enter valid quantity")
            }
            
    }
}


