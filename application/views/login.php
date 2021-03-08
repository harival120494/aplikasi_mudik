<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
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
</head>
<body>
<div class="page-wrapper">
    <div class="page-inner bg-brand-gradient">
        <div class="page-content-wrapper bg-transparent m-0">
            <div class="height-10 w-100 shadow-lg px-4 bg-brand-gradient">
                <div class="d-flex align-items-center container p-0">
                    <div class="page-logo width-mobile-auto m-0 align-items-center justify-content-center p-0 bg-transparent bg-img-none shadow-0 height-9">
                        <a href="javascript:void(0)" class="page-logo-link press-scale-down d-flex align-items-center">
                            <span class="page-logo-text mr-1">Mudik <strong>Gratis</strong></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="flex-1" style="background: url(img/svg/pattern-1.svg) no-repeat center bottom fixed; background-size: cover;">
                <div class="container py-4 py-lg-5 my-lg-5 px-4 px-sm-0">
                    <div class="row">
                        <div class="col col-md-6 col-lg-7 hidden-sm-down">
                            <h2 class="fs-xxl fw-500 mt-4 text-white">
                                Ayo Mudik Gratis
                                <small class="h3 fw-300 mt-3 mb-5 text-white opacity-60">
                                    Akun demo admin, Username : admin, Password:123456
                                </small>
                            </h2>
                            
                            <div class="d-sm-flex flex-column align-items-center justify-content-center d-md-block">
                                <div class="px-0 py-1 mt-5 text-white fs-nano opacity-50">
                                    Find us on social media
                                </div>
                                <div class="d-flex flex-row opacity-70">
                                    <a href="#" class="mr-2 fs-xxl text-white">
                                        <i class="fab fa-facebook-square"></i>
                                    </a>
                                    <a href="#" class="mr-2 fs-xxl text-white">
                                        <i class="fab fa-twitter-square"></i>
                                    </a>
                                    <a href="#" class="mr-2 fs-xxl text-white">
                                        <i class="fab fa-google-plus-square"></i>
                                    </a>
                                    <a href="#" class="mr-2 fs-xxl text-white">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-5 col-xl-4 ml-auto">
                            <h1 class="text-white fw-300 mb-3 d-sm-block d-md-none">
                                Secure login
                            </h1>
                            <div class="card p-4 rounded-plus bg-faded">
                                <form>
                                    <input type="hidden" id="csrf" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                    <div class="form-group">
                                        <label class="form-label" for="username">Username</label>
                                        <input type="text" id="username" class="form-control form-control-lg" placeholder="admin"  required>
                                        <div class="invalid-feedback" id="txt_username">Username tidak boleh kosong</div>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="password">Password</label>
                                        <input type="password" id="password" class="form-control form-control-lg" placeholder="admin" required>
                                        <div class="invalid-feedback" id="txt_password">Password tidak boleh kosong</div>
                                    </div>
                                    <div class="form-group text-left">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="rememberme">
                                            <label class="custom-control-label" for="rememberme"> Remember me</label>
                                        </div>
                                    </div>
                                    <div class="row no-gutters">
                                        <div class="col-lg-6 pr-lg-1 my-2">
                                            <button type="button" class="btn btn-info btn-block btn-lg" id="login">Masuk</button>
                                        </div>
                                        <div class="col-lg-6 pl-lg-1 my-2">
                                            <button id="register" type="button" class="btn btn-danger btn-block btn-lg">Daftar</button>
                                        </div>
                                    </div>
                                    <div class="row no-gutters">
                                        <div class="col-lg-12 pl-lg-1 my-2">
                                        <button type="button" class="btn btn-primary btn-lg btn-block waves-effect waves-themed btn-cari">
                                                                        <span><i class="fa fa-search"></i> Cari</span>
                                                                    </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="position-absolute pos-bottom pos-left pos-right p-3 text-center text-white">
                        2021 © Harival Tivani
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Register -->
    <div class="modal fade modal-registrasi" id="modal-registrasi" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Registrasi Akun
                        <small class="m-0 text-muted"><i>Note : Semua form harus diisi</i></small>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close_modal">
                        <span aria-hidden="true"><i class="fa fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col-xl-6 col-md-6 col-sm-12">
                            <input type="text" name="nik" id="nik" class="form-control" placeholder="No.KTP">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-xl-12 col-md-12 col-sm-12">
                            <input type="text" name="username1" id="username1" class="form-control" placeholder="Username/ E-mail">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-xl-12 col-md-12 col-sm-12">
                            <input type="password" name="password1" id="password1" class="form-control" placeholder="Password">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-xl-6 col-md-6 col-sm-12">
                            <input type="text" name="nmdp" id="nmdp" class="form-control" placeholder="Nama Depan">
                        </div>
                        <div class="col-xl-6 col-md-6 col-sm-12">
                            <input type="text" name="nmbl" id="nmbl" class="form-control" placeholder="Nama Belakang">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-xl-6 col-md-6 col-sm-12">
                            <input type="text" name="tmpt" id="tmpt" class="form-control" placeholder="Tempat Lahir">
                        </div>
                        <div class="col-xl-6 col-md-6 col-sm-12">
                            <input type="date" name="tglLahir" id="tglLahir" class="form-control" placeholder="Tanggal Lahir">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-xl-6 col-md-6 col-sm-12">
                            <input type="text" name="hp" id="hp" class="form-control" placeholder="No. HP">
                        </div>
                        <div class="col-xl-6 col-md-6 col-sm-12">
                            <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary waves-effect waves-themed" data-dismiss="modal" onclick="clear_registrasi()"><i class="fa fa-ban"></i> Batal</button>
                    <button class="btn btn-sm btn-success waves-effect waves-themed fw-400 px-1" id="save_reg">
                        <i class="fa fa-download"></i>  Simpan
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Register -->

    <!-- Modal Cari -->
    <div class="modal fade modal-cari" id="modal-cari" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Cari
                        <small class="m-0 text-muted"><i>Masukan kode booking di bawah ini</i></small>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close_modal">
                        <span aria-hidden="true"><i class="fa fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col-xl-12 col-md-12 col-sm-12">
                            <input type="text" name="kode_booking" id="kode_booking" class="form-control" placeholder="Kode Booking">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-xl-12 col-md-12 col-sm-12" id="hasil_cari">
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary waves-effect waves-themed" data-dismiss="modal"></i> Batal</button>
                    <button class="btn btn-sm btn-success waves-effect waves-themed fw-400 px-1" id="btn_cari_h">
                        <i class="fa fa-search"></i>  Cari
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cari -->
</div>
<script src="<?php echo base_url('/asset/js/vendors.bundle.js'); ?>"></script>
<script src="<?php echo base_url('/asset/js/app.bundle.js'); ?>"></script>
<script src="<?php echo base_url('/asset/js/sweetalert.min.js'); ?>"></script>

<script>
    $(document).ready(function(){
        $('#login').on('click', function(){
            let username = $('#username').val();
            let password = $('#password').val();
            let csrfName = $('#csrf').attr('name');
            let csrfHash = $('#csrf').val();
            if(username == '') $('#txt_username').fadeIn('fast');
            else if(password == '') $('#txt_password').fadeIn('fast');
            else{
                $.ajax({
                    type:'POST',
                    url : '<?php echo site_url('Login/process_login'); ?>',
                    data : {'username' : $('#username').val(), 'password': $('#password').val(), [csrfName] : csrfHash},
                    dataType:'JSON',
                    beforeSend:function(){
                        $('#txt_username').fadeOut('fast');
                        $('#txt_password').fadeOut('fast');
                        $('#login').html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> Loading..');
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
                            window.location = '<?php echo site_url('dashboard'); ?>';
                        }
                        
                    }
                });
            }
        });

        
        $('#register').on('click', function(){
            $('#modal-registrasi').modal('show');
        })

        $('#save_reg').on('click', function(){
            let nik = $('#nik').val();
            let username = $('#username1').val();
            let password = $('#password1').val();
            let nmdp = $('#nmdp').val();
            let nmbl = $('#nmbl').val();
            let tmpt = $('#tmpt').val();
            let tgl = $('#tglLahir').val();
            let hp = $('#hp').val();
            let alamat = $('#alamat').val();
            
            let csrfName = $('#csrf').attr('name');
            let csrfHash = $('#csrf').val();

            $.ajax({
                type:'POST',
                url : '<?php echo site_url('Login/save_registrasi'); ?>',
                data : {nik:nik, username:username, password:password, nmdp:nmdp, nmbl:nmbl, tmpt:tmpt, tgl:tgl, hp:hp, alamat:alamat, [csrfName] : csrfHash},
                dataType:'JSON',
                beforeSend:function(){
                    
                },
                success:function(response)
                {
                    $('#csrf').val(response.token);
                    if(response.status == 'failed') 
                    {
                        swal("Gagal !", "Terjadi kesalahan registrasi tertunda", "error");
                    }
                    else if(response.status == 'exist') 
                    {
                        swal("Gagal !", "Username sudah ada, silakan login", "warning");
                    }
                    else if(response.status == 'success') 
                    {
                        swal("Berhasil !", "Registrasi berhasil, silakan login", "success");
                        clear_registrasi();
                    }
                    
                }
            });
        });

        $('.btn-cari').on('click', function(){
            $('.modal-cari').modal('show');
        });

        $('#btn_cari_h').on('click', function(){
            let kd = $('#kode_booking').val();
            $.ajax({
                type:'GET',
                url:'<?php echo site_url('Login/cari/'); ?>' + kd,
                beforeSend:function()
                {
                    let html = `<div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>`;
                    $('#hasil_cari').html(html);
                },
                success:function(response)
                {
                    let res = JSON.parse(response);
                    let html='';
                    $.each(res.data, function(key, val){
                        let status='', btn='';
                        if(val.sttKonf==0)
                        {
                            status = "Progress tiket anda masih dalam tahap pengajuan";
                        }
                        else if(val.sttKonf==1)
                        {
                            status = "Pengajuan anda telah di terima, Silakan login untuk mencetak tiket anda.";
                        }
                        else if(val.sttKonf==-1)
                        {
                            status = "Pengajuan anda di tolak";
                        }
                        html +=`<div class="row">
                                    <div class="col-xl-2 col-md-2 col-sm-12"></div>
                                    <div class="col-xl-10 col-md-10 col-sm-12">
                                        <div class="chat-segment chat-segment-get">
                                            <div class="chat-message">
                                                <p>
                                                    ${status}
                                                </p>
                                            </div>
                                            <div class="fw-300 text-muted mt-1 fs-xs">
                                                ${val.tglBooking == "0000-00-00 00:00:00" ? val.tglKonf : val.tglBooking}
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                    });
                    
                    $('#hasil_cari').html(html);
                }
            })
        });
    })

    function clear_registrasi()
    {
        $('#nik').val('');
        $('#username1').val('');
        $('#password1').val('');
        $('#nmdp').val('');
        $('#nmbl').val('');
        $('#tmpt').val('');
        $('#tglLahir').val('');
        $('#hp').val('');
        $('#alamat').val('');
    }
</script>
</body>
</html>