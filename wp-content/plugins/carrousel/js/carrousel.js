document.addEventListener('DOMContentLoaded', function() {
    console.log('debut du carrousel');

    // Vérifier si nous sommes sur une page single avec un carrousel
    if (!document.querySelector('.single') || !document.querySelector('.carrousel')) {
        console.log('Ce n\'est pas une page single avec un carrousel. Le script du carrousel ne s\'exécutera pas.');
        return;
    }

    // Sélectionner l'élément figure contenant la galerie d'images
    let galerieFigure = document.querySelector('.wp-block-gallery');

    if (galerieFigure) {
        // Créer une nouvelle div avec la classe "galerie"
        let galerieDiv = document.createElement('div');
        galerieDiv.classList.add('galerie');

        // Insérer la nouvelle div avant l'élément figure
        galerieFigure.parentNode.insertBefore(galerieDiv, galerieFigure);

        // Déplacer l'élément figure dans la nouvelle div
        galerieDiv.appendChild(galerieFigure);
    } else {
        console.error("La figure de la galerie n'existe pas dans le DOM");
        return;
    }

    let carrousel = document.querySelector('.carrousel');
    // let bouton = document.querySelector('.bouton__ouvrir');
    let carrouselX = document.querySelector('.carrousel__x');
    let precedentButton = document.querySelector('.carrousel__precedent');
    let suivantButton = document.querySelector('.carrousel__suivant');

    let galerie = document.querySelector('.galerie');
    if (!galerie) {
        console.error("La galerie n'existe pas dans le DOM");
        return;
    }

    let galerieImgs = galerie.querySelectorAll('img'); // Collection d'images de la galerie
    if (!galerieImgs.length) {
        console.error("Aucune image trouvée dans la galerie");
        return;
    }

    let carrouselFigure = carrousel.querySelector('.carrousel__figure');
    let carrouselRadios = carrousel.querySelector('.carrousel__form');
    let currentIndex = 0;

    function creerImageCarrousel(index, src) {
        let carrouselImg = document.createElement('img');
        carrouselImg.classList.add('carrousel__img');
        carrouselImg.dataset.index = index;
        carrouselImg.src = src;
        carrouselImg.style.opacity = index === currentIndex ? '1' : '0';
        carrouselFigure.appendChild(carrouselImg);
    }

    function creerRadioCarrousel(index) {
        let radio = document.createElement('input');
        radio.setAttribute('type', 'radio');
        radio.setAttribute('name', 'carrousel');
        radio.dataset.index = index;
        carrouselRadios.appendChild(radio);

        radio.addEventListener('change', function() {
            currentIndex = parseInt(this.dataset.index);
            updateCarrousel();
        });
    }

    function updateCarrousel() {
        let images = document.querySelectorAll('.carrousel__img');
        images.forEach(img => {
            img.style.opacity = '0';
        });
        let selectedImg = document.querySelector(`.carrousel__img[data-index='${currentIndex}']`);
        if (selectedImg) {
            selectedImg.style.opacity = '1';
        }
    }

    function montrerImageSuivante() {
        currentIndex = (currentIndex + 1) % galerieImgs.length;
        updateCarrousel();
    }

    function montrerImagePrecedente() {
        currentIndex = (currentIndex - 1 + galerieImgs.length) % galerieImgs.length;
        updateCarrousel();
    }

    function ouvrirCarrousel(index) {
        currentIndex = index;
        carrousel.classList.add('carrousel--ouvrir');
        updateCarrousel();
    }

    galerieImgs.forEach((img, idx) => {
        img.addEventListener('click', function() {
            ouvrirCarrousel(idx);
        });
        creerImageCarrousel(idx, img.src);
        creerRadioCarrousel(idx);
    });

    carrouselX.addEventListener('mousedown', function() {
        console.log('fermeture');
        carrousel.classList.remove('carrousel--ouvrir');
    });

    suivantButton.addEventListener('click', montrerImageSuivante);
    precedentButton.addEventListener('click', montrerImagePrecedente);
});