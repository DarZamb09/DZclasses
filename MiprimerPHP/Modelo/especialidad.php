<?php
require_once("conexion.php");
Class Especialidad
{
	public function ObtenerTodos()
	{	$conexion=new Conexion;
		$especialidad=$conexion->consultar('tbespecialidad');
		return $especialidad;
	}
	public function nuevo($datos)
	{	$conexion=new Conexion;
		$especialidad=$conexion->insertar('tbespecialidad',$datos);
		return $especialidad;
	}
	public function Guardar($datos,$filtro)
	{	$conexion=new Conexion;
		$especialidad=$conexion->actualizar('tbespecialidad',$datos,$filtro);
		return $especialidad;
	}
	
	public function ObtenerFiltro($filtro)
	{
		$conexion=new Conexion;
		$especialidad=$conexion->consultarFiltro('tbespecialidad',$filtro);
		return $especialidad;
	}
}
?>