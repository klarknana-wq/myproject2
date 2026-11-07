document.addEventListener('DOMContentLoaded', function () {
    const bookButton = document.getElementById('btn-book');

    if (bookButton) {
        bookButton.addEventListener('click', function () {
            alert('Для бронирования необходимо авторизоваться');
        });
    }
});
