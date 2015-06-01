<html>
  <head>
    <title>Factura</title>

  </head>
  <body>
	<form action = "FacturaBD.php" method = "post" name = "form">
		<input type="checkbox" name="ChkCodigoBarras" value="Codigo" checked = "true"> Codigo de Barras &nbsp;
		<input type="textbox" name="TxtCodigoBarra">
		<button type="submit" name ="BtnCodBarra">Agregar a Factura</button>
		<br>
		<br>
		<textarea name="TxtAreaProductos">
			<?php
			$conec = pg_connect("host=localhost  dbname=Punto_Venta user=postgres password=abc.123 ") or die("problemas de coneccion " . pg_last_error());
			$query = $query = "SELECT id_producto, cantidad, nombre, marca, empresa, unidad, minimo
								FROM producto
								WHERE id_producto = '$_POST[TxtCodigoBarra]';";
			
			$result = pg_query($conec,$query) or die('La consulta fallo: ' . pg_last_error());
			while ($row = pg_fetch_row($result))
			{
			?>
				<?php echo $row[0]; ?>
				<?php echo $row[1]; ?>
				<?php echo $row[2]; ?>
				<?php echo $row[3]; ?>
				<?php echo $row[4]; ?>
				<?php echo $row[5]; ?>
				<?php echo $row[6]; ?>
			<?php
			}
			?>
		</textarea>
		<br>
		<br>
		
		<label>SubTotal: </label>
		<input type="textbox" name="TxtSubTotal"> suma todos los precios que ha agregado a la factura 
		<br>
		
		<label>IVA: </label>
		<input type="textbox" name="TxtInpuesto" value = "13%" enabled = "false">
		<br>
		
		<label>Descuento: </label>
		<input type="textbox" name="TxtDescuento">
		<br>
		
		<label>Total: </label>
		<input type="textbox" name="TxtTotal">
		<br>
		
		<label>Fecha: </label>
		<input type="textbox" name="TxtFecha">
		<br>
		
		<button type="submit" name ="BtnImprimir">Efectuar Pago</button> //Consulto datos de la empresa, usuario e imprimo lo que se compro
    </div>
  </body>
</html>