updateButtonArray=document.getElementsByClassName("update")
deleteButtonArray=document.getElementsByClassName("delete")
updateContainer=document.getElementById('update-container')
updateUser=document.getElementById('update-user')
var username=""

updateUser.onclick=()=>
{
    if(!updateContainer.classList.contains("d-none"))
        {
            updateContainer.classList.add("d-none");
        }
        nameOfValueGoingTochange=document.getElementById("nameOfValueGoingToChange").value
        actualValueGoingToChange=document.getElementById("actualValueChanged").value  
                const data = { key1: nameOfValueGoingTochange, key2: actualValueGoingToChange , key3:username};
            
                    fetch('updateValueProduct.php', {
                    method: 'POST',
                    body: JSON.stringify(data),
                    headers: {
                        'Content-Type': 'application/json'
                    }
                    })
                    .then(response => response.text())
                    .then(data => {
                    console.log('Data sent successfully:', data);
                    })
                    .catch(error => {
                    console.error('Error sending data:', error);
                    });        
}

for(let i=0;i<updateButtonArray.length;i++)
{
    updateButtonArray[i].onclick=()=>
    {
       
        username = updateButtonArray[i].getAttribute("data-username");
        if(updateContainer.classList.contains("d-none"))
        {
            updateContainer.classList.remove("d-none");
        }
        else
        {
            updateContainer.classList.add("d-none");
        }
    }
}

for(let i=0;i<deleteButtonArray.length;i++)
{      
    deleteButtonArray[i].onclick=()=>
    {
        username = deleteButtonArray[i].getAttribute("data-username");
        
        const data = { key3: username};
        fetch('deleteValueProduct.php', {
            method: 'POST',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json'
            }
            })
            .then(response => response.text())
            .then(data => {
            console.log('Data sent successfully:', data);
            })
            .catch(error => {
            console.error('Error sending data:', error);
            });
            
    }
}

