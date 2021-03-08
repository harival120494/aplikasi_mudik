<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>
            Page Titile - category_1 - SmartAdmin v4.0.1
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
    </head>
    <body class="mod-bg-1 ">
    <script>
            /**
             *	This script should be placed right after the body tag for fast execution 
             *	Note: the script is written in pure javascript and does not depend on thirdparty library
             **/
            'use strict';

            var classHolder = document.getElementsByTagName("BODY")[0],
                /** 
                 * Load from localstorage
                 **/
                themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
                {},
                themeURL = themeSettings.themeURL || '',
                themeOptions = themeSettings.themeOptions || '';
            /** 
             * Load theme options
             **/
            if (themeSettings.themeOptions)
            {
                classHolder.className = themeSettings.themeOptions;
                console.log("%c✔ Theme settings loaded", "color: #148f32");
            }
            else
            {
                console.log("Heads up! Theme settings is empty or does not exist, loading default settings...");
            }
            if (themeSettings.themeURL && !document.getElementById('mytheme'))
            {
                var cssfile = document.createElement('link');
                cssfile.id = 'mytheme';
                cssfile.rel = 'stylesheet';
                cssfile.href = themeURL;
                document.getElementsByTagName('head')[0].appendChild(cssfile);
            }
            /** 
             * Save to localstorage 
             **/
            var saveSettings = function()
            {
                themeSettings.themeOptions = String(classHolder.className).split(/[^\w-]+/).filter(function(item)
                {
                    return /^(nav|header|mod|display)-/i.test(item);
                }).join(' ');
                if (document.getElementById('mytheme'))
                {
                    themeSettings.themeURL = document.getElementById('mytheme').getAttribute("href");
                };
                localStorage.setItem('themeSettings', JSON.stringify(themeSettings));
            }
            /** 
             * Reset settings
             **/
            var resetSettings = function()
            {
                localStorage.setItem("themeSettings", "");
            }

        </script>
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
                                Dashboard
                            </h1>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div id="panel-1" class="panel">
                                    <div class="panel-hdr">
                                        <h2>
                                            Progress Pengajuan Tiket
                                        </h2>
                                        <div class="panel-toolbar">
                                            <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                                            <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                                            <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                                        </div>
                                    </div>
                                    <div class="panel-container show">
                                        <div class="panel-content">
                                            <div class="accordion accordion-outline" id="js_demo_accordion-3">
                                                <?php 
                                                    foreach($booking as $key=>$val)
                                                    {
                                                ?>
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <a href="javascript:void(0);" class="card-title collapsed" data-toggle="collapse" data-target="#<?php echo $val->kodeRute; ?>" aria-expanded="false" onclick="get_timeline('<?php echo $val->kdBooking; ?>')">
                                                                <i class="fa fa-chevron-right width-2 fs-xl"></i> &nbsp; 
                                                                <?php echo $val->kodeRute.' ['.$val->provinsiAsal.','.$val->kotaAsal.' - '.$val->provinsiTujuan.','.$val->kotaTujuan.']'.'&nbsp; &nbsp; # Kode Booking anda : '.$val->kdBooking; ?>
                                                                <span class="ml-auto">
                                                                    <span class="collapsed-reveal">
                                                                        <i class="fa fa-minus fs-xl"></i>
                                                                    </span>
                                                                    <span class="collapsed-hidden">
                                                                        <i class="fa fa-plus fs-xl"></i>
                                                                    </span>
                                                                </span>
                                                            </a>
                                                        </div>
                                                        <div id="<?php echo $val->kodeRute; ?>" class="collapse" data-parent="#js_demo_accordion-3" style="">
                                                            <div class="card-body" id="body<?php echo $val->kdBooking; ?>">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                                    }
                                                ?>
                                            </div>
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
        <script>
            function get_timeline(kdBooking)
            {
                $.get('<?php echo site_url('tiket/detail_booking/'); ?>'+kdBooking, function(key){
                    let json = JSON.parse(key);
                    let html='';
                    $.each(json.data, function(key, val){
                        let status='', btn='';
                        if(val.sttKonf==0)
                        {
                            status = "Progress tiket anda masih dalam tahap pengajuan";
                        }
                        else if(val.sttKonf==1)
                        {
                            btn = `<span onclick="cetak('${val.kdBooking}')" class="btn btn-success btn-xs">Cetak Tiket</span>`;
                            status = "Pengajuan anda telah di terima, klik tombol cetak tiket untuk melihat tiket anda.";
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
                                                ${val.sttKonf==1 ? btn :''}
                                            </div>
                                            <div class="fw-300 text-muted mt-1 fs-xs">
                                                ${val.tglBooking == "0000-00-00 00:00:00" ? val.tglKonf : val.tglBooking}
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                    });
                    $('#body'+kdBooking).html(html);
                });
            }

            function cetak(kdBooking)
            {
                window.location = '<?php echo site_url('/tiket/cetak/'); ?>' +kdBooking;
            }
            /*webfont prefix*/
            var prefix = "far"; //fal fas far fab ni etc
            var prefix_extend = "fa" //fa-icon

            /*JSON file that will be loaded*/
            var filename = "media/data/fa-icon-list"; //available JSON files [ng-icon-base, ng-icon-list, ng-text-colors, fa-brand-list, fa-icon-list]

            /*execute code*/
            $.getJSON(filename + ".json").then(function(data)
            {

                /*...worked*/
                var formatedDOMElms = [];

                /*compile DOM elements*/
                jQuery.each(data, function(index, item)
                {
                    formatedDOMElms.push('<div class="col-4 col-sm-3 col-md-3 col-lg-2 col-xl-1 d-flex justify-content-center align-items-center mb-g">\
                                            <a href="#" class="rounded bg-white p-0 m-0 d-flex flex-column w-100 h-100 js-showcase-icon shadow-hover-2" data-toggle="modal" data-target="#iconModal" data-filter-tags=' + item.substring(1) + '>\
                                                <div class="rounded-top color-fusion-300 w-100 bg-primary-300">\
                                                    <div class="rounded-top d-flex align-items-center justify-content-center w-100 pt-3 pb-3 pr-2 pl-2 fa-3x hover-bg">\
                                                        <i class="' + prefix + ' ' + prefix_extend + item + '"></i>\
                                                    </div>\
                                                </div>\
                                                <div class="rounded-bottom p-1 w-100 d-flex justify-content-center align-items-center text-center">\
                                                    <span class="d-block text-truncate text-muted">' + item.substring(1) + '</span>\
                                                </div>\
                                            </a>\
                                        </div>');
                });

                /* append to HTML dom*/
                $('#icon-list').append(formatedDOMElms.join(" "));

                /*initialize filter*/
                initApp.listFilter($('#icon-list'), $('#filter-icon'));

                /*client event for each icon*/
                $('.js-showcase-icon').click(function()
                {
                    var iconClass = $(this).find('i').attr('class');
                    $('#iconModal .modal-body i').removeClass().addClass(iconClass);
                    $('#iconModal .modal-footer .js-icon-class').empty().text(iconClass);
                    $('#js-icon-class').val('<i class="' + iconClass + '"></i>')
                    $('#iconModalLabel strong').empty().text(iconClass);
                });

                /*copy icon button*/
                $('.js-icon-copy').click(function()
                {
                    $('#js-icon-class').select();
                    document.execCommand('copy');
                });

                /*add number of icons*/
                $('#filter-icon').attr('placeholder', "Search " + data.length + " icons for")

            }).fail(function()
            {
                console.log("failed")
            });
        </script>
    </body>
</html>
