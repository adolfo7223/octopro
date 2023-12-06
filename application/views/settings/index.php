            <style>
                .card {
                        margin: 0 auto; /* Added */
                        float: none; /* Added */
                        margin-bottom: 10px; /* Added */
                }
            </style>
            <main id="main">
                <section id="about" class="about text-center">
                    <div class="row font-weight-bold pl-4 pr-4">
                        <div class="card col-md-12 col-sm-12 mt-5">
                            <div class="card-header">
                                <div class="card-title">Update Settings</div>
                            </div>
                            <div class="card-body">
                                <form action="setting/edit_settings" method="POST">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="" class="form-label">Default Email</label>
                                                <input type="email" class="form-control" name="default_email" value="<?php echo $settings?$settings->default_email:''; ?>">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="" class="form-label">Email API Key</label>
                                                <input type="text" class="form-control" name="email_api_key" value="<?php echo $settings?$settings->email_api_key:''; ?>">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="" class="form-label">Default Phone</label>
                                                <input type="text" class="form-control" name="default_phone" value="<?php echo $settings?$settings->default_sms:''; ?>">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="" class="form-label">Phone API Key</label>
                                                <input type="text" class="form-control" name="phone_api_key" value="<?php echo $settings?$settings->sms_api_key:'' ?>">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary"><i data-feather="mail"></i> Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="card col-12 text-center pl-0 pr-0">
                        <div class="card-body">
                            
                        </div>
                    </div> -->
                </section>
            </main>
        <div>
    </div>

    <!-- Script Area -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <!-- <script src="<?php echo base_url('public/plugin/jquery/dist/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('public/plugin/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script> -->

    <!-- Feather Icon Area -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
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

</body>
</html>