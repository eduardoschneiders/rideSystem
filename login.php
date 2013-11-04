<?php
    include ("Includes/config.php");

    $html = new Html();

    echo $html->head();

?>
<!--<form method="post" action="check_values_login.php">
	<input type="text" name="nome"></br>
	<input type="password" name="senha"></br>
	<input type="submit" name="submit">
</form>-->



<!DOCTYPE html>  
<html>  
    <body>  
      <header>
        <div class="navbar navbar-fixed-top">  
          <div class="navbar-inner">  
            <div class="container">  
              <a class="brand" href="#">
                <span class="branco">ride</span><span class="laranja">System</span>
              </a>  
              <div class="nav-collapse">  
                <ul class="nav">  
                  <li class="active"><a href="index.html">Hommer</a></li>
                  <li><a href="#">Caronas</a></li>  
                  <li><a href="#about">Sobre</a></li>  
                  <li><a href="#contact">Contato</a></li>  
                </ul>

                <ul class="nav pull-right login">
                  <li><a href="login.html">Login</a></li>
                </ul>  
              </div>
            </div>  
          </div>  
        </div>  
      </header>
      <!-- CONTAINER -->
      <div class="container">  
        <div class="row">        

          <div class="span8 center container-wrapper">  
            <div class="well">  
              <h1 class="h1-login">LOGIN</h1>
              <form action="check_values_login.php" method="post" id="user-login">
                <div>
                  <div>
                   <label for="username">Nome: <span class="form-required" title="Este campo é obrigatório.">*</span></label>
                   <input type="text" id="username" name="nome" class="form-text required"> 
                 </div>
                 <div>
                   <label for="password">Senha: <span class="form-required" title="Este campo é obrigatório.">*</span></label>
                   <input type="password" id="password" name="senha" class="form-text required">
                 </div>

                 <div class="forgot-password">
                  <a href="#">Esqueci minha senha</a>
                </div>

                <input type="submit" value="Login" class="form-submit">
              </div>
            </form>

<!-- FACEBOOK
        </br>
        <div class="busca">
        </div>
      -->
    </div>
    <footer>  
      <p>@ rideSystem ;-)</p>  
    </footer>  
  </div>
</div>
</div>
</body>  
</html>  
