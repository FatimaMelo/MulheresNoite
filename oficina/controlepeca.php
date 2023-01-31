<?php

    include_once 'conexao.php';

    $dadoscad = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    var_dump($dadoscad);

    
    if(isset($_FILES['foto'])){
        $arquivo = ($_FILES['foto']);
    

        if($arquivo['error']){
            echo 'Erro ao carregar arquivo';
            header ("Location: frmfuncionario.php");
        }

        $pasta = "produtos/";
        $nomearquivo = $arquivo['name'];
        $novonome = uniqid();
        $extensao = strtolower(pathinfo($nomearquivo, PATHINFO_EXTENSION));

        if($extensao!="jpg" && $extensao!="png" && $extensao!="webp"){
            die("Tipo não aceito");
        }
        else{
            $salvaimg = move_uploaded_file($arquivo['tmp_name'], $pasta . $novonome . "." . $extensao);

            if($salvaimg){
                $path = $pasta . $novonome . "." . $extensao;
               
            }

        }

    }



		if(!empty($dadoscad["btncad"])){
           
           // var_dump($dadoscad);

            $vazio = false;

            $dadoscad = array_map('trim', $dadoscad);
            if (in_array("", $dadoscad)) {
                $vazio = true;
               
                echo "<script>
                alert('Preencher todos os campos!');
                parent.location = 'frmpeca.php';
                </script>";

            } 
            
            if(!$vazio){           
           

            $sql = "insert into peca(nome,marca,modeloano,quantidade,preco,foto)
            values(:nome,:marca,:modelo,:quantidade,:preco,:foto)";

        	$salvar= $conn->prepare($sql);
            $salvar->bindParam(':nome', $dadoscad['nome'], PDO::PARAM_STR);
            $salvar->bindParam(':marca', $dadoscad['marca'], PDO::PARAM_STR);
            $salvar->bindParam(':modelo', $dadoscad['modelo'], PDO::PARAM_STR);
            $salvar->bindParam(':quantidade', $dadoscad['quantidade'], PDO::PARAM_INT);
            $salvar->bindParam(':preco', $dadoscad['preco'], PDO::PARAM_STR);
            $salvar->bindParam(':foto',$path,PDO::PARAM_STR);
            $salvar->execute();

            if ($salvar->rowCount()) {
                echo "<script>
                alert('Cadastrado com Sucesso!');
                parent.location = 'frmpeca.php';
                </script>";
                unset($dadoscad); 
            } else {
                echo "<script>
                alert('Erro : Usuário não cadastrado!');
                parent.location = 'frmpeca.php';
                </script>";
            }
       		
     }
     
    }

/*
    if(!empty($dadoscad["btneditar"])){
           
        var_dump($dadoscad);

        $dadoscad = array_map('trim', $dadoscad);

        
        $sql = "UPDATE peca set nome=:nome,marca=:marca,modeloano=:modelo,
        quantidade=:quantidade,preco=:preco,foto=:foto 
        where codigopeca=:codigo;
         
        $salvar= $conn->prepare($sql);
            $salvar->bindParam(':nome', $dadoscad['nome'], PDO::PARAM_STR);
            $salvar->bindParam(':marca', $dadoscad['marca'], PDO::PARAM_STR);
            $salvar->bindParam(':modelo', $dadoscad['modelo'], PDO::PARAM_STR);
            $salvar->bindParam(':quantidade', $dadoscad['quantidade'], PDO::PARAM_INT);
            $salvar->bindParam(':preco', $dadoscad['preco'], PDO::PARAM_STR);
            $salvar->bindParam(':foto', $path, PDO::PARAM_STR);
            $salvar->bindParam(':codigo', $dadoscad['codigo'], PDO::PARAM_INT);
            $salvar->execute();

            if ($salvar->rowCount()) {
                echo "<script>
                alert('Dados Atualizados!');
                parent.location = 'relpecas.php';
                </script>";
                unset($dadoscad); 
            } else {
                echo "<script>
                alert('Erro : Funcionário não encontrado!');
                parent.location = 'relpecas.php';
                </script>";
            }


        }
*/
?>