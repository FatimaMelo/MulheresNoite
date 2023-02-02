<?php

    require_once 'conexao.php';
    require_once 'head.php';


    $pagatual = filter_input(INPUT_GET, "page", FILTER_SANITIZE_NUMBER_INT);
	$pag = (!empty($pagatual)) ? $pagatual : 1;

    $limitereg = 6;

    $inicio = ($limitereg * $pag) - $limitereg;




    $busca = "SELECT  p.codigopeca,p.nome,p.quantidade,p.marca,p.modeloano,p.foto,
    p.preco,c.nomecategoria FROM peca p,categoria c
    WHERE c.idcategoria = p.idcategoria and p.quantidade > 0
    LIMIT $inicio , $limitereg";         

    $resultado= $conn->prepare($busca);
    $resultado->execute();

    if (($resultado) AND ($resultado->rowCount() != 0)) {
?>
    <h1 class="text-center">Relatório de Produtos em Estoque</h1>

            <table class="table">
                    <thead>
                        <tr>
                        <th>Imagem</th>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Categoria</th>
                       
                        </tr>
                    </thead>
            <tbody>

<?php
        while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)) {
           // var_dump($linha);
            extract($linha);
            ?>
                    
                        <tr>
                            <td><img src="<?php echo $foto; ?>" style=width:150px;height:150px;></td>
                            <td><?php echo $codigopeca; ?></td>
                            <td><?php echo $nome; ?></td>
                            <td><?php echo $preco; ?></td>
                            <td><?php echo $quantidade; ?></td>
                            <td><?php echo $marca; ?></td>
                            <td><?php echo $modeloano; ?></td>
                            <td><?php echo $nomecategoria; ?></td>
                            <td> 
                                <?php echo "<a href='editar.php?codigo=$codigopeca'>" ; ?>                    
                                <input type="submit" class="btn btn-primary" name="editar" value="Editar">
                            </td>

                             <td>  
                                <?php echo "<a href='excluir.php?codigo=$codigopeca'>" ; ?>               
                                <input type="submit" class="btn btn-danger" name="excluir" value="Excluir">
                            </td>
                        </tr>
                        
                   
    <?php
        }
    ?>

        </tbody>
        </table>

<?php

    }


    //Contar os registros no banco
    $qtregistro = "SELECT COUNT(codigopeca) AS registros FROM peca WHERE quantidade > 0";
    $resultado = $conn->prepare($qtregistro);
    $resultado->execute();
    $resposta = $resultado->fetch(PDO::FETCH_ASSOC);

    //Quantidade de página que serão usadas - quantidade de registros
    //dividido pela quantidade de registro por página
    $qnt_pagina = ceil($resposta['registros'] / $limitereg);

     // Maximo de links      
     $maximo = 2;

     echo "<a href='relpecas.php?page=1'>Primeira</a> ";
   // Chamar página anterior verificando a quantidade de páginas menos 1 e 
   // também verificando se já não é primeira página
   for ($anterior = $pag - $maximo; $anterior <= $pag - 1; $anterior++) {
       if ($anterior >= 1) {
           echo "  <a href='relpecas.php?page=$anterior'>$anterior</a> ";
       }
   }

   //Mostrar a página ativa
   echo "$pag";

   //Chamar próxima página, ou seja, verificando a página ativa e acrescentando 1
   // a ela
   for ($proxima = $pag + 1; $proxima <= $pag + $maximo; $proxima++) {
       if ($proxima <= $qnt_pagina) {
           echo "<a href='relpecas.php?page=$proxima'>$proxima</a> ";
       }
   }

   echo "<a href='relpecas.php?page=$qnt_pagina'>Última</a> ";


?>




