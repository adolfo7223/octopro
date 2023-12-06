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
                        <div class="row font-weight-bold pl-3 pr-3">
                        <div class="col-md-12 text-right"><button class="btn btn-primary" data-target="#add_rewward" data-toggle="modal">Add New</button></div>
                            <div class="card col-md-12 col-sm-12 mt-5">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0 text-center">
                                        Clients Reward List
                                    </h2>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
										<table id="example" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Client Name</th>
                                                    <th>Reward Name</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($client_rewards as $reward) { ?>
                                                    <tr>
                                                        <td><?php echo $reward->id ?></td>
                                                        <td><?php echo $reward->client_name ?></td>
                                                        <td><?php echo $reward->name ?></td>
                                                        <td><?php echo $reward->status ?></td>
                                                        <td>
                                                        <button class="btn btn-info" data-target="#edit_client_reward" data-toggle="modal" onclick="edit_reward(<?php echo $reward->id; ?>);">Edit</button>
                                                            <a href="reward/delete?id=<?php echo $reward->id; ?>" onclick="return confirm('Are you sure you want to delete this item?')" class="btn btn-danger">Delete</a>
                                                            <!-- <button class="btn btn-danger delete_referred" id="delete_referred" onclick="delete_referred(<?php echo $reward->id; ?>)">Delete</button> -->
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

                    <div class="modal fade" id="add_rewward" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Reward</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="reward/add_new" method="post">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label">Name</label>
                                                <input type="text" class="form-control" name="name">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label" for="client">Client</label>
                                                <select name="client" id="client" class="select2-show-search form-control">

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label">Code</label>
                                                <input type="text" class="form-control" name="code">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label" for="status">Status</label>
                                                <select name="status" id="status" class="select2-show-search form-control">
                                                    <option value="pending">Pending</option>
                                                    <option value="hold">Hold</option>
                                                    <option value="sent">Sent</option>
                                                </select>
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

                    <div class="modal fade" id="edit_client_reward" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Client Reward</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="reward/add_new" method="post">
                                <div class="modal-body">
                                    <input type="hidden" name="id" id="id">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label">Name</label>
                                                <input type="text" class="form-control" name="name">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label" for="client">Client</label>
                                                <select name="client" id="client" class="select2-show-search form-control">

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label">Code</label>
                                                <input type="text" class="form-control" name="code">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label" for="status">Status</label>
                                                <select name="status" id="status" class="select2-show-search form-control">
                                                    <option value="pending">Pending</option>
                                                    <option value="hold">Hold</option>
                                                    <option value="sent">Sent</option>
                                                </select>
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

    <!-- Select2 js -->
    <script src="<?php echo base_url('public/plugin/select2/select2.full.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/select2.js'); ?>"></script>

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
        function edit_reward(id) {
            $.ajax({
                url: 'reward/get_reward_details_by_id?id='+id,
                method: "GET",
                data: '',
                dataType: 'json',
                success: function(response) {
                    $("#id").val(response.id);
                    $("#edit_client_reward").find("[name='name']").val(response.name);
                    $("#edit_client_reward").find("[name='code']").val(response.code);

                    $("#edit_client_reward").find("[name='client']").select2({
                        placeholder: 'Select Patient',
                        multiple: false,
                        allowClear: true,
                        minimumResultsForSearch: -1,
                        ajax: {
                            url: 'page/get_client_details',
                            type: 'post',
                            dataType: 'json',
                            delay: 250,
                            data: function (params) {
                                return {
                                    searchTerm: params.term
                                };
                            },
                            processResults: function (response) {
                                return {
                                    results: response
                                };
                            },
                            cache: true
                        }
                    })

                    $("#edit_client_reward").find("[name='client']").append($('<option selected>').text(response.client_name).val(response.client_id)).end();
                    $("#edit_client_reward").find("[name='status']").val(response.status).trigger('change');
                }
            })
        }
    </script>

    <script>
        $(document).ready(function() {
            $("#client").select2({
                placeholder: 'Select Patient',
                multiple: false,
                allowClear: true,
                minimumResultsForSearch: -1,
                ajax: {
                    url: 'page/get_client_details',
                    type: 'post',
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            searchTerm: params.term
                        };
                    },
                    processResults: function (response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                }
            })
        })
    </script>
    
</body>
</html>