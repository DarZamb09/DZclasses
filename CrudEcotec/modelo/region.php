<?php
require_once("conexion.php");
Class region
{
	public function obtenerTodo()
	{
		$con=new conexion;
		$resultados=$con->consultar("region");
		$con=null;
		return $resultados;
	}
	
	public function insertar($datos)
	{
		$con=new conexion;
		$mensaje=$con->insertar("region",$datos);
		$con=null;
		return $mensaje;
	}
	
	public function consultarregion($filtro)
	{
		$con=new conexion;
		$datos=$con->consultarFiltro("region",$filtro);
		$con=null;
		return $datos;
	}
}
?>