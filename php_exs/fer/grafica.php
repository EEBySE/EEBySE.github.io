<?php
	
	error_reporting(E_ALL & ~E_DEPRECATED);
	include str_replace("\\","/",getcwd())."/utils/graph/libchart/libchart/classes/libchart.php";

	$chart = new HorizontalBarChart(600, 170);

	$link = mysqli_connect("localhost","root","");
	mysqli_select_db($link,"videoteca");

	$result=mysqli_query($link,"SELECT * FROM pelicula");
	
	$dataSet = new XYDataSet(); 
	while($row = mysqli_fetch_array($result))
	{
		$name = $row['titulo'];
		$ranking = $row['ranking'];
		$dataSet->addPoint(new Point("$name", "$ranking"));
	}

	$chart->setDataSet($dataSet);
	$chart->getPlot()->setGraphPadding(new Padding(5, 30, 20, 140));

	$chart->setTitle("Estadísticas de películas");
	$chart_location = str_replace("\\","/",getcwd())."/media/graphs/movie_stats.png";
	$chart->render($chart_location);
?>
<html>
<head>
	<title>Libchart horizontal bars demonstration</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
</head>
<body>
	<img alt="Horizontal bars chart"  src="./media/graphs/movie_stats.png" style="border: 1px solid gray;"/>
</body>
</html>
