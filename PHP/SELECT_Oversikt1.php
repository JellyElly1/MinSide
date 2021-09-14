<?php
 // Tilkoblingsinformasjon
 $tjener = "localhost";
 $brukernavn = "root";
 $passord = "root";
 $database = "kilder";
 // Opprette en kobling
 $kobling = new mysqli($tjener, $brukernavn, $passord, $database);
 // Sjekk om koblingen virker
 // if ($kobling->connect_error) {
 // die("Noe gikk galt: " . $kobling->connect_error);
// }
// else {
 // echo "Koblingen virker"; }

 //Angi UTF-8 som tegnsett
 $kobling->set_charset("utf8");
$sql = "SELECT K.ForfatterID, K.Fornavn, K.Etternavn, B.Kilde, B.ArtikkelID,
B.Beskrivelse, P.Dato
FROM Kilder.Forfatter K, Kilder.Artikler B, Kilder.forfatter_has_artikler P
WHERE K.ForfatterID=P.F_ForfatterID
AND B.ArtikkelID=P.A_ArtikkelID
ORDER BY B.Beskrivelse, B.ArtikkelID, K.Etternavn, P.Dato";
$resultat = $kobling->query($sql);
echo "<table>"; // Starter tabellen
echo "<tr>"; // Lager en rad med overskrifter
 echo "<th>Beskrivelse</th>";
 echo "<th>Kilde</th>";
 echo "<th>Fornavn</th>";
 echo "<th>Etternavn</th>";
 echo "<th>Dato</th>";
 echo "<th>Forfatter ID</th>";
 echo "<th>Artikkel ID</th>";


echo "</tr>";
while($rad = $resultat->fetch_assoc()) {
 $Dato= $rad["Dato"];
 $FID = $rad["ForfatterID"];
 $FF = $rad["Fornavn"];
 $FE = $rad["Etternavn"];
 $AID = $rad["ArtikkelID"];
 $Kilde = $rad["Kilde"];
 $Beskrivelse = $rad["Beskrivelse"];

 echo "<tr>";
 echo "<td>$Beskrivelse</td>";
 echo "<td>$Kilde</td>";
 echo "<td>$FF</td>";
 echo "<td>$FE</td>";
 echo "<td>$Dato</td>";
 echo "<td>$AID</td>";
 echo "<td>$FID</td>";

 echo "</tr>";
}
echo "</table>"; // Avslutter tabellen
?>