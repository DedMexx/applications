let textarea = document.querySelector('#comment');
let commentError = document.querySelector('#comment-error');
let commentForm = document.querySelector('.comment-form');

commentForm.addEventListener('submit', function (e) {
    if (textarea.value.trim() === '') {
        e.preventDefault();
        commentError.innerText = 'Комментарий обязателен для заполнения';
    }
})
