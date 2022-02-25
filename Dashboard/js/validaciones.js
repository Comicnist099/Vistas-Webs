const form = document.getElementById('form');
const username = document.getElementById('username');
const alias = document.getElementById('alias');

const email = document.getElementById('email');

const password = document.getElementById('password');
const password2 = document.getElementById('password2');

form.addEventListener('submit', e => {
    e.preventDefault();

    checkInputs();
});

function checkInputs() {
    // trim to remove the whitespaces
    const usernameValue = username.value.trim();
    const emailValue = email.value.trim();
    const aliasValue = alias.value.trim();
    const passwordValue = password.value.trim();
    const password2Value = password2.value.trim();

    if (usernameValue === '') {
        setErrorFor(username, 'Favor de llenar este campo');
    } else {
        setSuccessFor(username);
    }
    if (aliasValue === '') {
        setErrorFor(alias, 'Favor de llenar este campo');
    } else {
        setSuccessFor(alias);
    }
    if (emailValue === '') {
        setErrorFor(email, 'Favor de llenar este campo');
    } else if (!isEmail(emailValue)) {
        setErrorFor(email, 'Escriba un email valido');
    } else {
        setSuccessFor(email);
    }

    if (passwordValue === '') {
        setErrorFor(password, 'Favor de llenar este campo');
    } else {
        setSuccessFor(password);
    }

    if (password2Value === '') {
        setErrorFor(password2, 'Favor de llenar este campo');
    } else if (passwordValue !== password2Value) {
        setErrorFor(password2, 'las contraseñas no coinciden');
    } else {
        setSuccessFor(password2);
    }
}

function setErrorFor(input, message) {
    const formControl = input.parentElement;
    const small = formControl.querySelector('small');
    formControl.className = 'form-control error';
    small.innerText = message;
}

function setSuccessFor(input) {
    const formControl = input.parentElement;
    formControl.className = 'form-control success';
}

function isEmail(email) {
    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}