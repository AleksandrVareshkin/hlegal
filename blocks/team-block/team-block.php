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
$class_name = 'team-block';
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
<section class="team">
    <div class="container">

        <div class="team__block">
            <?php foreach ($gallary as $item) {
                $id = $item->ID;
                $team_position = get_field("team_position", $id);
            ?>
                <div class="team__item">
                    <div class="item-img" style="background-image: url(<?php echo get_the_post_thumbnail_url($id, 'large'); ?>)"></div>
                    <div class="item-description">
                        <div class="item-info">
                            <div class="item-name"><?php echo get_the_title($id); ?></div>
                            <div class="item-prof"><?php echo $team_position; ?></div>
                        </div>
                        <a class="item-arrow" href="<?php echo get_permalink($id); ?>" style=" background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/img/team_faces/More-btn.png)" ;>
                        </a>
                    </div>
                </div>
            <?php }; ?>
        </div>
    </div>
</section>