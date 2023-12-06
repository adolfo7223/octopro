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

                .dt-buttons button {
                    border: 0px;
                }

                table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>td:first-child:before, table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>th:first-child:before {
                    color: #000 !important;
                    border: #000 !important;
                }
            </style>
            
            <main id="main">
                <section id="about" class="about text-center">
                    <div class="container">
                        <div class="row font-weight-bold pl-3 pr-3">
                            <div class="card col-md-12 col-sm-12 text-center mt-5">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        Referrals
                                    </h2>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
										<table id="example" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Email</th>
                                                    <th>Name</th>
                                                    <th>Phone</th>
                                                    <th>Referred By</th>
                                                    <th>Referral Code</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($refers as $refer) { ?>
                                                    <tr>
                                                        <td><?php echo $refer->id ?></td>
                                                        <td><?php echo $refer->email_address ?></td>
                                                        <td><?php echo $refer->name ?></td>
                                                        <td><?php echo $refer->phone ?></td>
                                                        <th><?php echo $refer->referred_by_name?$refer->referred_by_name.'( '.$refer->referred_by_email_address.' )':'' ?></th>
                                                        <td><?php echo $refer->referral_code ?></td>
                                                        <td>
                                                            <!-- <a href="configuration/delete_referred_customer?id=<?php echo $refer->id; ?>" class="btn btn-danger">Delete</a> -->
                                                            <button class="btn btn-danger delete_referred" id="delete_referred" onclick="delete_referred(<?php echo $refer->id; ?>)">Delete</button>
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
        function delete_referred(id) {
            swal({
                title: "Delete!",
                text: "Delete Record.",
                buttons: ["Cancel", "OK"],
                customClass: {
                    confirmButton: 'centered-button-class',
                }
            }).then((value) => {
                if (value) {
                    swal({
                        title: "Deleted!",
                        text: "Record is Deleted with an id of "+id,
                        buttons: "Ok",
                        customClass: {
                            confirmButton: 'centered-button-class',
                        }
                    }).then((value) => {
                        window.location.href = "configuration/delete_referred_customer?id="+id;
                    })
                }
            });
        }
    </script>
    
</body>
</html>