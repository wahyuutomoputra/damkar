<?php
$this->load->view('template/head');
?>
<!--tambahkan custom css disini-->
<?php
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>
<!-- Content Header (Page header) -->
<?php
    if ($data!=null) {
        foreach($data as $hasil){
            $kec[] = $hasil->nama;
            $jum[] = (integer)$hasil->jumlah;
            if(!isset($tanggal)){
                $tanggalKet = "Seluruh Kecamatan";
            }else {
                $tanggalKet = $tanggal;
            }
            $notFound = false;
        }
    }else{
        $notFound = true;
    }
       
    ?>
<section class="content-header">
    <h1>
        Blank page
        <small>it all starts here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Filter</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
        <?php echo form_open('Grafik/grafikKecamatan'); ?>
            <form id="form-filter">
            <div class="form-group">
                <label>Dari Bulan:</label>
                <select class="form-control" id="bulan" name="dari" required> 
                    <option  >Pilih Bulan</option>
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
            </div>

            <div class="form-group">
                <label>Sampai Bulan:</label>
                <select class="form-control" id="bulan" name="sampai" required> 
                    <option  >Pilih Bulan</option>
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
            </div>

            <div class="form-group">
                <label for="Tahun">Tahun:</label>
                <input type="number" class="form-control" id="tahun"  name="tahun" required>
            </div>

            <button type="submit" name="submit" value="Kirim" class="btn btn-primary pull-right">Cari</button>
        </form> 
        <a href="<?php base_url('Grafik/grafikKecamatan');?>" class="btn btn-default">Reset</a>
    
        </div><!-- /.box-body -->
        <div class="box-footer">
            Footer
        </div><!-- /.box-footer-->
    </div><!-- /.box -->

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Title</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
        <?php
        if ($notFound) {
            echo "<b>Data tidak ditemukan</b>";
        }else{
        ?>
          <canvas id="grafik" width="700" height="300"></canvas>
          
        <?php } ?>
        </div><!-- /.box-body -->
        <div class="box-footer">
            Footer
        </div><!-- /.box-footer-->
    </div><!-- /.box -->

</section><!-- /.content -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
 
 <script>
 new Chart(document.getElementById("grafik"), {
    type: 'bar',
    data: {
      labels: <?php echo json_encode($kec); ?>,
      datasets: [
        {
          label: "Jumlah Kebakaran",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: <?php echo json_encode($jum); ?>
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: '<?php echo $tanggalKet; ?>'
      },
      scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>

<?php
$this->load->view('template/js');
?>
<!--tambahkan custom js disini-->
<?php
$this->load->view('template/foot');
?>
