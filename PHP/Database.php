 <?php
        include 'INSERT_Forfatter.php'; //viser til "forfatter" tabellen(entiteten)
        include 'INSERT_Artikkel.php'; //viser til "artikler" tabellen(entiteten)
        include 'INSERT_F_AV_A.php'; //viser til "forfatter has artikler" tabellen(entiteten)
    ?>

</p>
<form method="POST"> <!--Utfyllingsskjema på nettsiden-->

<input type="number" name="ForfatterID">
    Forfatter ID
</p>

<input type="text" name="Fornavn">
    Forfatter Fornavn
</p>

<input type="text" name="Etternavn">
    Forfatter Etternavn
</p>

<input type="number" name="ArtikkelID">
    Artikkel ID
</p>

<input type="text" name="Kilde">
    Kilde
</p>

<input type="text" name="Beskrivelse">
    Beskrivelse
</p>

<input type="submit" name="leggtil" value="Legg til"> <!--Knapp for å legge til i tabellene-->
</form>