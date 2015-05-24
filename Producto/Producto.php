<?php
if ($_POST['insertar'])
{
$conec = pg_connect("host=localhost  dbname=Punto_Venta user=postgres password=ECCIpsql2015 ") or die("problemas de coneccion " . pg_last_error());

$query = "INSERT INTO producto(id_producto,nombre,marca,unidad,cantidad,minimo,empresa) 
Values ('$_POST[id]' ,'$_POST[nombre]' ,'$_POST[marca]' ,'$_POST[unidad]' ,'$_POST[cantidad]' ,'$_POST[minimo]','1')";
pg_query($conec,$query) or die('La consulta fallo: ' . pg_last_error());

echo "Producto Agregado";
header('Location: http://localhost/Punto_de_Venta/Producto/Producto.html');
}
if ($_POST['modificar'])
{
	
	$conec = pg_connect("host=localhost  dbname=Punto_Venta user=postgres password=ECCIpsql2015 ") or die("problemas de coneccion " . pg_last_error());

$query = $query = "UPDATE producto SET nombre = '$_POST[nombre]' , marca = '$_POST[marca]' , unidad = '$_POST[unidad]' , cantidad = '$_POST[cantidad]' ,
minimo = '$_POST[minimo]'
WHERE id_producto = '$_POST[id]'";
pg_query($conec,$query) or die('La consulta fallo: ' . pg_last_error());

echo "Producto Modificado";
header('Location: http://localhost/Punto_de_Venta/Producto/Producto.html');
}

if ($_POST['buscar'])
{
	
	$conec = pg_connect("host=localhost  dbname=Punto_Venta user=postgres password=ECCIpsql2015 ") or die("problemas de coneccion " . pg_last_error());

$query = $query = "SELECT id_producto, cantidad, nombre, marca, unidad, minimo
					FROM producto
					WHERE id_producto = '$_POST[id]'";
$result = pg_query($conec,$query) or die('La consulta fallo: ' . pg_last_error());

	while ($row = pg_fetch_row($result))
	{
		echo "<html>";
			echo "	<body>";

			echo '<form action = "Producto.php" method = "post" name = "form">';
			echo 'Id:   <input type = "text" name = "id" value = '.$row[0].'>';
			echo '<input type = "submit" name = "buscar" value = "Buscar Producto"></br>';
			echo 'Nombre:   <input type = "text" name = "nombre" value = '.$row[2].'></br>';
			echo 'Marca:    <input type = "text" name = "marca" value = '.$row[3].'></br>';
			echo 'Unidad:  <input type = "text" name = "unidad" value = '.$row[4].'></br>';
			echo 'Cantidad: <input type = "text" name = "cantidad"value = '.$row[1].'></br>';
			echo 'Minimo:   <input type = "text" name = "minimo" value = '.$row[5].'></br>';
			echo '<input type = "submit" name = "insertar" value = "Insertar Producto">';
			echo '<input type = "submit" name = "modificar" value = "Modificar Producto">';
			echo '</form>';
		echo '</body>';
		echo '</html>';
	}
}



?>