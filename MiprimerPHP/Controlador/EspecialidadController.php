<?php
require_once("../modelo/Especialidad.php");
$objEspecialidad=new Especialidad;
switch($_POST['opcion'])
{
	case 'consultar':
		$datos=$objEspecialidad->ObtenerTodos();
		$tabla="";
		
		foreach($datos as $fila)
		{
			$tabla.="<tr>";
			$tabla.="<th scope='row'>".$fila['Id']."</th>";
			$tabla.="<td>".$fila['descripcion']."</td>";
			$tabla.="<td>".$fila['fecha_creacion']."</td>";
			$tabla.="<td>".$fila['estado']."</td>";
			$tabla.="<td><button type='button' class='btn btn-outline-dark' onclick='editar(".$fila['Id'].")'>Editar</button></td>";
			$tabla.="<tr>";
		}
		echo $tabla;
		break;
	case 'ingresar':
		$datos['descripcion']=$_POST['descripcion'];
		$datos['fecha_creacion']=$_POST['fecha'];
		$datos['estado']='A';
			if($objEspecialidad->nuevo($datos))
			{
				echo "Registro ingresado";
			}
			else
			{
				echo "Error al registrar".$objEspecialidad->geterror();
			}
		break;
	case 'actualizar':
		$filtro['id']=$_POST['codigo'];
		$datos['descripcion']=$_POST['descripcion'];
		$datos['fecha_creacion']=$_POST['fecha'];
		$datos['estado']=$_POST['estado'];
		echo $datos=$objEspecialidad->Guardar($datos,$filtro);
		break;
	case 'consultaxcodigo':
		$filtro['id']=$_POST['codigo'];
		echo json_encode($datos=$objEspecialidad->ObtenerFiltro($filtro));
		break;
}
?>