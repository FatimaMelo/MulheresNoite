<?php
    require_once 'head.php';
?>

<form method="POST" action="controlepeca.php" enctype="multipart/form-data">
    <div class="container">
        <div class="row">
                <div class="col-md-12 text-center">
                    <h3>Cadastro de Produtos</h3>
                </div>
        </div>

        <div class="row">
            <div class="col-md-7">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome">    
                </div>
            </div>           

            <div class="col-md-3">
                <div class="form-group">
                    <label for="marca">Marca</label>
                    <input type="text" name="marca" class="form-control" >
                </div>
            </div>

             <div class="col-md-2">        
                <div class="form-group">            
                    <label for="modelo">Modelo</label>
                    <input type="text" name="modelo" class="form-control">
                </div>
            </div>
           
        </div>
        
        <div class="row">
           
           

            <div class="col-md-3">
                <div class="form-group">
                    <label for="quantidade">Quantidade</label>
                    <input type="text" class="form-control" name="quantidade">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="preco">Preço</label>
                    <input type="text" class="form-control" name="preco">
                </div>
            </div>
  
            
            <div class="col-md-5  ">
              <div class="form-group">
                 <label for="foto">Foto</label><p>
                 <input type="file" class="form-control" name="foto">
                </div>
            </div>      


        </div>
                   
        <div class="row">   
            <div class="col-md-12 text-right">
                <div class="form-group">
                   
                    <input type="submit" class="btn btn-primary" value="Enviar" name="btncad">
                </div>  
            </div>
        </div>
    </div>
  
</form>

<?php
require_once 'footeradm.php';

?>