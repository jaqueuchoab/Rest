<?php
// Template Name: Sobre
?>
<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<section class="container sobre">
			<h2 class="subtitulo"><?php the_title(); ?></h2>

			<div class="grid-8">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/rest-fachada.jpg" alt="Fachada do Rest">
			</div>

			<div class="grid-8">
				<?php
					$topicos = get_field_cmb2('topicos');

					if(isset($topicos)) { foreach($topicos as $topico) { ?>

					<h2><?php echo $topico['title']?></h2>
					<p><?php echo $topico['descricao']?></p>
					
				<?php } } ?>
			</div>
		</section>

<?php endwhile; else: endif; ?>

<?php get_footer(); ?>