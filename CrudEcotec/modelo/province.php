<?php
require_once("conexion.php");
Class province
{
	public function obtenerTodo()
	{
		$con=new conexion;
		$resultados=$con->consultar("province");
		$con=null;
		return $resultados;
	}

	public function obtenerProvinciaxCod($filtro)
	{
		$con=new conexion;
		$resultados=$con->consultarFiltro("province", $filtro);
		$con=null;
		return $resultados;
	}
	
	public function insertar($datos)
	{
		$con=new conexion;
		$mensaje=$con->insertar("province",$datos);
		$con=null;
		return $mensaje;
	}
	
	public function consultarprovince($filtro)
	{
		$con=new conexion;
		$datos=$con->consultarFiltro("province",$filtro);
		$con=null;
		return $datos;
	}
}
?>