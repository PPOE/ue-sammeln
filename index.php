<?php

    require_once('misc.php');
    require_once('db.php');

    $q = array_key_exists('q', $_GET) ? $_GET['q'] : "";    

    switch($q)
    {
        case 'showres':
            include('header.html');
            include('showres.php');
            include('footer.html');
        break;
        
        case 'showpdf':
            include('showpdf.php');
        break;
        
        case 'showsign':
            include('showsign.php');
        break;
        
        case 'signres':
            include('signres.php');
        break;
        
        case "ue":
        default:
            include('header.html');
            include('ue.php');
            include('footer.html');
    } 
    
    
    /*
    
    <div class="alert alert-danger" role="alert">
      <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
      <span class="sr-only">Error:</span>
      Unknown Option
    </div>
    
    */
    
?> 
