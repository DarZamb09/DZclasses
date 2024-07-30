<?php
require_once("conexion.php");
Class categoria
{
	public function obtenerTodo()
	{
		$con=new conexion;
		$resultados=$con->consultar("categoria");
		$con=null;
		return $resultados;
	}

	public function obtenerCategoriaxCod($filtro)
	{
		$con=new conexion;
		$resultados=$con->consultarFiltro("categoria", $filtro);
		$con=null;
		return $resultados;
	}
	
	public function insertar($datos)
	{
		$con=new conexion;
		$mensaje=$con->insertar("categoria",$datos);
		$con=null;
		return $mensaje;
	}
	
	public function consultarcategoria($filtro)
	{
		$con=new conexion;
		$datos=$con->consultarFiltro("categoria",$filtro);
		$con=null;
		return $datos;
	}
}
?>