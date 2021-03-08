<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>
            Cetak Tiket
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
        <style>
            @import url('https://fonts.googleapis.com/css?family=Oswald');
                *
                {
                margin: 0;
                padding: 0;
                border: 0;
                box-sizing: border-box
                }

                body
                {
                background-color: #dadde6;
                font-family: arial
                }

                .fl-left{float: left}

                .fl-right{float: right}

                .container
                {
                width: 90%;
                margin: 100px auto
                }

                h1
                {
                text-transform: uppercase;
                font-weight: 900;
                border-left: 10px solid #fec500;
                padding-left: 10px;
                margin-bottom: 30px
                }

                .row{overflow: hidden}

                .card
                {
                display: table-row;
                width: 49%;
                background-color: #fff;
                color: #989898;
                margin-bottom: 10px;
                font-family: 'Oswald', sans-serif;
                text-transform: uppercase;
                border-radius: 4px;
                position: relative
                }

                .card + .card{margin-left: 2%}

                .date
                {
                display: table-cell;
                width: 25%;
                position: relative;
                text-align: center;
                border-right: 2px dashed #dadde6
                }

                .date:before,
                .date:after
                {
                content: "";
                display: block;
                width: 30px;
                height: 30px;
                background-color: #DADDE6;
                position: absolute;
                top: -15px ;
                right: -15px;
                z-index: 1;
                border-radius: 50%
                }

                .date:after
                {
                top: auto;
                bottom: -15px
                }

                .date time
                {
                display: block;
                position: absolute;
                top: 50%;
                left: 50%;
                -webkit-transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%)
                }

                .date time span{display: block}

                .date time span:first-child
                {
                color: #2b2b2b;
                font-weight: 600;
                font-size: 250%
                }

                .date time span:last-child
                {
                text-transform: uppercase;
                font-weight: 600;
                margin-top: -10px
                }

                .card-cont
                {
                display: table-cell;
                width: 75%;
                font-size: 85%;
                padding: 10px 10px 30px 50px
                }

                .card-cont h3
                {
                color: #3C3C3C;
                font-size: 130%
                }

                .row:last-child .card:last-of-type .card-cont h3
                {
                text-decoration: line-through
                }

                .card-cont > div
                {
                display: table-row
                }

                .card-cont .even-date i,
                .card-cont .even-info i,
                .card-cont .even-date time,
                .card-cont .even-info p
                {
                display: table-cell
                }

                .card-cont .even-date i,
                .card-cont .even-info i
                {
                padding: 5% 5% 0 0
                }

                .card-cont .even-info p
                {
                padding: 30px 50px 0 0
                }

                .card-cont .even-date time span
                {
                display: block
                }

                .card-cont a
                {
                display: block;
                text-decoration: none;
                width: 80px;
                height: 30px;
                background-color: #D8DDE0;
                color: #fff;
                text-align: center;
                line-height: 30px;
                border-radius: 2px;
                position: absolute;
                right: 10px;
                bottom: 10px
                }

                .row:last-child .card:first-child .card-cont a
                {
                background-color: #037FDD
                }

                .row:last-child .card:last-child .card-cont a
                {
                background-color: #F8504C
                }

                @media screen and (max-width: 860px)
                {
                .card
                {
                    display: block;
                    float: none;
                    width: 100%;
                    margin-bottom: 10px
                }
                
                .card + .card{margin-left: 0}
                
                .card-cont .even-date,
                .card-cont .even-info
                {
                    font-size: 75%
                }
                }
        </style>
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
                                Cetak Tiket
                            </h1>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div id="panel-1" class="panel">
                                    <div class="panel-hdr">
                                        <h2>
                                            List Tiket
                                        </h2>
                                        <div class="panel-toolbar">
                                            <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                                            <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                                            <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                                        </div>
                                    </div>
                                    <div class="panel-container show">
                                        <div class="panel-content">
                                            <div class="content" id="print_area"> 
                                            <?php $idTiket =''; foreach($review as $k=>$v) { $kdBooking =$v->kdBooking; $idTiket .= $v->idTiket.',';?>
                                                <article class="card fl-left">
                                                    <section class="date">
                                                        <time datetime="23th feb">
                                                        <span><?php echo$v->kdTiket; ?></span><span>Kode Tiket</span>
                                                        </time>
                                                    </section>
                                                    <section class="card-cont">
                                                        <small><?php echo$v->kodeRute; ?></small>
                                                        <h4 style="color:#000;"><?php echo $v->nomorModa.' | '.$v->jenisModa; ?></h4>
                                                        <h4 style="color:#000;"><?php echo $v->nama; ?></h4>
                                                        <div class="even-date">
                                                        <i class="fa fa-calendar"></i>
                                                        <time>
                                                        <span>&nbsp;<?php echo date('d M Y',strtotime($v->tglBerangkat)); ?></span>
                                                        <span> &nbsp; <?php echo$v->jamBerangkat; ?></span>
                                                        </time>
                                                        </div>
                                                        <div class="even-info">
                                                        <i class="fa fa-map-marker"></i>
                                                        <p>
                                                            <?php echo $v->provinsiAsal.','.$v->kotaAsal.' - '.$v->provinsiTujuan.','.$v->kotaTujuan; ?>
                                                        </p>
                                                        </div>
                                                        <br>
                                                        <img src="<?php echo base_url('asset/img/logo.jpg'); ?>" width="40%" style="float:right;">
                                                    </section>
                                                </article>
                                            <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-container show">
                                        <div class="panel-content">
                                            <span class="btn btn-dark btn-sm" onclick="print()"><i class="fa fa-print"></i> Cetak</span>
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
        <script src="<?php echo base_url('/asset/js/sweetalert.min.js'); ?>"></script>
        <script src="<?php echo base_url('/asset/js/app.bundle.js'); ?>"></script>
        <script src="<?php echo base_url('/asset/Font-Awesome-5.15.2/js/brand.js'); ?>"></script>
        <script src="<?php echo base_url('/asset/Font-Awesome-5.15.2/js/solid.js'); ?>"></script>
        <script src="<?php echo base_url('/asset/Font-Awesome-5.15.2/js/fontawesome.min.js'); ?>"></script>
        <script src="<?php echo base_url('/asset/js/datatables.bundle.js'); ?>"></script>
        <script>
            function print() {
                var printContents = document.getElementById('print_area').innerHTML;
                var originalContents = document.body.innerHTML;

                document.body.innerHTML = printContents;

                window.print();

                // document.body.innerHTML = originalContents;
            }
        </script>
    </body>
</html>
