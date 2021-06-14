<?php /* Template Name: Contact */ ?>

<?php get_header(); ?>
<?php $magasins = new WP_Query([
    'post_type' => 'magasin',
    'posts_per_page' => -1,
]); ?>



<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1 class="title"> Contactez <b>Funny Shirt</b></h1>
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nom</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Votre nom">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Prénom</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Votre prénom">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez votre Email">
                    <small id="emailHelp" class="form-text text-muted">On la gardera pour nous on vous le promet.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Votre message</label>
                    <textarea  class="form-control" id="exampleInputTextarea1" rows="4"> </textarea>
                </div>
                <button type="submit" class="btn btn-primary submitContact">Envoyez notre message</button>
            </form>
            <br><br><br>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sedulo, inquam, faciam. Quis enim redargueret? Si mala non sunt, iacet omnis ratio Peripateticorum. Omnes enim iucundum motum, quo sensus hilaretur. Nam de isto magna dissensio est. </p>
            <p>Duo Reges: constructio interrete. Tum Torquatus: Prorsus, inquit, assentior; Sed ad bona praeterita redeamus. Age, inquies, ista parva sunt. Sed quot homines, tot sententiae; Refert tamen, quo modo. </p>
            <p>Non laboro, inquit, de nomine. Ego vero isti, inquam, permitto. Facile est hoc cernere in primis puerorum aetatulis. Illi enim inter se dissentiunt. Haec igitur Epicuri non probo, inquam. Nunc de hominis summo bono quaeritur; Sed quot homines, tot sententiae; </p>
            <p>Quis Aristidem non mortuum diligit? Quae sequuntur igitur? Hic nihil fuit, quod quaereremus. Quodcumque in mentem incideret, et quodcumque tamquam occurreret. </p>
            <p>Traditur, inquit, ab Epicuro ratio neglegendi doloris. Quid est igitur, inquit, quod requiras? Eademne, quae restincta siti? Nec vero alia sunt quaerenda contra Carneadeam illam sententiam. Ut aliquid scire se gaudeant? Sed haec omittamus; </p>
        </div>
        <div class="col-md-6">
            <h1 class="title"> Nos agences :</h1>
            <div id="mapid">
                <script type="text/javascript">
                    var center = [47.877961,  -0.482040]
                    var macarte = null;
                    // Fonction d'initialisation de la carte
                    function initMap() {
                        // Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"
                        mapid = L.map('mapid').setView(center, 8);
                        // Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
                        L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
                            // Il est toujours bien de laisser le lien vers la source des données
                            attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
                            minZoom: 1,
                            maxZoom: 20,
                        }).addTo(mapid);
                    }
                    initMap();
                </script>
            </div>
            <?php if ($magasins->have_posts()) : while ($magasins->have_posts()) : $magasins->the_post(); ?>
                <h3 class="titleMagContact"><?php the_title(); ?></h3>
                <div class="content">
                    <p><b><?= carbon_get_the_post_meta('adress'); ?></b></p>
                    <?php $adresse = carbon_get_the_post_meta('adress'); ?>
                    <script type="text/javascript">
                        if (typeof(marker) ==='undefined'){
                            merker = L.marker([<?php echo carbon_get_the_post_meta('longitude');?>, <?php echo carbon_get_the_post_meta('latitude');?>]).addTo(mapid);
                        }else{
                            let marker = L.marker([<?php echo carbon_get_the_post_meta('longitude');?>, <?php echo carbon_get_the_post_meta('latitude');?>]).addTo(mapid);
                        }
                        //let popup = <?php echo $adresse ?>;
                        //marker.bindPopup(popup);
                    </script>
                    <p> Téléphone = <?= carbon_get_the_post_meta('phone'); ?></p>
                </div>
                <hr>
            <?php endwhile; else : ?>
                <p>Il n'y a pas de magasin</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
