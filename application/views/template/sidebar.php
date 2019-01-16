<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/img/user2-160x160.jpg') ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p><?php echo $_SESSION['nama']; ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">Menu Utama</li> 
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>Laporan Permohonan</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('Masyarakat') ?>"><i class="fa  fa-pencil-square-o"></i> Lihat Laporan Baru</a></li>
                    <li><a href="<?php echo site_url('Masyarakat/laporan_sudah_dibaca') ?>"><i class="fa  fa-pencil-square-o"></i> Lihat Laporan Telah Dibaca</a></li>
                </ul>
            </li>     
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>BAP Kebakaran</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <?php if($_SESSION['status']=='petugas'||$_SESSION['status']=='admin'){?>
                    <li><a href="<?php echo site_url('BeritaAcara/view_isi') ?>"><i class="fa  fa-pencil-square-o"></i> Isi Berita Acara</a></li>
                    <?php } ?>
                    <li><a href="<?php echo site_url('BeritaAcara/tampil_beritaAcara') ?>"><i class="fa fa-book"></i> Lihat Berita Acara</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>BAP Rescue</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <?php if($_SESSION['status']=='petugas'||$_SESSION['status']=='admin'){?>
                    <li><a href="<?php echo site_url('Rescue') ?>"><i class="fa  fa-pencil-square-o"></i> Isi BAP Rescue</a></li>
                    <?php } ?>
                    <li><a href="<?php echo site_url('Rescue/tampil_rescue') ?>"><i class="fa fa-book"></i> Lihat BAP Rescue</a></li>
                </ul>
            </li>
            <?php if($_SESSION['status']=='kadis'||$_SESSION['status']=='admin'){?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-archive"></i>
                    <span>Laporan Kebakaran</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('Grafik/grafikKebakaran') ?>"><i class="fa fa-pie-chart"></i> Grafik Kebakaran</a></li>
                    <li><a href="<?php echo site_url('Grafik/grafikKecamatan') ?>"><i class="fa fa-bar-chart-o"></i> Laporan Per-Kecamatan</a></li>
                </ul>
            </li>
            <?php } ?>
            <?php if($_SESSION['status']=='admin'||$_SESSION['status']=='kadis'){?>
            <li class="active">
                <a href="<?php echo site_url('Pegawai') ?>">
                <i class="fa fa-th"></i> <span>Data Petugas</span>
                </a>
            </li>
            <?php } ?>
            <!-- <li><a href="#"><i class="fa fa-circle-o text-danger"></i> Important</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-warning"></i> Warning</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-info"></i> Information</a></li> -->
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">