<?php
  
  session_start();
  ob_start();

  if(!isset($_SESSION["quant"])){
    $_SESSION["quant"]=0;
  }
?>
<nav class="navbar navbar-expand-lg navbar-light menu">
    <a class="navbar-brand" href="index.php">Conserta Tudo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado"
      aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(página atual)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="quemsomos.php">Nossa Oficina</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Serviços
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Troca de óleo</a>
            <a class="dropdown-item" href="#">Suspensão</a>
            <a class="dropdown-item" href="#">Direção</a>
            <a class="dropdown-item" href="#">Mecânica Geral</a>
            <a class="dropdown-item" href="#">Serviços Elétricos</a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Loja
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="pecas.php">Peças</a>
            <a class="dropdown-item" href="acessorios.php">Acessórios</a>
            
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">Fale Conosco</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Área do Cliente</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <a href="frmcarrinho.php">
          <img src="imagens/carrinho2.png" style=width:60px;height:60px;>
        </a>
        <?php
            if($_SESSION["quant"]>0){
              echo $_SESSION["quant"];
            }
        ?>
      </form>
    </div>
  </nav>