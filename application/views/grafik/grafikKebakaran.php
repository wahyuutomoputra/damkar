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
$nilaiKerugian = 0;
$total =0;
$nilaiAset =0;
    if ($data!=null) {
        foreach($data as $hasil){
            $jenis[] = $hasil->jenisBangunan;
            $jumlah[] = (integer)$hasil->jumlah;
            $total = $total+$hasil->jumlah;
            $nilaiKerugian = $nilaiKerugian+$hasil->totalKerugian;
            $nilaiAset = $nilaiAset+$hasil->totalTerselamatkan;
            if(!isset($tanggal)){
                $tanggalKet = "Selama Tahun ".date("Y");
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
        Grafik Kebakaran
        
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
        <?php echo form_open('Grafik/grafikKebakaran'); ?>
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
        <a href="<?php base_url('Grafik/grafikKebakaran');?>" class="btn btn-default">Reset</a>
    
        </div><!-- /.box-body -->
    </div><!-- /.box -->

    <!-- Default box -->
    <div class="box" id="print">
        <div class="box-header with-border">
            <h3 class="box-title">Laporan Penanggulangan Kejadian Kebakaran</h3>
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
          <canvas id="grafik" height=100></canvas>
          <p align="center" id="total"><b>Jumlah Total: <?php echo $total; ?></b></p>
          <h4  class="box-title" id="kerugian">Nilai Kerugian:&nbsp; <?php echo "Rp " . number_format($nilaiKerugian,2,',','.'); ?></h4>
          <h4  class="box-title" id="terselamatkan">Nilai Aset Terselamatkan:&nbsp; <?php echo "Rp " . number_format($nilaiAset,2,',','.'); ?></h4>
        <?php } ?>
        <button type="button" id="download-pdf2" >Download</button>
        </div><!-- /.box-body -->
        <div class="box-footer">
            Damkar Soreang
        </div><!-- /.box-footer-->
    </div><!-- /.box -->

</section><!-- /.content -->
<script src="<?php echo base_url('assets/ChartJs/Chart.min.js') ?>" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.2.61/jspdf.min.js" type="text/javascript"></script>
 <script>

 new Chart(document.getElementById("grafik"), {
    type: 'pie',
    data: {
      labels: <?php echo json_encode($jenis);?>,
      datasets: [{
        label: "Laporan ",
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
        data: <?php echo json_encode($jumlah);?>
      }]
    },
    options: {
      title: {
        display: true,
        text: '<?php echo $tanggalKet; ?>'
      },
      //yg legend ga wajib
      legend: {
            display: true,
            position: 'bottom',
            labels: {
                generateLabels: function(chart) {
                    var data = chart.data;
                    if (data.labels.length && data.datasets.length) {
                        return data.labels.map(function(label, i) {
                            var meta = chart.getDatasetMeta(0);
                            var ds = data.datasets[0];
                            var arc = meta.data[i];
                            var custom = arc && arc.custom || {};
                            var getValueAtIndexOrDefault = Chart.helpers.getValueAtIndexOrDefault;
                            var arcOpts = chart.options.elements.arc;
                            var fill = custom.backgroundColor ? custom.backgroundColor : getValueAtIndexOrDefault(ds.backgroundColor, i, arcOpts.backgroundColor);
                            var stroke = custom.borderColor ? custom.borderColor : getValueAtIndexOrDefault(ds.borderColor, i, arcOpts.borderColor);
                            var bw = custom.borderWidth ? custom.borderWidth : getValueAtIndexOrDefault(ds.borderWidth, i, arcOpts.borderWidth);

							// We get the value of the current label
							var value = chart.config.data.datasets[arc._datasetIndex].data[arc._index];

                            return {
                                // Instead of `text: label,`
                                // We add the value to the string
                                text: label + " : " + value,
                                fillStyle: fill,
                                strokeStyle: stroke,
                                lineWidth: bw,
                                hidden: isNaN(ds.data[i]) || meta.data[i].hidden,
                                index: i
                            };
                        });
                    } else {
                        return [];
                    }
                }
            }
        }
        
    }
});

 document.getElementById('download-pdf2').addEventListener("click", downloadPDF2);

//download pdf form hidden canvas
function downloadPDF2() {
    
    var canvas = document.getElementById("grafik");
    var total = document.getElementById("total");
    var kerugian = document.getElementById("kerugian");
    var terselamatkan = document.getElementById("terselamatkan");
    var tTotal = total.innerHTML;
    var tKerugian = kerugian.innerHTML;
    var tTerselamatkan = terselamatkan.innerHTML;
    var win = window.open();
    var windowContent = '<!DOCTYPE html>';
    windowContent += '<html>'
    windowContent += '<head></head>';
    windowContent += '<body>';
    windowContent += "<p align='center'<b>Laporan Kebakaran</b></p>";
    windowContent += '<img src="' + canvas.toDataURL("image/png") + '">';
    windowContent += "<p align='center'"+tTotal+"</b></p>";
    windowContent += "<h4  class='box-title'>Nilai Kerugian:&nbsp;"+tKerugian+" </h4>";
    windowContent += "<h4  class='box-title'>Nilai Aset Terselamatkan:&nbsp;"+tTerselamatkan+" </h4>";
    windowContent += '</body>';
    windowContent += '</html>';
    win.document.write(windowContent);
    win.document.close();
    win.print();
    Win.close();
 }
</script>

<?php
$this->load->view('template/js');
?>
<!--tambahkan custom js disini-->
<?php
$this->load->view('template/foot');
?>
