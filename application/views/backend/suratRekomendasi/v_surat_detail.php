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
                                    <i class="fa fa-home"></i> <a href="<?= base_url('dashboard') ?>"> Dashboard</a> / <a href="<?= base_url('Surat_rekomendasi_SE') ?>"> Surat Rekomendasi SE</a>  / Detail
                                </span>
                            </div>
                            <div class="card-body" id="progress-bar-request">
                                <div class="progress mb-3">
                                    <div id="prgs-bar" class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar" style="width: 35%" aria-valuenow="5"
                                        aria-valuemin="0" aria-valuemax="100">Phase 1 </div>
                                </div>
                            </div>
                            <div class="card-body" id="pdfPreview">
                                <div class="btn-group float-right mtb-5">
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu">
                                        <?php if(empty($req) || $req->num_rows() == 0){ ?>
                                        <a class="dropdown-item" id="requestSignature" href="#">Request Signature</a>
                                        <?php }else{?>
                                        <a class="dropdown-item" style="opacity:0.5;" >Request Signature</a>
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

                                <!-- <embed src="<?= base_url('assets/backend/surat/tipe'.$se->se_tipe.'/').$filenameEncrypt ?>" type="application/pdf" width="100%" height="900px"/> -->
                            </div>
                            <div class="card-body" id="requestForm">
                                <h3>Form Request</h3>
                                <!-- <form class="mt-3" id="formRequest"> -->
                                    <div class="form-group">
                                        <label for="pemaraf" class="form-control-label">Pilih Pemaraf</label>
                                        <select name="pemaraf" id="pemaraf" class="form-control">
                                            <?php foreach($users as $user): ?>
                                                <option value="<?= $user->user_id ?>"><?= $user->user_nama.' - '.$user->user_nik ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <input type="text" id="id_surat" name="id_surat" value="<?= $se->se_id ?>" hidden>
                                    </div>
                                    <div class="form-group">
                                        <label for="message" class="form-control-label">Message</label>
                                        <textarea name="message" id="message" cols="30" rows="10" resize="none" class="form-control" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button id="btn-pemaraf" class="btn btn-info float-right">Next</button>
                                    </div>
                                <!-- </form> -->
                            </div>
                            <div class="card-body" id="requestSpecimen">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <form id="specimenRequest">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div id="specimen">

                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="container-canvas">
                                            <canvas id="cnv2"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <button id="btn-specimen" class="btn btn-info mt-5   float-right">Next</button>
                            </div>
                            <div class="card-body" id="sendRequest">
                                <img src="<?= base_url('assets/backend/images/New app.svg') ?>" alt="SEND" width="70%" class="mx-auto d-block">
                                <a href="<?= base_url('request/send/'.$se->se_id.'/1') ?>" class="btn btn-info float-right mt-5">Send <i class="fa fa-send ml-1"></i></a>
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
        $('#requestForm').hide();
        $('#progress-bar-request').hide();
        $('#requestSpecimen').hide();
        $('#sendRequest').hide();
        $('#requestSignature').on('click',function(){
            $('#pdfPreview').hide();
            $('#requestForm').show();
            $('#progress-bar-request').show();
        });
        $('#pemaraf').select2({
            placeholder: 'Pilih Pemaraf',
            allowClear: true
        });

        // $('#pemaraf').autocomplete({
        //     minLength: 0,
        //     source: "<?php echo site_url('users/search');?>",
        //     focus: function( event, ui ) {
        //         $('[name="pemaraf"]').val( ui.item.user_nama );
        //             return false;
        //     },
        //     select: function (event, ui) {
        //         $('[name="pemaraf"]').val(ui.item.user_nama); 
        //         $('[name="user_id"]').val(ui.item.user_id); 
        //     }
        // });
        
        // insert pemaraf
        $('#btn-pemaraf').click(function(){
            var pemaraf = $("#pemaraf").val();
            var message = $("textarea[name='message']").val();
            var id_surat = $("input[name='id_surat']").val();

            $.ajax({
                type:'POST',
                url:'<?= base_url('request/add') ?>',
                dataType: 'JSON',
                data : {pemaraf:pemaraf,  message:message, id_surat:id_surat},
                success: function(data){
                    $('#pdfPreview').hide();
                    $('#requestForm').hide();
                    $('#requestSpecimen').show();
                    $('#sendRequest').hide();
                    $('#prgs-bar').css({"width": "70%"});
                    $('#prgs-bar').html('Phase 2');
                    var html ='';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += "<input id='id_request' value='"+data[i].req_id+"' hidden>";
                        html += "<h2 class='text-center'>Specimen</h2>" + 
                        "<h5 class='text-center display-6'>Please Choose One</h5><hr>"+
                        "<label><input type='radio' class='option-input radio' id='specimen1' name='specimen' value='1' />Image</label><br>"+
                        "<label><input type='radio' class='option-input radio' id='specimen2' name='specimen' value='2' />Invisible</label>";
                    }
                    $('#specimen').html(html);
                    var url = '<?= base_url('assets/backend/surat/tipe'.$se->se_tipe.'/'.$filenameEncrypt) ?>';
                    pdfjsLib.getDocument(url).then(doc => {
                        doc.getPage(1).then(page=>{
                            var myCanvas = document.getElementById('cnv2');
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
                }
            });
        });
        
        //insert specimen
        $('#btn-specimen').click(function(){
            var specimen = $('input[name=specimen]:checked').val();
            var id_request = $('#id_request').val();

            $.ajax({
                type:"POST",
                url:"<?= base_url('request/edit/') ?>",
                dataType:"JSON",
                data: {specimen:specimen, id_request:id_request},
                success: function(){
                    $('#pdfPreview').hide();
                    $('#requestForm').hide();
                    $('#requestSpecimen').hide();
                    $('#sendRequest').show();
                    $('#prgs-bar').css({"width": "100%"});
                    $('#prgs-bar').html('Phase Final');
                }
            })
        })
    });
</script>