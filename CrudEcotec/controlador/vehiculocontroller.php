<?php
require_once("../modelo/usuario.php");
require_once("../modelo/vehiculo.php");
require_once("../modelo/marca.php");
$usuobj=new usuario;
$marcaobj=new marca;
$vehiculoobj=new vehiculo;
switch ($_POST['opcion']) {
	case 'consulta':
		$datos=$vehiculoobj->obtenerTodo();
		$tabla="";
		foreach ($datos as $fila) {
			$tabla.="<tr><td>".$fila['codigo']."</td>";
			$tabla.="<td>".$fila['descripcion']."</td>";
			$tabla.="<td>".$fila['anio']."</td>";
			$tabla.="<td>".$fila['marca']."</td></tr>";
		}
		echo $tabla;
		break;
    case 'consultamarca':
		$datos=$marcaobj->obtenerTodo();
		$tabla="";
		foreach ($datos as $fila) {
			$tabla.="<option value=".$fila['codigo'].">";
			$tabla.=$fila['descripcion']."</option>";
		}
		echo $tabla;
		break;
	case 'insertar':
		$datos['descripcion']=$_POST['descripcion'];
		$datos['anio']=$_POST['anio'];
		$datos['marca']=$_POST['marca'];
		echo ($vehiculoobj->insertar($datos));
		break;
	case 'login':
		$filtro['usuario']=$_POST['usuario'];
		$filtro['password']=$_POST['password'];
		$usuario=$usuobj->consultarusuario($filtro);
		//var_dump($usuario);
		if(empty($usuario))
		{
			echo "No se pueden validar credenciales";
		}
		else
		{
			session_start();
			$_SESSION['usuario']=$usuario[0]['usuario'];
			echo true;
		}
		
		break;
	
	case 'validarsesion':
		session_start();
		if (isset($_SESSION['usuario']))
		{
			echo true;
		}else{
			echo false;
		}
		break;
	case 'cerrarsesion':
		session_start();
		if (isset($_SESSION['usuario']))
		{
			unset($_SESSION['usuario']);
		}
		
		break;
	default:
		// code...
		break;
}

?>