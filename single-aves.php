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
                    <p><strong>Data de Nascimento:</strong> <?php the_field('ave_nascimento'); ?></p>
                    <p><strong>Ave Pai:</strong> <?php the_field('ave_pai'); ?></p>
                    <p><strong>Ave Mãe:</strong> <?php the_field('ave_mae'); ?></p>
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
