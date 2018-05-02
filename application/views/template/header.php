<!DOCTYPE html>
<html>

<head>
    <title>ChitChat - <?= $title?></title>
    <meta name="description" content="website description"/>
    <meta name="keywords" content="website keywords, website keywords"/>
    <meta http-equiv="content-type" content="text/html; charset=windows-1252"/>
    <link rel="stylesheet" type="text/css" href="<?PHP echo base_url('assets/css/style.css') ?> "/>
    <!-- modernizr enables HTML5 elements and feature detects -->
    <script type="text/javascript" src="js/modernizr-1.5.min.js"></script>
</head>

<body>
<div id="main">
    <header>
        <div id="banner">
            <div id="welcome">
                <h2>ChitChat</h2>
            </div><!--close welcome-->
        </div><!--close banner-->
    </header>

    <nav>
        <div id="menubar">
            <ul id="nav">
                <li <?= $title === "Accueil"? "class=\"current\";":'' ?>>
                    <!--Work In Progress-->
                    <?= anchor('Salle/accueil', 'Accueil') ?>
                </li>
                <li >
                    <?= anchor('Salle/changeSalle/LIBRE', 'Chat') ?>
                </li>
                <li <?= $title === "index"? "class=\"current\";":'' ?>>
                    <?= anchor('auth', 'Administration') ?>
                </li>
                <li>
                    <?= anchor('auth/logout', 'Déconnexion') ?>
                </li>
            </ul>
        </div><!--close menubar-->
    </nav>

    <div id="site_content">
        <div id="content">
