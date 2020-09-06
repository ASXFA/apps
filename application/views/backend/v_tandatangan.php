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
                                </h3>
                                <span class="float-right mr-3 mt-3">
                                    <i class="fa fa-home"></i> <a href="<?= base_url('dashboard') ?>"> Dashboard</a> / <a href="<?= base_url('request') ?>"> request</a>  / sign
                                </span>
                            </div>
                            <div class="card-body" id="pdfPreview">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="btn-group float-right mtb-5">
                                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu">
                                                <?php if($req->req_status == 0){ ?>
                                                <a class="dropdown-item" id="signBtn" data-toggle="modal" data-target="#signButton" href="#" style="">Digital Signature</a>
                                                <?php }else{ ?>
                                                    <a class="dropdown-item" data-toggle="modal" style="color: #888">Digital Signature</a>
                                                <?php } ?>
                                                <a class="dropdown-item" href="<?= base_url('Surat_rekomendasi_SE/download/tipe'.$se->se_tipe.'/'.$se->se_filename) ?>">Download</a>
                                            </div>
                                        </div>
                                        <?php 
                                            //decrypt filename surat
                                            $filenameEncrypt = $this->encrypt->decode($se->se_filename);
                                        ?>
                                        <!-- <div class="my_pdf_viewer">
                                            <div class="canvas_container">
                                                <canvas id="pdf_renderer"></canvas>
                                            </div>
                                            <div id="navigation_controls">
                                                <button id="go_previous">Previous</button>
                                                <input id="current_page" value="1" type="number"/>
                                                <button id="go_next">Next</button>
                                            </div>
                                            <div id="zoom_controls">  
                                                <button id="zoom_in">+</button>
                                                <button id="zoom_out">-</button>
                                            </div>
                                        </div> -->
                                        <div class="button-pdf text-center">
                                            <button class="btn btn-secondary btn-sm" id="prev">Prev Page</button>
                                            <button class="btn btn-secondary btn-sm" id="next">Next Page</button>
                                        </div>
                                        <div class="container-canvas">
                                            <canvas id="cnv"></canvas>
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-3">  
                                        <div id="accordion">
                                            <div class="card accord">
                                                <div class="card-header" id="headingOne">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> <i class="fa fa-history mr-1"></i> 
                                                        Activity
                                                        </button>
                                                    </h5>
                                                </div>

                                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne">
                                                    <div class="card-body">
                                                    da shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card accord">
                                                <div class="card-header" id="headingTwo">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"> <i class="fa fa-edit mr-1"></i> Signin
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                                    <div class="card-body">
                                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="card accord">
                                                <div class="card-header" id="headingThree">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        Collapsible Group Item #3
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                                    <div class="card-body">
                                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div> -->
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
<div class="modal fade" id="signButton" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="unit_organisasi" class="form-control-label">Masukan Password anda : </label>
                        <input type="password" name="password_confirm" class="form-control" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" id="batal" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <input id="signed" class="btn btn-success" value="Submit">
        </div>
    </div>
  </div>
</div>
<!-- end modal Tambah TTE -->
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.943/pdf.min.js">
</script>
<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
<script src="<?= base_url('assets/backend/') ?>vendor/jquery-ui/jquery-ui.js"></script>
<!-- PDF VIEWER -->
<script>
    var url = '<?= base_url('assets/backend/surat/tipe'.$se->se_tipe.'/'.$filenameEncrypt) ?>';
    pdfjsLib.getDocument(url).then(doc => {
        let numPages = 1;
        if(numPages == 1){
            $('#prev').attr('disabled');
            $('#next').removeAttr('disabled');
        }else if(numPages >= doc.pdfInfo.numPages){
            $('#prev').removeAttr('disabled');
            $('#next').attr('disabled');
        }
        doc.getPage(numPages).then(page=>{
            var myCanvas = document.getElementById('cnv');
            var context = myCanvas.getContext('2d');
            
            var viewport = page.getViewport(1);
            myCanvas.width = viewport.width;
            myCanvas.height = viewport.height;

            page.render({
                canvasContext: context,
                viewport: viewport
            });
        });
        $('#next').click(function(){
            numPages++;
            doc.getPage(numPages).then(page=>{
                var myCanvas = document.getElementById('cnv');
                var context = myCanvas.getContext('2d');
                
                var viewport = page.getViewport(1);
                myCanvas.width = viewport.width;
                myCanvas.height = viewport.height;

                page.render({
                    canvasContext: context,
                    viewport: viewport
                });
            });
        });
        $('#prev').click(function(){
            numPages--;
            doc.getPage(numPages).then(page=>{
                var myCanvas = document.getElementById('cnv');
                var context = myCanvas.getContext('2d');
                
                var viewport = page.getViewport(1);
                myCanvas.width = viewport.width;
                myCanvas.height = viewport.height;

                page.render({
                    canvasContext: context,
                    viewport: viewport
                });
            });
        });
    });
</script>
<!-- END PDF VIEWER -->
<script>
    $(document).ready(function(){
        //insert specimen
        $('#signed').click(function(){
            var password = $('input[name=password_confirm]').val();

            $.ajax({
                type:"POST",
                url:"<?= base_url('request/checking_password') ?>",
                dataType:"JSON",
                data: {password:password},
                success: function(data){
                    if (data == 0) {
                        swal({
                            title: "Failed",
                            text: "Your password is incorrect!",
                            icon: "error",
                        });
                    }else{
                        signed();
                    }
                }
            })
        });

        function signed()
        {
            var id_request = <?= $req->req_id ?>;
            var id_surat = <?= $se->se_id ?>;
            $.ajax({
                type:"POST",
                url:"<?= base_url('request/editStatus/') ?>",
                dataType:"JSON",
                data: {id_request:id_request, id_surat:id_surat},
                success: function(){
                    swal({
                        title: "Success !",
                        text: "Document has been signed !",
                        icon: "success",
                    });
                    $('input[name=password_confirm]').value = '';
                    $('#batal').trigger('click');
                    $('#signBtn').css({"color": "#888"});
                    $('#signBtn').removeAttr('data-toggle');
                    $('#signBtn').removeAttr('href');
                    $('#signBtn').removeAttr('id');
                    // setTimeout(function(){
                    //     window.location.href = url;
                    // },2000);
                }
            });
        }

        // function showActivity()
        // {
        //     var id_surat = <?= $se->se_id ?>;
        //     $.ajax({
        //         type:"GET",
        //         url:"<?= base_url('request/getRequest/') ?>"+id_surat,
        //         dataType:"JSON",
        //         success: function(data){
        //             html='';
        //             var i;

        //         }
        //     });
        // }
    });
</script>