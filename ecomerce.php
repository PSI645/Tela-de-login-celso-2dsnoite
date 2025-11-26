<?php
 $imagem_src = "blue.jpg";

//conectar no banco de dados  
$mysqli  = new mysqli("localhost", "root", "root", "dsnoite");

 $resultadoQuery = $mysqli->query("SELECT * FROM dsnoite.tb_black_friday where dt_inicio <= now() and dt_fim >= now()");
        if($resultadoQuery){
            if ($resultadoQuery->num_rows > 0 ){
                //site em black friday ativa
                $imagem_src = "red.jpg";
            }else{
                 $imagem_src = "blue.jpg";
            }
        }



        


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <img src="<?php echo $imagem_src ?>">
</head>
<body>
    <br><br><br><br><br><br><br>

    select preco, imagem, descricao from tb_produto 
   
    <img src="bike1.jpg">

</body>
<footer>
     <img src="<?php echo $imagem_src ?>">
</footer>
</html>