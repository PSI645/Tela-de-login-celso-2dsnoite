<?php

$descricaoProduto = "";
$precoProduto = "";
$imgProduto = "";
$codBarrasProduto = "";
$codigo = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $codigo = $_POST["codigo"];
    $descricao = $_POST["descricao"];
    $codbarras = $_POST["codbarras"];
    $preco = $_POST["preco"];
    $img_local = $_POST["img_local"];

    //conectar no banco de dados
    $mysqli  = new mysqli("localhost", "root", "root", "dsnoite");

    //o botão gravar foi clicado ???
    if ( isset ( $_POST["gravar"] ) ) {

        try{
        $mysqli->query("insert into dsnoite.tb_produto (codigo,descricao,codbarras,preco,img_local) 
                        values('$codigo','$descricao','$codbarras',$preco,'$img_local')");
        }catch (mysqli_sql_exception $e){
            if ( $e->getCode() == 1062 ){
                $mysqli->query("update dsnoite.tb_produto set descricao = '$descricao', codbarras = $codbarras',  preco = $preco, img_local = '$img_local' where codigo = '$codigo'");
            };

        }
        
    }

    //o botão pesquisar foi clicado ???
    if ( isset ( $_POST["pesquisar"] ) ) {

        $resultadoQuery = $mysqli->query("select * from dsnoite.tb_produto where codigo = '$codigo'");
        if($resultadoQuery){
            if ($resultadoQuery->num_rows > 0 ){
                $linha = $resultadoQuery->fetch_assoc();       
                $descricaoProduto = $linha['descricao'];
                $precoProduto = $linha['preco'];
                $imgProduto = $linha['img_local'];       
                $codBarrasProduto = $linha['codbarras'];  
                $codigo = $linha['codigo']; 
            }
        } else{
            echo "produto não cadastrado";
        }  


        //recuperar os valores e preencher a tela
        
    }

    //o botão excluir foi clicado
    if ( isset ( $_POST["excluir"] ) ) {
             
        $mysqli->query("delete from dsnoite.tb_produto where codigo = '$codigo'");
        //recuperar os valores e preencher a tela
        
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
</head>

<body>

    <h1 align="center">Cadastro de produtos</h1>
    <br><br>

    <form method="POST">
        <table align="center">
            <tr>
                <td>
                    <label>Código funcional</label>
                </td>
                <td>
                    <input name="codigo" placeholder="Codigo funcional" required value="<?php echo $codigo; ?>"></input>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Descrição do Produto</label>
                </td>
                <td>
                    <input name="descricao" placeholder="Descrição" value="<?php echo $descricaoProduto; ?>"></input>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Código de Barras</label>
                </td>
                <td>
                    <input name="codbarras" placeholder="Código de barras" value="<?php echo $codBarrasProduto; ?>"></input>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Preço do produto</label>
                </td>
                <td>
                    <input name="preco" placeholder="Preço" value="<?php echo $precoProduto; ?>"></input>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Imagem</label>
                </td>
                <td>
                    <input name="img_local" placeholder="c:/img/dsnoite/nike.jpg" value="<?php echo $imgProduto; ?>">  </input>
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