<?php
$dir="";
$titulo = "Inicio sesion";
include_once $dir.'../../configuracion.php';
include_once $dir.'../estructura/cabecera.php';
$datos = data_submitted();
$resp = false;
//Array ( [accion] => login [usnombre] => malapi [uspass] => d41d8cd98f00b204e9800998ecf8427e )
print_r($datos);
if (isset($datos['accion'])){

    if ($datos['accion']=="login"){
        $objTrans = new Session();
        $resp = $objTrans->iniciar($datos['usnombre'],$datos['uspass']);
        if($resp) {
            echo"se logueo correctamente\n";
          //  header("Location: '../home/index.php'");
            header("location:../home/index.php");
           // echo("<script>location.href = '';</script>");
        } else {
            echo"no se logueo correctamente\n";
            $mensaje ="Error, vuelva a intentarlo";
           // echo("<script>location.href = './index.php?msg=".$mensaje."';</script>");
        }

    }

    
    if ($datos['accion']=="cerrar"){
        $objTrans = new Session();
        $resp = $objTrans->cerrar();
        if($resp) {
            $mensaje ="Vuelva... lo estaremos esperando...";
            echo("<script>location.href = './index.php?msg=".$mensaje."';</script>");
        }
    }
}
    

?>
