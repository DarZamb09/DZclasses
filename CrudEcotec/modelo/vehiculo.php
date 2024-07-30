<?php
require_once("conexion.php");
Class vehiculo
{
	public function obtenerTodo()
	{
		$con=new conexion;
		$resultados=$con->consultar("vehiculo");
		$con=null;
		return $resultados;
	}
	
	public function insertar($datos)
	{
		$con=new conexion;
		$mensaje=$con->insertar("vehiculo",$datos);
		$con=null;
		return $mensaje;
	}
	
	public function consultarvehiculo($filtro)
	{
		$con=new conexion;
		$datos=$con->consultarFiltro("vehiculo",$filtro);
		$con=null;
		return $datos;
	}
}
?>