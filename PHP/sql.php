<?php
 
$dataPoints = array();
//Best practice is to create a separate file for handling connection to database
try{
     // Creating a new connection.
    // Replace your-hostname, your-db, your-username, your-password according to your database
 $link = new PDO(   'mysql:host=109.106.246.51;dbname=u580154432_kyoto;charset=utf8mb4', //'mysql:host=localhost;dbname=canvasjs_db;charset=utf8mb4',
                        'u580154432_kyoto', //'root',
                        'Kyoto2021', //'',
                        array(
                            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            PDO::ATTR_PERSISTENT => false
                        )
                    );
	
    $handle = $link->prepare('select hour(Dato) + minute(Dato)/60 as x, max(Temperatur) as y from Vaer where minute(dato) in (0,30) and date(Dato) = current_date group by x'); 
    $handle->execute(); 
    $result = $handle->fetchAll(PDO::FETCH_OBJ);
		
    foreach($result as $row){
        array_push($dataPoints, array("x"=> $row->x, "y"=> $row->y));
    }
	$link = null;
}
catch(PDOException $ex){
    print($ex->getMessage());
}
	
?>
<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Temperatur inne i dag"
	},
        axisY: {
		title: "Temperatur",
		valueFormatString: "#0",
		suffix: " C"
	},
axisX: {
                title: "Time",
                valueFormatString: "00",
                suffix: "",
interval: 1
        },

	data: [{
		type: "spline", //change type to bar, line, area, pie, etc  
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>   