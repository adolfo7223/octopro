            <main id="main">
                <section id="about" class="about text-center">
                    <div class="row mt-5">
                        <div class="col-12">
                            <div>
                                <img class="card-img-top" src="<?php echo base_url('uploads/octopro.png'); ?>" alt="Card image" width="auto" height="auto"alt="image-1"style="max-width:350px;max-height:350px">
                            </div>
                            <div class="mt-5">
                                <p class="font-weight-bold">Thank you for taking the time to share your valuable feedback regarding your recent experience with us.</p>
                                <p>We're excited to introduce our referral reward program. if you refer a friend to us and they become our client, you'll both receive a special reward as a gesture of gratitude from us.</p>
                            </div>
                            <div class="mt-5">
                                <div class="d-flex justify-content-center flex-wrap">
                                    <div>
                                        <button class="btn btn-pill-success" data-target="#refer_a_friend" data-toggle="modal" >Refer a Friend Now</button>
                                    </div>
                                    <div>
                                        <button class="btn btn-pill-orange" id="refer_later">Refer a Friend Later</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="refer_a_friend" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Refer a friend</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="send_referral_form">
                                <div class="modal-body referral_form">
                                    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <h3><span class="badge badge-pill badge-secondary">1</span></h3>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="email">Name</label>
                                                <input type="email" name="name[]" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" name="email[]" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="email">Phone</label>
                                                <input type="email" name="phone[]" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div id="refer_more_area">

                                    </div>
                                    <div>
                                        <button id="add_more" type="button" class="btn btn-primary">Add More</button>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" id="submit" class="btn btn-primary" name="submit">Submit</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>

                </section>
            </main>
        <!-- <div>
    </div> -->
    <!-- Script Area -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#add_more").click(function() {
                var count = $(".referral_form").length;
                $("#refer_more_area").append(`
                    <div class="row referral_form">
                        <div class="col-md-12 text-center">
                            <h3><span class="badge badge-pill badge-secondary">`+(count+1)+`</span></h3>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email">Name</label>
                                <input type="email" name="name[]" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email[]" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email">Phone</label>
                                <input type="email" name="phone[]" class="form-control">
                            </div>
                        </div>
                    </div>
                    <hr>
                `);
            })
        })
    </script>

    <script>
        $(document).ready(function() {
            $("#refer_later").click(function() {
                swal({
                    title: "Big Thanks for Choosing OctoPro Coating!",
                    text: "Thank you for sharing your feedback with us! We're delighted to hear about your positive experience. It's a pleasure doing business with you.",
                    buttons: "OK",
                    customClass: {
                        confirmButton: 'centered-button-class'
                    }
                }).then((value) => {
                    if (value) {
                        window.location.href = "https://octoprocoatings.com/";
                    }
                });
            })
        })
    </script>

    <script type="text/javascript">
        $("#submit").click(() => {
            var data = $('#send_referral_form').serialize();
            var id = $("#id").val();

            $.ajax({
                url: 'page/send_referral_customer',
                method: 'POST',
                data: data,
                dataType: 'json',
                success: function (response) {
                    console.log(response)
                    if (response.result) {
                        alert('Email sent successfully');
                        window.location.href = 'page/refer?id='+response.id;
                    } else {
                        alert('Something went wrong Please Contact Administrator to resolve the problem.');
                    }
                }
            })

            if (id == "zzz") {
                var message = 'Sample Customer invites you to checkout our service';
                var receiver = $("#email").val();

                // Replace with your SendinBlue API key
                const API_KEY = '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';

                // SendinBlue API endpoint for sending transactional emails
                const API_ENDPOINT = 'https://api.sendinblue.com/v3/smtp/email';

                // Define your email data
                const emailData = {
                    sender: { name: 'Octopro Coatings', email: 'hello@octoprocoatings.com' },
                    to: [{ email: receiver }],
                    subject: 'Rating',
                    htmlContent: message,
                    textContent: message,
                };

                // Create a new XMLHttpRequest
                const xhr = new XMLHttpRequest();
                
                // Configure the request
                xhr.open('POST', API_ENDPOINT, true);
                xhr.setRequestHeader('Content-Type', 'application/json');
                xhr.setRequestHeader('api-key', API_KEY);

                // Handle the response
                xhr.onload = function() {
                    if (xhr.status >= 200 && xhr.status < 300) {
                        console.log('Email sent successfully:', xhr.responseText);

                        alert('Email sent successfully');
                        
                    } else {
                        console.error('Error sending email:', xhr.status, xhr.statusText);
                    }
                };

                // Handle network errors
                xhr.onerror = function() {
                    console.error('Network error occurred');
                };

                // Send the request with the email data
                xhr.send(JSON.stringify(emailData));
            }
        })
    </script>
    
</body>
</html>