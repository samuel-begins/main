 /*Помечать объект при клике; Для index.html и css(.button-header, .button, .button2)*/ 
 document.querySelector('.button-header').addEventListener('click', function() {
    this.classList.toggle('marked');
  });

  document.querySelector('.button').addEventListener('click', function() {
    this.classList.toggle('marked');
  });

  document.querySelector('.button2').addEventListener('click', function() {
    this.classList.toggle('marked');
  });


  
 /*Помечать объект при клике; Для index.html и css(.button-header, .button, .button2)*/



 

 // Получаем все кнопки фильтрации
const filterButtons = document.querySelectorAll('.filter-btn');
// Получаем контейнер карточек
const cardsContainer = document.getElementById('cards-container');
// Получаем все карточки
const cards = cardsContainer.querySelectorAll('.card');

filterButtons.forEach(button => {
  button.addEventListener('click', () => {
    const filterValue = button.getAttribute('data-filter');

    // Проходим по всем карточкам и скрываем/показываем
    cards.forEach(card => {
      const category = card.getAttribute('data-category');
      if (filterValue === 'all' || category === filterValue) {
        card.classList.remove('hidden');
      } else {
        card.classList.add('hidden');
      }
    });
  });
});