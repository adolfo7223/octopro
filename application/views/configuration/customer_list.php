<style>
                .card {
                    background-color: #009CAD;
                    color: #0a0a0a;
                    border-style: solid;
                    border-color: #00425F;
                    border-width: 0px 0px 9px 0px;
                    border-radius: 20px 20px 20px 20px;
                }

                .card:hover {
                    color: #0a0a0a;
                }
            </style>
            
            <main id="main">
                <section id="about" class="about text-center">
                    <div class="container">
                        <div class="row font-weight-bold">
                            <div class="card col-md-12 col-sm-12 text-center mt-5">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        List of Clients
                                    </h2>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
										<table id="example" class="table table-bordered text-nowrap key-buttons">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Email</th>
                                                    <th>Name</th>
                                                    <th>Options</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($customer_lists as $customer_list) { ?>
                                                    <tr>
                                                        <td><?php echo $customer_list->id ?></td>
                                                        <td><?php echo $customer_list->email_address ?></td>
                                                        <td><?php echo $customer_list->name ?></td>
                                                        <td>
                                                            <button class="btn btn-info" data-target="#edit_customer_list" data-toggle="modal" data-id="<?php echo $customer_list->id; ?>" onclick="edit_customer(<?php echo $customer_list->id; ?>)">Edit</button>
                                                            <!-- <a href="configuration/delete_customer?id=<?php echo $customer_list->id; ?>" class="btn btn-danger">Delete</a> -->
                                                            <button class="btn btn-danger delete_customer" id="delete_email" onclick="delete_customer(<?php echo $customer_list->id; ?>)">Delete</button>
                                                            <a class="pull-bs-canvas-right order-xl-last btn btn-warning" data-id="<?php echo $customer_list->id; ?>">Requests</a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bs-canvas bs-canvas-left position-fixed bg-light h-100">
                        <header class="bs-canvas-header p-3 bg-success">
                            <h4 class="d-inline-block text-light mb-0">Canvas Header</h4>
                            <button type="button" class="bs-canvas-close close" aria-label="Close"><span aria-hidden="true" class="text-light">&times;</span></button>
                        </header>
                        <div class="bs-canvas-content px-3 py-5">
                            <div class="card mb-5">
                                <div class="card-header">
                                    Featured
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <a href="#" class="btn btn-danger">Go somewhere</a>
                                </div>
                            </div>
                            <form>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Email address</label>
                                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Example select</label>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect2">Example multiple select</label>
                                    <select multiple class="form-control" id="exampleFormControlSelect2">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Example textarea</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="formControlRange">Example Range input</label>
                                    <input type="range" class="form-control-range" id="formControlRange">
                                </div>
                                <p class="text-center mb-0"><button type="submit" class="btn btn-primary">Submit</button></p>
                            </form>        
                        </div>    
                    </div>

                    <div class="modal fade" id="edit_customer_list" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Email Template</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="page/add_customer_email" method="post">
                                <div class="modal-body">
                                    <input type="hidden" name="id" id="id">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="" class="form-label">Name</label>
                                                <input type="text" class="form-control" name="name" id="edit_name">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="" class="form-label">Email</label>
                                                <input type="email" class="form-control" name="email" id="edit_email">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>

                    <div class="bs-canvas bs-canvas-right position-fixed bg-light h-100">
                        <header class="bs-canvas-header p-3 bg-cyan overflow-auto">
                            <button type="button" class="bs-canvas-close float-left close" aria-label="Close"><span aria-hidden="true" class="text-light">&times;</span></button>
                            <h4 class="d-inline-block text-light mb-0 float-center">Client Details</h4>
                        </header>
                        <div class="bs-canvas-content px-3 py-5">
                            <div class="d-flex flex-row">
                                <span class="font-weight-bold">ID: </span>
                                <span class="font-weight-lighter" id="client_id"></span>
                            </div>
                            <div class="d-flex flex-row">
                                <span class="font-weight-bold">Name: </span>
                                <span class="font-weight-lighter" id="client_name"></span>
                            </div>
                            <div class="d-flex flex-row">
                                <span class="font-weight-bold">Email: </span>
                                <span class="font-weight-lighter" id="client_email"></span>
                            </div>
                            <div class="d-flex flex-row">
                                <span class="font-weight-bold">Number: </span>
                                <span class="font-weight-lighter" id="client_number"></span>
                            </div>

                            <div class="d-flex flex-row mt-2">
                                <span class="font-weight-bold">Review Status: </span>
                                <span class="font-weight-lighter" id="client_rating"></span>
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
    
    <script src="https://cdn.ckeditor.com/4.23.0-lts/standard/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
    
    <!-- Data tables -->
    <script src="<?php echo base_url('public/plugin/datatable/js/jquery.dataTables.js'); ?>"></script>
    <script src="<?php echo base_url('public/plugin/datatable/js/dataTables.bootstrap4.js'); ?>"></script>
    <script src="<?php echo base_url('public/plugin/datatable/js/dataTables.buttons.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/plugin/datatable/js/buttons.bootstrap4.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/plugin/datatable/js/jszip.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/plugin/datatable/js/pdfmake.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/plugin/datatable/js/vfs_fonts.js'); ?>"></script>
    <script src="<?php echo base_url('public/plugin/datatable/js/buttons.html5.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/plugin/datatable/js/buttons.print.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/plugin/datatable/js/buttons.colVis.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/plugin/datatable/dataTables.responsive.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/plugin/datatable/responsive.bootstrap4.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/datatables.js'); ?>"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        $(document).ready(function(){
            $(document).on('click', '.pull-bs-canvas-right, .pull-bs-canvas-left', function(){
                var id = $(this).data('id');
                $('body').prepend('<div class="bs-canvas-overlay bg-dark position-fixed w-100 h-100"></div>');
                if($(this).hasClass('pull-bs-canvas-right')) {
                    $('.bs-canvas-right').addClass('mr-0');

                    $.ajax({
                        url: 'configuration/get_customer_details?id='+id,
                        method: 'GET',
                        data: '',
                        dataType: 'json',
                        success: function (response) {
                            $("#client_id").text(response.id);
                            $("#client_name").text(response.name);
                            $("#client_email").text(response.email_address);
                            $("#client_number").text(response.phone);

                            if (response.response_status == '1') {
                                $("#client_rating").text('Reviewed');
                            } else {
                                $("#client_rating").text('Not yet reviewed');
                            }
                        }
                    })

                } else {
                    $('.bs-canvas-left').addClass('ml-0');
                }
                return false;
            });
            
            $(document).on('click', '.bs-canvas-close, .bs-canvas-overlay', function(){
                var elm = $(this).hasClass('bs-canvas-close') ? $(this).closest('.bs-canvas') : $('.bs-canvas');
                elm.removeClass('mr-0 ml-0');
                $('.bs-canvas-overlay').remove();
                return false;
            });
        });
    </script>

    <script>
        function delete_customer(id) {
            swal({
                title: "Delete!",
                text: "Delete Customer.",
                buttons: ["Cancel", "OK"],
                customClass: {
                    confirmButton: 'centered-button-class',
                }
            }).then((value) => {
                if (value) {
                    swal({
                        title: "Deleted!",
                        text: "Customer is Deleted with an id of "+id,
                        buttons: "Ok",
                        customClass: {
                            confirmButton: 'centered-button-class',
                        }
                    }).then((value) => {
                        window.location.href = "configuration/delete_customer?id="+id;
                    })
                }
            });
        }
    </script>

    <script>
        function edit_customer(id) {
            $.ajax({
                url: 'configuration/get_customer_details?id='+id,
                method: "GET",
                data: '',
                dataType: 'json',
                success: function(response) {
                    $("#id").val(response.id);
                    $("#edit_name").val(response.name);
                    $("#edit_email").val(response.email_address);
                }
            })
        }
    </script>

    <script>
        function update_email_template(id) {
            var data = $("#email_template"+id).serialize();
            console.log($("#editor_"+id).text())

            $.ajax({
                url: 'configuration/update_email_template',
                method: "POST",
                data: data,
                dataType: 'json',
                success: function(response) {
                    alert(response)
                }
            })
        }
    </script>

    <script>
        $(".editor").attr('hidden', true);
        document.querySelectorAll('.editor').forEach((element) => {
            ClassicEditor
                .create(element)
                .catch(error => {
                    console.error(error);
                });
                $(".editor").attr('hidden', false);
        });
    </script>

    
</body>
</html>