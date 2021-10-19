<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>estilos.css">

    <title>Carga de usuario</title>
</head>

<?php require_once("nav.php")?>

<body>
    <div id="carga-usuario"></div>
        <div class="container">

            <div id="add-user-row" class="row justify-content-center align-items-center">
                
                <div id="add-user-col" class="col-md-6">

                    <div id="add-user-box" class="userAdd-box col-md-12 bg-light text-dark">
                        <form>

                            <h3 class="text-center" style="padding-top:10px">Regristrar usuario</h3>

                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>    

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" id="password" name="password" class="form-control">
                            </div>                                                      
                                                    
                            <div class="form-group">
                                <label for="state_id" class="control-label">Tipo</label>
                                <select class="form-control" id="state_id">
                                    <option value="0">Student</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Empresa</option>
                                </select>                    
                            </div>
                                
                            <div class="form-group">
                                <button type="submit" class="btn btn-dark btn-lg btn-block">Registrar</button>
                            </div>     
                        </form>
                    </div>
                
                </div>
            </div>
        </div>
</body>
</html>
