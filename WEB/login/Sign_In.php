<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Proyecto Vikingo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="Sign_In.css" rel="stylesheet">

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="../assets/ico/favicon.png">
    
	
     <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-40810646-1']);
        _gaq.push(['_trackPageview']);
    
        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();

        </script>

    
  </head>

  <body>

    <div class="container">
      
      <div id="errorAlert" style="visibility: hidden;" class="alert alert-error">
            <strong>¡Error!</strong>
            <span>Error en la identificación de usuario:</span>
            <p>El nombre de usuario o la contraseña introducidos no son correctos.</p>
      </div>
      
      <div id="errorAlertCaduca" style="visibility: hidden;" class="alert alert-error">
            <strong>¡Error!</strong>
            <span>Su sesión ha caducado.</span>
            <p>Por favor, vuelva a introducir el nombre de usuario y la contraseña.</p>
      </div>
      
      <form class="form-signin" action="Remember_Login.php" method="post">
        <h2 class="form-signin-heading">Iniciar sesión</h2>
        <input type="text" name="username" class="input-block-level" placeholder="Nombre de usuario" autocomplete="off">
        <input type="password" name="password" class="input-block-level" placeholder="Contraseña">
        <label class="checkbox">
          <input type="checkbox" value="remember-me" name="rememberme" id="rememberme"> No cerrar sesión
        </label>
        <a href="Recuperar_PW.php">¿Has olvidado tu contraseña?</a>
        <button class="btn btn-large btn-primary" type="submit">Entrar</button>
      </form>
      
      
      <?php
        $var=$_GET["var"];
     ?>
        
           
      <input type="hidden" id="var" name="var" value="<?php echo($var); ?>" />
    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap-transition.js"></script>
    <script src="../assets/js/bootstrap-alert.js"></script>
    <script src="../assets/js/bootstrap-modal.js"></script>
    <script src="../assets/js/bootstrap-dropdown.js"></script>
    <script src="../assets/js/bootstrap-scrollspy.js"></script>
    <script src="../assets/js/bootstrap-tab.js"></script>
    <script src="../assets/js/bootstrap-tooltip.js"></script>
    <script src="../assets/js/bootstrap-popover.js"></script>
    <script src="../assets/js/bootstrap-button.js"></script>
    <script src="../assets/js/bootstrap-collapse.js"></script>
    <script src="../assets/js/bootstrap-carousel.js"></script>
    <script src="../assets/js/bootstrap-typeahead.js"></script>
    
    <!-- **********************   jQuery   ********************************************************** -->   
    <script src="../assets/jQuery/jquery.min.js"></script>
    <script src="../assets/jQuery/jquery-1.9.1.js"></script>
    <script src="../assets/jQuery/jquery-ui.js"></script>
               
    <!-- **********************   Llamamos a nuestras funciones de Javascript y jQuery ********************************************************** -->    
    
    
     <script src="Sign_In.js"></script>

  </body>
</html>