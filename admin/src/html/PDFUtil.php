<?php
/**
 * Created by PhpStorm.
 * User: soaint
 * Date: 04/09/2015
 * Time: 01:58 PM
 */

class PDFUtil {

    public function saveByURL($url,$file,$rute){
        $pdf_options = array(
            "source_type" => 'url',
            "source" => $url,
            "ssl" => 'yes',
            "file_name" => $file.".pdf",
            "save_directory" => $rute,
            "action" => 'save');

        phptopdf($pdf_options);
    }

    public function saveByHTML($html,$file,$rute){
        $pdf_options = array(
            "source_type" => 'html',
            "source" => $html,
            "ssl" => 'yes',
            "file_name" => $file.".pdf",
            "save_directory" => $rute,
            "action" => 'save');

        phptopdf($pdf_options);
    }

} 