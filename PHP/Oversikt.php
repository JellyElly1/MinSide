<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../CSS/mystyle2.css">
    <title>Ellinors side</title>
</head>

<body>
        <div class="main">
            <div class="header">
                <div class="button">
                   <a href="../index.php">Mine databasekilder</a>
                   </div>
            </div>
</body>

  
<div class="main-window">
<h2>Mine databasekilder</h2>
<?php
  include 'database.php'; //viser til database.php, som her gjør at man kan fylle inn data i en form
  include 'SELECT_Oversikt1.php'; //viser til select_oversikt som viser dataen som er fylt inn
  ?>

</div>
</body>
</html>