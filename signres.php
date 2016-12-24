<?php

/*
index.php?q=signres&res=ok&
pdfurl=https%253A%252F%252Fwww.buergerkarte.at%252Fpdf-as-extern-4%252FPDFData%253Bjsessionid%253D2EFF542F48B13691AF1BC1899BD95ED3
&pdflength=50012

https://localhost/xampp/pirat/pdf/index.php?q=signres&res=ok&pdfurl=https%253A%252F%252Fwww.buergerkarte.at%252Fpdf-as-extern-4%252FPDFData%253Bjsessionid%253D2EFF542F48B13691AF1BC1899BD95ED3&pdflength=50012

*/
if(array_key_exists('res', $_GET))
{
    $success = ($_GET['res'] == 'ok');
    
    if($success)
    {
        if(array_key_exists('pdfurl', $_GET))
        {
            $url = urldecode($_GET['pdfurl']);
            
            if(filter_var($url, FILTER_VALIDATE_URL))
            {            
                $pdf = file_get_contents($url);
                
                if($pdf != NULL)
                {
                    if(array_key_exists('id', $_GET) && validateGUID($_GET['id']))
                    {
                        $id = $_GET['id'];                       
                        save_pdf($id, $pdf);
                        
                        header('Location: ?q=showres&id='.$id);
                    }
                }
                else
                {
                    echo "Error";
                }
            }
        }
    }
    else
    {
        echo "Error";
    }
}
?>
