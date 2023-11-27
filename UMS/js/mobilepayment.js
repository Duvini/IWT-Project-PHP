const name=document.getElementById('name')
const email=document.getElementById('email')
const address=documnet.getElementById('address')
 form.addEvenrListener('submit',(e)=>{
    let messages =[]
    if(name.value ==='' ||name.value == null){
messages.push('Name is requierd')
    }
    if(messages.lenngth>0){

    e.preventDefault()
    errorElement.innerText=messages.join(',')
    }
})

