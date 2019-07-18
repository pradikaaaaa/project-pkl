<?php $this->load->view('dashboard/header'); ?>

<!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i> Layanan</h3>

          	<div class="row mt">
          		<div class="col-md-12">
                    <div class="content-panel" style="padding-left:10px;padding-right:10px;">
                            <table class="table table-striped table-advance table-hover" id="kiloan">
                                  <button class="btn btn-primary" data-toggle="modal" data-target="#ModalTambah"><i class="fa fa-pencil"></i> Tambah</button>
	                  	  	  <hr>
                            </table>
                    </div>
          		</div>
          	</div>
			
		</section>
      </section><!-- /MAIN CONTENT -->

      <!-- Modal -->
        <div class="modal fade" id="ModalTambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Tambah Layanan</h4>
                </div>
                <div class="modal-body">
                  <?php
                        $attr = array('class' => 'form-horizontal tasi-form');
                        $hidden = array('id' => $id);
                        echo form_open('C_Layanan/tambah_layanan',$attr,$hidden); 
                    ?>
                        <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">ID User</label>
                              <div class="col-sm-10">
                                  <input class="form-control" type="text" disabled>
                              </div>
                        </div>
                        <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Layanan</label>
                              <div class="col-sm-10"> 
                                <select class="form-control" id="ss_nama" type="text" placeholder="Nama Layanan" name="nama">
                                  <option>--Pilih Layanan--</option>
                                    <?php foreach($data as $key) { ?>
                                      <option value="<?php echo $key->layanan_id?>"><?php echo $key->layanan_nama?></option>
                                    <?php } ?>
                                </select>
                              </div>
                        </div>
                        <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Harga</label>
                              <div class="col-sm-6">
                                <label id="ss_harga" type="text" placeholder="harga" name="harga" readonly >
                                    <?php foreach($data as $key2)  { ?>
                                      <option value="<?php echo $key2->layanan_harga?>" class="<?php echo $key2->layanan_id; ?>" readonly><?php echo $key2->layanan_harga?></option>
                                    <?php } ?>
                                    </label>
                              </div>
                        </div>
                        <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jumlah</label>
                              <div class="col-sm-10">
                                  <input class="form-control" type="text">
                              </div>
                        </div>
                        <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">JAM</label>
                              <div class="col-sm-10">
                                  <input class="form-control" type="time">
                              </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                </div>
            </div>
        </div> <!---modal-->

        <!-- Modal Edit -->
        <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Ubah Layanan</h4>
                </div>
                <div class="modal-body">
                    <?php
                        $attr = array('class' => 'form-horizontal tasi-form');
                        echo form_open('C_Layanan/ubah_layanan',$attr); 
                    ?>
                    <!-- <form class="form-horizontal tasi-form"> -->
                        <input type="hidden" name="id" id="kode">

                        <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">ID Layanan</label>
                              <div class="col-sm-10">
                                  <input class="form-control" type="text" id="_id" name="dis_id" disabled>
                              </div>
                        </div>
                        <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Layanan</label>
                              <div class="col-sm-10">
                                  <input class="form-control" type="text" id="_nama" name="nama">
                              </div>
                        </div>
                        <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Harga</label>
                              <div class="col-sm-10">
                                    <input class="form-control" type="text" id="_harga" name="harga">
                              </div>
                        </div>
                        <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jenis Layanan</label>
                              <div class="col-sm-10">
                                <select class="form-control" name="jenis">
                                    <option>Paket</option>
                                    <option>Satuan</option>
                                </select>
                              </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning">Submit</button>
                    </form>
                </div>
                </div>
            </div>
        </div> <!---modal-->

        <!-- Modal Hapus -->
        <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Tambah Layanan</h4>
                </div> -->
                <div class="modal-body">
                    <?php
                        $attr = array('class' => 'form-horizontal tasi-form');
                        echo form_open('C_Layanan/hapus_layanan',$attr); 
                    ?>
                    <!-- <form class="form-horizontal tasi-form"> -->
                    <input type="hidden" name="id" id="kode">
                    <div class="alert alert-warning"><p>Apakah Anda yakin mau menghapus data?</p></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
                </div>
            </div>
        </div> <!---modal-->


<?php $this->load->view('dashboard/footer'); ?>

<!--script for this page-->
    
    <script>
      //custom select box
      $(document).ready(function() {
        $('#kiloan').DataTable({
            responsive: true
        });

        $('#data_layanan').on('click','.layanan_edit',function(){
            var id = $(this).attr('data-id');
            var nama = $(this).attr('data-nama');
            var harga = $(this).attr('data-harga');
            var jenis = $(this).attr('data-jenis');

            $('#ModalEdit').modal('show');
            $('[name="id"]').val(id);
            $('[name="dis_id"]').val(id);
            $('[name="nama"]').val(nama);
            $('[name="harga"]').val(harga);
            $('[name="jenis"]').val(jenis);
        });

        $('#data_layanan').on('click','.layanan_hapus',function(){
            var id = $(this).attr('data-id');
            $('#ModalHapus').modal('show');
            $('[name="id"]').val(id);
        });

    });

      $(function(){
          $('select.styled').customSelect();
      });

      

    </script>
<script src="<?php echo base_url(); ?>assets/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery.chained.min.js"></script>
<script type="text/javascript">
  $("#ss_harga").chained("#ss_nama");
  </script>

  </body>
</html>

