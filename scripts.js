var linkContato = document.querySelector('a[href="#contato"]');
linkContato.addEventListener('click', function(event) {
    event.preventDefault(); // Previnir o comportamento padrão do link
    document.querySelector('#contato').scrollIntoView({ behavior: 'smooth' });
});
var linkPortifolio = document.querySelector('a[href="#portifolio"]');
linkPortifolio.addEventListener('click', function(event) {
    event.preventDefault(); // Previnir o comportamento padrão do link
    document.querySelector('#portifolio').scrollIntoView({ behavior: 'smooth' });
});
var linkSobre = document.querySelector('a[href="#sobre"]');
linkSobre.addEventListener('click', function(event) {
    event.preventDefault(); // Previnir o comportamento padrão do link
    document.querySelector('#sobre').scrollIntoView({ behavior: 'smooth' });
});