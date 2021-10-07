<?php
     session_start();
     
     if(isset($_SESSION["usuario"]))
     {
          header("location:add-form.php");
     }
     
     if(isset($_GET["error"])&&$_GET["error"]==true)
     {
          echo "<div style='color:red'>Debe iniciar sesion primero</div>";
     }
?>

<?php
    /*
    
    if(isset($_SESSION['type']))
    {
        if($_SESSION['type']==0)
        {
            header("location: " . FRONT_ROOT . "Student/ShowAddView");
        }
        if($_SESSION['type']==1)
        {
            header("location: " . FRONT_ROOT . "Student/ShowAddView");
        }
        if($_SESSION['type']==2)
        {
            header("location: " . FRONT_ROOT . "Student/ShowAddView");
        }
    }
    */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>estilos.css">

    <title>Document</title>
</head>
<body>
    <div id="login">
        <h3 class="text-center display-4" >Bienvenidos!</h3>

        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-col" class="col-md-6">

                    <div id="login-box" class="col-md-12 bg-light text-dark">

                        <form id="login-form" class="login-form" action="<?php echo FRONT_ROOT ?>Login/Verify" method="POST">

                            <h3 class="text-center" style="padding-top:10px">Iniciar sesión</h3>

                            <div class="form-group">
                                <label>Usuario</label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Contraseña</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>

                            <div class="form-group text-center">
                            <input type="submit" class="btn btn-dark btn-lg btn-block" value="Conectar">
                            </div>
                                <form id="register-form" action="" method="POST">
                                    <input type="submit" class="btn btn-dark btn-lg btn-block" value="Registrarse">
                                </form>    

                            <p style="color: red"><?php echo $message?></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
