<?php

    include_once 'conexao.php';

    $dadoscad = filter_input_array(INPUT_POST, FILTER_DEFAULT);

		if(!empty($dadoscad["btncad"])){
            var_dump($dadoscad);
            

            $sql = "insert into funcionario(nome,telefone,cpf,qualificacao,
            experiencia,cep,numerocasa,complemento,email,senha)values
            (:nome,:telefone,:cpf,:qualificacao,:experiencia,:cep,
            :numerocasa,:complemento,:email,:senha)";

        	$salvar= $conn->prepare($sql);
			//$salvar->bindParam(':usuario', $dados['usuario'], PDO::PARAM_STR);
       		
			$salvar->execute();




        }
?>