<?php
    session_start();
    ob_start();

    include_once 'conexao.php';

   $buscacod = filter_input_array(INPUT_POST, FILTER_DEFAULT);
   
   
    if(!empty($buscacod["excluir"])){
        $codigopeca = $buscacod["codigopeca"];

            $sqlexcluir = "DELETE from carrinho where codigopeca = $codigopeca";
            $resulbusca = $conn->prepare($sqlexcluir);
            $resulbusca->execute();

            $_SESSION["quant"]-=1;
    }
    else{
        if(!isset($_SESSION["nome"])){
          // $_SESSION["carrinho"]=true;
            echo "<script>
                alert('Faça Login ou Cadastre-se!');
                parent.location = 'login.php';
                </script>";
        }
        else{
            //fazer pagamento

            echo "ja estou logado agora tenho que pagar";


        }
   }

?>