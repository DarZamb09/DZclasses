
<?php
require_once("../modelo/tabla.php");
$usuobj=new tabla;
switch ($_POST['opcion']) {
	case 'consulta':
		$datos=$usuobj->obtenerTodo();
		$tabla="";
		foreach ($datos as $fila) {
			$tabla.="<tr><td>".$fila['codigo']."</td>";
			$tabla.="<td>".$fila['descripcion']."</td>";
			$tabla.="<td>".$fila['talla']."</td>";
			$tabla.="<td>".$fila['precio']."</td>";
			$tabla.="<td>".$fila['categoria']."</td>";
			$tabla.="<td>".$fila['estado']."</td>";
			$tabla.="<td>".$fila['fecha_creacion']."</td></tr>";
		}
		echo $tabla;
		break;
	case 'insertar':
		$datos['codigo']=$_POST['codigo'];
		$datos['descripcion']=$_POST['descripcion'];
		$datos['talla']=$_POST['talla'];
		$datos['precio']=$_POST['precio'];
		$datos['categoria']=$_POST['categoria'];
		$datos['estado']=$_POST['estado'];
		$datos['fecha_creacion']=date("Y-m-d"); 
		echo ($usuobj->insertar($datos));
		break;
	case 'login':
		$filtro['usuario']=$_POST['usuario'];
		$filtro['password']=$_POST['password'];
		$usuario=$usuobj->consultartabla($filtro);
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