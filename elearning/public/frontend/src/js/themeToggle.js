const themeIcon = document.getElementById('themeIcon');

// Función para cambiar el tema
const toggleTheme = () => {
    const currentTheme = localStorage.getItem('theme') || 'light';
    const newTheme = currentTheme === 'light' ? 'dark' : 'light';

    // Actualizar el tema en localStorage
    localStorage.setItem('theme', newTheme);

    // Aplicar el tema al body de la página
    document.body.setAttribute('data-theme-version', newTheme);

    // Cambiar el icono dependiendo del tema
    if (newTheme === 'dark') {
        themeIcon.classList.remove('fa-sun');
        themeIcon.classList.add('fa-moon');
    } else {
        themeIcon.classList.remove('fa-moon');
        themeIcon.classList.add('fa-sun');
    }

    // Cambiar la URL del CSS dependiendo del tema
    const themeLink = document.getElementById('theme-link');
    if (themeLink) {
        themeLink.href = newTheme === 'dark' ? darkThemeUrl : lightThemeUrl;
    }
};

// Asignar la función al clic del icono
if (themeIcon) {
    themeIcon.addEventListener('click', toggleTheme);
}

// Cargar el tema al cargar la página
window.onload = () => {
    const savedTheme = localStorage.getItem('theme') || 'light';
    document.body.setAttribute('data-theme-version', savedTheme);

    // Cambiar el enlace CSS y el icono de acuerdo al tema guardado
    const themeLink = document.getElementById('theme-link');
    if (themeLink) {
        themeLink.href = savedTheme === 'dark' ? darkThemeUrl : lightThemeUrl;
    }

    // Actualizar el icono dependiendo del tema
    if (savedTheme === 'dark') {
        themeIcon.classList.remove('fa-sun');
        themeIcon.classList.add('fa-moon');
    } else {
        themeIcon.classList.remove('fa-moon');
        themeIcon.classList.add('fa-sun');
    }
};
