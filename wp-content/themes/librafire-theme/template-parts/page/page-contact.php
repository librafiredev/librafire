<?php
/**
 * Contact Template
 */
?>

<section id="contact-content"><!-- Top Contact section -->
    <?php echo file_get_contents(get_template_directory() . '/images/decorations/dec5.svg'); ?>
    <?php echo file_get_contents(get_template_directory() . '/images/decorations/dec4.svg'); ?>
    <div class="contact-container">
		<?php if ( get_field( 'contact_image' ) ) : ?>
            <div class="office">
                <?php 
                    if( $image = get_field('contact_image', 'option') ) :
                        echo wp_get_attachment_image( $image['ID'], 'contact' ); 
                    endif;
                ?>
            </div>
		<?php endif;
		if ( get_field( 'content' ) ) : ?>
            <div class="get-in-touch">
				<?php the_field( 'content' ); ?>
            </div>
		<?php endif; ?>
    </div>
</section><!-- End of Top Contact section -->
<section id="location"><!-- Location section -->
    <?php echo file_get_contents(get_template_directory() . '/images/decorations/dec3.svg'); ?>
    <?php echo file_get_contents(get_template_directory() . '/images/decorations/dec4.svg'); ?>
    <div class="container">
        <div class="row">
            <div class="col-12 map-container">
                <div id="map"></div>
				<?php if ( have_rows( 'maps' ) ) :
					echo '<div class="map-address align-center text-uppercase">';
					while ( have_rows( 'maps' ) ) : the_row();
						echo '<div>';
						echo get_sub_field( 'map' )['address'];
						echo '</div>';
					endwhile;
					wp_reset_postdata();
					echo '</div>';
				endif; ?>
            </div>
        </div>
    </div>
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=<?php echo GOOGLE_MAPS_API_KEY; ?>"></script>
    <script type="text/javascript">
        var locations = [];
		<?php
		if( have_rows( 'maps' ) ) :
		while ( have_rows( 'maps' ) ) : the_row(); ?>
        locations.push({
            "name": "<?php echo get_sub_field( 'map' )['address']; ?>",
            "lat": <?php echo get_sub_field( 'map' )['lat']; ?>,
            "lng": <?php echo get_sub_field( 'map' )['lng']; ?>
        });
		<?php endwhile;
		wp_reset_postdata();
		endif; ?>
        //console.log(locations);

        jQuery( document ).ready(function() {

            var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 16,
            maxZoom: 16,
            center: new google.maps.LatLng(-33.92, 151.25),
            styles:
                [{"featureType":"administrative","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"hue":"#ffc900"},{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"},{"visibility":"simplified"}]},{"featureType":"landscape","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"},{"hue":"#00a1ff"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.attraction","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi.attraction","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.attraction","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"poi.business","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.business","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"poi.government","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi.government","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"poi.medical","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi.medical","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi.park","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"poi.place_of_worship","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi.school","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi.school","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.school","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"poi.sports_complex","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi.sports_complex","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45},{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":"-12"}]},{"featureType":"road","elementType":"labels.text","stylers":[{"lightness":"24"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"visibility":"simplified"}]},{"featureType":"road.local","elementType":"geometry.stroke","stylers":[{"visibility":"simplified"}]},{"featureType":"road.local","elementType":"labels","stylers":[{"visibility":"simplified"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry.fill","stylers":[{"visibility":"on"}]},{"featureType":"transit.line","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"transit.station","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"transit.station.rail","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#252F37"},{"visibility":"simplified"}]}],
            mapTypeId: 'terrain',
            disableDefaultUI: true
        });

        var infowindow = new google.maps.InfoWindow(),
            bounds = new google.maps.LatLngBounds(),
            marker, i;

        for (i = 0; i < locations.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i].lat, locations[i].lng),
                map: map,
                icon: '<?php echo get_template_directory_uri() ?>/images/pin.png'
            });
            bounds.extend(marker.position);
            // Center and zoom
           // map.fitBounds(bounds);

            // map.setCenter(new google.maps.LatLng(34.311288, -42.361417));
            map.setZoom(3);
            map.fitBounds(bounds);
            map.panToBounds(bounds);
           // map.panToBounds(bounds);

            // Get Location info
            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                return function () {
                    infowindow.setContent('<h5 class="location-name">' + locations[i].name + '</h5>');
                    infowindow.open(map, marker);
                }
            })(marker, i));

            // Resize
            google.maps.event.addDomListener(window, "resize", function () {
                var center = map.getCenter();
                google.maps.event.trigger(map, "resize");
                // map.setCenter(new google.maps.LatLng(34.311288, -42.361417));
                map.setZoom(3);
                map.fitBounds(bounds);
                map.panToBounds(bounds);
            });
        }

        });

      
    </script>
</section><!-- End of Location section -->