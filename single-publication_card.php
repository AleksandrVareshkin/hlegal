<?php

$publication_content = get_field('publication_content');
get_header('single'); ?>

<main class="main">
    <section class="publication">
        <div class="container publication__container">
            <div class="publication__img" style="background-image: url(<?php echo get_the_post_thumbnail_url($id, 'large'); ?>)"></div>
            <div class="publication__block">
                <div class="publication__title">
                    <h2>
                        <?php the_title() ?>
                    </h2>
                </div>
                <div class="publication__date">
                    <?php echo get_the_date('F, Y', $id) ?>
                </div>
                <div class="publication__content">
                    <?php echo $publication_content; ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>