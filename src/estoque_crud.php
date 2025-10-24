<?php

require_once "../conecta.php"; 

function buscarEstoque($conexao){
     
    $sql = "SELECT * FROM lojas_produtos ORDER BY loja_id"; 
    $consulta = $conexao->query($sql); 
    return $consulta->fetchALL(); 
      
} 

?>