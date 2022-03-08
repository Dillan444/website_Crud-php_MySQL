<?php
    if ($_POST) {
        header("Location: ./inicio.php");
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="container">
        <div class="row">

            <div class="col-md-4">
                
            </div>

            <div class="col-md-4">
                <br /> <br /> <br />

                <div class="card">
                    <div class="card-header">
                        Login
                    </div>
                    <div class="card-body">
                        <form action="#" method="POST">
                        <div class = "form-group">
                            <label for="exampleInputEmail1">Usuario</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="usuario" aria-describedby="emailHelp" placeholder="Escribe tu usuario">
                            <small id="emailHelp" class="form-text text-muted">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Contraseña:</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="contraseña" placeholder="Escribe tu contraseña">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                        </form>
                        
                        
                    </div>
                    
                </div>
                
            </div>
            
        </div>
    </div>
    
  </body>
</html>