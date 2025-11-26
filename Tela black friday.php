<?php

$dt_inicio;
$dt_fim;
$codigo = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $codigo = $_POST["codigo"];
    $dt_inicio =  $_POST["dt_inicio"];
    $dt_fim = $_POST["dt_fim"];

    //conectar no banco de dados
  
    $mysqli  = new mysqli("localhost", "root", "12345678", "dsnoite");

    //o botão gravar foi clicado ???
    if ( isset ( $_POST["gravar"] ) ) {

        try{
        $mysqli->query("insert into dsnoite.tb_black_friday (codigo,dt_inicio,dt_fim) 
                        values('$codigo','$dt_inicio','$dt_fim')");

        }catch (mysqli_sql_exception $e){
     
        
         $mysqli->query("update dsnoite.tb_black_friday set dt_inicio = '$dt_inicio', dt_fim = '$dt_fim' where codigo = '$codigo'");
                

        }

          $dt_inicio = "";
          $dt_fim = ""; 
          $codigo = "";
        
    }

    //o botão pesquisar foi clicado ???
    if ( isset ( $_POST["pesquisar"] ) ) {

        $resultadoQuery = $mysqli->query("select * from dsnoite.tb_black_friday where codigo = '$codigo'");
        if($resultadoQuery){
            if ($resultadoQuery->num_rows > 0 ){
                $linha = $resultadoQuery->fetch_assoc();       
                $dt_inicio = $linha['dt_inicio'];
                $dt_fim = $linha['dt_fim'];
               
            }
        } else{
            echo "produto não cadastrado";
        }  


        //recuperar os valores e preencher a tela
        
    }

    //o botão excluir foi clicado
    if ( isset ( $_POST["excluir"] ) ) {
             
        $mysqli->query("delete from dsnoite.tb_black_friday where codigo = '$codigo'");
        //recuperar os valores e preencher a tela

          $dt_inicio = "";
          $dt_fim = ""; 
          $codigo = "";
        
    }

  
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro da promoção</title>
</head>

<body>

    <h1 align="center">Cadastro de Promoção - Black Friday</h1>
    <br><br>

    <form method="POST">
        <table align="center">
            <tr>
                <td>
                    <label>Código da promoção</label>
                </td>
                <td>
                    <input name="codigo" placeholder="Codigo da promoção" required value="<?php echo $codigo; ?>"></input>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Data inicio da promoção</label>
                </td>
                <td>
                    <input  type="datetime-local" name="dt_inicio"  value="<?php echo $dt_inicio; ?>"></input>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Data fim da promoção</label>
                </td>
                <td>
                    <input  type="datetime-local"  name="dt_fim"  value="<?php echo $dt_fim; ?>"></input>
                </td>
            </tr>
         
            <tr>
                <td>
                    <br>
                </td>
                <td>

                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <button action="submit" name='pesquisar'>Pesquisar</button>
                    <button action="submit" name='gravar'>Gravar</button>
                    <button action="submit" name='excluir'>Excluir</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>