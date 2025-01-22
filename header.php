<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title><?php bloginfo('name'); ?></title>

		<link href='https://fonts.googleapis.com/css?family=Alegreya+SC' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">
    <!--Header Wordpress-->
    <?php wp_head(); ?>
    <!--Fechando Header Wordpress-->
	</head>

	<body>
		
		<header>
			<nav>
				<ul>
					<li class="current_page_item"><a href="/">Menu</a></li>
					<li><a href="/restwp/sobre/">Sobre</a></li>
					<li><a href="/restwp/contato/">Contato</a></li>
				</ul>
			</nav>

			<h1><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/rest.png" alt="Rest"></h1>

			<!--Compartilhar informações/valores de uma página para outras-->
			<?php $contato = get_page_by_title('contato')->ID; ?>
			<p><?php the_field_cmb2('endereco_header', $contato) ?></p>
			<p><?php the_field_cmb2('telefone_header', $contato) ?></p>
		</header>