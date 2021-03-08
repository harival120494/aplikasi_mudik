<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>
            Pengajuan Tiket Mudik
        </title>
        <meta name="description" content="Page Titile">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <!-- Call App Mode on ios devices -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no">
        <title>Login Aplikasi Mudik</title>
        <!-- base css -->
        <link rel="stylesheet" media="screen, print" href="<?php echo base_url('/asset/css/vendors.bundle.css');?>">
        <link rel="stylesheet" media="screen, print" href="<?php echo base_url('/asset/css/app.bundle.css');?>">
        <link rel="stylesheet" href="<?php echo base_url('/asset/Font-Awesome-5.15.2/css/all.css');?>">
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
                        <div class="subheader">
                            <h1 class="subheader-title">
                                Pengajuan Tiket
                            </h1>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div id="panel-1" class="panel">
                                    <div class="panel-hdr">
                                        <h2>
                                            Form Pengajuan Tiket Mudik
                                        </h2>
                                        <div class="panel-toolbar">
                                            <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                                            <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                                            <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                                        </div>
                                    </div>
                                    <div class="panel-container show">
                                        <div class="panel-content">
                                            <div class="row">
                                                <label for="jum" class="col-xs-2 col-md-2 col-sm-12">Jumlah Penumpang :</label> 
                                                <div class="col-xs-2 col-md-2 col-sm-12">
                                                    <input type="number" name="jum" id="jum" class="form-control">
                                                </div>
                                            </div>
                                            <input type="hidden" id="csrf" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                        </div>
                                        <div class="panel-content" id="form"></div>
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
        <script src="<?php echo base_url('/asset/js/vendors.bundle.js'); ?>"></script>
        <script src="<?php echo base_url('/asset/js/sweetalert2.bundle.js'); ?>"></script>
        <script src="<?php echo base_url('/asset/js/app.bundle.js'); ?>"></script>
        <script src="<?php echo base_url('/asset/Font-Awesome-5.15.2/js/brand.js'); ?>"></script>
        <script src="<?php echo base_url('/asset/Font-Awesome-5.15.2/js/solid.js'); ?>"></script>
        <script src="<?php echo base_url('/asset/Font-Awesome-5.15.2/js/fontawesome.min.js'); ?>"></script>
        <script>
            $(document).ready(function(){
                $('#jum').on('keyup', function(){
                    create_form($(this).val());
                    setTimeout(() => {
                        
                        for(let i=1; i<=$(this).val(); i++)
                        {
                            $.get('<?php echo site_url('tiket/get_data_rute/'); ?>', function(data){
                                let dataJSON = JSON.parse(data);
                                let html1 = '<option value="">= Pilih Rute =</option>';
                                $.each(dataJSON.data, function(key, val){
                                    html1 +=`<option value="${val.idrute}" data-kosong="${val.slotKosong}" data-booked="${val.slotBooked}" data-total="${val.totalSlot}" data-jadwal="${val.jadwal}">${val.ruteAsal} - ${val.ruteTujuan}</option>`;
                                });
                                $('#rute'+i).html(html1);
                            });
                            $('#rute'+i).on('change', function(){
                                let ket = `Slot : ${$('#rute'+i+' option:selected').data('total')}  &nbsp; &nbsp; Dibooking : ${$('#rute'+i+' option:selected').data('booked')} &nbsp; &nbsp; Kosong : ${$('#rute'+i+' option:selected').data('kosong')} &nbsp; &nbsp; Berangkat : ${$('#rute'+i+' option:selected').data('jadwal')}`;
                                $('#ket'+i).html(ket);
                            });
                           
                        }
                    }, 500);
                });

                $('#simpan').on('click', function(){
                    let nik = $('input[name="nik[]"]').map(function(){
                                    return this.value;
                                }).get();
                    let nm = $('input[name="nm[]"]').map(function(){
                                    return this.value;
                                }).get();
                    let umur = $('input[name="umur[]"]').map(function(){
                                    return this.value;
                                }).get();
                    let hp = $('input[name="hp[]"]').map(function(){
                                    return this.value;
                                }).get();
                    let alamat = $('input[name="alamat[]"]').map(function(){
                                    return this.value;
                                }).get();
                    let rute = $('select[name="rute[]"]').map(function(){
                                    return this.value;
                                }).get();
                    let csrfName = $('#csrf').attr('name');
                    let csrfHash = $('#csrf').val();

                    $.ajax({
                        type:'POST',
                        url : '<?php echo site_url('tiket/save_pengajuan'); ?>',
                        data : {'rute[]':rute, 'nik[]':nik, 'nm[]':nm, 'umur[]':umur,'hp[]':hp, 'alamat[]':alamat, [csrfName] : csrfHash},
                        dataType:'JSON',
                        beforeSend:function(){
                            
                        },
                        success:function(response)
                        {
                            $('#csrf').val(response.token);
                            if(response.status == 'failed') 
                            {
                                swal("Gagal Login", "Username dan Password tidak ditemukan", "error");
                                $('#login').html('Masuk');
                            }
                            if(response.status == 'success') 
                            {
                                Swal.fire(
                                {
                                    title: "Berhasil",
                                    text: "Tiket anda berhasil di ajukan, cek halaman dashboard",
                                    type: "success",
                                    confirmButtonText: "Oke !",
                                }).then(function(result)
                                {
                                    if (result.value)
                                    {
                                        window.location = '<?php echo site_url('dashboard'); ?>';
                                    }
                                });
                            }
                            
                        }
                    });
                })
                
            })

            function create_form($jum)
            {
                let html ='';
                for(let i=1; i<=$jum; i++)
                {
                    html += `<div class="row form-group">
                                <div class="col-xl-12 col-md-12 col-sm-12">
                                    <div class="panel-tag">
                                        <h4><strong>Penumpang #${i}</strong></h4>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-xl-6 col-md-6 col-sm-12">
                                            <select name="rute[]" class="form-control" id=rute${i}></select>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-sm-12">
                                            <span id="ket${i}"></span>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-xl-6 col-md-6 col-sm-12">
                                            <input type="text" name="nik[]" class="form-control" placeholder="No.KTP">
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-sm-12">
                                            <input type="text" name="nm[]"  class="form-control" placeholder="Nama Lengkap">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-xl-6 col-md-6 col-sm-12">
                                            <input type="number" name="umur[]" class="form-control" placeholder="Umur">
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-sm-12">
                                            <input type="text" name="alamat[]" class="form-control" placeholder="Alamat">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-xl-6 col-md-6 col-sm-12">
                                            <input type="text" name="hp[]" class="form-control" placeholder="No. HP">
                                        </div>
                                    </div>
                                </div>
                        </div>`;
                }
                $('#form').html(html);
            }
        </script>
    </body>
</html>
