<?php

    if(isset($_SESSION['logueado']))
    {
        header("location: " . FRONT_ROOT . "Student/ShowAddView");
    }
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>estilos.css">

</head>
<body>
    <div id="login" style="margin: -5rem 0 15rem 0">
        <br>
        <br>
        <br>
        <br>
        <br>
        <h3 class="text-center display-4" style="margin-top: 70px">Bienvenidos!</h3>

        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-col" class="col-md-6">

                    <div id="login-box" class="col-md-12 bg-light text-dark">

                        <form id="login-form" class="login-form" action="<?php echo FRONT_ROOT ?>LoginRegister/Login" method="POST">

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
                            
                        </form>
                        <form id="register-form" action="<?php echo FRONT_ROOT ?>User/ShowAddView" method="POST">
                            <input type="submit" class="btn btn-dark btn-lg btn-block" value="Registrarse">
                        </form>
                        <br><br>
                        
                    </div>
                </div>
            </div>
        </div><center><span class="badge badge-info" style="margin-top: 20px;font-size: 15px;"><?php echo $message ?></span></center>
    </div>
</body>
</html>
