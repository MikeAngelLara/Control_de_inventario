<?php	
 
	include_once("config.php");
	$mihtml = '<table border=0';	
	$mihtml .= '<thead>';
	$mihtml .= '<tr>';
	$mihtml .= '<th>ID</th>';
	$mihtml .= '<th>Categoria</th>';
	$mihtml .= '<th>Nombre</th>';
	$mihtml .= '<th>Ud</th>';
	$mihtml .= '<th>Existencia</th>';
	$mihtml .= '</tr>';
	$mihtml .= '</thead>';
	$mihtml .= '<tbody>';
	
	$resultado_transacciones = "SELECT * FROM articulos_lagunetica	";
	$resultado_transacciones = mysqli_query($conectar, $resultado_transacciones);
	while($transacciones = mysqli_fetch_assoc($resultado_transacciones)){
		$mihtml .= '<tr><td>'.$transacciones['id'] . "</td>";
		$mihtml .= '<td>'.$transacciones['categoria'] . "</td>";
		$mihtml .= '<td>'.$transacciones['nombre'] . "</td>";
		$mihtml .= '<td>'.$transacciones['ud'] . "</td>";
		$mihtml .= '<td>'.$transacciones['existencia'] . "</td>";
	}
	
	$mihtml .= '</tbody>';
	$mihtml .= '</table';

	
	//referencia
	use Dompdf\Dompdf;

	// incluye autoloader
	require_once("dompdf/autoload.inc.php");

	//Creando instancia para generar PDF
	$dompdf = new DOMPDF();
	
	// Cargar el HTML
	$dompdf->load_html('<h1 style="text-align: center;">Artículos de Lagunetica</h1>'. $mihtml .'
		');

	//Renderizar o html
	$dompdf->render();

	//Exibibir nombre de archivo
	$dompdf->stream(
		"Artículos de Lagunetica", 
		array(
			"Attachment" => false //Para realizar la descarga
		)
	);
?>