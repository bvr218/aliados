<?php
require("MysqliDb.php");
if(isset($_POST["cedula"])){
    if(strlen($_POST["cedula"]) < 3){
        $db->where("id",$_POST["cedula"]);
        $usuario = $db->getOne("login");
        if($usuario){
            if($usuario['estado']=="1"){
                echo json_encode(["estado"=>1,"usuario"=>$usuario['nombre']]);
            }else{
                echo json_encode(["estado"=>0,"usuario"=>$usuario['nombre']]);
            }
        }else{
            echo json_encode(null);
        }
    } else {
        $db->where("cedula",$_POST["cedula"]);
        $usuario = $db->getOne("usuarios");
        if($usuario){
            if($usuario['estado']=="ACTIVO"){
                echo json_encode(["estado"=>1,"usuario"=>$usuario['nombre']]);
            }else{
                echo json_encode(["estado"=>0,"usuario"=>$usuario['nombre']]);
            }
        }else{
            echo json_encode(null);
        }
    }
    
    
    
}

?>