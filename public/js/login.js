const submitBtn = document.querySelector(".firstNext"); 
 
submitBtn.addEventListener("click", function(event){
event.preventDefault();      
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value.trim();
     
    let errorPassword = document.getElementById('error-password'); 
    let errorEmail = document.getElementById('error-email');
    
    let isValid = true;
    const errorMessage = 'Wajib Di isi';
  
    // Validasi Email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email === '') {
        errorEmail.textContent = errorMessage;
        isValid = false;
        
    } else if (!emailRegex.test(email)) {
        errorEmail.textContent = 'Dalam format Email';
        isValid = false;
    } else {
        errorEmail.textContent = '';
    }

    // Validasi password
    if (password === '') {
        errorPassword.textContent = errorMessage;
        isValid = false;
    } else {
        errorPassword.textContent = '';
    }  

    if (isValid) { 
    } 
});
 
 
$(document).ready(function(){
  
});