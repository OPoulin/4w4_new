<?php 
/**
 *  Modèle de base index.php 
 */
?>

<?php get_header(); ?>
<h2>index.php</h2>
<div id="entete" class="global">
        <section class="entete__header">  
                        <!-- facebook -->

            <div class="entete__header__texte">    
                <h1 class="bgc-text">Escapar</h1>
                <h2 class="bgc-text">Votre seule destination pour <br> toutes vos envies de voyage</h2>
                <h5 class="bgc-text">TIM - Collège de Maisonneuve</h5>
            </div>   
            <div class="entete__header__button">
                <button class="entete__button">Nos destinations</button>
            </div>
        </section>
<?php get_template_part("gabarit/vague"); ?>
    </div>
    <div id="accueil" class="global">
        <section class="accueil__section">
            <h2>Accueil (h2)</h2>
        <div class="section__cours">  
 <?php
  /*
        if (have_posts()){
            while(have_posts()){
                the_post();
                the_title('<p>','</p>');
                $contenu = get_the_content();
                $contenu = wp_trim_words($contenu, 10);
                echo $contenu;
            }
        }
  */
  ?>      
  <?php if (have_posts()):
        while(have_posts()): the_post(); 
        $titre = get_the_title();
        $sigle = substr($titre, 0, 7);
        $pos_parenthese = strpos($titre, '(');
        $duree = substr($titre,$pos_parenthese+1, -1);
        $titre = substr($titre, 7, $pos_parenthese-7);
        ?>
        <div class="carte">
            <h5><?php echo $sigle; ?></h5> 
            <h4><?php echo $titre; ?></h4>
            <p><?php echo wp_trim_words(get_the_content(),10); ?></p>
            <h5>Durée: <?php echo $duree; ?></h5>
        </div>
       <?php endwhile; ?>
    <?php endif; ?>
  </div>



    </div>
    <div id="galerie" class="global diagonal">
        <section class="galerie__section">
            <h2>Galerie  (h2)</h2>
            <p>Lorem ipsum dolor sit amet,<a href="#">Lorem, ipsum.</a>  consectetur adipisicing elit. Minima <a href="#">Lorem, ipsum.</a>  velit qui unde odit quae, magni labore maiores facilis obcaecati dolore, ullam facere. Ducimus veniam reprehenderit, temporibus ab at possimus fugit?</p>
            <blockquote>Galerie ipsum, dolor sit amet consectetur adipisicing elit. Accusantium a, repellat alias qui ut in ratione optio quia quae minus repudiandae ducimus aliquid aperiam unde atque tempore non. Non, magnam.</blockquote>
        </section>
    </div>
    <div id="evenement" class="global">
        <section class="evenement__section">
            <h2>Événement</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. <a href="#">Lorem, ipsum.</a>  Minima velit qui unde odit quae, <a href="#">Lorem, ipsum.</a>  magni labore maiores facilis obcaecati dolore, ullam facere. Ducimus veniam reprehenderit, temporibus ab at possimus fugit?</p>
             <blockquote>Événement ipsum, dolor sit amet consectetur adipisicing elit. Accusantium a, repellat alias qui ut in ratione optio quia quae minus repudiandae ducimus aliquid aperiam unde atque tempore non. Non, magnam.</blockquote>
        </section>
        <?php get_template_part("gabarit/vague"); ?>
    </div>
    <div id="footer" class="global">
        <footer class="footer__section">
            <form class="recherche" action="">
                <input class="recherche__input" type="search" name="" id="" placeholder="Recherche">
                <button class="recherche__button">
                    <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" color="#000"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </button>
            </form>
            <div class="sociaux">
                <a href="#"><svg width="32px" height="32px" role="img" viewBox="0 0 24 24" fill="currentColor" color="#ffffff" xmlns="http://www.w3.org/2000/svg"><title>Pinterest icon</title><path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.162-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.401.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.354-.629-2.758-1.379l-.749 2.848c-.269 1.045-1.004 2.352-1.498 3.146 1.123.345 2.306.535 3.55.535 6.607 0 11.985-5.365 11.985-11.987C23.97 5.39 18.592.026 11.985.026L12.017 0z"></path></svg></a>
                <a href="#"><svg width="32px" height="32px" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" color="#000000"><title>YouTube icon</title><path d="M23.495 6.205a3.007 3.007 0 0 0-2.088-2.088c-1.87-.501-9.396-.501-9.396-.501s-7.507-.01-9.396.501A3.007 3.007 0 0 0 .527 6.205a31.247 31.247 0 0 0-.522 5.805 31.247 31.247 0 0 0 .522 5.783 3.007 3.007 0 0 0 2.088 2.088c1.868.502 9.396.502 9.396.502s7.506 0 9.396-.502a3.007 3.007 0 0 0 2.088-2.088 31.247 31.247 0 0 0 .5-5.783 31.247 31.247 0 0 0-.5-5.805zM9.609 15.601V8.408l6.264 3.602z"></path></svg></a>
                <a href="#"><svg width="32px" height="32px" role="img" viewBox="0 0 24 24" fill="currentColor" color="#000000" xmlns="http://www.w3.org/2000/svg"><title>WordPress icon</title><path d="M21.469 6.825c.84 1.537 1.318 3.3 1.318 5.175 0 3.979-2.156 7.456-5.363 9.325l3.295-9.527c.615-1.54.82-2.771.82-3.864 0-.405-.026-.78-.07-1.11m-7.981.105c.647-.03 1.232-.105 1.232-.105.582-.075.514-.93-.067-.899 0 0-1.755.135-2.88.135-1.064 0-2.85-.15-2.85-.15-.585-.03-.661.855-.075.885 0 0 .54.061 1.125.09l1.68 4.605-2.37 7.08L5.354 6.9c.649-.03 1.234-.1 1.234-.1.585-.075.516-.93-.065-.896 0 0-1.746.138-2.874.138-.2 0-.438-.008-.69-.015C4.911 3.15 8.235 1.215 12 1.215c2.809 0 5.365 1.072 7.286 2.833-.046-.003-.091-.009-.141-.009-1.06 0-1.812.923-1.812 1.914 0 .89.513 1.643 1.06 2.531.411.72.89 1.643.89 2.977 0 .915-.354 1.994-.821 3.479l-1.075 3.585-3.9-11.61.001.014zM12 22.784c-1.059 0-2.081-.153-3.048-.437l3.237-9.406 3.315 9.087c.024.053.05.101.078.149-1.12.393-2.325.609-3.582.609M1.211 12c0-1.564.336-3.05.935-4.39L7.29 21.709C3.694 19.96 1.212 16.271 1.211 12M12 0C5.385 0 0 5.385 0 12s5.385 12 12 12 12-5.385 12-12S18.615 0 12 0"></path></svg></a>
                <a href="#"><svg width="32px" height="32px" role="img" viewBox="0 0 24 24" fill="currentColor" color="#000000" xmlns="http://www.w3.org/2000/svg"><title>Google icon</title><path d="M12.24 10.285V14.4h6.806c-.275 1.765-2.056 5.174-6.806 5.174-4.095 0-7.439-3.389-7.439-7.574s3.345-7.574 7.439-7.574c2.33 0 3.891.989 4.785 1.849l3.254-3.138C18.189 1.186 15.479 0 12.24 0c-6.635 0-12 5.365-12 12s5.365 12 12 12c6.926 0 11.52-4.869 11.52-11.726 0-.788-.085-1.39-.189-1.989H12.24z"></path></svg></a>
                <a href="#"><svg width="32px" height="32px" role="img" viewBox="0 0 24 24" fill="currentColor" color="#000000" xmlns="http://www.w3.org/2000/svg"><title>GitHub icon</title><path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"></path></svg></a>
                <a href="#"><svg width="32px" height="32px" role="img" viewBox="0 0 24 24" fill="currentColor" color="#000000" xmlns="http://www.w3.org/2000/svg"><title>Facebook icon</title><path d="M23.9981 11.9991C23.9981 5.37216 18.626 0 11.9991 0C5.37216 0 0 5.37216 0 11.9991C0 17.9882 4.38789 22.9522 10.1242 23.8524V15.4676H7.07758V11.9991H10.1242V9.35553C10.1242 6.34826 11.9156 4.68714 14.6564 4.68714C15.9692 4.68714 17.3424 4.92149 17.3424 4.92149V7.87439H15.8294C14.3388 7.87439 13.8739 8.79933 13.8739 9.74824V11.9991H17.2018L16.6698 15.4676H13.8739V23.8524C19.6103 22.9522 23.9981 17.9882 23.9981 11.9991Z"></path></svg></a>
            </div>
        </footer>
    </div>
</body>
</html>

<!--

https://svgbox.net/


https://icodethis.com/


-->