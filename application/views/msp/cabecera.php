<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?= $titulo ?> | RTSERVICES</title>
    <link href="<?= base_url() ?>assets/img/icon/apple-touch-icon-144x144-precomposed.png" rel="apple-touch-icon-precomposed" sizes="144x144">
    <link href="<?= base_url() ?>assets/img/icon/apple-touch-icon-114x114-precomposed.png" rel="apple-touch-icon-precomposed" sizes="114x114">
    <link href="<?= base_url() ?>assets/img/icon/apple-touch-icon-72x72-precomposed.png" rel="apple-touch-icon-precomposed" sizes="72x72">
    <link href="<?= base_url() ?>assets/img/icon/apple-touch-icon-57x57-precomposed.png" rel="apple-touch-icon-precomposed">
    <link href="<?= base_url() ?>assets/img/icon/apple-touch-icon.png" rel="shortcut icon">

    <link href="<?= base_url() ?>assets/css/css.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/cssotro.css" rel="stylesheet">

    <link href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>assets/font-awesome/css/font-awesome.min.css">
    <link href="<?= base_url() ?>assets/timepicki/clockpicker.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/animate.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/reset.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/layout.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/components.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/plugins.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/default.theme.css" rel="stylesheet" id="theme">
    <link href="<?= base_url() ?>assets/css/sign.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/groupmaster/jquery.group.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/custom.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/swal/sweetalert2.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/dropzone.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/jquery.gritter.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/bootstrap-tour.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/jasny-bootstrap-fileinput.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/chosen.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/bootstrap-datepicker/css/datepicker.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/datatable/css/datatables.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/nprogress/nprogress.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/jqueryui/jquery-ui.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/fullcalendar/fullcalendar.css" rel="stylesheet">


    <style type="text/css">
        .jqstooltip 
        {
            position: absolute;
            left: 0px;
            top: 0px;
            visibility: hidden;
            background: rgb(0, 0, 0) transparent;
            background-color: rgba(0, 0, 0, 0.6);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);
            -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";
            color: white;
            font: 10px arial, san serif;
            text-align: left;
            white-space: nowrap;
            padding: 5px;
            border: 1px solid white;
            z-index: 10000;
        }

        .jqsfield 
        {
            color: white;
            font: 10px arial, san serif;
            text-align: left;
        }
    </style>

</head>
<body class="page-session page-sound page-header-fixed page-sidebar-fixed demo-dashboard-session" style="padding-right: 17px;">
    <?php foreach ($this->mdl_login->cargarUsuario() as $val) { ?>
    <?php $this->session->set_userdata('ssRol', $val->NombreRol); ?>
    <section id="wrapper">
        <header id="header">
            <div class="header-left">
                <div class="navbar-minimize-mobile left">
                    <i class="fa fa-bars"></i>
                </div>
                <div class="navbar-header">
                    <a id="tour-1" class="navbar-brand tour-tour-element tour-tour-0-element" href="#">
                        <img class="logo" src="<?= base_url() ?>assets/img/logo-white.png" alt="brand logo">
                    </a>
                </div>
                <div class="navbar-minimize-mobile right">
                    <i class="fa fa-cog"></i>
                </div>

                <div class="clearfix"></div>
            </div>
            
            <div class="header-right">
                <div class="navbar navbar-toolbar">
                    <ul class="nav navbar-nav navbar-right" style="margin-right: 30px">
                        <li id="tour-6" class="dropdown navbar-profile">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="meta">
                                    <span class="avatar">
                                        <img src="<?= base_url() ?>assets/img/<?= $val->NombreRol ?>.jpg" class="img-circle" alt="Perfil">
                                    </span>
                                    <span class="text hidden-xs hidden-sm text-muted"><?= $val->Nombre.' '.$val->Apellidos ?></span>
                                    <span class="caret"></span>
                                </span>
                            </a>
                            <ul class="dropdown-menu animated flipInX">
                                <li class="dropdown-header">Sistema</li>
                                <li class="divider"></li>
                                <li><a href="<?= base_url() ?>login/salir"><i class="fa fa-sign-out"></i>Salir</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <aside id="sidebar-left" class="sidebar-circle">
            <div id="tour-8" class="sidebar-content">
                <div class="media">
                    <a class="pull-left has-notif avatar" href="persona">
                        <img src="<?= base_url() ?>assets/img/<?= $val->NombreRol ?>.jpg" alt="Perfil">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Hola, <span><?= $val->Nombre ?></span></h4>
                        <small><?= $val->NombreRol ?></small>
                    </div>
                </div>
            </div>
            <ul id="tour-9" class="sidebar-menu" tabindex="0" style="height: 447px; overflow: hidden; outline: none;">
                <li class="submenu">
                    <a href="menu">
                        <span class="icon"><i class="fa fa-home"></i></span>
                        <span class="text">Menú principal</span>
                    </a>
                </li>
                <li class="sidebar-category">
                    <span>Usuario</span>
                    <span class="pull-right"><i class="fa fa-user"></i></span>
                </li>
                <li>
                    <a href="<?= base_url() ?>persona">
                        <span class="icon"><i class="fa fa-user"></i></span>
                        <span class="text">Gestión de personas</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>eps">
                        <span class="icon"><i class="fa fa-hospital-o"></i></span>
                        <span class="text">Gestión de eps</span>
                    </a>
                </li>
                <li class="sidebar-category">
                    <span>Clase</span>
                    <span class="pull-right"><i class="fa fa-gamepad"></i></span>
                </li>
                <li class="submenu">
                    <a href="<?= base_url() ?>ejecucion">
                        <span class="icon"><i class="fa fa-list"></i></span>
                        <span class="text">Ejecución de clases</span>
                    </a>
                    <a href="<?= base_url() ?>clase">
                        <span class="icon"><i class="fa fa-gamepad"></i></span>
                        <span class="text">Gestión de clases</span>
                    </a>
                    <a href="<?= base_url() ?>material">
                        <span class="icon"><i class="fa fa-hashtag"></i></span>
                        <span class="text">Gestión de materiales</span>
                    </a>
                </li>
            </ul>
            <div id="tour-10" class="sidebar-footer hidden-xs hidden-sm hidden-md">
                <a class="pull-left" data-toggle="tooltip" data-placement="top"><i class="fa fa-circle-o"></i></a>
                <a id="fullscreen" class="pull-left" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-title="Pantalla Completa" data-original-title="" title=""><i class="fa fa-desktop"></i></a>
                <a id="home" data-url="home" class="pull-left" href="menu" data-toggle="tooltip" data-placement="top" data-title="Pagina de Inicio" data-original-title="" title=""><i class="fa fa-home"></i></a>
                <a class="pull-left" data-toggle="tooltip" data-placement="top"><i class="fa fa-circle-o"></i></a>
            </div>

            <div id="ascrail2000"class="nicescroll-rails"style="width: 10px; z-index: 200; cursor: default; position: absolute; top: 86px; left: 0px; height: 447px; opacity: 0;">
                <div style="position: relative; top: 0px; float: right; width: 10px; height: 178px; border: 0px; border-radius: 5px; background-color: rgb(66, 66, 66); background-clip: padding-box;"></div>
            </div>
            <div id="ascrail2000-hr"class="nicescroll-rails"style="height: 10px; z-index: 200; top: 523px; left: 0px; position: absolute; cursor: default; display: none; width: 210px; opacity: 0;">
                <div style="position: absolute; top: 0px; height: 10px; width: 220px; border: 0px; border-radius: 5px; background-color: rgb(66, 66, 66); background-clip: padding-box;"></div>
            </div>
        </aside>
        <?php break; } ?>
        <section id="page-content">
