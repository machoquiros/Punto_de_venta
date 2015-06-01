<?php
include ("Factura.php");
	if ($_POST['BtnCodBarra'])
	{
		
		$conec = pg_connect("host=localhost  dbname=Punto_Venta user=postgres password=abc.123 ") or die("problemas de coneccion " . pg_last_error());

		$query = $query = "SELECT id_producto, cantidad, nombre, marca, empresa, unidad, minimo
						FROM producto;
						WHERE id_producto = '$_POST[TxtCodigoBarra]';";
		$result = pg_query($conec,$query) or die('La consulta fallo: ' . pg_last_error());
		echo $row[0];
		while ($row = pg_fetch_row($result))
		{
			
			echo "<html>"; 
			echo "  <body>"; 
			echo '	<form action = "Factura.php" method = "post" name = "form">'; 
			echo '		<input type="checkbox" name="ChkCodigoBarras" value="Codigo" checked = "true"> Codigo de Barras &nbsp;'; 
			echo '		<input type="textbox" name="TxtCodigoBarra">'; 
			echo '		<button type="submit" name ="BtnCodBarra">Agregar a Factura</button>'; 
			echo '		<br>'; 
			echo '		<br>'; 
			echo '		<textarea name="TxtAreaProductos>
						'.$row[0].'  '.$row[1].'  '.$row[2].'  '.$row[3].'  '.$row[4].'  '.$row[5].'  '.$row[6].'  '.$row[7].'
						</textarea>'; 
			echo '		<br>'; 
			echo '		<br>	'; 
			echo '    </div>'; 
			echo '  </body>'; 
			echo '</html>';

		}
	}

?>
