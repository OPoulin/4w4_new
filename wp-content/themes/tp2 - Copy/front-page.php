<?php 
/**
 *  Modèle de base index.php 
 */
?>

<?php get_header(); ?>
<div id="entete" class="global">
        <section class="entete__header">  
                        <!-- facebook -->

            <div class="entete__header__texte">    
                <h1 class="bgc-text"><?php echo get_bloginfo('name'); ?></h1>
                <h2 class="bgc-text"><?php echo get_bloginfo('description'); ?></h2>
                <h3 class="bgc-text">TIM - Collège de Maisonneuve</h3>
            </div>   
            <div class="entete__header__button"><button class="entete__button"><a href="http://localhost/4w4-op/index.php/category/aventure/">À l'aventure</a></button></div>
        </section>
    </div>
    <div id="accueil" class="global">
        <section class="accueil__section">
            <h2 class="texte_section">Souhaitez la bienvenue à des vacances bien mérité</h2>
            <h3>Nos catégories de voyage</h3>
            <article class="flexbox">
                <?php 
                    $categories = get_categories();
                    foreach ($categories as $elm_categories) {
                        $nom = $elm_categories->name;
                        $description = wp_trim_words($elm_categories->description, 10);
                        $nombre_destinations = $elm_categories->count;
                        $url_categorie = get_term_link($elm_categories); //FIX THIS
                    ?>
                    <div class="carte">
                        <h3><?php echo $nom; ?></h3>
                        <p><?php echo $description; ?></p>
                        <p>Nombre de destinations : <?php echo $nombre_destinations; ?></p>
                        <a class="lien__carte" href="<?php echo $url_categorie; ?>">Voyages correspondants</a>
                    </div>
                <?php } ?>
            </article>
        </section>
    </div>
    <div id="galerie" class="global diagonal">
        <section class="galerie__section">
            <h2>Galerie</h2>
            <?php 
            /*Tentative inclure slideshow dans galerie en utilisant MetaSlider*/
            /*A corriger dans le futur*/
            /*echo do_shortcode('[soliloquy id="171"]');*/?>
            <?php include("slideshow.php"); ?>
            <blockquote class="slogan__blockquote">Visitez l'une de nos centaines de destinations vacances. Nos voyages ont de quoi plaire à tous les types de voyageurs, que vous soyez du type détente ou aventureux, nous avons toutes les destinations pour vous combler de joie.</blockquote>
        </section>
    </div>
    <div id="evenement" class="global">
        <section class="evenement__section">
            <h2>Destinations Populaires</h2>
            <div class="section__cours">   
                <?php if (have_posts()):
                    while(have_posts()): the_post(); ?>
                        <div class="carte">    
                            <h4><?php the_title() ?></h4>
                            <p><?php echo wp_trim_words(get_the_content(), 10); ?></p>
                            <p><a class="lien__carte" href="<?php echo get_permalink(); ?>">Plus d'information</a></p>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </section>
        <?php get_template_part("gabarit/vague"); ?>
    </div>

    <?php  get_footer(); ?>
    