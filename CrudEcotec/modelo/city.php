<?php
require_once("conexion.php");
Class city
{
	public function obtenerTodo()
	{
		$con=new conexion;
		$resultados=$con->consultar("city");
		$con=null;
		return $resultados;
	}

	public function obtenerCiudadxCod($filtro)
	{
		$con=new conexion;
		$resultados=$con->consultarFiltro("city", $filtro);
		$con=null;
		return $resultados;
	}
	
	public function insertar($datos)
	{
		$con=new conexion;
		$mensaje=$con->insertar("city",$datos);
		$con=null;
		return $mensaje;
	}
	
	public function consultarcity($filtro)
	{
		$con=new conexion;
		$datos=$con->consultarFiltro("city",$filtro);
		$con=null;
		return $datos;
	}
}
?>