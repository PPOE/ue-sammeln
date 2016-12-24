<?php

    function put_arrangement($data)
    {
        $string = serialize($data);
        
        $id = GUID();
        $fn = 'data/'.$id;
        $fh = fopen($fn, 'w');
        fwrite($fh, $string);
        fclose($fh);
        
        return $id;
    }
    
    function get_arrangement($id)
    {        
        $fn = 'data/'.$id;
        
        if(!file_exists($fn))
        {
            return NULL;
        }
        else
        {
            $str  = file_get_contents($fn);
            $data = unserialize($str);
            
            return $data;
        }
    }
    
    function save_pdf($id, $string)
    {
        $fn = 'data/pdf/'.$id.'.pdf';
        $fh = fopen($fn, 'w');
        fwrite($fh, $string);
        fclose($fh);
    }
    
    function check_status($id)
    {
        return file_exists('data/pdf/'.$id.'.pdf');
    }
    
    function get_pdf($id)
    {
        return file_get_contents('data/pdf/'.$id.'.pdf');
    }
    
?>
