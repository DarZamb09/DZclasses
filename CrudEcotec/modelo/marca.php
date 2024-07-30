<?php
require_once("conexion.php");
Class marca
{
	public function obtenerTodo()
	{
		$con=new conexion;
		$resultados=$con->consultar("marca");
		$con=null;
		return $resultados;
	}
	
	public function insertar($datos)
	{
		$con=new conexion;
		$mensaje=$con->insertar("marca",$datos);
		$con=null;
		return $mensaje;
	}
	
	public function consultarmarca($filtro)
	{
		$con=new conexion;
		$datos=$con->consultarFiltro("marca",$filtro);
		$con=null;
		return $datos;
	}
}
?>