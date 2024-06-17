<?php
get_header();
if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>
            </header>
            <div class="entry-content">
                <?php the_content(); ?>
                <?php if ( function_exists('get_field') ) : ?>
                    <p><strong>Nome:</strong> <?php the_field('ave_nome'); ?></p>
                    <p><strong>Nome Científico:</strong> <?php the_field('ave_nome_cientifico'); ?></p>
					<p><strong>Nome Popular:</strong> <?php the_field('ave_popular'); ?></p>
                    <p><strong>Data de Nascimento:</strong> <?php the_field('ave_nascimento'); ?></p>
					<p><strong>Sexo:</strong> <?php the_field('ave_sexo'); ?></p>
                   	<!-- Ave Pai -->
					<p><strong>Ave Pai:</strong> 
						<?php
						$ave_pai_id = get_field('ave_pai');
						if ($ave_pai_id) {
							if (is_array($ave_pai_id)) {
								$nomes_pais = array();
								foreach ($ave_pai_id as $pai_id) {
									$nome_pai = get_field('ave_nome', $pai_id);
									if ($nome_pai) {
										$nomes_pais[] = $nome_pai;
									}
								}
								if (!empty($nomes_pais)) {
									echo implode(', ', $nomes_pais);
								}
							} else {
								$ave_pai_nome = get_field('ave_nome', $ave_pai_id); // Obtém o nome da ave pai
								if ($ave_pai_nome) {
									echo $ave_pai_nome;
								}
							}
						} else {
							echo 'Sem pai';
						}
						?>
					</p>
					<!-- Ave Mãe -->
					<p><strong>Ave Mãe:</strong> 
					<?php
					$ave_mae_id = get_field('ave_mae');
					if ($ave_mae_id) {
						if (is_array($ave_mae_id)) {
							$nomes_maes = array();
							foreach ($ave_mae_id as $mae_id) {
								$nome_mae = get_field('ave_nome', $mae_id);
								if ($nome_mae) {
									$nomes_maes[] = $nome_mae;
								}
							}
							if (!empty($nomes_maes)) {
								echo implode(', ', $nomes_maes);
							}
						} else {
							$ave_mae_nome = get_field('ave_nome', $ave_mae_id); // Obtém o nome da ave mãe
							if ($ave_mae_nome) {
								echo $ave_mae_nome;
							}
						}
					} else {
						echo 'Sem mãe';
					}
					?>
					</p>
                    <p><strong>Cor:</strong> <?php the_field('ave_cor'); ?></p>
                <?php endif; ?>
            </div>
        </article>
    <?php endwhile;
else :
    echo '<p>Nenhum conteúdo encontrado.</p>';
endif;
get_footer();
?>
