<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>LOGIN</title>
        <!-- BOOTSTRAP STYLES-->
        <link href="../assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FONTAWESOME STYLES-->
        <link href="../assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
        <link href="../assets/css/custom.css" rel="stylesheet" />
        <!-- GOOGLE FONTS-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">
                    <h1 class="text-center login-title">Faça o login para continuar</h1>
                    <div class="container-fluid ">
                        <img class="img-circle img-responsive img-rounded col-md-offset-3" src="../assets/img/user.png" height="140" width="140"alt="">
                        <form class="form-signin" method="post" action="">
                            <input name="email" type="text" class="form-control" placeholder="Email" required="" autofocus="">
                            <input name="senha" type="password" class="form-control" placeholder="Password" required="">
                            <button name="go" class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
                        </form>
                        <br/>
                        
                        <?php 
                            require_once '../Controller/ConnectController.php';
                            if (isset($_POST["go"])) {
                                $objControl = new ConnectController();
                                $objControl->RealizarLogin($_POST["email"], $_POST["senha"]);
                            }
                       ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
