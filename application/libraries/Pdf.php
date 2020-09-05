<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';
class Pdf extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }

    // public function Header() {
    //     // Logo
    //     $image_file = base_url('assets/backend/images/').'bg.png';
    //     $this->Image($image_file, 0, 0, 1800, 900 , 'PNG', '', 'T', false, 300, '', false, false, 0, 'L', false, false);
    // }
    // Page footer
    // public function Footer() {
    //     // Position at 15 mm from bottom
    //     $this->SetY(-15);
    //     // Logo
    //     $image_file = base_url('assets/backend/images/').'footerSE.png';
    //     $this->Image($image_file, 10, 10, 220, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
    // }
}
/* End of file Pdf.php */
/* Location: ./application/libraries/Pdf.php */