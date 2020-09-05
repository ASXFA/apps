<?php
            ob_clean();
            $pdf = new pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            // set document information
            // $pdf->SetCreator(PDF_CREATOR);
            // $pdf->SetAuthor('Nicola Asuni');
            // $pdf->SetTitle('TCPDF Example 003');
            // $pdf->SetSubject('TCPDF Tutorial');
            // $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

            // set header and footer fonts
            // $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            // $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

            // set default monospaced font
            // $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

            // set margins
            $pdf->setPrintHeader(false);
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_RIGHT);
            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            // $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            // set auto page breaks
            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

            // set some language-dependent strings (optional)
            // if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            //     require_once(dirname(__FILE__).'/lang/eng.php');
            //     $pdf->setLanguageArray($l);
            // }

            // ---------------------------------------------------------

            // set font
            $pdf->SetFont('times', '', 12);
            $pdf->addPage();
            // get the current page break margin
            $bMargin = $pdf->getBreakMargin();
            // get current auto-page-break mode
            $auto_page_break = $pdf->getAutoPageBreak();
            // disable auto-page-break
            $pdf->SetAutoPageBreak(false, 0);
            // set bacground image
            $image_file = base_url('assets/backend/images/').'bg.png';
            $pdf->Image($image_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
            // restore auto-page-break status
            $pdf->SetAutoPageBreak($auto_page_break, $bMargin);
            // set the starting point for the page content
            $pdf->setPageMark();
            $html = '
                    <style>
                    h1 {
                        color: navy;
                        font-family: times;
                        font-size: 24pt;
                        text-decoration: underline;
                    }
                    p.first {
                        color: #003300;
                        font-family: helvetica;
                        font-size: 12pt;
                    }
                    p.first span {
                        color: #006600;
                        font-style: italic;
                    }
                    p#second {
                        color: rgb(00,63,127);
                        font-family: times;
                        font-size: 12pt;
                        text-align: justify;
                    }
                    p#second > span {
                        background-color: #FFFFAA;
                    }
                    table {
                        font-family: times;
                        padding-top: 4px;
                        color: #111;
                    }
                    table.profil tr td {
                        font-size: small;
                    }
                    .lowercase {
                        text-transform: lowercase;
                    }
                    .uppercase {
                        text-transform: uppercase;
                    }
                    .capitalize {
                        text-transform: capitalize;
                    }
                </style>
                <img src="'.base_url('assets/backend/images/kop/'.$image).'" alt="kop">
                <h4 style="text-align: center;">SURAT REKOMENDASI PERMOHONAN PENERBITAN SERTIFIKAT ELEKTRONIK BALAI SERTIFIKASI ELEKTRONIK PADA '.strtoupper($unit_organisasi).' PEMERINTAH DAERAH PROVINSI JAWA BARAT</h4>
                Saya yang bertandatangan dibawah ini
                <div style="background-color: #aaa; border: 1px solid black">
                    <table class="profil">
                        <tr>
                            <td width="5%"> 1. </td>
                            <td width="25%"> Nama Lengkap </td>
                            <td width="3%"> : </td>
                            <td width="67%">'.$user->user_nama.'</td>
                        </tr>
                        <tr>
                            <td width="5%"> 2. </td>
                            <td width="25%"> NIP </td>
                            <td width="3%"> : </td>
                            <td width="67%">'.$user->user_nip.'</td>
                        </tr>
                        <tr>
                            <td width="5%"> 3. </td>
                            <td width="25%"> NIK </td>
                            <td width="3%"> : </td>
                            <td width="67%">'.$user->user_nik.'</td>
                        </tr>
                        <tr>
                            <td width="5%"> 4. </td>
                            <td width="25%"> Pangkat / Golongan </td>
                            <td width="3%"> : </td>
                            <td width="67%">'.ucfirst($user->user_pangkat).'</td>
                        </tr>
                        <tr>
                            <td width="5%"> 5. </td>
                            <td width="25%"> Jabatan </td>
                            <td width="3%"> : </td>
                            <td width="67%">'.ucfirst($user->user_jabatan).'</td>
                        </tr>
                        <tr>
                            <td width="5%"> 6. </td>
                            <td width="25%"> Unit Kerja </td>
                            <td width="3%"> : </td>
                            <td width="67%">'.ucfirst($user->user_unit_kerja).'</td>
                        </tr>
                        <tr>
                            <td width="5%"> 7. </td>
                            <td width="25%"> Instansi </td>
                            <td width="3%"> : </td>
                            <td width="67%">'.ucfirst($user->user_unit_organisasi).'</td>
                        </tr>
                        <tr>
                            <td width="5%"> 8. </td>
                            <td width="25%"> Alamat Email Dinas </td>
                            <td width="3%"> : </td>
                            <td width="67%">'.$user->user_email.'</td>
                        </tr>
                    </table>
                </div>
                Dengan ini memberikan rekomendasi kepada :
                <div style=" background-color: #aaa;  border: 1px solid black">
                    <table class="profil">
                        <tr>
                            <td width="5%"> 1. </td>
                            <td width="25%"> Nama Lengkap </td>
                            <td width="3%"> : </td>
                            <td width="67%">'.$user2->user_nama.'</td>
                        </tr>
                        <tr>
                            <td width="5%"> 2. </td>
                            <td width="25%"> NIP </td>
                            <td width="3%"> : </td>
                            <td width="67%">'.$user2->user_nip.'</td>
                        </tr>
                        <tr>
                            <td width="5%"> 3. </td>
                            <td width="25%"> NIK </td>
                            <td width="3%"> : </td>
                            <td width="67%">'.$user2->user_nik.'</td>
                        </tr>
                        <tr>
                            <td width="5%"> 4. </td>
                            <td width="25%"> Pangkat / Golongan </td>
                            <td width="3%"> : </td>
                            <td width="67%">'.ucfirst($user2->user_pangkat).'</td>
                        </tr>
                        <tr>
                            <td width="5%"> 5. </td>
                            <td width="25%"> Jabatan </td>
                            <td width="3%"> : </td>
                            <td width="67%">'.ucfirst($user2->user_jabatan).'</td>
                        </tr>
                        <tr>
                            <td width="5%"> 6. </td>
                            <td width="25%"> Unit Kerja </td>
                            <td width="3%"> : </td>
                            <td width="67%">'.ucfirst($user2->user_unit_kerja).'</td>
                        </tr>
                        <tr>
                            <td width="5%"> 7. </td>
                            <td width="25%"> Instansi </td>
                            <td width="3%"> : </td>
                            <td width="67%">'.ucfirst($user2->user_unit_organisasi).'</td>
                        </tr>
                        <tr style="">
                            <td></td>
                            <td>        Kota</td>
                            <td> : </td>
                            <td>'.$user2->user_kota.'</td>
                        </tr>
                        <tr style="">
                            <td></td>
                            <td>        Provinsi</td>
                            <td> : </td>
                            <td>'.$user2->user_provinsi.'</td>
                        </tr>
                        <tr>
                            <td width="5%"> 8. </td>
                            <td width="25%"> Alamat Email Dinas </td>
                            <td width="3%"> : </td>
                            <td width="67%">'.$user2->user_email.'</td>
                        </tr>
                    </table>
                </div>
                <table class="bawah">
                    <tr class="bawah">
                        <td class="bawah" colspan="4">Untuk melakukan pendaftaran sertifikat elektronik sekaligus menjadi pemegang sertifikat elektronik yang digunakan pada:</td>
                    </tr>
                    <tr class="bawah">
                        <td class="bawah" width="10%"></td>
                        <td class="bawah" width="13%">a. Sistem</td>
                        <td class="bawah" width="5%">:</td>
                        <td class="bawah" width="70%">'.ucfirst($sistem).'</td>
                    </tr>
                    <tr class="bawah">
                        <td class="bawah" width="10%"></td>
                        <td class="bawah" width="13%">b. Kegunaan</td>
                        <td class="bawah" width="5%">:</td>
                        <td class="bawah" width="70%">'.ucfirst($kegunaan).'</td>
                    </tr>
                    <tr class="bawah">
                        <td class="bawah" colspan="4">Demikian surat rekomendasi ini saya buat, agar dapat digunakan sebagaimana mestinya. </td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td width="47%"></td>
                        <td width="20%">
                            Ditanda tangani di 
                        </td>
                        <td width="3%">
                            :
                        </td>
                        <td width="25%">
                            Bandung
                        </td>
                        <td width="5%">
                        </td>
                    </tr>
                    <tr>
                        <td width="47%"></td>
                        <td width="20%">
                            Tanggal 
                        </td>
                        <td width="3%">
                            :
                        </td>
                        <td width="25%">
                            '.date('d F Y').'
                        </td>
                        <td width="5%">
                        </td>
                    </tr>
                    <tr>
                        <td width="47%"></td>
                        <td width="5%"></td>
                        <td width="20%">
                                <div>Hormat saya,</div>  
                        </td>
                    </tr>
                    <tr>
                        <td width="47%"></td>
                        <td width="5%"></td>
                        <td width="20%">  
                        </td>
                    </tr>
                    <tr>
                        <td width="47%"></td>
                        <td width="5%"></td>
                        <td width="20%">  
                        </td>
                    </tr>
                    <tr>
                        <td width="47%"></td>
                        <td width="5%"></td>
                        <td width="20%">  
                        </td>
                    </tr>
                    <tr>
                        <td width="47%"></td>
                        <td width="53%">
                            <b>'.strtoupper($user->user_nama).'</b>  
                        </td>
                    </tr>
                    <tr>
                        <td width="47%"></td>
                        <td width="53%">
                            NIP.'.$user->user_nip.'  
                        </td>
                    </tr>
                </table>
                    
            ';

            $pdf->writeHTML($html, true, false, true, false, '');
            // tentukan nama default
            $defaultname = "Surat_rekomendasiSE".$this->session->userdata('user_id');
            // encrypt nama agar unik
            $filenameencrypt = str_replace(array('=','+','/'),array('-','_','~'),$this->encrypt->encode($defaultname).'');
            ob_clean();
            // simpan ke local drive
            $pdf->Output($_SERVER['DOCUMENT_ROOT']  .'/apps/assets/backend/surat/tipe1/'.$filenameencrypt.'.pdf', 'FI');
            
            // encrypt lagi nama file dengan ekstensinya 
            $encryption = $this->encrypt->encode($filenameencrypt.'.pdf');
            // add to database
            $this->se_model->addSe($encryption,1,$user2->user_id);
            $this->session->set_flashdata('cond','1');
            $this->session->set_flashdata('SE_check','Successfuly Create Surat Elektronik !');
            redirect('Surat_rekomendasi_SE');
            
?>

<!-- <script src="<?= base_url('assets/backend/') ?>vendor/jquery-3.2.1.min.js"></script>
<script>
    $(document).ready(function(){
        var filename = <?= $filenameencrypt.'.pdf' ?>;
        var url = '<?= base_url('Surat_rekomendasi_SE') ?>';
        $.ajax({
            type: 'POST',
            url: "<?= base_url('Surat_rekomendasi_SE/addedSurat') ?>",
            dataType : "JSON",
            data: {'filename':filename},
            success: function(data) {
                window.location.href = url;
            }
        });
        return false;
    });
</script> -->