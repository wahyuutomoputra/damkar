<?php 
$this->load->view('template/head');
?>
<!--tambahkan custom css disini-->
<style>
   hr { background-color: rgba(0, 0, 255, 0.3); height: 2px; border: 0; }
</style>
<?php
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Berita Acara
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
        <?php echo form_open('Berita_acara/input'); ?>
            <form role="form">
            <div class="box-body">
            <label for="exampleInputEmail1">I. Data & Infomasi</label>
            <hr>
            
                <div class="form-group">
                  <label for="informasiDiterima">Informasi diterima pukul:</label>
                  <input type="text" class="form-control" id="informasiDiterima"  name="informasiDiterima" required>
                </div>

                <div class="form-group">
                  <label for="tibaDilokasi">Tiba di lokasi pukul:</label>
                  <input type="text" class="form-control" id="tibaDilokasi"  name="tibaDilokasi" required>
                </div>

                <div class="form-group">
                  <label for="selesaiPemadaman">Selesai pemadaman pukul:</label>
                  <input type="text" class="form-control" id="selesaiPemadaman"  name="selesaiPemadaman" required>
                </div>

                <div class="form-group">
                    <label>Tanggal:</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                    <input type="date" id="tanggal" name="tanggal" class="form-control">
                    </div>
                </div>

                <label >Alamat:</label>
                <div class="form-group" style="padding-left:5em">&nbsp;
                    <label  for="">Rt</label><br>&nbsp;
                    <input type="number" name="rt" required><br>&nbsp;

                    <label  for="">Rw</label><br>&nbsp;
                    <input type="number" name="rw" required><br>&nbsp;

                    <label  for="">Kampung</label><br>&nbsp;
                    <input type="text" name="kampung" required><br>&nbsp;

                    <label  for="">Desa/Kelurahan</label><br>&nbsp;
                    <input type="text" name="desa" required><br>&nbsp;

                    <label  for="">Kecamatan</label><br>&nbsp;
                    <input type="text" name="kecamatan" required><br>&nbsp;

                    <label  for="">Kab\Kota</label><br>&nbsp;
                    <input type="text" name="kota" required><br>&nbsp;
                </div>

                <div class="form-group">
                  <label for="selesaiPemadaman">Nama Pemilik:</label>
                  <input type="text" class="form-control" id="namaPemilik"  name="namaPemilik" required>
                </div>

                <div class="form-group">
                  <label for="selesaiPemadaman">Jumlah Penghuni:</label>
                  <input type="number" class="form-control" id="jumlahPenghuni"  name="jumlahPenghuni" required>
                </div>

                <div class="form-group">
                  <label for="selesaiPemadaman">Nama Pemilik:</label>
                  <input type="text" class="form-control" id="namaPemilik"  name="namaPemilik" required>
                </div>

                <hr>
                <label for="">II. Data Investigasi</label>
                <hr>

                <div class="form-group">
                  <label>Jenis Bangunan Yang Terbakar:</label>
                  <select class="form-control">
                    <option>Bangunan Tinggal</option>
                    <option>Gudang</option>
                    <option>Pabrik</option>
                    <option>Lainnya</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="selesaiPemadaman">Area Yang Terbakar:</label>
                  <input type="text" class="form-control" id="areaTerbakar"  name="areaTerbakar" required>
                </div>

                <label for="">Luas Area Yang Terbakar</label>
                <div class="input-group">
                    <input type="number" class="form-control" nama="luasArea">
                    <span class="input-group-addon"><b>M2</b></span>
                </div>
                <br>

                <label for="">Kerugian Harta Benda:</label> <br>
                <label style="padding-left:5em" for="asetKeseluruhan">Nilai Aset Keseluruhan:</label>
                <div class="input-group" style="padding-left:5em">
                    <span class="input-group-addon">Rp</span>
                    <input type="text" id="asetKeseluruhan" class="form-control" name="asetKeseluruhan">
                 </div> <br>

                <label style="padding-left:5em" for="asetKeseluruhan">Nilai Kerugian:</label>
                <div class="input-group" style="padding-left:5em">
                    <span class="input-group-addon">Rp</span>
                    <input type="text" id="nilaiKerugian" class="form-control" name="nilaiKerugian">
                 </div> <br>

                <label style="padding-left:5em" for="asetKeseluruhan">Nilai Aset Yang Terselamatkan:</label>
                <div class="input-group" style="padding-left:5em">
                    <span class="input-group-addon">Rp</span>
                    <input type="text" id="asetTerselamatkan" class="form-control" name="asetTerselamatkan">
                 </div> <br>
                
                 <div class="form-group">
                  <label for="luka">Korban Luka:</label>
                  <input type="number" class="form-control" id="luka"  name="luka" required>
                 </div>

                 <div class="form-group">
                  <label for="meninggal">Korban Meninggal:</label>
                  <input type="number" class="form-control" id="meninggal"  name="meninggal" required>
                 </div>

                <hr>
                <label for="">III. Data Petugas</label>
                <hr>

                <div class="form-group">
                  <label> Jumlah Unit Mobil:</label>
                  <input type="number" class="form-control" id="jumlahMobil"  name="jumlahMobil" required>
                </div>

                <div class="form-group">
                  <label for="meninggal">Nomor Polisi:</label>
                  <input type="text" class="form-control" id="nomorPolisi"  name="nomorPolisi" required>
                </div>

                <div class="form-group">
                  <label for="meninggal">Jumlah Petugas:</label>
                  <input type="number" class="form-control" id="jumlahPetugas"  name="jumlahPetugas" required>
                </div>

                <label for="">Regu Piket:</label>
                <div class="form-group" style="padding-left:5em">
                  <label for="meninggal">Danru I:</label>
                  <input type="text" class="form-control" id="danru1"  name="danru1" required>
                </div>

                <div class="form-group" style="padding-left:5em">
                  <label for="meninggal">Danru II:</label>
                  <input type="text" class="form-control" id="danru2"  name="danru2" required>
                </div>

                <label for="">Peleton Piket:</label>
                <div class="form-group" style="padding-left:5em">
                  <label for="meninggal">Danton I:</label>
                  <input type="text" class="form-control" id="danton1"  name="danton2" required>
                </div>

                <div class="form-group" style="padding-left:5em">
                  <label for="meninggal">Danton II:</label>
                  <input type="text" class="form-control" id="danton2"  name="danton2" required>
                </div>
                
                <button type="submit" class="btn btn-info pull-right">Kirirm</button>
                <br>
            </div>
            
        </div><!-- /.box-body -->
        <div class="box-footer">
            Footer
        </div><!-- /.box-footer-->
        </form>
    </div><!-- /.box -->

</section><!-- /.content -->

<?php 
$this->load->view('template/js');
?>
<script src="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
<script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script>
<link href="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/>
<script>
    
    
    var timepicker = new TimePicker('tibaDilokasi', {
        lang: 'en',
        theme: 'dark'
    });

    timepicker.on('change',function(evt) {
        var value = (evt.hour || '00') + ':' + (evt.minute || '00');
        evt.element.value = value;
    });

    var time = new TimePicker('selesaiPemadaman', {
        lang: 'en',
        theme: 'dark'
    });

    time.on('change',function(evt2) {
        var value2 = (evt2.hour || '00') + ':' + (evt2.minute || '00');
        evt2.element.value = value2;
    });

    // var timepicker3 = new TimePicker('informasiDiterima', {
    //     lang: 'en',
    //     theme: 'dark'
    // });

    // timepicker3.on('change',function(evt3) {
    //     var value3 = (evt3.hour || '00') + ':' + (evt3.minute || '00');
    //     evt2.element.value = value3;
    // });

    $(document).ready(function(){
        // Format mata uang.
        $( '#asetKeseluruhan' ).mask('000.000.000.000', {reverse: true});
        $( '#asetTerselamatkan' ).mask('000.000.000.000', {reverse: true});
        $( '#nilaiKerugian' ).mask('000.000.000.000', {reverse: true});
    });


    

</script>
<!--tambahkan custom js disini-->
<?php
$this->load->view('template/foot');
?>