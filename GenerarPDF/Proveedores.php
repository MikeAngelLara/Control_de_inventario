<?php	
 
	include_once("config.php");
	$mihtml = '<table border=0';	
	$mihtml .= '<thead>';
	$mihtml .= '<tr>';
	$mihtml .= '<th>ID</th>';
	$mihtml .= '<th>Nombre</th>';
	$mihtml .= '<th>RIF</th>';
	$mihtml .= '<th>Dirección</th>';
	$mihtml .= '<th>Telefonos</th>';
	$mihtml .= '</tr>';
	$mihtml .= '</thead>';
	$mihtml .= '<tbody>';
	
	$resultado_transacciones = "SELECT * FROM proveedores";
	$resultado_transacciones = mysqli_query($conectar, $resultado_transacciones);
	while($transacciones = mysqli_fetch_assoc($resultado_transacciones)){
		$mihtml .= '<tr><td>'.$transacciones['id'] . "</td>";
		$mihtml .= '<td>'.$transacciones['nombre'] . "</td>";
		$mihtml .= '<td>'.$transacciones['rif'] . "</td>";
		$mihtml .= '<td>'.$transacciones['direccion'] . "</td>";
		$mihtml .= '<td>'.$transacciones['telefonos'] . "</td>";
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
	$dompdf->load_html('<h1 style="text-align: center;">Proveedores</h1>'. $mihtml .'
		');

	//Renderizar o html
	$dompdf->render();

	//Exibibir nombre de archivo
	$dompdf->stream(
		"Proveedores", 
		array(
			"Attachment" => false //Para realizar la descarga
		)
	);
?>