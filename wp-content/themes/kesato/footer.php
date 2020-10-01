<footer class="man-footer mt-auto py-5">
    <div class="man-container container">
        <div class="row justify-content-center align-items-center">
            <div class="col d-flex justify-content-center align-items-center mb-3 text-center">
                <?php
                if (is_active_sidebar('man-widget-1')) {
                    dynamic_sidebar('man-widget-1');
                }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center align-items-center">
                <div class="man-widget-6">
                    <a href="<?php echo get_option('twitter'); ?>"><i class="fab fa-twitter font-size-6 font-color-4 man-hover-transition bg-color-6"></i></a>
                    <a href="<?php echo get_option('facebook'); ?>"><i class="fab fa-facebook-f font-size-6 font-color-4 man-hover-transition bg-color-6"></i></a>
                    <a href="<?php echo get_option('youtube'); ?>"><i class="fab fa-youtube font-size-6 font-color-4 man-hover-transition bg-color-6"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>
<script>
    jQuery(document).ready(function($) {

        $("a").on('click', function(event) {
            if (this.hash !== "") {
                event.preventDefault();
                var hash = this.hash;
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 100, function() {
                    window.location.hash = hash;
                });
            }
        });

        $('#toggleMenu').on('click', function() {
            $('#navMenu').toggleClass('active');
        });

        $('#toggleMenuClose').on('click', function() {
            $('#navMenu').removeClass('active');
        });

        var $manDocument = $(document),
            $theElement1 = $("#man-content"),
            $theElement2 = $(".man-header"),
            $theElement3 = $(".man-navbar"),
            $removeClass = 'bg-transparent',
            $addClass = 'bg-dark';

        $($manDocument).scroll(function() {
            if ($($manDocument).scrollTop() >= 700) {
                $($theElement2).removeClass($removeClass);
                $($theElement3).removeClass($removeClass);
                $($theElement2).addClass($addClass);
                $($theElement3).addClass($addClass);
            } else {
                $($theElement2).removeClass($addClass);
                $($theElement3).removeClass($addClass);
                $($theElement2).addClass($removeClass);
                $($theElement3).addClass($removeClass);
            }
        });

        if ($($manDocument).scrollTop() >= 700) {
            $($theElement2).removeClass($removeClass);
            $($theElement3).removeClass($removeClass);
            $($theElement2).addClass($addClass);
            $($theElement3).addClass($addClass);
        } else {
            $($theElement2).removeClass($addClass);
            $($theElement3).removeClass($addClass);
            $($theElement2).addClass($removeClass);
            $($theElement3).addClass($removeClass);
        }

    });
</script>
<?php if (is_front_page()) { ?>
    <script>
        var styles = {
            default: null,
            hide: [{
                    featureType: 'poi.business',
                    stylers: [{
                        visibility: 'off'
                    }]
                },
                {
                    featureType: 'transit',
                    elementType: 'labels.icon',
                    stylers: [{
                        visibility: 'off'
                    }]
                },
                {
                    featureType: 'poi', //all poi categories
                    stylers: [{
                        visibility: 'off'
                    }] //hide poi
                }
            ]
        };

        function initMap() {
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 17,
                center: {
                    lat: -8.654090,
                    lng: 115.153514
                },
                mapTypeId: 'satellite'
            });

            map.setOptions({
                styles: styles['hide']
            });

            const contentString =
                "<p><b>Hudsonrise</b></p>" +
                "<p>Jl. Bumbak Dauh Gg. Pulau 20 No. 4 Banjar Anyar Kelod, Kuta Utara, Kab. Badung, Bali 80361, Indonesia<br>" +
                "+62 361 474 0834<br>" +
                "hello@kesato.com</p>";

            const infowindow = new google.maps.InfoWindow({
                content: contentString
            });

            const marker = new google.maps.Marker({
                position: {
                    lat: -8.654090,
                    lng: 115.153514
                },
                map,
                title: "Hudsonrise",
                icon: "<?php bloginfo('template_url'); ?>/images/map-icon.png"
            });

            marker.addListener("click", () => {
                infowindow.open(map, marker);
            });
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCr12qkg7xIbu7XMsC8F3NAuJ9EufgAO6Y&callback=initMap" type="text/javascript"></script>
<?php } ?>
</body>
</html>