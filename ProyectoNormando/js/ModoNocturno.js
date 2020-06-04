
$(".ModoNocturnoBase").on("click", () => {
    $("body").toggleClass("ModoNocturnoActivar"); 
    // Guardamos el modo en localstorage.
    if (document.body.classList.contains('ModoNocturnoActivar')) {
        localStorage.setItem('Modo Nocturno', 'true');
    } else {
        localStorage.setItem('Modo Nocturno', 'false');
    }});

// Obtenemos el modo actual.
if (localStorage.getItem('Modo Nocturno') == 'true') {
    document.body.classList.add('ModoNocturnoActivar');
} else {
    document.body.classList.remove('ModoNocturnoActivar');
}