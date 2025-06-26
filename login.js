const registrationButton = document.getElementById('register');
const loginButton = document.getElementById('login');
const container = document.querySelector('.container');

registrationButton.addEventListener('click', (e) => {
    e.preventDefault();
    container.classList.add('right-panel-active');
});

loginButton.addEventListener('click', (e) => {
    e.preventDefault();
    container.classList.remove('right-panel-active');
});
