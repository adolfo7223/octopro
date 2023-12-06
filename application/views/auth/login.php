        <main id="main">
          <section id="about" class="about text-center">
            <div class="row font-weight-bold">
              <div class="card col-6 offset-3 text-center mt-5">
                  <div class="card-header">
                      <div class="card-title"><?php echo lang('login_heading');?></div>
                  </div>
                  <div class="card-body">
                    <p><?php echo lang('login_subheading');?></p>

                    <div id="infoMessage"><?php echo $message;?></div>

                    <?php echo form_open("auth/login");?>

                      <p>
                        <?php echo lang('login_identity_label', 'identity');?>
                        <?php echo form_input($identity);?>
                      </p>

                      <p>
                        <?php echo lang('login_password_label', 'password');?>
                        <?php echo form_input($password);?>
                      </p>

                      <p>
                        <?php echo lang('login_remember_label', 'remember');?>
                        <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
                      </p>

                      <button type="submit" name="submit" value="Login" class="btn btn-pill-cyan">Login</button>

                    <?php echo form_close();?>

                    <p><a class="btn btn-pill-cyan" href="auth/forgot_password"><?php echo lang('login_forgot_password');?></a></p>
                  </div>
              </div>
            </div>
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

    <script>
        feather.replace();
    </script>
</body>
</html>