function validate() {
    let username = document.getElementById('fname').value;
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    let confirmPassword = document.getElementById('confirm-password').value;

    let usernameError = document.getElementById('username-error');
    let emailError = document.getElementById('email-error');
    let passwordError = document.getElementById('password-error');
    let cpasswordError = document.getElementById('cpassword-error');

    let valid = true;

    // Reset error messages
    usernameError.innerHTML = "";
    emailError.innerHTML = "";
    passwordError.innerHTML = "";

    // Username validation
    if (/\d/.test(username)) {
        usernameError.innerHTML = "Name should not contain numbers!";
        valid = false;
    }
    else {
        usernameError.innerHTML = "";
        valid = true;
    }

    // Email validation using REGEX
    let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        emailError.innerHTML = "Enter a valid email address!";
        valid = false;
    }
    else {
        emailError.innerHTML = "";
        valid = true;
    }

    // Check Password Length
    if (password.length < 6) {
        passwordError.innerHTML = "Password must be at least 6 characters.";
        valid = false;
    }
    else {
        passwordError.innerHTML = "";
    }

    // Check if passwords match
    if (password !== confirmPassword) {
        cpasswordError.innerHTML = "Passwords do not match!";
        valid = false;
    }
    else {
        cpasswordError.innerHTML = "";
        valid = true;
    }
    return valid;
}
function loginValidate() {
    const email = document.getElementById("login-email").value;
    const password = document.getElementById("login-password").value;

    let valid = true;

    if (!email.includes("@") || !email.includes(".")) {
        document.getElementById("login-email-error").textContent = "Please enter a valid email.";
        valid = false;
    } else {
        document.getElementById("login-email-error").textContent = "";
    }

    if (password.length < 6) {
        document.getElementById("login-password-error").textContent = "Password must be at least 6 characters.";
        valid = false;
    } else {
        document.getElementById("login-password-error").textContent = "";
    }

    return valid;
}