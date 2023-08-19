let username = document.querySelector('#username');
let usernameError = document.querySelector('#username-error');
let password = document.querySelector('#password');
let passwordError = document.querySelector('#password-error');
let form = document.querySelector('.login-form');

form.addEventListener('submit', function (e) {
    if (username.value.trim() === '') {
        e.preventDefault();
        usernameError.innerText = 'Логин обязателен для заполнения';
    }
    if (password.value.trim() === '') {
        e.preventDefault();
        passwordError.innerText = 'Пароль обязателен для заполнения';
    }
})
