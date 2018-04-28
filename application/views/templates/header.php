

<head>
	<title>Free HTML5 Templates</title>
	<meta name="description" content="website description" />
	<meta name="keywords" content="website keywords, website keywords" />
	<meta http-equiv="content-type" content="text/html; charset=windows-1252" />
	<!-- j mis le href comme la digt avec base url via php -->
	<link rel="stylesheet" type="text/css" href=<?=base_url('assets/css/style.css')?> />
	<!-- modernizr enables HTML5 elements and feature detects -->
	<!-- qyand j'ai inspecter via le navigateur il me dit que le js ne marche pas ! -->
	<script type="text/javascript" src=<?=base_url('assets/js/modernizr-1.5.min.js')?>></script>
</head>

<body>
<div id="main">
	<header>
		<div id="banner">
			<div id="welcome">
				<h2>Chit Chat!</h2>
			</div><!--close welcome-->
		</div><!--close banner-->
	</header>

	<nav>
		<div id="menubar">
			<ul id="nav">
				<li class="current"><?=anchor('salle', 'acceuil', 'acceuil')?></li>
				<li><a href="ourwork.html">Our Work</a></li>
				<li><a href="testimonials.html">Testimonials</a></li>
				<li><a href="projects.html">Projects</a></li>
				<li><a href="contact.html">Contact Us</a></li>
			</ul>
		</div><!--close menubar-->
	</nav>
