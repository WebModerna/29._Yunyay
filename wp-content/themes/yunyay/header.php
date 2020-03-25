<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
	<meta charset="<?php bloginfo('charset');?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=2.0" />
<?php

// Variables necesarias
$meta_keywords2 	= of_get_option("meta_keywords2", "");
$meta_description	= of_get_option("meta_description", "");
$logo_uploader		= of_get_option("logo_uploader", "");
$meta_keywords = rwmb_meta('meta_keywords', '');
$meta_descripcion = rwmb_meta('meta_descripcion', '');

// Averiguando son las determinadas páginas
if( is_front_page() || is_home() || is_search() || is_404() )
{
	// La descripción
	if( $meta_description )
	{
		echo '<meta name="description" content="'.$meta_description.'" />';
	}

	// las palabras claves
	if( $meta_keywords2 )
	{
		echo '<meta name="keywords" content="'.$meta_keywords2.'" />';
	}

?>
<title><?php bloginfo('name');?> | <?php bloginfo('description');?></title>
<?php } else {

	if( $meta_descripcion )
	{
		echo '<meta name="description" content="'.$meta_descripcion.'" />';
	}

	// las palabras claves
	if( $meta_keywords )
	{
		echo '<meta name="keywords" content="'.$meta_keywords.'" />';
	}

?> 
<title><?php the_title();?> | <?php bloginfo('name');?></title>

<?php } ?>

	<link type="text/css" rel="stylesheet" href="<?php bloginfo('stylesheet_directory');?>/css/style.css" />

<?php if(is_page('contacto')) { ?>

	<link type="text/css" rel="stylesheet" href="<?php bloginfo('stylesheet_directory');?>/css/datepicker.css" />

<?php };?>

<?php if (!wp_is_mobile()) { //Condicionales para IE ?>
	<!--[if IE 8]>
	<script async type="text/javascript" src="<?php bloginfo('stylesheet_directory');?>/js/html5.js"></script>
	<script async type="text/javascript" src="<?php bloginfo('stylesheet_directory');?>/js/respond.js"></script>
	<script async type="text/javascript" src="<?php bloginfo('stylesheet_directory');?>/js/selectivizr-min.js"></script>
	<link type="text/css" rel="stylesheet" href="<?php bloginfo('stylesheet_directory');?>/css/styleIE8.css" />
	<![endif]-->	
<?php };?>
	
<?php if (wpmd_is_ios()) { //Los Favicones para iOS ?>
	<link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php bloginfo('stylesheet_directory');?>/img/apple-touch-icon-57x57.png" />
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php bloginfo('stylesheet_directory');?>/img/apple-touch-icon-114x114.png" />
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php bloginfo('stylesheet_directory');?>/img/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php bloginfo('stylesheet_directory');?>/img/apple-touch-icon-144x144.png" />
	<link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?php bloginfo('stylesheet_directory');?>/img/apple-touch-icon-60x60.png" />
	<link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php bloginfo('stylesheet_directory');?>/img/apple-touch-icon-120x120.png" />
	<link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?php bloginfo('stylesheet_directory');?>/img/apple-touch-icon-76x76.png" />
	<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php bloginfo('stylesheet_directory');?>/img/apple-touch-icon-152x152.png" />
<?php }; //Favicones generales ?>
	<link rel="icon" type="image/png" href="<?php bloginfo('stylesheet_directory');?>/img/favicon-196x196.png" sizes="196x196" />
	<link rel="icon" type="image/png" href="<?php bloginfo('stylesheet_directory');?>/img/favicon-96x96.png" sizes="96x96" />
	<link rel="icon" type="image/png" href="<?php bloginfo('stylesheet_directory');?>/img/favicon-32x32.png" sizes="32x32" />
	<link rel="icon" type="image/png" href="<?php bloginfo('stylesheet_directory');?>/img/favicon-16x16.png" sizes="16x16" />
	<link rel="icon" type="image/png" href="<?php bloginfo('stylesheet_directory');?>/img/favicon-128.png" sizes="128x128" />
	<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('stylesheet_directory');?>/img/favicon.ico" />
<?php flush();?>
<?php wp_head();?>
</head>
<body>
	<div id="contenedor">
		<header class="header">
			<?php if(is_front_page()) { 
				/*Acá coloqué unos estilos que eliminan los contornos. Pero tuve que hacerlo detro de un condicional para que funcione solo en la home*/
				?>
			<div id="logo_home">
			<?php } else { ?>
			<div id="logo">
				<?php }?>
				<figure>
					<a href="<?php bloginfo('url');?>" title="<?php
					if( $meta_description )
					{
						echo $meta_description;
					}
					?>">
						<h1>
							<img class="boton_general" src="<?php
								if( $logo_uploader )
								{
									echo $logo_uploader;
								}
								else
								{
									bloginfo('stylesheet_directory');?>/img/logo full 3.png<?php }?>" alt="Cabañas Yunyay" />
						</h1>
					</a>
				</figure>
			</div>


			<nav class="barra_navegacion">
				<ul>
					<li>
						<div id="boton_menu">
							<a href="#">
								<div id="menu_hamburguesa" class="circle boton_general">&#9776;</div>
							</a>
						</div>

						<?php 
							$default=array(
								'container'=>false,
								'depth'=>2,
								'menu'=>'header_nav',
								'theme_location'=>'header_nav',
								'items_wrap'=>'<ul id="header_nav" class="hidden">%3$s</ul>'
							);
							wp_nav_menu($default);
						?>
					</li>
				</ul>
				<div class="clearfix"></div>
			</nav>
		</header>
		<section class="seccion_principal">