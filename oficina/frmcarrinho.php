<?php

    session_start();
    ob_start();

    require_once 'head.php';
    require_once 'conexao.php';

    $totalgeral = 0;


    $busca = "SELECT * from carrinho";       

    $resultado= $conn->prepare($busca);
    $resultado->execute();

    if (($resultado) AND ($resultado->rowCount() != 0)) {
?>
    <h1 class="text-center">Produtos no Carrinho</h1>

    <form method="post" action="finaliza.php">
            <table class="table">
                    <thead>
                        <tr>
                        <th>Imagem</th>                        
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Quantidade</th> 
                        <th>Total</th>                   
                       
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
                            <td><?php echo $nome; ?></td>
                            <td><?php echo $preco; ?></td>
                            <td><?php echo $quantcomprada; ?></td>                            
                            <td><?php echo $total = $quantcomprada * $preco ; 
                            $totalgeral += $total;
                            ?></td>
                            <td>  
                                 <input type="hidden" name="codigopeca" value="<?php echo $codigopeca; ?>">          
                                <input type="submit" class="btn btn-danger" name="excluir" value="Excluir">
                            </td>
                        </tr>
                        
                   
    <?php
        }
    ?>

        </tbody>
        </table>
        <?php 
            echo "<h5>Total do Pedido - R$ ".$totalgeral;
        ?>
        </h5>
        <h4><input type="submit" class="btn btn-primary" value="Finalizar Compra"></h4> 
    </form>

<?php


    }



?>
