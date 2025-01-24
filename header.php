<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title><?php bloginfo('name'); ?> | <?php wp_title('') ?> <?php the_field_cmb2('title_seo') ?></title>

		<meta name='description' content='<?php bloginfo('name'); ?> | <?php wp_title('') ?> <?php the_field_cmb2('description_seo') ?>' />

		<link href='https://fonts.googleapis.com/css?family=Alegreya+SC' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">
    <!--Header Wordpress-->
    <?php wp_head(); ?>
    <!--Fechando Header Wordpress-->
	</head>

	<body>
		
		<header>
			<nav>
				<?php 
					$args = array(
					'menu' => 'principal',
					'container' => false  
					);
					wp_nav_menu($args);
				?>
			</nav>

			<h1><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/rest.png" alt="Rest"></h1>

			<!--Compartilhar informações/valores de uma página para outras-->
			<?php $contato = get_page_by_title('contato')->ID; ?>
			<p><?php the_field_cmb2('endereco_header', $contato) ?></p>
			<p><?php the_field_cmb2('telefone_header', $contato) ?></p>
		</header>