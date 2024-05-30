(function () {
    //  Code du carroussel
    console.log("Début du carroussel");
    // Récupération des éléments du DOM
    let carroussel = document.querySelector('.carroussel');
    //  Affichage des éléments récupérés
    console.log(" carroussel : ", carroussel.tagName);
    // Récupération des éléments du DOM
    let bouton = document.querySelector('.bouton__ouvrir');
    // Affichage des éléments récupérés
    console.log(" bouton : ", bouton.tagName);
    // Récupération des éléments du DOM
    let carroussel__x = document.querySelector('.carroussel__x');
 
    // Affichage des éléments récupérés
    let galerie = document.querySelector('.galerie');
    // Affichage des éléments récupérés
    let carroussel__figure = document.querySelector('.carroussel__figure');
    let galerie__image = galerie.querySelectorAll('img');
 
    let radioContainer = document.createElement('div');
    radioContainer.classList.add('radio-container');
 
    let index = 0;
 
    for (let i = 0; i < galerie__image.length; i++) {
       
        let carroussel__image = document.createElement('img');
        carroussel__image.classList.add('carroussel__image');
        carroussel__image.dataset.index = index;
        carroussel__image.src = galerie__image[i].src;
        carroussel__figure.appendChild(carroussel__image);
       
        creer_radio_button(i, carroussel__image);
       
    }
 
    function creer_radio_button(i, carroussel__image){
        // Create radio button for each image
        let radioButton = document.createElement('input');
        radioButton.type = 'radio';
        radioButton.name = 'carousel-radio';
        radioButton.id = 'radio' + i;
        radioButton.classList.add('carousel-radio');
        radioButton.value = i;
        radioContainer.appendChild(radioButton);
   
        // Add click event listener to radio button
        radioButton.addEventListener('click', function() {
            // Hide all images
            let toutesLesImages = carroussel__figure.querySelectorAll('.carroussel__image');
            toutesLesImages.forEach(img => img.style.display = 'none');
   
            // Show clicked image
            carroussel__image.style.display = 'block';
        });
    }
 
    carroussel.appendChild(radioContainer);
 
    carroussel.appendChild(radioContainer);
 
    bouton.addEventListener('mousedown', function () {
        carroussel.classList.add('carroussel--ouvrir');
    })
 
    carroussel__x.addEventListener('mousedown', function () {
        carroussel.classList.remove('carroussel--ouvrir');
    })
})()