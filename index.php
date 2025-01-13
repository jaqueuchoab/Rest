<!--Template para as demais páginas, reservada para genéricos-->
<!--Todas as páginas criadas irão seguir a formatação dela, porém isso pode ser modificado na interface do wordpress: todas as páginas > página que quer adicionar o modelo de template > template > mudar para o modelo desejado-->
<?php get_header(); ?>
<!--se tiver post, entra no laço de repetição e enquanto tiver posts chama o post-->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<?php the_title(); ?>
	<?php the_content(); ?>

<!--se não tiver posts exibe mensagem de erro-->
<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
<?php get_footer(); ?>	
