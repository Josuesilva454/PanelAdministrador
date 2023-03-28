<?php
header('Access-Control-Allow-Origin: *');
require_once('conexao.php');
$sql = "SELECT * FROM cliente ORDER BY id_cliente DESC";

$resultado = $connection->query($sql);

if($resultado->num_rows > 0){
    foreach($resultado as $row){
        echo"<tr>";
            echo"<td>".$row["titulo"]."</td>";
            echo"<td>".$row["descricao"]."</td>";
   
      
            echo "<td>
                <button  type=`button` class='btn btn-success' onclick=getId('".$row['ic_cliente']."')>Editar</button>
                <button  type=`button` class='btn btn-danger' onclick=remove('".$row['id_cliente']."') >Excluir</button>
            </td>";
        echo"</tr>";
    }
}else{
    echo("");
}
?>