function validateForm() {
    let firstName = document.forms['myForm']['first_name'].value;
    let lastName = document.forms['myForm']['last_name'].value;
    let email = document.forms['myForm']['email'].value;
    let password = document.forms['myForm']['password'].value;
    let confirmPassword = document.forms['myForm']['cpassword'].value;
    let emailRegex = /^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

    if (firstName === "" || lastName === "") {
        let checkName = document.getElementById('check_name');
        checkName.innerText = 'Your Name is empty';
        checkName.style.color = 'red';
        return false;
    }else {
        let checkName = document.getElementById('check_name');
        checkName.innerText = '';
    }

    if (email === "") {
        let checkEmail = document.getElementById('check_email');
        checkEmail.innerText = 'Your Email is empty';
        checkEmail.style.color = 'red';
        return false;
        
    } else if (emailRegex.test(email) === false) {
        let checkEmail = document.getElementById('check_email');
        checkEmail.innerText = 'This Email is not valid';
        checkEmail.style.color = 'red';
        return false;
    }else {
        let checkEmail = document.getElementById('check_email');
        checkEmail.innerText = '';
    }

    if (password.length < 8) {
        let checkPass = document.getElementById('check_pass');
        checkPass.innerText = 'Password should be at least 8 characters';
        checkPass.style.color = 'red';
        return false;
    }

    if (password !== confirmPassword) {
        let checkPass = document.getElementById('check_pass');
        checkPass.innerText = 'Your Passwords do not match';
        checkPass.style.color = 'red';
        return false;
    }

    return true; // Form is valid
}

