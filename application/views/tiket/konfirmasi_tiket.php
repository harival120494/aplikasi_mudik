<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>
            Konfirmasi Pengajuan Tiket
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
                                Konfirmasi Pengajuan Tiket
                            </h1>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div id="panel-1" class="panel">
                                    <div class="panel-hdr">
                                        <h2>
                                            List Booking
                                        </h2>
                                        <div class="panel-toolbar">
                                            <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                                            <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                                            <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                                        </div>
                                    </div>
                                    <div class="panel-container show">
                                        <div class="panel-content">
                                            <table class="table m-0 table_booking">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Kode Booking</th>
                                                        <th>Kode Rute</th>
                                                        <th>Rute</th>
                                                        <th>Jumlah Penumpang</th>
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
        <script src="<?php echo base_url('/asset/js/vendors.bundle.js'); ?>"></script>
        <script src="<?php echo base_url('/asset/js/sweetalert.min.js'); ?>"></script>
        <script src="<?php echo base_url('/asset/js/app.bundle.js'); ?>"></script>
        <script src="<?php echo base_url('/asset/Font-Awesome-5.15.2/js/brand.js'); ?>"></script>
        <script src="<?php echo base_url('/asset/Font-Awesome-5.15.2/js/solid.js'); ?>"></script>
        <script src="<?php echo base_url('/asset/Font-Awesome-5.15.2/js/fontawesome.min.js'); ?>"></script>
        <script src="<?php echo base_url('/asset/js/datatables.bundle.js'); ?>"></script>
        <script>
            $(document).ready(function(){
                get_data_table();
            })
            function get_data_table()
            {
                $('.table_booking').dataTable({
                    responsive: true,
                    ajax:{
                        url:'<?php echo site_url('tiket/get_data_table'); ?>',
                        dataSrc :'data'
                    },
                    columns:[
                        {data:'no'},
                        {data:'kdBooking'},
                        {data:'kdRute'},
                        {data:'rute'},
                        {data:'jumlah'},
                        {data:'aksi'},
                    ],
                    destroy:true,
                });
            }

            function review(kdBooking)
            {
                window.location = '<?php echo site_url('/tiket/review/'); ?>' +kdBooking;
            }
        </script>
    </body>
</html>
