
UE Sammel Tool

23.12.2016 - Peter Postmann 

Ermöglich das Ausfüllen von Unterstützungserklärungen sowie digitales signieren.


index.php routet die Request

start.php zeigt das initale front end

Nach dem ausfüllen und absenden der Daten wir ein Arrangement gespeichert: Alle Daten die eingegeben wurden bekommen eine uuid zugeordnet.

Mittels dieser uuid wird aus dem PDF Template ein custom-pdf generiert. Dieser werden nicht gespeichert. 

Im Falle der e-signatur wird dieses pdf and den bürgerkarten server geschickt. dieser bietet die Möglichkeit zwei Rücksprungadressen (ok oder fehler) anzugeben. 

Beim Callback übergibt dieser den Link auf das signierte pdf. Diese werden gespeichert.

Derzeit wird direkt auf die eSignaturseite weitergeleitet. Es ginge zwar auch, dass in einem iFrame oder Popup zu machen, die derzeitige Lösung kommt aber ohne JS aus.

Zusätzlich wird im Arrangement eine E-Mail adresse (sofertn angegeben) und die Einwilligung zur Kontaktaufnahme erfasst.

ToDos:
- Viele Codeteile sind seher windig programmiert
- Derzeit läuft alles ohne Datenbank
- Admin UI 
- Double Opt-In für E-Mail
- Anbindung Drittsystem für postversand von UEs

