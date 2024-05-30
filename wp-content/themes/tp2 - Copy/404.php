<?php get_header(); ?>

<div id="accueil" class="global">
    <div class="gabarit_404">
        <section class="accueil__section ensemble_404">
            <div class="assembler_404">
                <div>
                    <h2 class="texte_section">Erreur 404</h2>
                    <h4 class="texte_404">Vous essayez d'accéder à une page qui n'existe pas</h4>
                    <h4 class="texte_404">Pour revenir à la page d'accueil, cliquez sur le lien suivant</h4>
                    <div class="conteneur_404">
                        <button id="bouton_retour" type="button">Explorez le monde</button>
                        <?php 
                        echo get_search_form();
                        ?>
                    </div>
                </div>
                <img class="image_404" src="https://gftnth00.mywhc.ca/tim45/wp-content/uploads/2024/04/Default_circular_logo_for_a_vacation_website_2.png" alt="image 404">
            </div>
        </section>
        <ul class="les_categories">
            <a href="https://gftnth00.mywhc.ca/tim45/category/aventure/"><li class="une_categorie">Aventure</li></a>
            <a href="https://gftnth00.mywhc.ca/tim45/category/croisiere/"><li class="une_categorie">Croisière</li></a>
            <a href="https://gftnth00.mywhc.ca/tim45/category/culturel/"><li class="une_categorie">Culturel</li></a>
            <a href="https://gftnth00.mywhc.ca/tim45/category/economique/"><li class="une_categorie">Économique</li></a>
            <a href="https://gftnth00.mywhc.ca/tim45/category/pleine-nature/"><li class="une_categorie">Pleine Nature</li></a>
            <a href="https://gftnth00.mywhc.ca/tim45/category/repos/"><li class="une_categorie">Repos</li></a>
            <a href="https://gftnth00.mywhc.ca/tim45/category/sport/"><li class="une_categorie">Sport</li></a>
            <a href="https://gftnth00.mywhc.ca/tim45/category/zen/"><li class="une_categorie">Zen</li></a>
        </ul>
    </div>
</div>
<?php  get_footer(); ?>


<script>
    /*Code recupere du fichier js*/
    let btn = document.getElementById('bouton_retour');


    btn.addEventListener('click', revenirFrontPage) 



    function revenirFrontPage() {
    document.location.href = 'https://gftnth00.mywhc.ca/tim45/';
    };
</script>
