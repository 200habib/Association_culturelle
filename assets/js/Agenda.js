let currentIndex = 0;
const events = document.querySelectorAll('.announcement');
const totalEvents = events.length;

// Funzione per mostrare gli eventi correnti (tre alla volta) con stili personalizzati
function showEvents(index) {
    // Rimuovi le classi da tutti gli eventi
    events.forEach(event => {
        event.style.display = 'none';
        event.classList.remove('left', 'center', 'right');
    });

    // Mostra e aggiungi classi agli eventi correnti
    for (let i = 0; i < 3; i++) {
        const eventIndex = (index + i) % totalEvents; // Gestione del loop circolare
        events[eventIndex].style.display = 'block';

        // Assegna classi per posizione
        if (i === 0) {
            events[eventIndex].classList.add('left');
        } else if (i === 1) {
            events[eventIndex].classList.add('center');
        } else if (i === 2) {
            events[eventIndex].classList.add('right');
        }
    }
}

// Funzione per cambiare il set di eventi (prev o next)
function changeEvent(direction) {
    currentIndex += direction;

    // Gestisci il loop circolare
    if (currentIndex < 0) {
        currentIndex = totalEvents - 1; // Vai all'ultimo evento
    } else if (currentIndex >= totalEvents) {
        currentIndex = 0; // Torna al primo evento
    }

    showEvents(currentIndex);
}

// Inizializza mostrando i primi tre eventi
showEvents(currentIndex);

// Aggiungi event listeners ai pulsanti
const prevButton = document.getElementById('prev');
const nextButton = document.getElementById('next');

prevButton.addEventListener('click', function() {
    changeEvent(-1); // Mostra il set precedente di eventi
});

nextButton.addEventListener('click', function() {
    changeEvent(1); // Mostra il set successivo di eventi
});
