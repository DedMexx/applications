let name = document.querySelector('#name');
let nameError = document.querySelector('#name-error');
let lastName = document.querySelector('#lastName');
let lastNameError = document.querySelector('#last-name-error');
let phone = document.querySelector('#phone');
let phoneError = document.querySelector('#phone-error');
let email = document.querySelector('#email');
let emailError = document.querySelector('#email-error');
let form = document.querySelector('.client-form');
let errors = {};


name.addEventListener("input", function () {
    const inputValue = name.value;
    name.value = inputValue.replace(/[^A-Za-zА-Яа-я\s'-]+/gu, '');
});

lastName.addEventListener('input', function (event) {
    const input = event.target;
    input.value = input.value.replace(/[^A-Za-zА-Яа-я\s'-]+/gu, '');
});

phone.addEventListener('input', function (event) {
    const input = event.target;
    let sanitizedValue = input.value.replace(/[^0-9+\-()]/gu, '');

    if (sanitizedValue.startsWith('+')) {
        sanitizedValue = '+' + sanitizedValue.replace(/\+/g, '');
    } else {
        sanitizedValue = sanitizedValue.replace(/\+/g, '');
    }

    input.value = sanitizedValue;
});

email.addEventListener('input', function (event) {
    const input = event.target;
    input.value = input.value.replace(/[^a-zA-Z0-9._%+@-]/gu, '');
});


form.addEventListener('submit', function (event) {
    errors = {};

    if (name.value.trim() === '') {
        errors.name = 'Имя обязательно для заполнения';
    } else if (!/[A-Za-zА-Яа-я\s'-]+/gu.test(name.value)) {
        errors.name = 'Неправильный формат имени';
    }

    if (lastName.value.trim() === '') {
        errors.lastName = 'Фамилия обязательна для заполнения';
    } else if (!/[A-Za-zА-Яа-я\s'-]+/gu.test(lastName.value)) {
        errors.lastName = 'Неправильный формат фамилии';
    }

    if (phone.value.trim() === '') {
        errors.phone = 'Телефон обязателен для заполнения';
    } else if (!/^[+]?[0-9\-()]+$/.test(phone.value)) {
        errors.phone = 'Неправильный формат телефона';
    }

    if (email.value.trim() === '') {
        errors.email = 'Email обязателен для заполнения';
    } else if (!/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email.value)) {
        errors.email = 'Неправильный формат email';
    }

    if (Object.keys(errors).length > 0) {
        event.preventDefault();
        displayErrors();
    }
});

function displayErrors() {
    if (errors.name) {
        nameError.innerText = errors.name;
    } else {
        nameError.innerText = '';
    }
    if (errors.lastName) {
        lastNameError.innerText = errors.lastName;
    } else {
        lastNameError.innerText = '';
    }
    if (errors.phone) {
        phoneError.innerText = errors.phone;
    } else {
        phoneError.innerText = '';
    }
    if (errors.email) {
        emailError.innerText = errors.email;
    } else {
        emailError.innerText = '';
    }
}
