<?php
require_once("../modelo/usuario.php");
require_once("../modelo/city.php");
require_once("../modelo/province.php");
require_once("../modelo/region.php");

$usuobj=new usuario;
$cityobj=new city;
$provinceobj=new province;
$regionobj=new region;

switch ($_POST['opcion']) {
	case 'consultaregion':
		$datos=$regionobj->obtenerTodo();
		$tabla="";
		foreach ($datos as $fila) {
			$tabla.="<option value=".$fila['ID_Region'].">";
			$tabla.=$fila['Nombre_Region']."</option>";
		}
		echo $tabla;
		break;
    case 'consultaprovince':
		$filtro['ID_Region']=$_POST['region'];
        $datos=$provinceobj->obtenerProvinciaxCod($filtro);
        $tabla="";
        foreach ($datos as $fila) {
            $tabla.="<option value=".$fila['ID_Province'].">";
            $tabla.=$fila['Nombre_Province']."</option>";
           
        }
        echo $tabla;
        break;
    case 'consultacity':
		$filtro['ID_Province']=$_POST['province'];
		$datos=$cityobj->obtenerCiudadxCod($filtro);
        $tabla="";
        foreach ($datos as $fila) {
            $tabla.="<option value=".$fila['ID_City'].">";
            $tabla.=$fila['Nombre_City']."</option>";
        }
        echo $tabla;
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