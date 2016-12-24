<?php

require_once('fpdf/fpdf.php');
require_once('fpdi/fpdi.php');
    
function pdf_from_id($id)
{
    $data = get_arrangement($id);
    
    $sign = in_array($data['type'], array('mobilebku', 'onlinebku', 'bku'));
    
    if($sign && check_status($id))
    {
        return get_pdf($id);
    }
    else
    {
        if($data != NULL)
        {    
            // ToDo: HardCoded                    
            $districts = array("",
            "I. Innere Stadt",
            "II. St. Leonhard",
            "III. Geidorf",
            "IV. Lend",
            "V. Gries",
            "VI. Jakomini",
            "VII. Liebenau",
            "VIII. St. Peter",
            "IX. Waltendorf",
            "X. Ries",
            "XI. Mariatrost",
            "XII. Andritz",
            "XIII. Gösting",
            "XIV. Eggenberg",
            "XV. Wetzelsdorf",
            "XVI. Straßgang",
            "XVII. Puntigam");

            if($sign) $source = "ue_online.pdf";
            else      $source = "ue_print.pdf";
            
            return create_pdf($data['name'], $data['birthdate'], $data['address'], $districts[$data['district']], $source);
        }
        else
        {
            return NULL;
        }
    }
}
    
function create_pdf($name, $birthdate, $address, $district, $source)
{

    // initiate FPDI
    $pdf = new FPDI();
    // add a page
    $pdf->AddPage();
    // set the source file
    $pdf->setSourceFile($source);
    // import page 1
    $tplIdx = $pdf->importPage(1, '/MediaBox');
    //use the imported page and place it at point 0,0; calculate width and height
    //automaticallay and ajust the page size to the size of the imported page 
    $pdf->useTemplate($tplIdx, 0, 0, 0, 0, true); 

    // now write some text above the imported page
    $pdf->SetFont('Arial');
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFontSize(12);

    $pdf->SetXY(78, 99.5);
    $pdf->Write(0, utf8_decode($district));

    $pdf->SetXY(78, 122);
    $pdf->Write(0, utf8_decode($name));

    $pdf->SetXY(78, 139);
    $pdf->Write(0, $birthdate);

    $pdf->SetXY(78, 150);
    $pdf->Write(0, utf8_decode($address));

    return $pdf->Output('S');
}

?>