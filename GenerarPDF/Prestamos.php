<?php	
 
	include_once("config.php");
	$mihtml = '<table border=0';	
	$mihtml .= '<thead>';
	$mihtml .= '<tr>';
	$mihtml .= '<th>ID</th>';
	$mihtml .= '<th>Nombre</th>';
	$mihtml .= '<th>Herramienta</th>';
	$mihtml .= '<th>Estado</th>';
	$mihtml .= '<th>Ubicación</th>';
    $mihtml .= '<th>Devuelto</th>';
	$mihtml .= '<th>Observaciones</th>';
	$mihtml .= '<th>Fecha</th>';
	$mihtml .= '</tr>';
	$mihtml .= '</thead>';
	$mihtml .= '<tbody>';
	
	$resultado_transacciones = "SELECT * FROM prestamos";
	$resultado_transacciones = mysqli_query($conectar, $resultado_transacciones);
	while($transacciones = mysqli_fetch_assoc($resultado_transacciones)){
		$mihtml .= '<tr><td>'.$transacciones['id'] . "</td>";
		$mihtml .= '<td>'.$transacciones['nombre'] . "</td>";
		$mihtml .= '<td>'.$transacciones['herramienta'] . "</td>";
		$mihtml .= '<td>'.$transacciones['estado'] . "</td>";
		$mihtml .= '<td>'.$transacciones['ubicacion'] . "</td>";
        $mihtml .= '<td>'.$transacciones['devuelto'] . "</td>";
		$mihtml .= '<td>'.$transacciones['observaciones'] . "</td>";
		$mihtml .= '<td>'.$transacciones['fecha'] . "</td>";
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
	$dompdf->load_html('<h1 style="text-align: center;">Préstamos</h1>'. $mihtml .'
		');

	//Renderizar o html
	$dompdf->render();

	//Exibibir nombre de archivo
	$dompdf->stream(
		"Préstamos", 
		array(
			"Attachment" => false //Para realizar la descarga
		)
	);
?>