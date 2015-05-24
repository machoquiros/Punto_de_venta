<?php
if (isset($_POST['nombre']) && !empty($_POST['nombre']))
{
$conec = pg_connect("host=localhost  dbname=Punto_Venta user=postgres password=admin ") or die("problemas de coneccion " . pg_last_error());

$query = "INSERT INTO producto(nombre,marca,unidad,cantidad,minimo,empresa) Values ('$_POST[nombre]' ,'$_POST[marca]' ,'$_POST[unidad]' ,'$_POST[cantidad]' ,'$_POST[minimo]','1')";
pg_query($conec,$query) or die('La consulta fallo: ' . pg_last_error());


echo"Exito";
}
else
{
echo"error";
}
?>