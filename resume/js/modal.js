document.addEventListener('DOMContentLoaded', function() {
    // Получаем модальное окно и оверлей
    var modal = document.getElementById('modal');
    var overlay = document.getElementById('overlay');

    // Получаем ссылки на элементы галереи
    var images = document.querySelectorAll('.gallery img');
var title = '';
    // Назначаем обработчики событий для изображений
    images.forEach(function(image) {
        image.addEventListener('click', function() {
            title = this.getAttribute('title') || '';
            openModal(this.src, title);
        });
    });

    // Назначаем обработчики событий для клика на модальное окно
    modal.addEventListener('click', function(event) {
        event.stopPropagation(); // Предотвращаем передачу события дальше по иерархии DOM
    });

overlay.addEventListener('click', function(event) {
    if (event.target === this || event.target.classList.contains('close')) {
        closeModal();
    }
});
document.querySelector('.close').addEventListener('click', function(event) {
    closeModal();
    event.stopPropagation(); // Предотвращаем передачу события дальше по иерархии DOM
});
    // Закрытие модального окна при нажатии на клавишу Escape
    window.addEventListener('keydown', function(event) {
        if (event.key === 'Escape' && modal.style.display === 'block') {
            closeModal();
        }
    });

    // Открытие модального окна
    function openModal(src, title) {
        modal.querySelector('#modal-image').src = src;
        modal.querySelector('#caption').textContent = title;
        modal.classList.add('show');
        modal.style.display = 'block';
        overlay.style.display = 'block';
        document.body.style.overflow = 'hidden'; // Запрещаем прокрутку страницы
    }

    // Закрытие модального окна
    function closeModal() {
    	modal.classList.remove('show');
        modal.style.display = 'none';
        overlay.style.display = 'none';
        document.body.style.overflow = ''; // Разрешаем прокрутку страницы
    }
});
