
<?php

    if(array_key_exists('id', $_GET) && validateGUID($_GET['id']))
    {
        $id   = $_GET['id'];
        $data = get_arrangement($id);
?>

<div>
<p>Danke für deine Unterstützung!</p>

<br />
<?php

    switch($data['type'])
    {
        case 'reverse':    
            echo "<p>Deine Unterstützungserklärung ist auf dem Weg und sollte dich in den nächsten Tagen erreichen. Bitte schick sie uns so schnell wie möglich unterschrieben zurück.</p>";
            break;
            
        case 'print':        
            echo "<p>Bitte schick uns deine Unterstützungserklärung so schnell wie möglich unterschrieben zurück oder bringe sie persönlich vorbei.</p>";
            break;

        case 'mobilebku':  
        case 'onlinebku':  
        case 'bku':  
            echo "<p>Wir haben die digital signierte Unterstützungserklärung vom Bürgerkarten-Server erhalten.</p>";
            break;
            
        case '':
            include('start.php');
            break;
            
        default:
            echo "Not yet implemented";
    }
    
?>
<br />

<p>Hier kannst du deine Unterstützungserklärung downloaden:</p>
<p><a href="?q=showpdf&id=<?php echo $id; ?>"><?php echo $id; ?>.pdf</a></p>
</div>

<?php
    }
    else
    {
        echo "Error";
    }

?>