<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 * 
 */

// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'publications-block';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}

$show_radio_btn = get_field('show_radio_btn');
$show_more_btn = get_field('show_more_btn');
$publications_btn = get_field('publications_btn');
$publications_intro = get_field('publications_intro');

?>

<section class="publications-section">
    <?php
    if ($show_radio_btn == 'yes') : ?>
        <div class="radio-toolbar">
            <input type="radio" id="radioNews" name="radioFruit" value="news" checked>
            <label for="radioNews">news</label>

            <input type="radio" id="radioArticles" name="radioFruit" value="articles">
            <label for="radioArticles">articles</label>
        </div>
    <?php endif; ?>
    <div class="publications">
        <div class="container">
            <a href="<?php echo $publications_btn['url']; ?>">
                <button class="publications__btn">
                    <span class="btn__name"><?php echo $publications_btn['title']; ?></span>
                    <span class="btn__arow"></span>
                </button>
            </a>
            <div class="publications__title">
                <h2><?php echo $publications_intro; ?></h2>
            </div>


            <div class="publications__block">

                <?php
                $posts = new WP_Query(array(
                    "post_type"        => 'publication_card',
                    "post_status"      => "publish",
                    "posts_per_page"   => 3,
                    "paged"            => 1,
                ));
                if ($posts->have_posts()) : while ($posts->have_posts()) : $posts->the_post();
                        $id = $item->ID;
                        $publication_content = get_field("publication_content", $id);
                ?>

                        <div class="publications__item">
                            <div class="item-img" style="background-image: url(<?php echo get_the_post_thumbnail_url($id, 'large'); ?>)"></div>
                            <div class="item-descriptions">
                                <a class="item-descriptions__title" href="<?php echo get_permalink(); ?>"><?php echo get_the_title($id); ?></a>
                                <div class="item-descriptions__date"><?php echo get_the_date('F, Y', $id) ?></div>
                                <div class="item-descriptions__text"><?php echo $publication_content; ?></div>
                                <?php $terms = get_the_terms($id, 'publications_type'); ?>
                                <?php if ($terms) : ?>
                                    <div class="item-descriptions__text">
                                        <?php
                                        foreach ($terms as $tax) {
                                            echo '<span>' . __($tax->name) . '</span>';
                                        }
                                        ?>
                                    </div>
                                <?php endif; ?>
                                <div class="item-descriptions__line"></div>
                            </div>
                        </div>

                    <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>


            </div>

            <?php if ($show_more_btn == 'yes') : ?>
                <?php if ($posts->max_num_pages > 1) : ?>
                    <script>
                        var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                        var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
                        var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                        var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
                    </script>
                    <div class="js-loadmore publications__more-btn">More publications</div>
                <?php endif; ?>
            <?php endif; ?>

        </div>
    </div>
</section>