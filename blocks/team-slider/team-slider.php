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
 */

// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'services-block';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.

?>
<?php
$args = array(
    'post_type' => 'team_card',
    'post_status' => 'publish',
    'posts_per_page' => -1
);
$gallary = get_posts($args);
?>
<section class="team-slider">
    <div class="container">
        <div class="swiper swiper-comment">
            <div class="swiper-wrapper">
                <?php foreach ($gallary as $item) {
                    $id = $item->ID;
                    $team_slogan = get_field("team_slogan", $id);
                    $team_position = get_field("team_position", $id);
                ?>
                    <div class="swiper-slide">
                        <div class="swiper-slide__img" style="background-image: url(<?php echo get_the_post_thumbnail_url($id, 'large'); ?>)"></div>
                        <div class="swiper-slide__info">
                            <div class="swiper-slide__slogan">
                                <?php echo $team_slogan; ?>
                            </div>
                            <div class="swiper-slide__name"><?php echo get_the_title($id); ?></div>
                            <div class="swiper-slide__position"><?php echo $team_position; ?></div>
                        </div>
                    </div>
                <?php }; ?>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>