/*
Le plugin ne fonctionne pas et ne donne pas d'erreur à aucun moment, aucun console.log, aucun signe de vie
*/

document.addEventListener("DOMContentLoaded", function() {
  console.log("REST API");

  //Recupere la div avec la galerie
  let galerie = document.getElementById("galerie");
  if (!galerie) {
    console.error("La div galerie n'existe pas dans le DOM");
    return;
  }

  //Recupere la section dans la galerie et donne la classe bouton_restapi
  let restapiBoutons = galerie.querySelector("section");
  if (restapiBoutons) {
    restapiBoutons.classList.add("boutons_restapi");
  } else {
    console.error("La section dans 'galerie' n'existe pas dans le DOM");
  }
  
  // Ajoute l'element si il n'est pas la
  let restapi = document.createElement("section");
  restapi.classList.add("contenu__restapi");
  galerie.appendChild(restapi);

  let boutons_categorie = document.querySelectorAll(".bouton_categorie");

  // Fonction pour recuperer les donnees de l'API
  function fetchData(categorie) {
    let url = `https://gftnth00.mywhc.ca/tim45/wp-json/wp/v2/posts?categories=${categorie}`;
    console.log(url);

    fetch(url)
      .then(function(response) {
        if (!response) {
          throw new Error("La requete a echoue avec le statut " + response.status);
        }
        return response.json();
      })
      .then(function(data) {
        restapi.innerHTML = "";
        data.forEach(function(article){
          let titre = article.title.rendered;
          let contenu = article.content.rendered;

          if (article.meta && article.meta.ville_avoisinante) {
            console.log("ville :", article.meta.ville_avoisinante);
          }

          contenu = contenu.substr(0, 100) + "..."; // Maximum de 100 caracteres
          let carte = document.createElement("div");
          carte.classList.add("restapi__carte");
          carte.innerHTML = `
            <h2>${titre}</h2>
            <p>${contenu}</p>
          `;
          restapi.appendChild(carte);
        });
      })
      .catch(function(error) {
        console.error("Erreur lors de la recuperation des donnees :", error);
      });
  }
    // Attacher l'evenement a chaque bouton
    boutons_categorie.forEach(function(bouton) {
      bouton.addEventListener("click", function() {
        let categorie = this.id.replace("cat_", "");
        fetchData(categorie);
      })
    });
});