<?php
    require_once 'head.php';
?>

<div class="container bg-white">
    <div class="row">
        <div class="col-md-12 text-center">     
             <h3>Cadastro de Cliente</h3>
        </div>
    </div>

<form>
  
<div class="row">
    <div class="col-md-4"> 
        <div class="form-group">
            <label for="cpf">Cpf</label>
            <input type="text" class="form-control" name="cpf">   
        </div>
    </div>

    <div class="col-md-8"> 
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome">
        </div>
    </div>
</div>

  <div class="form-group">
    <label for="telefone">Telefone</label>
    <input type="text" class="form-control" name="telefone">
  </div>

  <div class="form-group">
    <label for="cep">Cep</label>
    <input type="text" class="form-control" name="cep">
  </div>

  <div class="form-group">
    <label for="endereco">Endereço</label>
    <input type="text" class="form-control" name="endereco">
  </div>

  <div class="form-group">
    <label for="numero">Número</label>
    <input type="text" class="form-control" name="numero">
  </div>

  <div class="form-group">
    <label for="complemento">Complemento</label>
    <input type="text" class="form-control" name="complemento">
  </div>

  <div class="form-group">
    <label for="bairro">Bairro</label>
    <input type="text" class="form-control" name="bairro">
  </div>

  <div class="form-group">
    <label for="cidade">Cidade</label>
    <input type="text" class="form-control" name="cidade">
  </div>

  <div class="form-group">
    <label for="uf">Uf</label>
    <input type="text" class="form-control" name="uf">
  </div>



  
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>

</div>







<?php
    require_once 'footeradm.php';
?>