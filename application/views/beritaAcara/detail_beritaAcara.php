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
            <h3 class="box-title">Form pengisian berita acara kejadian</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
        
            <form role="form">
            <div class="box-body">
            <label for="exampleInputEmail1">I. Data & Infomasi</label>
            <hr>
            
                <div class="form-group">
                  <label for="informasiDiterima">Informasi diterima pukul:</label>
                  <input type="time" value="<?php echo $detail['informasiDiterima']; ?>" class="form-control" id="informasiDiterima"  name="informasiDiterima" disabled>
                </div>

                <div class="form-group">
                  <label for="tibaDilokasi">Tiba di lokasi pukul:</label>
                  <input type="time" value="<?php echo $detail['tibaDilokasi']; ?>" class="form-control" id="tibaDilokasi"  name="tibaDilokasi" disabled>
                </div>

                <div class="form-group">
                  <label for="selesaiPemadaman">Selesai pemadaman pukul:</label>
                  <input type="time" value="<?php echo $detail['selesaiPemadaman']; ?>" class="form-control" id="selesaiPemadaman"  name="selesaiPemadaman" disabled>
                </div>

                <div class="form-group">
                    <label>Tanggal:</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                    <input type="date" value="<?php echo $detail['tanggal']; ?>" id="tanggal" name="tanggal" class="form-control" disabled>
                    </div>
                </div>

                <label >Alamat:</label>
                <div class="form-group" style="padding-left:5em">&nbsp;
                    <label  for="">Rt</label><br>&nbsp;
                    <input type="number" value="<?php echo $detail['rt']; ?>" name="rt" disabled><br>&nbsp;

                    <label  for="">Rw</label><br>&nbsp;
                    <input type="number" value="<?php echo $detail['rw']; ?>" name="rw" disabled><br>&nbsp;

                    <label  for="">Kampung</label><br>&nbsp;
                    <input type="text" value="<?php echo $detail['kampung']; ?>" name="kampung" disabled><br>&nbsp;

                    <label  for="">Desa/Kelurahan</label><br>&nbsp;
                    <input type="text" value="<?php echo $detail['desa']; ?>" name="desa" disabled><br>&nbsp;

                    <label  for="">Kecamatan</label><br>&nbsp;
                    <select name="kecamatan" id="">
                    <option value="<?php echo $detail['nama']; ?>"><?php echo $detail['nama']; ?></option>
                    
                    </select><br>&nbsp;

                    <label  for="">Kab\Kota</label><br>&nbsp;
                    <input type="text" value="<?php echo $detail['kota']; ?>" name="kota" disabled><br>&nbsp;
                </div>

                <div class="form-group">
                  <label for="selesaiPemadaman">Nama Pemilik:</label>
                  <input type="text" value="<?php echo $detail['namaPemilik']; ?>" class="form-control" id="namaPemilik"  name="namaPemilik" disabled>
                </div>

                <div class="form-group">
                  <label for="selesaiPemadaman">Jumlah Penghuni:</label>
                  <input type="number" value="<?php echo $detail['jumlahPenghuni']; ?>" class="form-control" id="jumlahPenghuni"  name="jumlahPenghuni" disabled>
                </div>

                <hr>
                <label for="">II. Data Investigasi</label>
                <hr>

                <div class="form-group">
                  <label>Jenis Bangunan Yang Terbakar:</label>
                  <select class="form-control" name="jenisBangunan">
                    <option><?php echo $detail['jenisBangunan']; ?></option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="areaTerbakar">Area Yang Terbakar:</label>
                  <input type="text" value="<?php echo $detail['areaTerbakar']; ?>" class="form-control" id="areaTerbakar"  name="areaTerbakar" disabled>
                </div>

                <div class="form-group">
                  <label for="luasArea">Luas Area Yang Terbakar:</label>
                  <input type="text" value="<?php echo $detail['luasArea']; ?>" class="form-control" id="luasArea"  name="luasArea" disabled>
                </div>
                
                <label for="">Kerugian Harta Benda:</label> <br>
                <label style="padding-left:5em" for="asetKeseluruhan">Nilai Aset Keseluruhan:</label>
                <div class="input-group" style="padding-left:5em">
                    <span class="input-group-addon">Rp</span>
                    <input type="text" value="<?php echo $detail['asetKeseluruhan']; ?>" id="asetKeseluruhan" class="form-control" name="asetKeseluruhan" disabled>
                 </div> <br>

                <label style="padding-left:5em" for="asetKeseluruhan">Nilai Kerugian:</label>
                <div class="input-group" style="padding-left:5em">
                    <span class="input-group-addon">Rp</span>
                    <input type="text" value="<?php echo $detail['nilaiKerugian']; ?>" id="nilaiKerugian" class="form-control" name="nilaiKerugian" disabled>
                 </div> <br>

                <label style="padding-left:5em" for="asetKeseluruhan">Nilai Aset Yang Terselamatkan:</label>
                <div class="input-group" style="padding-left:5em">
                    <span class="input-group-addon">Rp</span>
                    <input type="text" value="<?php echo $detail['asetTerselamatkan']; ?>" id="asetTerselamatkan" class="form-control" name="asetTerselamatkan" disabled>
                 </div> <br>
                
                 <div class="form-group">
                  <label for="luka">Korban Luka:</label>
                  <input type="number" value="<?php echo $detail['luka']; ?>" class="form-control" id="luka"  name="luka" disabled>
                 </div>

                 <div class="form-group">
                  <label for="meninggal">Korban Meninggal:</label>
                  <input type="number" value="<?php echo $detail['meninggal']; ?>" class="form-control" id="meninggal"  name="meninggal" disabled>
                 </div>

                <hr>
                <label for="">III. Data Petugas</label>
                <hr>

                <div class="form-group">
                  <label> Jumlah Unit Mobil:</label>
                  <input type="number" value="<?php echo $detail['jumlahMobil']; ?>" class="form-control" id="jumlahMobil"  name="jumlahMobil" disabled>
                </div>

                <div class="form-group">
                  <label for="meninggal">Nomor Polisi:</label>
                  <input type="text" value="<?php echo $detail['nomorPolisi']; ?>" class="form-control" id="nomorPolisi"  name="nomorPolisi" disabled>
                </div>

                <div class="form-group">
                  <label for="meninggal">Jumlah Petugas:</label>
                  <input type="number" value="<?php echo $detail['jumlahPetugas']; ?>" class="form-control" id="jumlahPetugas"  name="jumlahPetugas" disabled>
                </div>

                <label for="">Regu Piket:</label>
                <div class="form-group" style="padding-left:5em">
                  <label for="meninggal">Danru I:</label>
                  <input type="text" value="<?php echo $detail['danru1']; ?>" class="form-control" id="danru1"  name="danru1" >
                </div>

                <div class="form-group" style="padding-left:5em">
                  <label for="meninggal">Danru II:</label>
                  <input type="text" value="<?php echo $detail['danru2']; ?>" class="form-control" id="danru2"  name="danru2" >
                </div>

                <label for="">Peleton Piket:</label>
                <div class="form-group" style="padding-left:5em">
                  <label for="meninggal">Danton I:</label>
                  <input type="text" value="<?php echo $detail['danton1']; ?>" class="form-control" id="danton1"  name="danton1" >
                </div>

                <div class="form-group" style="padding-left:5em">
                  <label for="meninggal">Danton II:</label>
                  <input type="text" value="<?php echo $detail['danton2']; ?>" class="form-control" id="danton2"  name="danton2" >
                </div>
                
                <!-- <button type="submit" class="btn btn-info pull-right">Cetak</button> -->
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
<script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script>
<script>

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