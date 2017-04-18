<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Blankon is a theme fullpack admin template powered by Twitter bootstrap 3 front-end framework. Included are multiple example pages, elements styles, and javascript widgets to get your project started.">
    <meta name="keywords" content="admin, admin template, bootstrap3, clean, fontawesome4, good documentation, lightweight admin, responsive dashboard, webapp">
    <meta name="author" content="Djava UI">
    <title>Login | RTSERVICES</title>
    <link href="<?= base_url() ?>assets/img/icon/apple-touch-icon-144x144-precomposed.png" rel="apple-touch-icon-precomposed" sizes="144x144">
    <link href="<?= base_url() ?>assets/img/icon/apple-touch-icon-114x114-precomposed.png" rel="apple-touch-icon-precomposed" sizes="114x114">
    <link href="<?= base_url() ?>assets/img/icon/apple-touch-icon-72x72-precomposed.png" rel="apple-touch-icon-precomposed" sizes="72x72">
    <link href="<?= base_url() ?>assets/img/icon/apple-touch-icon-57x57-precomposed.png" rel="apple-touch-icon-precomposed">
    <link href="<?= base_url() ?>assets/img/icon/apple-touch-icon.png" rel="shortcut icon">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700" rel="stylesheet">
    <link href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="<?= base_url() ?>assets/css/animate.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/reset.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/layout.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/components.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/plugins.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/default.theme.css" rel="stylesheet" id="theme">
    <link href="<?= base_url() ?>assets/css/sign.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/custom.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/swal/sweetalert2.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/nprogress/nprogress.css" rel="stylesheet">
    <style type="text/css">
        .flotante {
            display:scroll;
            position:fixed;
            bottom:320px;
            right:0px;
        }
    </style>
</head>
<body class="page-sound">
    <div id="sign-wrapper">
        <div class="brand">
            <img src="<?= base_url() ?>assets/img/logo-vertical.png" alt="brand logo"/>
        </div>
        <form class="sign-in form-horizontal shadow rounded no-overflow" id="login" method="POST">
            <div class="sign-header">
                <div class="form-group">
                    <div class="sign-text">
                        <span>Ingreso de usuarios</span>
                    </div>
                </div>
            </div>
            <div class="sign-body">
                <div class="form-group">
                    <div class="input-group input-group-lg rounded no-overflow" style="z-index: 1200;">
                        <input type="text" class="form-control input-sm" placeholder="Nombre de usuario" minlength="4" id="usuario" name="usuario">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group input-group-lg rounded no-overflow" style="z-index: 1200;">
                        <input type="password" class="form-control input-sm" placeholder="Contraseña" minlength="4" id="pass" name="pass">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    </div>
                </div>
            </div>
            <div class="sign-footer">
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-12 text-right">
                            <a href="recpass" title="lost password">¿Olvidaste tu contraseña?</a>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-theme btn-lg btn-block no-margin rounded" id="login-btn">Ingresar</button>
                </div>
            </div>
        </form>
        <a href="inicio" class="flotante" style=" text-decoration: none;"><button type="submit" class="btn btn-theme btn-lg btn-block no-margin rounded" id="login-btn" style="background-color: #636E7B;">Regresar</button></a>
    </div>
    <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.cookie.js"></script>
    <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.easing.1.3.min.js"></script>
    <script src="<?= base_url() ?>assets/js/retina.min.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.validate.min.js"></script>
    <script src="<?= base_url() ?>assets/js/blankon.sign.js"></script>
    <script src="<?= base_url() ?>assets/swal/sweetalert2.min.js"></script>
    <script src="<?= base_url() ?>ajax/ajxLogin.js"></script>
    <script src="<?= base_url() ?>assets/nprogress/nprogress.js"></script>
</body>
</html>