<?php
require_once("conexion.php");
Class movie
{
	public function obtenerTodo()
	{
		$con=new conexion;
		$resultados=$con->consultar("pelicula");
		$con=null;
		return $resultados;
	}
	
	public function insertar($datos)
	{
		$con=new conexion;
		$mensaje=$con->insertar("pelicula",$datos);
		$con=null;
		return $mensaje;
	}
	
	public function consultarmovie($filtro)
	{
		$con=new conexion;
		$datos=$con->consultarFiltro("pelicula",$filtro);
		$con=null;
		return $datos;
	}
}
?>