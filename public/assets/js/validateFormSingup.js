function validateForm(){
    let email = document.forms['myForm']['email'].value;
    let password = document.forms['myForm']['password'].value;
    let confirmPassword = document.forms['myForm']['cpassword'].value;
    let emailRegex = /^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6})*$/;

    if(emailRegex.test(email) === false){
        let checkEmail = document.getElementById('check_email');
        checkEmail.innerText = 'This Email does not Valide';
        checkEmail.style.color = 'red';
        return false;
    }

    if(password && confirmPassword > 8 && password !== confirmPassword){
        let checkPass = document.getElementById('check_pass');
        checkPass.innerText = 'Your Password does not Match';
        checkPass.style.color = 'red';
        return false;
    }
}
