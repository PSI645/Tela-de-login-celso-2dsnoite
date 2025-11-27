<?php

$imagemFundo = "blue.jpg";
$black_ativada = false;

//conectar no banco de dados  
$mysqli  = new mysqli("localhost", "root", "12345678", "dsnoite");

$resultadoQuery = $mysqli->query("select * from dsnoite.tb_black_friday where dt_inicio <= NOW() and dt_fim >= NOW() ");
if ($resultadoQuery) {
    if ($resultadoQuery->num_rows > 0) {
        $linha = $resultadoQuery->fetch_assoc();
        $imagemFundo = "red.jpg";
        $black_ativada = true;
    }
} else {
    $imagemFundo = "blue.jpg";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce</title>
    <img src="<?php echo $imagemFundo ?>" style="width: 100%;">
    <style>
        .vermelho {
            color: red;
        }
        
        .sublinhado {
            text-decoration: line-through;
        }
          .btn-carrinho {
        background-color: orange;
        color: white;
        padding: 9px 15px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 9px;
        font-weight: bold;
        transition: 0.3s;
    }

    .btn-carrinho:hover {
        background-color: #fff700ff; /* laranja mais escuro */
    }
    </style>
</head>

<body>
    <h1 align="center">Bike Mall - O seu shopping de ciclismo</h1>

    <table  align="center">

    <?php
     
     $contador  = 0;

    $resultadoQuery = $mysqli->query("select  preco - (preco * 0.10) preco_black , prd.* from dsnoite.tb_produto prd;");
        if($resultadoQuery){
            if ($resultadoQuery->num_rows > 0 ){
                
                while ( $linha = $resultadoQuery->fetch_assoc() ) {
                    
                    $descricaoProduto = $linha['descricao'];
                    $precoProduto = $linha['preco'];
                    $imgProduto = $linha['img_local']; 
                    $preco_black = $linha['preco_black'];
                    
                    echo "<td style='width: 130px; height: 200px;' align='center'>";

                    echo "<img src='$imgProduto' width='100' height='100'>";

                    echo "<br>";

                    echo $descricaoProduto;

                    echo "<br>";

                    if ( $black_ativada ) {
                        echo "<p class='sublinhado'>";
                        echo "R$ " . $precoProduto;
                        echo "</p><p class='vermelho'>";
                        echo "R$ " . $preco_black ;
                        echo "<br>";
                        echo "10% off" ;
                    }else{
                        echo "R$ " . $precoProduto;
                    }

                    echo "<br><br>";
                    echo "<button class='btn-carrinho'>Comprar</button>";
                    


                    echo "</td>";

                    $contador = $contador + 1;

                    if ( $contador == 5){
                        echo "<br><tr>";
                        $contador = 0;
                    }

                }       
                
                
               
           
            }
        }
    ?>
    
    </table>


</body>
<footer>
    <img src="<?php echo $imagemFundo ?>" style="width: 100%;">
</footer>

</html>
