<?php
include "pedidos.php";
include "../config/conexion.php";
session_start();
//$nombre=$_SESSION['nombre'];

$pedidos=new Pedidos;
if (isset($_REQUEST['action']) && !empty($_REQUEST['action']) ) {
    if ($_REQUEST['action']=='addItem'&& !empty($_REQUEST['id'])) {
        $id=$_REQUEST['id'];
        $query=$db->query("select * from inventario where invId=$_REQUEST[id]");
        $row=$query->fetch_assoc();
        $itemData=array(
            'id'=>$row['invId'],
            'producto'=>$row['invProducto'],
            'price'=>$row['invPrecio'],
            'stock'=>$row['invStock'],
            'cantidad'=>1
        );
        $_SESSION['total']=$_SESSION['total']+$row['invPrecio'];
        $insertItem=$pedidos->insert($itemData);
        //$query2=$db->query("insert into orden values(0,$cliId,$row[precio],now(),now(),1)");
        $redirectLoc=$insertItem?'Carrito.php':'../principal.php';
        header("Location:".$redirectLoc);
    }else if ($_REQUEST['action']=='removeItem'&& !empty($_REQUEST['id'])){
        $deleteItem=$pedidos->remove($_REQUEST['id']);
        header("Location: Carrito.php");
    }else if ($_REQUEST['action']=='nueva'){
        unset($_SESSION['cart_contents']);
        header("Location: ../despachar.php");
    }else if ($_REQUEST['action']=='cliente'&& !empty($_REQUEST['id'])){
        $_SESSION['cliente']=$_REQUEST['id'];
    }else if ($_REQUEST['action']=='crearOrden2'){
        $pagar=$_SESSION['cart_contents']['cart_total'];
        $cliente=$_SESSION['cliente'];
        $query4=$db->query("insert into orden values(0,$cliente,$pagar,now())");
        $query5=$db->query("select max(ordId) as orden from orden");
        $row2=$query5->fetch_assoc();
        $orden=$row2['orden'];
        foreach($_SESSION['cart_contents'] as $items){
            if (isset($items['id']) && !empty($items['id'])) { 
            $query6=$db->query("insert into detalle values(0,$orden,$items[id],$items[cantidad])");//detalle
            $query7=$db->query("select * from inventario where invId=$items[id]");
            $row3=$query7->fetch_assoc();
            $conCantidad=$row3['invStock'];
            $resultado=$conCantidad-$items[cantidad];
            $query8=$db->query("update inventario set invStock=$resultado where invId=$items[id]");

        }
    }
        
        header("Location:../pdf/index.php?id=$orden");
    }else if ($_REQUEST['action']=='updateItem'&& !empty($_REQUEST['id'])){
        $itemData=array(
            'rowid'=>$_REQUEST['id'],
            'cantidad'=>$_REQUEST['cantidad']
        );
        $updateItem=$pedidos->updateItem($itemData);
        echo $updateItem?'ok':'err';
        die;
    }
}
?>