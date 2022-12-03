<?php 
if (strlen(session_id())<1) 
	session_start();

require_once "../modelos/ejecutarSQL.php";
$categoria1=new ejecutarSQL();



$idcategoria=isset($_POST["idproductob"])? limpiarCadena($_POST["idproductob"]):"";

$producto=isset($_POST["productob"])? limpiarCadena($_POST["productob"]):"";
$costo=isset($_POST["costob"])? limpiarCadena($_POST["costob"]):"";
$precio=isset($_POST["preciob"])? limpiarCadena($_POST["preciob"]):"";




switch ($_GET["opc"]){

	
	case 'guardaryeditar':	
		if (empty($idcategoria)){
			//calcularPrecios();
			
			
			$sq="INSERT INTO `producto`(`producto`, `costo`, `precio`, `estado`) VALUES ('$producto','$costo','$precio','1')";
			
			$rspta=$categoria1->insertar($sq);
			echo  $rspta ? "El producto fue registrado" : "El producto no se pudo registrar";
			
		}
		else {
			
		
			$sq="UPDATE `producto` SET `producto`='$producto',`costo`='$costo',`precio`='$precio' WHERE idproducto='$idcategoria'";
			$rspta=$categoria1->insertar($sq);
			echo $rspta ? "Categoría actualizada" : "Categoría no se pudo actualizar";
			
		}
		
	break;

	
    case 'listapr':
		$rspta=$categoria1->listar("SELECT * FROM producto");

		while ($reg = $rspta->fetch_object())
				{
				echo '<option value="'.$reg->idlugar.'">'.$reg->lugar. '</option>';
				
		}
        
		break;
	case 'anular':
		$id=$_REQUEST['idcategoria'];
		$sq="update producto set estado='0' where idproducto=".$id;
		$rspta=$categoria1->insertar($sq);
 		echo $rspta ? "El producto fue Desactivado" : "El producto no se puede desactivar";
	break;

	case 'activar':
		$id=$_REQUEST['idcategoria'];
		$sq="update producto set estado='1' where idproducto=".$id;
		$rspta=$categoria1->insertar($sq);
 		echo $rspta ? "El producto fue activado" : "El producto no se puede activar";
	break;

	case 'mostrar':
		$id=$_REQUEST['idcategoria'];
		$sql="select * from producto where idproducto=".$id;
		$rspta=$categoria1->mostrar($sql);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$categoria1->listar("select * from  producto");
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			
			$data[]=array(
 				
				"0"=>($reg->estado)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idproducto.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idproducto.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idproducto.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idproducto.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->idproducto,
				 
				 "2"=>$reg->producto,
				"3"=>$reg->costo,
				"4"=>$reg->precio,
				
				
				"5"=>($reg->estado)?'<span class="label bg-green">Activado</span>':
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