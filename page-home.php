<!--O código abaixo adiciona esta página como modelo para um template-->
<!--Essa é a página padrão, mas para isso é necessário mudar na interface do wordpress: Configurações > Leitura > A página inicial mostra > Marcar "Uma página estática" e determina quais a inicial e qual a final-->
<?php
// Template Name: Menu da Semana
?>
<!--linkando o header.php-->
<?php get_header(); ?>	

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<section class="container">
			<h2 class="subtitulo"><?php the_title(); ?></h2>

			<div class="menu-item grid-8">
				<h2><?php the_field_cmb2('comida1'); ?></h2>
				<ul>
					<?php
					// USANDO OS VALORES DE CAMPOS AGRUPADORES/REPETIDORES
					// Variável que guarda os campos
					$pratos = get_field_cmb2('pratos1');
					// Abriu um bloco de if{} e um bloco foreach{}, a função isset() no bloco de if verifica se há itens na var/campo de pratos
					if (isset($pratos)) { foreach($pratos as $prato) { ?>
					<li>
						<!-- Buscando no prato[index] o valor da key 'preco', similar a objetos em js-->
						<span><sup>R$</sup><?php echo $prato['preco']; ?></span>
						<div>
							<h3><?php echo $prato['nome']; ?></h3>
							<p><?php echo $prato['descricao']; ?></p>
						</div>
					</li>
					<?php 
					// Fechando os blocos de foreach e if, respectivamente
					} }
					?>
				</ul>
			</div>

			<div class="menu-item grid-8">
				<h2><?php the_field_cmb2('comida2'); ?></h2>
				<ul>
					<?php
					// USANDO OS VALORES DE CAMPOS AGRUPADORES/REPETIDORES
					// Variável que guarda os campos
					$pratos = get_field_cmb2('pratos2');
					// Abriu um bloco de if{} e um bloco foreach{}, a função isset() no bloco de if verifica se há itens na var/campo de pratos
					if (isset($pratos)) { foreach($pratos as $prato) { ?>
					<li>
						<!-- Buscando no prato[index] o valor da key 'preco', similar a objetos em js-->
						<span><sup>R$</sup><?php echo $prato['preco']; ?></span>
						<div>
							<h3><?php echo $prato['nome']; ?></h3>
							<p><?php echo $prato['descricao']; ?></p>
						</div>
					</li>
					<?php 
					// Fechando os blocos de foreach e if, respectivamente
					} }
					?>
				</ul>
			</div>

		</section>

<?php endwhile; else: endif?>

<?php get_footer(); ?>	
