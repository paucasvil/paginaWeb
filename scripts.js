


document.querySelectorAll('.service-item').forEach(item => {
    const backgroundImage = item.getAttribute('data-background'); // Obtiene el valor del data-background
    item.style.backgroundImage = `url(${backgroundImage})`; // Asigna la imagen de fondo
});
