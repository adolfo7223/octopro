            <style>
                .card {
                        margin: 0 auto; /* Added */
                        float: none; /* Added */
                        margin-bottom: 10px; /* Added */
                }

                /* OTP input field styles */
                .otp-input {
                    display: flex;
                    justify-content: center;
                    margin: 20px 0;
                }

                .otp-input input[type="text"] {
                    width: 50px;
                    height: 30px;
                    text-align: center;
                    margin: 0 5px;
                    font-size: 18px;
                }
            </style>
            <main id="main">
                <section id="about" class="about text-center">
                    <div class="row font-weight-bold pl-4 pr-4">
                        <div class="d-flex justify-content-center">
                            <div>
                                <label>Email</label>    
                            </div>
                            <div class="custom-control custom-switch pl-5">
                                <input type="checkbox" class="custom-control-input" onchange="toggleSwitchChanged(this)" id="customSwitch">
                                <label class="custom-control-label" for="customSwitch">SMS</label>
                            </div>
                        </div>
                        <div class="card col-md-6 col-sm-12 mt-2">
                            <div class="card-header">
                                <div class="card-title">Request Referral and Reward Details</div>
                            </div>
                            <div class="card-body">
                                <form id="referral_reward_request">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group" id="email_form">
                                                <label for="" class="form-label">Email</label>
                                                <input type="email" class="form-control" name="email">
                                            </div>
                                            <div class="form-group" id="phone_form" hidden>
                                                <label for="" class="form-label">Phone</label>
                                                <input type="text" class="form-control" name="phone">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary"><i data-feather="mail"></i> Send</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="request_code_validation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Validate Request</h5>
                            </div>
                            <form action="" method="post">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="" class="form-label">Code</label>
                                                <div class="otp-input">
                                                    <input type="text" class="form-control" maxlength="1" id="otp1" />
                                                    <input type="text" class="form-control" maxlength="1" id="otp2" />
                                                    <input type="text" class="form-control" maxlength="1" id="otp3" />
                                                    <input type="text" class="form-control" maxlength="1" id="otp4" />
                                                    <input type="text" class="form-control" maxlength="1" id="otp5" />
                                                    <input type="text" class="form-control" maxlength="1" id="otp6" />
                                                </div>
                                                <button id="verifyOTP" type="button">Verify OTP</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                    <?php
                    $sample = 'sam';
                    ?>
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

    <script>
        function toggleSwitchChanged(element) {
            if (element.checked) {
                $("#phone_form").attr('hidden', false)
                $("#email_form").attr('hidden', true)
                $("#email_form").find("[name='email']").val('');
            } else {
                $("#phone_form").attr('hidden', true)
                $("#email_form").attr('hidden', false)
                $("#phone_form").find("[name='phone']").val('');
            }
        }
    </script>

    <script>
        $(document).ready(function() {
            const otpInputs = document.querySelectorAll(".otp-input input");
            const verifyOTPButton = document.getElementById("verifyOTP");

            otpInputs[0].focus();

            otpInputs.forEach((input, index) => {
                input.addEventListener("input", (e) => {
                    if (e.inputType === "deleteContentBackward" && index > 0) {
                        otpInputs[index - 1].focus();
                    } else if (index < otpInputs.length - 1) {
                        otpInputs[index + 1].focus();
                    }
                });
            });

            verifyOTPButton.addEventListener("click", () => {
                const otpValue = otpInputs[0].value + otpInputs[1].value + otpInputs[2].value + otpInputs[3].value + otpInputs[4].value + otpInputs[5].value;
                // You can add your OTP verification logic here
                const verification_code = sessionStorage.getItem("verification_code");

                if (otpValue === verification_code) {
                    alert("OTP is correct. Modal will be closed.");
                    $("#request_code_validation").modal('hide');
                    if ($("#email_form").find("[name='email']").val()) {
                        window.location.href = "page/my_referral_and_reward_view?email="+$("#email_form").find("[name='email']").val();
                    } else if($("#phone_form").find("[name='phone']").val()) {
                        var phone = $("#phone_form").find("[name='phone']").val();
                        var converted_phone = phone.replaceAll(" ", "*");
                        // console.log(phone)
                        // console.log(converted_phone)
                        window.location.href = "page/my_referral_and_reward_view?phone="+converted_phone;
                    }
                } else {
                    alert("OTP is incorrect. Please try again.");
                }

                // $.ajax({
                //     url: 'page/validate_verification_code?code='+otpValue,
                //     method: 'GET',
                //     data: '',
                //     processData: false, // Prevent jQuery from processing the data
                //     contentType: false, // Let the browser set the content type
                //     dataType: 'json',
                //     success: function (response) {
                //         if (response.status === "success") {
                //             alert("OTP is correct. Modal will be closed.");
                //             $("#request_code_validation").modal('hide');
                //         } else {
                //             alert("OTP is incorrect. Please try again.");
                //         }
                //     }
                // })
            });
        })
    </script>

    <script>
        $(document).ready(function() {

            $("#referral_reward_request").submit(function(e) {
                e.preventDefault();
                
                var data = $("#referral_reward_request").serialize();

                $(".otp-input input").map((e) => {
                    $(".otp-input input").eq(e).val('');
                })

                $.ajax({
                    url: 'page/send_request_for_referral_and_reward',
                    method: 'POST',
                    data: data,
                    dataType: 'json',
                    success: function (response) {
                        console.log(response)
                        if(response.success) {
                            // alert('code: '+response.code)
                            $("#request_code_validation").modal('show');
                            sessionStorage.setItem("verification_code", response.verification_code);
                            // openModal();
                        } else if(response.error) {
                            alert(response.error)
                        }

                    }
                });
            })
        })
    </script>

    <script>
        feather.replace();
    </script>
</body>
</html>