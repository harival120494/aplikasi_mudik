<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>
            Moda Transportasi
        </title>
        <meta name="description" content="Page Titile">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <!-- Call App Mode on ios devices -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no">
        <!-- base css -->
        <link rel="stylesheet" media="screen, print" href="<?php echo base_url('/asset/css/vendors.bundle.css');?>">
        <link rel="stylesheet" media="screen, print" href="<?php echo base_url('/asset/css/app.bundle.css');?>">
        <link rel="stylesheet" href="<?php echo base_url('/asset/Font-Awesome-5.15.2/css/all.css');?>">
        <link rel="stylesheet" href="<?php echo base_url('/asset/css/dataTables.bootstrap5.min.css');?>">
        <link rel="stylesheet" href="<?php echo base_url('/asset/css/sweetalert2.bundle.css');?>">
    </head>
    <body class="mod-bg-1 ">
        <div class="page-wrapper">
            <div class="page-inner">
                <?php $this->load->view('/template/side_nav'); ?>
                <div class="page-content-wrapper">
                    <!-- BEGIN Page Header -->
                    <?php $this->load->view('template/header'); ?>
                    <!-- END Page Header -->
                    <!-- BEGIN Page Content -->
                    <!-- the #js-page-content id is needed for some plugins to initialize -->
                    <main id="js-page-content" role="main" class="page-content">
                        <div class="row" style="margin-bottom:1rem;">
                            <div class="col-xl-12">
                                <div class="panel-tag">
                                    <h1 class="subheader-title">
                                        <i class="subheader-icon fa fa-car"></i>
                                        Moda Transportasi
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div id="panel-1" class="panel">
                                    <div class="panel-hdr">
                                        <h2>
                                            Input Data
                                        </h2>
                                        <div class="panel-toolbar">
                                            <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                                            <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                                            <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                                        </div>
                                    </div>
                                    <div class="panel-container show">
                                        <div class="panel-content">
                                            <input type="hidden" id="csrf" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                            <div class="row form-group">
                                                <label for="jenis_moda" class="col-xl-3 col-md-3 col-sm-12">
                                                    Pilih Moda Transportasi <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-xl-9 col-md-9 col-sm-12">
                                                    <select name="jenis_moda" id="jenis_moda" class="form-control">
                                                        <option value="">= Pilih Moda Transportasi =</option>
                                                        <option value="Bus">Bus</option>
                                                        <option value="Kapal">Kapal</option>
                                                        <option value="Pesawat">Pesawat</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label for="no_moda" class="col-xl-3 col-md-3 col-sm-12">
                                                    Nomor Moda 
                                                    <span class="text-danger">*</span>
                                                    <span style="text-align: center;color: #2196F3;padding-left: 8px;padding-right: 7px;padding-bottom: 1px;padding-top: 2px;border-radius: 50px;border: solid thin #2196F3;font-size: 11pt;" data-template="<div class=&quot;tooltip&quot; role=&quot;tooltip&quot;><div class=&quot;tooltip-inner bg-info-500&quot;></div></div>" data-toggle="tooltip" title="" data-original-title="Bisa berupa No Plat/ No Bus/ No Kapal/ No Penerbangan">
                                                    <i class="fa fa-info"></i></span>
                                                </label>
                                                <div class="col-xl-9 col-md-9 col-sm-12">
                                                    <input type="text" name="no_moda" id="no_moda" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-container show">
                                        <div class="panel-content panel-content py-2 rounded-bottom border-faded border-left-0 border-right-0 border-bottom-0 text-muted d-flex">
                                            <button class="btn btn-sm btn-danger waves-effect waves-themed fw-400 ml-auto mr-2" id="reset">
                                                <i class="fa fa-ban"></i>  Clear
                                            </button>
                                            <button class="btn btn-sm btn-success waves-effect waves-themed fw-400 px-1" id="simpan">
                                                <i class="fa fa-download"></i>  Simpan
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-12">
                                <div id="panel-1" class="panel">
                                    <div class="panel-hdr">
                                        <h2>
                                            Tabel List Moda Transportasi
                                        </h2>
                                        <div class="panel-toolbar">
                                            <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                                            <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                                            <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                                        </div>
                                    </div>
                                    <div class="panel-container show">
                                        <div class="panel-content">
                                            <table class="table m-0 table_moda">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Moda Transportasi</th>
                                                        <th>Nomor Moda</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                    <!-- this overlay is activated only when mobile menu is triggered -->
                    <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div> <!-- END Page Content -->
                    <!-- BEGIN Page Footer -->
                    <?php $this->load->view('/template/footer'); ?>
                    <!-- END Page Footer -->
                </div>
            </div>
        </div>
        <!-- END Page Wrapper -->
        <!-- modal alert -->
        <div class="modal modal-alert fade" id="modal-loading" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close_modal">
                            <span aria-hidden="true"><i class="fal fa-times"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h3 class="text-center">
                            Loading
                            <div class="spinner-grow spinner-grow-sm" role="status"><span class="sr-only">Loading...</span></div>
                        </h3>
                        <p class="text-center" id="txt_loading"></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Alert -->
        <!-- Modal Edit -->
        <div class="modal fade modal-edit" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Data Moda Transportasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close_modal">
                            <span aria-hidden="true"><i class="fa fa-times"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="edit_id_moda" id="edit_id_moda" class="form-control">
                        <div class="row form-group">
                            <label for="edit_jenis_moda" class="col-xl-5 col-md-5 col-sm-12">
                                Pilih Moda Transportasi <span class="text-danger">*</span>
                            </label>
                            <div class="col-xl-7 col-md-7 col-sm-12">
                                <select name="edit_jenis_moda" id="edit_jenis_moda" class="form-control">
                                    <option value="">= Pilih Moda Transportasi =</option>
                                    <option value="Bus">Bus</option>
                                    <option value="Kapal">Kapal</option>
                                    <option value="Pesawat">Pesawat</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="edit_no_moda" class="col-xl-5 col-md-5 col-sm-12">
                                Nomor Moda 
                                <span class="text-danger">*</span>
                                <span style="text-align: center;color: #2196F3;padding-left: 8px;padding-right: 7px;padding-bottom: 1px;padding-top: 2px;border-radius: 50px;border: solid thin #2196F3;font-size: 11pt;" data-template="<div class=&quot;tooltip&quot; role=&quot;tooltip&quot;><div class=&quot;tooltip-inner bg-info-500&quot;></div></div>" data-toggle="tooltip" title="" data-original-title="Bisa berupa No Plat/ No Bus/ No Kapal/ No Penerbangan">
                                <i class="fa fa-info"></i></span>
                            </label>
                            <div class="col-xl-7 col-md-7 col-sm-12">
                                <input type="text" name="edit_no_moda" id="edit_no_moda" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary waves-effect waves-themed" data-dismiss="modal"><i class="fa fa-ban"></i> Batal</button>
                        <button class="btn btn-sm btn-success waves-effect waves-themed fw-400 px-1" id="simpan_edit">
                            <i class="fa fa-download"></i>  Simpan
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Edit -->
        <script src="<?php echo base_url('/asset/js/vendors.bundle.js'); ?>"></script>
        <script src="<?php echo base_url('/asset/js/sweetalert2.bundle.js'); ?>"></script>
        <script src="<?php echo base_url('/asset/js/app.bundle.js'); ?>"></script>
        <script src="<?php echo base_url('/asset/js/datatables.bundle.js'); ?>"></script>
        <script>
            $(document).ready(function(){
                get_data_table();
                $('#simpan').on('click', function(){
                    let jenis_moda = $('#jenis_moda').val();
                    let no_moda = $('#no_moda').val();
                    let csrfName = $('#csrf').attr('name');
                    let csrfHash = $('#csrf').val();
                    // if(username == '') $('#txt_username').fadeIn('fast');
                    // else if(password == '') $('#txt_password').fadeIn('fast');
                    $.ajax({
                        type:'POST',
                        url : '<?php echo site_url('moda_transportasi/save_moda'); ?>',
                        data : {'jenis_moda' : jenis_moda, 'no_moda': no_moda, [csrfName] : csrfHash},
                        dataType:'JSON',
                        beforeSend:function(){
                            $('#modal-loading').modal('show');
                            $('#txt_loading').html('Sedang Menyimpan Data..');
                        },
                        success:function(response)
                        {
                            $('#modal-loading').on('shown.bs.modal', function(){
                                $(this).modal('hide');
                            })
                            $('#csrf').val(response.token);
                            if(response.status == 'failed') 
                            {
                                Swal.fire('Ooppss','Data moda gagal disimpan','error');
                            }                            
                        }
                    }).done(function(){
                        clear_form();
                        var table = $('.table_moda').dataTable({});
                        table.api().ajax.reload();
                    });
                    
                });

                $('#simpan_edit').on('click', function(){
                    let jenis_moda = $('#edit_jenis_moda').val();
                    let no_moda = $('#edit_no_moda').val();
                    let id_moda = $('#edit_id_moda').val();
                    let csrfName = $('#csrf').attr('name');
                    let csrfHash = $('#csrf').val();
                    // if(username == '') $('#txt_username').fadeIn('fast');
                    // else if(password == '') $('#txt_password').fadeIn('fast');
                    $.ajax({
                        type:'POST',
                        url : '<?php echo site_url('moda_transportasi/update_moda'); ?>',
                        data : {'id_moda' : id_moda,'jenis_moda' : jenis_moda, 'no_moda': no_moda, [csrfName] : csrfHash},
                        dataType:'JSON',
                        beforeSend:function(){
                            $('#modal-loading').modal('show');
                            $('#txt_loading').html('Sedang Menyimpan Data..');
                        },
                        success:function(response)
                        {
                            $('#modal-loading').on('shown.bs.modal', function(){
                                $(this).modal('hide');
                            });
                            $('#csrf').val(response.token);
                            if(response.status == 'failed') 
                            {
                                Swal.fire('Ooppss','Data moda gagal disimpan','error');
                            }                            
                        }
                    }).done(function(){
                            $('.modal-edit').on('shown.bs.modal-edit', function(){
                                $('.modal-edit').modal('hide');
                            });
                            var table = $('.table_moda').dataTable({});
                            table.api().ajax.reload();
                    });
                    
                });
            })

            function clear_form()
            {
                $('#jenis_moda').val('');
                $('#no_moda').val('');
            }

            function get_data_table()
            {
                $('.table_moda').dataTable({
                    responsive: true,
                    ajax:{
                        url:'<?php echo site_url('moda_transportasi/get_data_moda'); ?>',
                        dataSrc :'data'
                    },
                    columns:[
                        {data:"no"},
                        {data:"moda"},
                        {data:"nomorModa"},
                        {data:"aksi"}
                    ],
                    destroy:true,
                });
            }

            function edit(idModa, jenis, nomor)
            {
                $('#modal-edit').modal('show');
                $('#edit_jenis_moda').val(jenis);
                $('#edit_no_moda').val(nomor);        
                $('#edit_id_moda').val(idModa);         
            }

            function hapus(idModa)
            {
                let csrfName = $('#csrf').attr('name');
                let csrfHash = $('#csrf').val();
                Swal.fire(
                {
                    title: "Hapus Data !",
                    text: "Yakin ingni menghapus data ini ?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Ya, Hapus!",
                    cancelButtonText:"Tidak Jadi !"
                }).then(function(result)
                {
                    if (result.value)
                    {
                        $.ajax({
                            type:'POST',
                            url : '<?php echo site_url('moda_transportasi/hapus_moda'); ?>',
                            data : {"idModa":idModa, [csrfName] : csrfHash},
                            dataType:'JSON',
                            beforeSend:function(){
                                $('#modal-loading').modal('show');
                                $('#txt_loading').html('Sedang menghapus data..');
                            },
                            success:function(response)
                            {
                                $('.modal').on('shown.bs.modal', function(){
                                    $(this).modal('hide');
                                })
                                $('#csrf').val(response.token);
                                if(response.status == 'failed')Swal.fire('Gagal','Data moda gagal dihapus','error');      
                                else if(response.status == 'success')Swal.fire('Berhasil','Data moda berhasil dihapus','success');                      
                            },
                            complete:function(){
                                clear_form();
                                var table = $('.table_moda').dataTable({});
                                table.api().ajax.reload();
                            }
                        });
                    }
                });
            }
        </script>
    </body>
</html>
