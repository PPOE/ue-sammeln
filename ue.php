<?php

    $data = array(
        
        'step'      => array_key_exists('step', $_POST) && is_numeric($_POST['step']) ? $_POST['step'] : 0,
        'name'      => array_key_exists('name', $_POST)      ? htmlspecialchars($_POST['name'])      : "",
        'birthdate' => array_key_exists('birthdate', $_POST) ? htmlspecialchars($_POST['birthdate']) : "",
        'address'   => array_key_exists('address', $_POST)   ? htmlspecialchars($_POST['address'])   : "",
        'district'  => array_key_exists('district', $_POST) && is_numeric($_POST['district']) ? $_POST['district'] : 0,
        'updates'   => array_key_exists('updates', $_POST)  && is_numeric($_POST['updates'])  ? $_POST['updates']  : 0,
        'email'     => array_key_exists('email', $_POST)     ? htmlspecialchars($_POST['email'])     : ""    
        
    );        
    
    
    if(array_key_exists('mobilebku', $_POST))       $data['type'] = "mobilebku";        
    else if(array_key_exists('onlinebku', $_POST))  $data['type'] = "onlinebku";  
    else if(array_key_exists('bku', $_POST))        $data['type'] = "bku";      
    else if(array_key_exists('reverse', $_POST))    $data['type'] = "reverse";         
    else if(array_key_exists('print', $_POST))      $data['type'] = "print"; 
    else                                            $data['type'] = "";    
    
    if($data['type'])
    {
        $id = put_arrangement($data);
    }
        
    switch($data['type'])
    {
        case 'reverse':    
        case 'print':        
                header('Location: ?q=showres&id='.$id);
            break;

        case 'mobilebku':  
        case 'onlinebku':  
        case 'bku':  
                header('Location: ?q=showsign&id='.$id);
            break;
            
        case '':
            include('start.php');
            break;
            
        default:
            echo "Not yet implemented";
    }
    
?>
