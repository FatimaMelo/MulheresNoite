<?php
require_once 'head.php';
require_once 'menu.php';
require_once 'conexao.php';

$sql = "SELECT * from peca";
$resultado = $conn->prepare($sql);
$resultado -> execute();

if(($resultado) and ($resultado->rowCount()!=0)){
  
   
?>

<div class="container-fluid pecasform">

<div class="row">
    <div class="col-md-3"> 
     <h3>Peças</h3>
    </div>  
</div>

    <div class="row">
      <?php
        while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)){
          extract($linha);

      ?>
        <div class="col-md-3 mochilas">
                <div class="card" style="width: 25rem;">
                    <img class="card-img-top" src="<?php echo $foto; ?>">
                    <div class="card-body">
                        <h3 class="card-text"><?php echo $nome; ?></h3>
                        <h4>R$ <?php echo $preco; ?></h4>
                        <!-- Botão para acionar modal -->
                            <button type="button" class="btn btn-primary">Comprar</button>
                    </div>
                </div> 
        </div>

        <?php 
        }
      }
      ?>
  </div>  

  
 


        


<?php
require_once 'footeradm.php';
?>