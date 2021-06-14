<?php get_header(); ?>



<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <h1 class="title"><?php the_title(); ?></h1>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?php the_content(); ?>
            </div>
            <div class="col-md-6">
                <?php $coordonee = carbon_get_the_post_meta('coordonnee'); ?>
                <div id="mapMag">
                    <script type="text/javascript">
                        var center = [<?= $coordonee['lat']?>, <?= $coordonee['lng'] ?>]

                        var macarte = null;

                        // Fonction d'initialisation de la carte
                        function initMap() {
                            // Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"
                            mapMag = L.map('mapMag').setView(center, 8);
                            // Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
                            L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
                                // Il est toujours bien de laisser le lien vers la source des données
                                attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
                                minZoom: 1,
                                maxZoom: 20,
                            }).addTo(mapMag);
                        }

                        initMap();
                        marker = new L.marker([<?= $coordonee['lat']; ?>, <?= $coordonee['lng'];?>])
                            .bindPopup('<?= $coordonee['address'] ?>')
                            .addTo(mapMag);
                    </script>
                </div>
                <div class="title">
                    <h3><b><?= carbon_get_the_post_meta('adress'); ?></b></h3>
                    <p> Téléphone = <?= carbon_get_the_post_meta('phone'); ?></p>
                </div>
            </div>
        </div>
    </div>
<?php endwhile; else : ?>

<?php endif; ?>



<?php get_footer(); ?>
