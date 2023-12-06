                <style>
                    ul {
                        list-style: none; /* Remove bullets */
                        padding: 0; /* Remove default padding */
                        margin: 0; /* Remove default margin */
                    }
                </style>
                
                <main id="main">
                    <section id="about" class="about text-center">
                        <div class="container mt-1
                        .">
                            <!-- <div class="row">
                                <div class="col-md-12 text-center">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                        <label class="custom-control-label" for="customSwitch1">Use SMS</label>
                                    </div>
                                </div>
                            </div> -->
                            <ul id="item-list">
                            <?php foreach($rating_lists as $rating_list) { ?>
                                <div class="row">
                                    <div class="col-md-6 offset-md-3 col-sm-12 text-center">
                                        <li>
                                            <div>
                                                <p><?php echo $rating_list->description ?></p>
                                            </div>
                                            <div class="rating<?php echo $rating_list->id ?>">
                                                <span class="star2" id="rating1-<?php echo $rating_list->id ?>" data-id="<?php echo $rating_list->id ?>" data-rating="1-<?php echo $rating_list->id ?>" onClick="on_rating_click(1, <?php echo $rating_list->id; ?>)">★</span>
                                                <span class="star2" id="rating2-<?php echo $rating_list->id ?>" data-id="<?php echo $rating_list->id ?>" data-rating="2-<?php echo $rating_list->id ?>" onClick="on_rating_click(2, <?php echo $rating_list->id; ?>)">★</span>
                                                <span class="star2" id="rating3-<?php echo $rating_list->id ?>" data-id="<?php echo $rating_list->id ?>" data-rating="3-<?php echo $rating_list->id ?>" onClick="on_rating_click(3, <?php echo $rating_list->id; ?>)">★</span>
                                                <span class="star2" id="rating4-<?php echo $rating_list->id ?>" data-id="<?php echo $rating_list->id ?>" data-rating="4-<?php echo $rating_list->id ?>" onClick="on_rating_click(4, <?php echo $rating_list->id; ?>)">★</span>
                                                <span class="star2" id="rating5-<?php echo $rating_list->id ?>" data-id="<?php echo $rating_list->id ?>" data-rating="5-<?php echo $rating_list->id ?>" onClick="on_rating_click(5, <?php echo $rating_list->id; ?>)">★</span>
                                            </div>
                                            <input type="hidden" class="rating_input" id="rating_input_<?php echo $rating_list->id; ?>" data-text="<?php echo $rating_list->description ?>">
                                        </li>
                                    </div>
                                </div>
                            <?php } ?>
                            </ul>
                            <div id="pagination">
                                <button id="prev">Previous</button>
                                <button id="next">Next</button>
                            </div>
                            <div class="row">
                                <div class="col-md-6 offset-md-3 col-sm-12 text-center mt-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="font-weight-bold">
                                                <div hidden>
                                                    <label for="name">Sender Name :</label><br><input class="form-control" type="text" name="name" id="name" value="<?php echo $customer_details?$customer_details->name:''; ?>"><br>
                                                    <label for="sender">Email :</label><br><input class="form-control" type="email" name="sender" id="sender" value="<?php echo $customer_details?$customer_details->email_address:''; ?>"><br>
                                                </div>
                                                <label for="message">Message :</label><br><textarea class="form-control" name="message" id="message" rows="10"></textarea><br>
                                                <button class="btn btn-primary" id="submit">Send</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </main>
            
    

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

    <script>
        // Number of items to display per page
        const itemsPerPage = 2;
        let currentPage = 1;

        // Hide all items and show only items for the current page
        function showItems() {
            const items = $('#item-list li');
            items.hide();

            const startIndex = (currentPage - 1) * itemsPerPage;
            const endIndex = startIndex + itemsPerPage;

            items.slice(startIndex, endIndex).show();

            // Hide or show the "Next" button based on the current page
            if (currentPage >= Math.ceil(items.length / itemsPerPage)) {
                $('#next').hide();
            } else {
                $('#next').show();
            }
        }

        // Initialize with the first page
        showItems();

        // Handle next and previous buttons
        $('#next').click(function () {
            currentPage++;
            showItems();
        });

        $('#prev').click(function () {
            if (currentPage > 1) {
                currentPage--;
                showItems();
            }
        });
    </script>

    <script>
        function on_rating_click(rating, id) {
            $(".rating"+id+" .star2").removeClass('active');
            $("#rating"+rating+"-"+id).addClass('active');

            var selected_rate = $(".rating"+id+" .star2").data('rating');
            var selected_rate_id = $(".rating"+id+" .star2").data('id');

            $("#rating_input_"+id).val(rating);

            // alert(rating)
            // alert(selected_rate)
            // alert(selected_rate_id)

            for (x = 0; x <= rating; x++) {
                $("#rating"+x+"-"+id).addClass('active');
            }
        }
    </script>

    <script>
        $(document).ready(function() {
            // $(".rating"+selected_rate_id+" .star2").click(function(e) {
            //     var selected_rate = $(this).data('rating');
            //     var selected_rate_id = $(this).data('id');

            //     $(".rating"+selected_rate_id+" .star2").removeClass('active');
            //     for (x = 0; x <= selected_rate_id; x++) {
            //         $("#rating"+x+"-"+selected_rate_id).addClass('active');
            //     }
            // })
        })
    </script>

    <script>
        $(document).ready(function() {
            console.log("<?php echo $id ?>")
        })
    </script>

    <script type="text/javascript">
        $("#submit").click(() => {
            var message = $("#message").val();
            var sender = $("#sender").val();
            var name = $("#name").val();

            var rating_array = [];
            var rating_desc_array = [];
            $(".rating_input").each(function(key, value) {
                rating_array.push($(this).val());
                rating_desc_array.push($(this).data('text'));
            });

            var rating_combined = '';
            $.each(rating_array, function(key, value) {
                rating_combined += rating_desc_array[key]+value+' Star';
            })

            var combined_message = message+rating_combined;

            // Replace with your SendinBlue API key
            const API_KEY = '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';

            // SendinBlue API endpoint for sending transactional emails
            const API_ENDPOINT = 'https://api.sendinblue.com/v3/smtp/email';

            // Define your email data
            const emailData = {
                sender: { name: name, email: sender },
                to: [{ email: 'hello@octoprocoatings.com' }],
                subject: 'Rating',
                htmlContent: combined_message,
                textContent: combined_message,
            };

            console.log(emailData)

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

                    var id = "<?php echo $id ?>";

                    if (id) {
                        $.ajax({
                            url: 'page/update_customer_response_status',
                            method: 'POST',
                            data: {
                                id: id,
                            },
                            dataType: 'json',
                            success: function (response) {
                                if (response.redirect) {
                                    alert('Email sent successfully');
                                    window.location.href = response.redirect;
                                } else {
                                    alert('Something went wrong. Contact Admin');
                                }
                            }
                        })
                    } else {
                        window.location.href = 'page/thank_you';
                    }
                    
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
        })
    </script>

</body>
</html>