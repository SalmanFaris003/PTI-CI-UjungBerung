<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
    <?php include 'inc/head.php'; ?>
</head>
<body class="skin-blue">
    <?php include 'inc/header.php'; ?>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <?php include 'sidebar-nav.php'; ?>

        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Dashboard</h1>
                <ol class="breadcrumb">
                    <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <?php if ($level == '1') { ?>
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                        <?php
                                        $this->db->select('*');
                                        $this->db->from('t_model');
                                        echo $this->db->count_all_results();
                                        ?>
                                    </h3>
                                    <p>Total Produk</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="<?php echo site_url('item'); ?>" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->

                        <div class="col-lg-3 col-xs-6">
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                        <?php
                                        $this->db->select('*');
                                        $this->db->from('t_stock');
                                        echo $this->db->count_all_results();
                                        ?>
                                    </h3>
                                    <p>Total Stok</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-android-checkbox-outline"></i>
                                </div>
                                <a href="<?php echo site_url('model'); ?>" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->

                        <div class="col-lg-3 col-xs-6"> 
                            <!-- small box --> 
                            <div class="small-box bg-red"> 
                                <div class="inner"> 
                                    <h3> 
                                        <?php 
 
                                            $this->db->select('*'); 
                                            $this->db->from('t_stock'); 
                                            $this->db->where('status', 'IN PROCESS'); 
                                            echo $this->db->count_all_results(); 
                                        ?> 
                                    </h3> 
                                    <p> 
                                        Stok Dalam Proses 
                                    </p> 
                                </div> 
                                <div class="icon"> 
                                    <i class="ion ion-arrow-graph-up-right"></i> 
                                </div> 
                                <a href="<?php echo site_url('model');?>" class="small-box-footer"> 
                                    More info <i class="fa fa-arrow-circle-right"></i> 
                                </a> 
                            </div> 
                        </div><!-- ./col -->

                        <div class="col-lg-3 col-xs-6">
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
                                        <?php
                                        $this->db->select('*');
                                        $this->db->from('t_stock');
                                        $this->db->where('status', 'UNPROCESSED');
                                        echo $this->db->count_all_results();
                                        ?>
                                    </h3>
                                    <p>Stok Belum Diproses</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-android-cancel"></i>
                                </div>
                                <a href="<?php echo site_url('model'); ?>" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    </div><!-- /.row -->
                <?php } elseif ($level == '2') { ?>
                    <!-- Small boxes for Factory -->
                    <div class="row">
                        <div class="col-lg-1 col-xs-6"></div>
                        <div class="col-lg-2 col-xs-6">
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                        <?php
                                        $this->db->select('*');
                                        $this->db->from('view_proses');
                                        $this->db->where('nama_proses', 'mesin');
                                        echo $this->db->count_all_results();
                                        ?>
                                    </h3>
                                    <p>Stok Pada Mesin</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-ios-cog"></i>
                                </div>
                                <a href="<?php echo site_url('proses'); ?>" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->

                        <div class="col-lg-2 col-xs-6">
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                        <?php
                                        $this->db->select('*');
                                        $this->db->from('view_proses');
                                        $this->db->where('nama_proses', 'rosso');
                                        echo $this->db->count_all_results();
                                        ?>
                                    </h3>
                                    <p>Stok Pada Rosso</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-scissors"></i>
                                </div>
                                <a href="<?php echo site_url('rosso'); ?>" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->

                        <div class="col-lg-2 col-xs-6">
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                        <?php
                                        $this->db->select('*');
                                        $this->db->from('view_proses');
                                        $this->db->where('nama_proses', 'balikan');
                                        echo $this->db->count_all_results();
                                        ?>
                                    </h3>
                                    <p>Stok Pada Balikan</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-ios-refresh"></i>
                                </div>
                                <a href="<?php echo site_url('balikan'); ?>" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->

                        <div class="col-lg-2 col-xs-6">
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
                                        <?php
                                        $this->db->select('*');
                                        $this->db->from('view_proses');
                                        $this->db->where('nama_proses', 'oven');
                                        echo $this->db->count_all_results();
                                        ?>
                                    </h3>
                                    <p>Stok Pada Oven</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bonfire"></i>
                                </div>
                                <a href="<?php echo site_url('oven'); ?>" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->

                        <div class="col-lg-2 col-xs-6">
                            <div class="small-box bg-purple">
                                <div class="inner">
                                    <h3>
                                        <?php
                                        $this->db->select('*');
                                        $this->db->from('view_proses');
                                        $this->db->where('nama_proses', 'packing');
                                        echo $this->db->count_all_results();
                                        ?>
                                    </h3>
                                    <p>Stok Pada Packing</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-cube"></i>
                                </div>
                                <a href="<?php echo site_url('packing'); ?>" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-1 col-xs-6"></div>
                    </div><!-- /.row -->
                <?php } ?>

                <!-- Main row -->
                <div class="row">
                    <section class="col-lg-12 connectedSortable">
                        <!-- Custom tabs (Charts with tabs) -->
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs pull-right">
                                <li class="pull-left header"><i class="fa fa-inbox"></i> Chart</li>
                            </ul>
                            <div class="tab-content no-padding">
                                <!-- Morris chart - Sales -->
                                <div class="chart tab-pane active" id="alamat-kantor" style="position: relative; height: 250px;">
                                    <br/>
                                    <canvas id="myChart"></canvas>
                                </div>
                            </div>
                        </div><!-- /.nav-tabs-custom -->
                    </section>

                    <!-- Left col -->
                    <section class="col-lg-12 connectedSortable" style="margin-top: 2rem">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs pull-right">
                                <li class="active"><a href="#alamat-kantor" data-toggle="tab">Kantor</a></li>
                                <li ><a href="#alamatpabrik" data-toggle="tab">Pabrik</a></li>
                                <li class="pull-left header"><i class="fa fa-inbox"></i> Kontak</li>
                            </ul>
                            <div class="tab-content no-padding">
                                <div class="chart tab-pane active" id="alamat-kantor" style="position: relative; height: 250px;">
                                    <br/>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10">
                                        <?php foreach ($user1->result() as $row) { ?>
                                            <address>
                                                <strong>PT Ujung Berung (Office)</strong><br>
                                                <?php echo $row->user_alamat; ?><br>
                                                <?php echo $row->user_kota; ?> <?php echo $row->user_kodepos; ?><br>
                                                <i class="fa fa-phone-square"></i> <?php echo $row->user_telepon; ?>
                                            </address>
                                            <address>
                                                <strong><?php echo $row->user_nama; ?></strong><br>
                                                <?php echo $row->user_role; ?><br>
                                                <i class="fa fa-inbox"></i><a href="mailto:<?php echo $row->user_email; ?>"> <?php echo $row->user_email; ?></a>
                                            </address>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="chart tab-pane" id="alamatpabrik" style="position: relative; height: 250px;">
                                    <br/>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10">
                                        <?php foreach ($user2->result() as $row) { ?>
                                            <address>
                                                <strong>PT Ujung Berung (Factory)</strong><br>
                                                <?php echo $row->user_alamat; ?><br>
                                                <?php echo $row->user_kota; ?> <?php echo $row->user_kodepos; ?><br>
                                                <i class="fa fa-phone-square"></i> <?php echo $row->user_telepon; ?>
                                            </address>
                                            <address>
                                                <strong><?php echo $row->user_nama; ?></strong><br>
                                                <?php echo $row->user_role; ?><br>
                                                <i class="fa fa-inbox"></i><a href="mailto:<?php echo $row->user_email; ?>"> <?php echo $row->user_email; ?></a>
                                            </address>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.nav-tabs-custom -->
                    </section><!-- right col -->
                </div><!-- /.row (main row) -->
            </section><!-- /.content -->
        </aside><!-- /.right-side -->
    </div><!-- ./wrapper -->

    <?php include 'inc/jq.php'; ?>
    <script>
        $(document).ready(function() {
            var ctx = document.getElementById('myChart').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'bar',
                responsive: true,
                maintainAspectRatio: false,
                data: {
                    labels: <?php echo json_encode($chart['label']); ?>,
                    datasets: [{
                        label: 'data produk',
                        backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgb(255, 99, 132)',
                        data: <?php echo json_encode($chart['data']); ?>
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                stepSize: 1,
                            }
                        }]
                    }
                }
            });
            chart.canvas.parentNode.style.height = '100%';
            chart.canvas.parentNode.style.width = '100%';
        });
    </script>
</body>
</html>