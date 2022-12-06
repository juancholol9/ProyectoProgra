<?php session_start();

//aqui empieza el carrito
if(isset($_SESSION['carrito']) || isset($_POST['producto'])){
	if(isset($_SESSION['carrito'])){
		$carrito_mio=$_SESSION['carrito'];
		if(isset($_POST['producto'])){
			$producto=$_POST['producto'];
			$precio=$_POST['precio'];
			$cantidad=$_POST['cantidad'];
			$idproducto=$_POST['idproducto'];
			$donde=-1;
			for($i=0;$i<=count($carrito_mio)-1;$i ++){
				if($idproducto==$carrito_mio[$i]['idproducto']){
				//Quitamos esta linea para que no aumente la cantidad y genere una linea nueva
				//	$donde=$i;
				}
			}
			if($donde != -1){
				$cuanto=$carrito_mio[$donde]['cantidad'] + $cantidad;
				$carrito_mio[$donde]=array("producto"=>$producto,"precio"=>$precio,"cantidad"=>$cuanto,"idproducto"=>$idproducto);
			}else{
				$carrito_mio[]=array("producto"=>$producto,"precio"=>$precio,"cantidad"=>$cantidad,"idproducto"=>$idproducto);
			}
		}
	}else{
		$producto=$_POST['producto'];
		$precio=$_POST['precio'];
		$cantidad=$_POST['cantidad'];
		$idproducto=$_POST['idproducto'];
		$carrito_mio[]=array("producto"=>$producto,"precio"=>$precio,"cantidad"=>$cantidad,"idproducto"=>$idproducto);	
	}
	if(isset($_POST['cantidad'])){
		$id=$_POST['id'];
		$cuantos=$_POST['cantidad'];
		if($cuantos<1){
			$carrito_mio[$id]=NULL;
		}else{
			$carrito_mio[$id]['cantidad']=$cuantos;
		}
	}
	if(isset($_POST['id2'])){
		$id=$_POST['id2'];
		$carrito_mio[$id]=NULL;
	}
$_SESSION['carrito']=$carrito_mio;
}
//aqui termina el carrito

// if(isset($_SESSION['carrito'])){

// for($i=0;$i<=count($carrito_mio)-1;$i ++){
// if($carrito_mio[$i]!=NULL){ 
// $totalc = $carrito_mio['cantidad'];
// $totalc ++ ;
// $totalcantidad += $totalc;
// }}}
header("Location: ".$_SERVER['HTTP_REFERER']."");
?>
