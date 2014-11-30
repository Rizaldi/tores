<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?=$title;?></title>
        <?php //Redactor is Here ?>
        <script type="text/javascript" src="<?php echo base_url('admin_assets/redactor/redactor.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('admin_assets/lib/jquery-1.9.0.min.js') ?>"></script>
        <link rel="stylesheet" href="<?php echo base_url('admin_assets/redactor/redactor.css') ?>" type="text/css" />
        <link rel="stylesheet" href="<?php //echo base_url('admin_assets/css/style.css') ?>" type="text/css" />
        
        <link rel="stylesheet" href="<?php echo base_url('admin_assets/css/style.default.css') ?>" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url('admin_assets/prettify/prettify.css') ?>" type="text/css" />

        <script type="text/javascript" src="<?php echo base_url('admin_assets/prettify/prettify.js') ?>"></script>  

        <script type="text/javascript" src="<?php echo base_url('admin_assets/js/jquery.alerts.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('admin_assets/js/bootstrap.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('admin_assets/js/custom.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('admin_assets/js/jquery.flot.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('admin_assets/js/jquery.flot.resize.min.js') ?>"></script>

        <script type="text/javascript" src="<?php echo base_url('admin_assets/js/jquery.form.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('admin_assets/js/jquery.validate.js') ?>"></script>
        <script src="<?=base_url('admin_assets/hc/js/jquery.min.js')?>"></script>
        <script src="<?=base_url('admin_assets/hc/js/highcharts.js')?>"></script>
        
    </head>
    <body>
        <div class="mainwrapper fullwrapper">
            <?=$leftpanel;?>
            <?=$rightpanel;?>
        </div>
        <?php //Highchart ?>
        <script type="text/javascript" src=""></script>
        <script type="text/javascript">
        $(function () {
                $('#stat').highcharts({
                chart: {
                    type: 'area',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                },
                title: {
                    text: 'Statistik Pengunjung'
                },
                tooltip: {
                    pointFormat: 'Jumlah Pengunjung: <b>{data}</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                            style: {
                                color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                            }
                        }
                    }
                },
                xAxis: {
                    categories: ['Minggu', 'Senin', 'Selasa','Rabu', 'Kamis', 'Jumat','Sabtu']
                },
                yAxis: {
                    title: {
                    text: 'Total Pengunjung'
                    }
                },
                series: [{
                name: 'Per Hari',
                data: [
                    ['Minggu',   35],
                    ['Senin',       15],
                    ['Selasa',  30],
                    ['Rabu',    15],
                    ['Kamis',     100],
                    ['Jumat',     5],
                    ['Sabtu',     5]
                ]
            }],
                });
            }); 
        </script>
    </body>
</html>
