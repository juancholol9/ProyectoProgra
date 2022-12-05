<?php 
if (strlen(session_id())<1) 
	session_start();

require_once "../modelos/ejecutarSQL.php";
$categoria1=new ejecutarSQL();

$idcategoria=isset($_POST["idclientes"])? limpiarCadena($_POST["idclientes"]):"";

$cliente=isset($_POST["cliente"])? limpiarCadena($_POST["cliente"]):"";
$telefono=isset($_POST["telefono"])? limpiarCadena($_POST["telefono"]):"";
$direccion=isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
$longevidad=isset($_POST["longevidad"])? limpiarCadena($_POST["longevidad"]):"";

switch ($_GET["opc"]){

	case 'guardaryeditar':	
		if (empty($idcategoria)){
			$sq="INSERT INTO `clientes`(`cliente`, `telefono`, `direccion`, `longevidad`, `estado`) VALUES ('$cliente','$telefono','$direccion','$longevidad','1')";
			$rspta=$categoria1->insertar($sq);
			echo  $rspta ? "El cliente fue registrado" : "El cliente no se pudo registrar";
		}
		else {
			$sq="UPDATE `clientes` SET `cliente`='$cliente',`telefono`='$telefono',`direccion`='$direccion',`longevidad`='$longevidad' WHERE idclientes='$idcategoria'";
			$rspta=$categoria1->insertar($sq);
			echo $rspta ? "Categoría actualizada" : "Categoría no se pudo actualizar";
		}
	break;
    case 'listapr':
		$rspta=$categoria1->listar("SELECT * FROM clientes");
		while ($reg = $rspta->fetch_object())
				{
				echo '<option value="'.$reg->idlugar.'">'.$reg->lugar. '</option>';
		}
		break;
	case 'anular':
		$id=$_REQUEST['idcategoria'];
		$sq="update proveedor set estado='0' where idclientes=".$id;
		$rspta=$categoria1->insertar($sq);
 		echo $rspta ? "El proveedor fue Desactivado" : "El proveedor no se puede desactivar";
	break;
	case 'activar':
		$id=$_REQUEST['idcategoria'];
		$sq="update proveedor set estado='1' where idclientes=".$id;
		$rspta=$categoria1->insertar($sq);
 		echo $rspta ? "El proveedor fue activado" : "El proveedor no se puede activar";
	break;
	case 'mostrar':
		$id=$_REQUEST['idcategoria'];
		$sql="select * from proveedor where idclientes=".$id;
		$rspta=$categoria1->mostrar($sql);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;
	case 'listar':
		$rspta=$categoria1->listar("select * from  clientes");
 		//Vamos a declarar un array
 		$data= Array();
 		while ($reg=$rspta->fetch_object()){
			$data[]=array(
				"0"=>($reg->estado)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idcliente.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idcliente.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idcliente.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idcliente.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->idcliente,
				 "2"=>$reg->cliente,
				"3"=>$reg->telefono,
				"4"=>$reg->direccion,
				"5"=>$reg->longevidad,
				"6"=>($reg->estado)?'<span class="label bg-green">Activado</span>':
 				'<span class="label bg-red">Desactivado</span>'
 				);
 		}
 		$results = array(
			"sEcho"=>1, //Información para el datatables
			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
			"aaData"=>$data);
		echo json_encode($results);
	break;
}
?>