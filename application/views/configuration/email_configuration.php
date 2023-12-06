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
                <section id="about" class="about">
                    <div class="container">
                        <div class="row font-weight-bold">
                            <div class="col-md-12 text-right"><button class="btn btn-primary" data-target="#add_email_template" data-toggle="modal">Add New</button></div>
                            <div class="card col-md-12 col-sm-12 mt-5">
                                <div class="card-header text-center" id="headingOne">
                                    <h2 class="mb-0">
                                        Email Template Configuration
                                    </h2>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-hover text-wrap key-buttons">
                                            <thead>
                                                <tr>
                                                    <th class="w-5">ID</th>
                                                    <th class="w-75">Message</th>
                                                    <th class="w-10">Steps</th>
                                                    <th class="w-10">Options</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($email_templates as $email_template) { ?>
                                                    <tr>
                                                        <td><?php echo $email_template->id ?></td>
                                                        <td class="text-wrap"><?php echo $email_template->message ?></td>
                                                        <td><?php echo $email_template->steps ?></td>
                                                        <td>
                                                            <button class="btn btn-info" data-target="#edit_email_template" data-toggle="modal" onclick="edit_template(<?php echo $email_template->id; ?>);">Edit</button>
                                                            <!-- <a href="configuration/delete_email_process?id=<?php //echo $email_template->id; ?>" class="btn btn-danger">Delete</a> -->
                                                            <button class="btn btn-danger delete_email" id="delete_email" onclick="delete_email(<?php echo $email_template->id; ?>)">Delete</button>
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

                    <div class="modal fade" id="add_email_template" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Email Template</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="configuration/add_email_template" method="post">
                                <div class="modal-body">
                                    <input type="hidden" name="id" id="id">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label">Message</label>
                                                <textarea class="ckeditor form-control" id="editor" name="message" value="" rows="10" required>
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label">Steps</label>
                                                <textarea class="ckeditor form-control" id="editor" name="message" value="" rows="10" required>
                                                </textarea>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="edit_email_template" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Email Template</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="configuration/update_email_template" method="post">
                                <div class="modal-body">
                                    <input type="hidden" name="id" id="id">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <textarea class="ckeditor form-control" id="editor" name="message" value="" rows="10" required>
                                            </textarea>
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
    
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script> -->

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
        function delete_email(id) {
            swal({
                title: "Delete!",
                text: "Delete Email Template",
                buttons: ["Cancel", "OK"],
                customClass: {
                    confirmButton: 'centered-button-class',
                }
            }).then((value) => {
                if (value) {
                    swal({
                        title: "Big Thanks for Choosing OctoPro Coating!",
                        text: "Email Template is Deleted with an id of "+id,
                        buttons: "Ok",
                        customClass: {
                            confirmButton: 'centered-button-class',
                        }
                    }).then((value) => {
                        window.location.href = "configuration/delete_email_process?id="+id;
                    })
                }
            });
        }
    </script>

    <script>
        function edit_template(id) {
            // CKEDITOR.replace('message', {
            //     toolbar: [
            //         { name: 'document', groups: ['mode', 'document', 'doctools'], items: ['Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates'] },
            //         { name: 'clipboard', groups: ['clipboard', 'undo'], items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo'] },
            //         // Add more toolbar items and groups as needed
            //     ],
            //     // Other configuration options go here
            // });

            $.ajax({
                url: 'configuration/get_email_configuration_by_id?id='+id,
                method: "GET",
                data: '',
                dataType: 'json',
                success: function(response) {
                    CKEDITOR.instances['editor'].setData(response.message);
                    $("#id").val(response.id);
                    $("#exampleModalLabel").text('Edit Email Template of ID: '+response.id)
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