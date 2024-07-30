<?php
require_once("../modelo/usuario.php");
require_once("../modelo/categoria.php");
require_once("../modelo/movie.php");
$usuobj=new usuario;
$cateobj=new categoria;
$peliobj=new movie;
switch ($_POST['opcion']) {
	case 'consultapelicula':
		$datos=$peliobj->obtenerTodo();
		$tabla="";
		foreach ($datos as $fila) {
			$tabla.="<tr><td>".$fila['codigo']."</td>";
			$tabla.="<td>".$fila['descripcion']."</td>";
			$tabla.="<td>".$fila['recaudacion']."</td>";
			$tabla.="<td>".$fila['estado']."</td>";
			$tabla.="<td>".$fila['idcategoria']."</td></tr>";
		}
		echo $tabla;
		break;

	case 'insertar':
		$datos['usuario']=$_POST['usuario'];
		$datos['password']=$_POST['password'];
		$datos['estado']=$_POST['estado'];
		$datos['fechacreacion']=date("Y-m-d"); 
		echo ($usuobj->insertar($datos));
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