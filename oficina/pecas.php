<?php
require_once 'head.php';
require_once 'menu.php';
require_once 'conexao.php';

$sql = "SELECT * from peca";
$resultado = $conn->prepare($sql);
$resultado -> execute();

if(($resultado) and ($resultado->rowCount()!=0)){
  
   
?>
<div class="container-fluid conteudo">
        <div class="row">          

            <div class="col-md-12 text-center">
               <h1>Peças</h1>
            </div>

        </div>
    </div>

   
    <div class="container-fluid imagens">
        <div class="row">
        <?php       
        while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)) {           
            extract($linha);                          
        
        ?>         
            <div class="col-md-3 text-center">
                    <img src="<?php echo $foto; ?>" style=width:18rem;height:18rem;>                    
                        <h4><?php echo $nome; ?></h4>
                        <h5>R$ <?php echo $preco; ?></h5>  
                        <form action="carrinho.php" method="post">
                          <h5><label>Quant</label>
                          <input type="number" name="quantcomprada" value="1" style=width:50px;></h5>
                          <input type="hidden" name="codigopeca" value="<?php echo $codigopeca; ?>">
                        <input type="submit" class="btn btn-primary" value="Comprar">
                        
                       </form>

            </div>
                         

            <?php      
        
        }     
        
        }
            
            ?>


        </div>
      </div>
       


<?php
require_once 'footer.php';

    
?>