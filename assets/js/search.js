const containerCard = document.querySelector('.container-card');
const searchInput = document.getElementById('search-input');
const loader = document.querySelector('.loader');

searchInput.addEventListener('keyup', function () {
    loader.style.display = 'block';
    fetch('http://localhost/Project/Komiku/pages/ajax/cards.php?keyword=' + this.value).then(res => res.text()).then(res => {
        loader.style.display = 'none';
        containerCard.innerHTML = res;
    });
});