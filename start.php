<form action="?q=ue" method="post" class="form-horizontal" id="data-form">
<fieldset>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">Name</label>  
  <div class="col-md-4">
  <input id="name" name="name" type="text" placeholder="Vorname Nachname" class="form-control input-md" required="" value="<?php echo $data['name']; ?>">
  <span class="help-block">Familienname oder Nachname und Vorname der Unterstützerin/ des Unterstützers</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="birthdate">Geburtsdatum</label>  
  <div class="col-md-4">
  <input id="birthdate" name="birthdate" type="text" placeholder="dd.mm.yyyy" class="form-control input-md" required="" value="<?php echo $data['birthdate']; ?>">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="address">Wohnadresse</label>  
  <div class="col-md-4">
  <input id="address" name="address" type="text" placeholder="Straße Hausnummer, PLZ Ort" class="form-control input-md" required="" value="<?php echo $data['address']; ?>">
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="district">Bezirk</label>
  <div class="col-md-4">
    <select id="district" name="district" class="form-control" required="" <?php if($data['disabled']) echo "disabled"; ?>>
        <option value="" disabled <?php if($data['district'] == 0) echo "selected" ?>></option>
        
        <?php
        
            $districts = array(
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
                
            foreach($districts as $num => $name)
            {                        
                echo '<option value="'.($num + 1).'" '.($data['district'] == ($num + 1) ? "selected" : "").'>'.$name.'</option>'."\n";
            }
        
        ?>
    </select>
  </div>
</div>

<!-- Multiple Checkboxes (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="updates">Auch bei der nächsten Wahl unterstützen</label>
  <div class="col-md-4">
    <label class="checkbox-inline" for="updates-0">
      <input type="checkbox" name="updates" id="updates-0" value="1" <?php if($data['updates']) echo "checked"; ?>>
      Ja, ich möchte Benachrichtigt werden, wenn die Piraten wieder Unterstützungserklärungen sammeln
    </label>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">E-Mail</label>  
  <div class="col-md-4">
  <input id="email" name="email" type="text" placeholder="info@piratenpartei.at" class="form-control input-md" value="<?php echo $data['email']; ?>">
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit">Sofort online Unterschreiben</label>
  <div class="col-md-4">
  
    <?php if($data['step'] > 0) { ?>          
    <?php } else { ?>
    <button id="submit" name="mobilebku" class="btn btn-primary">Handy Signatur</button>
    <button id="submit" name="bku" class="btn btn-primary">Mit Bürgerkarte (Lokal)</button>
    <button id="submit" name="onlinebku" class="btn btn-primary">Mit Bürgerkarte (Online)</button>
    <?php } ?>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="button1id">Offline unterschreiben</label>
  <div class="col-md-8">
    <button id="submit" name="print" class="btn btn-inverse">Drucken / Downloaden</button>
    <button id="submit" name="reverse" class="btn btn-inverse">Per Post inkl. Rückkuvert senden lassen</button>
  </div>
</div>
  
</fieldset>
</form>