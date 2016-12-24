<?php

    require_once('pdf.php');
    
    if(array_key_exists('id', $_GET) && validateGUID($_GET['id']))
    {
        $id = $_GET['id'];
        
        $pdf = pdf_from_id($id);
        
        if($pdf != NULL)
        {         
            header("Content-type: application/pdf");
            header("Content-Disposition: inline; filename=".$id.".pdf");                           
            echo $pdf;
        }
        else
        {
            echo "Error";
        }
    }
?>
