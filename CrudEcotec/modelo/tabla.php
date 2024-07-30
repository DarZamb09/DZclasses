<?php
require_once("conexion.php");
Class tabla
{
	public function obtenerTodo()
	{
		$con=new conexion;
		$resultados=$con->consultar("productos");
		$con=null;
		return $resultados;
	}
	
	public function insertar($datos)
	{
		$con=new conexion;
		$mensaje=$con->insertar("productos",$datos);
		$con=null;
		return $mensaje;
	}
	
	public function consultartabla($filtro)
	{
		$con=new conexion;
		$datos=$con->consultarFiltro("productos",$filtro);
		$con=null;
		return $datos;
	}
}
?>