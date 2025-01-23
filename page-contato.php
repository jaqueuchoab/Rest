<?php
// Template Name: Contato
?>
<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<section class="container contato">
			<h2 class="subtitulo"><?php the_title(); ?></h2>

			<div class="grid-16">
				<a href="<?php the_field_cmb2('link_mapa'); ?>" target="_blank">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/rest-mapa.jpg" alt="Mapa para o Rest"></a>
			</div>

			
			<?php 
			$informes = get_field_cmb2('informes');

			if(isset($informes)) { foreach($informes as $informe) { ?>
				<div class="grid-1-3 contato-item">
					<h2><?php echo $informe['titulo'] ?></h2>
					<p><?php echo $informe['informe_um'] ?></p>
					<p><?php echo $informe['informe_dois'] ?></p>
					<p><?php echo $informe['informe_tres'] ?></p>
				</div>
			<?php } } ?>
		</section>

<?php endwhile; else: endif; ?>

<?php get_footer(); ?>