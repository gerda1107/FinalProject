<?php require APPROOT . '/views/inc/head.php'; ?>
<main>
    <div class="bgImg"></div>

    <section class="d-flex justify-content-center">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="services">
                <img src="<?php echo URLROOT; ?>/public/img/img1.jpg" alt="treniruotes">
                <div class="servicesHeader">TRENIRUOTĖS</div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione ducimus aperiam officiis rerum.</p>
            </div>
            <div class="services">
                <img src="<?php echo URLROOT; ?>/public/img/img2.jpg" alt="baseinas">
                <div class="servicesHeader">BASEINAS</div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab fugit harum sint officiis ullam laborum.</p>
            </div>
            <div class="services">
                <img src="<?php echo URLROOT; ?>/public/img/img3.jpg" alt="mityba">
                <div class="servicesHeader">MITYBOS PLANAI</div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus ullam laborum assumenda dicta.</p>
            </div>
        </div>
    </section>

    <section>
        <div id="map"></div>
    </section>
</main>

<script>
    function initMap() {
        const location = {
            lat: 54.723600,
            lng: 25.337970
        };
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 18,
            center: location,
        });

        const marker = new google.maps.Marker({
            position: location,
            map: map,
        });
    }
</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBknC0Ko5n-KwtXIGIj9-m8Tyxy6JiZqug&callback=initMap&libraries=&v=weekly"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>