<!-- ALERT GAGAL LOGIN -->
<?php 
    if ($this->session->flashdata('tte_check')) {
        if($this->session->flashdata('cond')=='0'){
?>
        <script>
            swal({
                title: "Failed !",
                text: "<?= $this->session->flashdata('tte_check') ?>",
                icon: "error",
            });
        </script>
<?php
        }else{
?>
        <script>
            swal({
                title: "Success !",
                text: "<?= $this->session->flashdata('tte_check') ?>",
                icon: "success",
            });
        </script>
<?php
        }
    } 
?>  
<!-- END OF ALERT -->

<!-- PAGE CONTAINER-->
<div class="page-container">
    <!-- HEADER DESKTOP-->
    <?php $this->load->view('backend/include/header_dekstop') ?>
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="overview-wrap mb-3">
                                <h3 class="ml-4 mt-4 mb-2 d-inline font-weight-normal">
                                    <i class="zmdi zmdi-edit mr-3"></i>Visualisasi TTE
                                </h3>
                                <span class="float-right mr-3 mt-3">
                                    <i class="fa fa-home"></i> <a href="<?= base_url('dashboard') ?>"> Dashboard</a> / tte
                                </span>
                            </div>
                            <div class="overview-wrap">
                                <span class="ml-4">
                                    <?php 
                                        $jumlahTTE = $countTte->num_rows();
                                        if ($jumlahTTE == 0) {
                                    ?>
                                        <a href="<?= base_url('TTE/generateTTE') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus mr-2"></i>Tambah TTE untuk pertamakali</a>
                                    <?php 
                                        }else{
                                    ?>
                                        <a href="#" data-toggle="modal" id="tambahTTEbutton" data-target="#tambahTTE" class="btn btn-primary btn-sm"><i class="fa fa-plus mr-2"></i>Tambah TTE </a>
                                    <?php
                                        }
                                    ?>
                                </span>
                                <span class="float-right mr-3">
                                    <input class="form-control" id="searchInput" type="text" placeholder="Search..">
                                </span>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive table-data">
                                    <table class="table">
                                        <thead>
                                            <th>#</th>
                                            <th>ID TTE</th>
                                            <th>Tanggal Pembuatan</th>
                                            <th class="text-center">Aksi</th>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                if(empty($tte)){
                                                    echo "<tr><td colspan='5' class='text-center'>Data tidak ditemukan !</td></td>";
                                                }else{
                                                    $no = 1;
                                                    foreach($tte as $t):
                                                        $encrypt_id = str_replace(array('=','+','/'),array('-','_','~'),$this->encrypt->encode($t->tte_id).''); //encrypt id TTE
                                            ?>
                                            <tr>
                                                <td> <?= $no ?> </td>
                                                <td>
                                                    <?= $encrypt_id  ?>
                                                </td>
                                                <td>
                                                    <?= date("d F Y H:i", strtotime($t->created_at))." wib" ?>
                                                </td>
                                                <td class="mx-auto d-block">
                                                    <div class="table-data-feature">
                                                        <!-- <a href="<?= base_url('TTE/download/'.$t->tte_filename) ?>" class="item item-warning"  title="Unduh">
                                                                <i class="zmdi zmdi-download"></i>
                                                        </a> -->

                                                        <a href="<?= base_url('TTE/delete/'.$encrypt_id) ?>" class="item item-danger" id="delete-tte<?= $no ?>" title="Delete">
                                                                <i class="zmdi zmdi-delete"></i>
                                                        </a>
                                                        
                                                        <!-- script ALERT DELETE -->
                                                        <script src="<?= base_url('assets/backend/') ?>vendor/jquery-3.2.1.min.js"></script>
                                                        <script>
                                                            $('#delete-tte<?= $no ?>').on('click', function (e) {
                                                                e.preventDefault();
                                                                const url = $(this).attr('href');
                                                                swal({
                                                                    title: 'Are you sure?',
                                                                    text: 'This record and it`s details will be delete permanently !',
                                                                    icon: 'warning',
                                                                    buttons: ["Cancel", "Yes!"],
                                                                }).then(function(value) {
                                                                    if (value) {
                                                                        swal({
                                                                            title: "That's your choice! ",
                                                                            text: "Please wait, This alert will close automaticly and reload the page :) ",
                                                                            icon: "info",
                                                                            showConfirmButton: false
                                                                        });
                                                                        setTimeout(function(){
                                                                            window.location.href = url;
                                                                        },1500);
                                                                    }else{
                                                                        swal("Okay :) ");
                                                                    }
                                                                });
                                                            });
                                                        </script>
                                                        <!-- END SCRIPT ALERT DELETE -->
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php 
                                                    $no++;
                                                    endforeach;
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
    <!-- END PAGE CONTAINER-->
</div>

<!-- modal Tambah TTE -->
<div class="modal fade" id="tambahTTE" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="exampleModalLabel">Tanda Tangan Elektronik</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('TTE/generateTTE') ?>" method="post">
            <div class="form-group">
                <label for="unit_organisasi" class="form-control-label">Masukan Unit Organisasi : </label>
                <input type="text" name="unit_organisasi" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <input type="submit" class="btn btn-success" value="Simpan">
        </div>
    </form>
    </div>
  </div>
</div>
<!-- end modal Tambah TTE -->

<script src="<?= base_url('assets/backend/') ?>vendor/jquery-3.2.1.min.js"></script>
<script>
    $(document).ready(function(){
        $("#searchInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".table tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
<script src="<?= base_url('assets/backend/') ?>vendor/jquery.tablePagination.js"></script>
<script>
    $('table').tablePagination({
        perPage: 5,
        paginationClass:'tablePagination'
    });
</script>
<script>
    $(document).ready(function(){
        let jumlah = <?= $jumlahTTE ?>;
        if (jumlah == 3) {
            $('#tambahTTEbutton').on('click',function(){
                $('#tambahTTEbutton').removeAttr('data-toggle');
                $('#tambahTTEbutton').removeAttr('data-target');
                swal({
                    title: "FORBIDDEN !",
                    text: "You can't create another TTE ! ",
                    icon: "error"
                });
            });
        }
    });
</script>