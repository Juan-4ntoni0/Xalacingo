<?php
require("Pconexion.php");
$estilo =mysqli_real_escape_string($conexion, $_POST["txtEstilo"]);
$marca = mysqli_real_escape_string($conexion, $_POST["txtMarca"]);
$descripcion =mysqli_real_escape_string($conexion,  $_POST["txtDescripcion"]);
$codigo = mysqli_real_escape_string($conexion, $_POST["txtCodigo"]);
$diseñador = mysqli_real_escape_string($conexion, $_POST["txtDiseñador"]);
$cantidad_Prenda = mysqli_real_escape_string($conexion, $_POST["txtCantidad"]);
$fecha = mysqli_real_escape_string($conexion, $_POST["txtFecha"]);
$sql="INSERT INTO pedido(estilo,marca,descripcion,codigo,diseñador,cantidades_Prenda,fecha)
             VALUES('$estilo','$marca','$descripcion','$codigo','$diseñador','$cantidad_Prenda','$fecha')";
$result = mysqli_query($conexion, $sql);
if (!$result) {
    die('Error: ' . mysqli_error($conexion));
 }
 else{
    echo "<script>alert('Datos Registrados');window.location.href=\"pedidos.php\"</script>";
 }
 mysqli_close($conexion);
?>