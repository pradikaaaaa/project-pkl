<?php $this->load->view('dashboard/header'); ?>

<!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i> Dashboard</h3>
          	<div class="row mt">
          		<div class="col-lg-12">

                  <div class="content-panel" style="padding-left:10px;padding-right:10px;">
                            <table class="table table-striped table-advance table-hover" id="user_list">
                                  <button class="btn btn-primary" data-toggle="modal" data-target="#ModalTambah"><i class="fa fa-pencil"></i> Tambah</button>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i> ID</th>
                                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> Username</th>
                                  <th><i class=" fa fa-edit"></i> Status</th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody id="data_user">
                              <?php foreach ($list_user as $key) {?>
                                    <tr>
                                        <td><?=$key->user_id?></td>
                                        <td><?=$key->user_username?></td>
                                        <td><?=$key->user_status?></td>
                                        <td>
                                        <!-- <a href="javascript:;" class="btn btn-info btn-sm btn-block kategori_edit" data-id="'+data[i].kode_kategori+'" data-kategori="'+data[i].kategori_event+'">Edit</a> -->
                                        <a href="javascript:;" class="btn btn-warning btn-xs layanan_edit"><i class="fa fa-pencil"></i></a>
                                        <a href="javascript:;" class="btn btn-danger btn-xs layanan_hapus"><i class="fa fa-trash-o "></i></a>
                                        <!-- <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button> -->
                                        </td>
                                    </tr>
                              <?php } ?>
                              </tbody>
                          </table>


                    </div>


          		</div>
          	</div>
			
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->


<?php $this->load->view('dashboard/footer'); ?>

<!--script for this page-->
    
    <script>
      //custom select box
      $(document).ready(function(){
          $('#user_list').DataTable({
          });
      });

      $(function(){
          $('select.styled').customSelect();
      });

    </script>

  </body>
</html>

