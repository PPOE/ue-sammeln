
UE Sammel Tool

23.12.2016 - Peter Postmann 

Erm�glich das Ausf�llen von Unterst�tzungserkl�rungen sowie digitales signieren.


index.php routet die Request

start.php zeigt das initale front end

Nach dem ausf�llen und absenden der Daten wir ein Arrangement gespeichert: Alle Daten die eingegeben wurden bekommen eine uuid zugeordnet.

Mittels dieser uuid wird aus dem PDF Template ein custom-pdf generiert. Dieser werden nicht gespeichert. 

Im Falle der e-signatur wird dieses pdf and den b�rgerkarten server geschickt. dieser bietet die M�glichkeit zwei R�cksprungadressen (ok oder fehler) anzugeben. 

Beim Callback �bergibt dieser den Link auf das signierte pdf. Diese werden gespeichert.

Derzeit wird direkt auf die eSignaturseite weitergeleitet. Es ginge zwar auch, dass in einem iFrame oder Popup zu machen, die derzeitige L�sung kommt aber ohne JS aus.

Zus�tzlich wird im Arrangement eine E-Mail adresse (sofertn angegeben) und die Einwilligung zur Kontaktaufnahme erfasst.

ToDos:
- Viele Codeteile sind seher windig programmiert
- Derzeit l�uft alles ohne Datenbank
- Admin UI 
- Double Opt-In f�r E-Mail
- Anbindung Drittsystem f�r postversand von UEs

