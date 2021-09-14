<?php
if(isset($_POST["leggtil"]))
{

    // Tilkoblingsinformasjon
    $tjener = "localhost";
    $brukernavn = "root";
    $passord = "root";
    $database = "Kilder";

        // Opprette en kobling
        $kobling = new mysqli($tjener, $brukernavn, $passord, $database);

    // Sjekk om koblingen virker
    if ($kobling->connect_error) {
    die ("Noe gikk galt: " . $kobling->connect_error);
    }

    // Angi UTF-8 som tegnsett
    $kobling->set_charset ("utf8");

    // Lagrer skjemafeltene i enklere navn

    $FID = $_POST["ForfatterID"];
    $FF = $_POST["Fornavn"];
    $FE = $_POST["Etternavn"];


    $sql = "INSERT INTO Forfatter (ForfatterID, Fornavn, Etternavn)
    VALUES ('$FID', '$FF', '$FE')";


    if($kobling->query($sql)) {
        echo "Spørringen $sql ble gjennomført.";
    } else {
        echo "Noe gikk galt med spørringen $sql ($kobling->error).";
    }
}
?>