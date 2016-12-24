<?php

define('MULTIPART_BOUNDARY', '--------------------------'.microtime(true));
define('FORM_FIELD', 'file'); 

require_once('pdf.php');

if(array_key_exists('id', $_GET) && validateGUID($_GET['id']))
{
    $id  = $_GET['id'];
    $data = get_arrangement($id);
    $pdf  = pdf_from_id($id);
    
    
    if($pdf != NULL)
    {         
        $url = 'https://www.buergerkarte.at/pdf-as/uploadPos';

        $data = array(
            'SIG_P' => '1', 
            'SIG_X' => '185', 
            'SIG_Y' => '380', 
            'connector' => $data['type']
            );

        $filename = $id.'.pdf';
        $file_contents = $pdf;    

        $content = "";

        $content .= "--".MULTIPART_BOUNDARY."\r\n".
                    "Content-Disposition: form-data; name=\"SIG_P\"\r\n\r\n".
                    $data['SIG_P']."\r\n";
                    
        $content .= "--".MULTIPART_BOUNDARY."\r\n".
                    "Content-Disposition: form-data; name=\"SIG_X\"\r\n\r\n".
                    $data['SIG_X']."\r\n";
                    
        $content .= "--".MULTIPART_BOUNDARY."\r\n".
                    "Content-Disposition: form-data; name=\"SIG_Y\"\r\n\r\n".
                    $data['SIG_Y']."\r\n";

        $content .=  "--".MULTIPART_BOUNDARY."\r\n".
                    "Content-Disposition: form-data; name=\"".FORM_FIELD."\"; filename=\"".basename($filename)."\"\r\n".
                    "Content-Type: application/octet-stream\r\n\r\n".
                    $file_contents."\r\n";

        $content .= "--".MULTIPART_BOUNDARY."\r\n".
                    "Content-Disposition: form-data; name=\"connector\"\r\n\r\n".
                    $data['connector']."\r\n";
                    
        // add some POST fields to the request too: $_POST['foo'] = 'bar'

        // signal end of request (note the trailing "--")
        $content .= "--".MULTIPART_BOUNDARY."--\r\n";
            
        // use key 'http' even if you send the request to https://...
        $options = array(
            'http' => array(
                'header'  => "Content-Type: multipart/form-data; boundary=".MULTIPART_BOUNDARY."\r\n",
                'method'  => 'POST',
                'content' => $content,
                'follow_location' => false
            )
        );

        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        if ($result === FALSE) 
        {
            echo "Error";
        }
        else
        {
            $str = $http_response_header[4];
            $pfx = "Location: ";
            
            if(strpos($str, $pfx) === 0)
            {
                
                // Todo: Pray that this part keeps working.
                
                $url = parse_url(substr($str, strlen($pfx)));     
                
                parse_str($url['query'], $query);
                
                
                $target = (isset($_SERVER['HTTPS']) ? 'https' : 'http' )."://".$_SERVER['HTTP_HOST'].$_SERVER["PHP_SELF"].'?q=signres&id='.$id.'&res=';
                
                $query['invoke-app-error-url'] = $target.'err';
                $query['invoke-app-url']       = $target.'ok';
                
                $url['query'] = http_build_query($query);
                
                $new_url = $url['scheme'].'://'.$url['host'].$url['path'].'?'.$url['query'];
                
                header('Location: '.$new_url);
            }
            else
            {
                echo "Error";
            }
        }
    }
    else
    {
        echo "Error";
    }
}

?>