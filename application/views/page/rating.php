            <main id="main">
                <section id="about" class="about text-center">
                    <div class="row mt-5">
                        <div class="col-12">
                            <div>
                                <img class="card-img-top" src="<?php echo base_url('uploads/octopro.png'); ?>" alt="Card image" width="auto" height="auto"alt="image-1"style="max-width:350px;max-height:350px">
                            </div>
                            <div class="mt-5">
                                <p class="font-weight-bold">Big Thanks for Choosing Octor Pro Coatings!</p>
                                <p>At Octo Pro Coatings, your satisfation is our fuel. We're on a mission to bring excellence to every coating adventure we embark upon. Let us know how we did!</p>
                                <p>How Satisfied are you with our services?</p>
                            </div>
                            <div class="rating2">
                                <span class="star2" id="rating1" data-rating="1" onClick="on_rating_click(1)">★</span>
                                <span class="star2" id="rating2" data-rating="2" onClick="on_rating_click(2)">★</span>
                                <span class="star2" id="rating3" data-rating="3" onClick="on_rating_click(3)">★</span>
                                <span class="star2" id="rating4" data-rating="4" onClick="on_rating_click(4)">★</span>
                                <span class="star2" id="rating5" data-rating="5" onClick="on_rating_click(5)">★</span>
                            </div>
                            <div>
                                <button class="btn btn-pill-cyan" id="next" type="button">Submit</button>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        <!-- <div>
    </div> -->
    <!-- Script Area -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <!-- Vendor JS Files -->
    <script src="<?php echo base_url('public/theme/onepage/vendor/purecounter/purecounter_vanilla.js'); ?>"></script>
    <script src="<?php echo base_url('public/theme/onepage/vendor/aos/aos.js'); ?>"></script>
    <script src="<?php echo base_url('public/theme/onepage/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/theme/onepage/vendor/glightbox/js/glightbox.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/theme/onepage/vendor/isotope-layout/isotope.pkgd.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/theme/onepage/vendor/swiper/swiper-bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/theme/onepage/vendor/php-email-form/validate.js'); ?>"></script>

    <!-- Template Main JS File -->
    <script src="<?php echo base_url('public/theme/onepage/js/main.js'); ?>"></script>

    <script>
        function on_rating_click(rating) {
            $(".star2").removeClass('active');
            $("#rating"+rating).addClass('active');
        }
    </script>

    <script>
        $(document).ready(function() {
            $(".star2").click(function(e) {
                // console.log();
                var selected_rate = $(this).data('rating');
                $(".star2").removeClass('active');
                for (x = 0; x <= selected_rate; x++) {
                    $("#rating"+x).addClass('active');
                }
            })

            $("#next").on("click", function() {
                $('.star2').each(function() {
                    if ($(this).hasClass('active')) {
                        // This element has the class "active"
                        var value = $(this).data('rating'); // Get the value of the element
                        
                        var redirectURL;

                        var id = "<?php echo $id ?>";

                        // Define the redirect URLs for each rating here
                        switch (value) {
                            case 1:
                                redirectURL = id?'page/mailing?id='+id:'page/mailing';
                                break;
                            case 2:
                                redirectURL = id?'page/mailing?id='+id:'page/mailing';
                                break;
                            case 3:
                                redirectURL = id?'page/mailing?id='+id:'page/mailing';
                                break;
                            case 4:
                                redirectURL = 'page/redirects';
                                break;
                            case 5:
                                redirectURL = 'page/redirects';
                                break;
                            default:
                                redirectURL = 'page/redirects';
                        }

                        // Redirect to the chosen site
                        window.location.href = redirectURL;

                    }
                });
            })
        })
    </script>
</body>
</html>