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
$baner_img  = get_field('baner_img');
$baner_text  = get_field('baner_text');
$baner_color  = get_field('baner_color');
?>

<section style="background-image: url(<?php echo $baner_img['url']; ?>)" class="about-baner__bg-team">
    <?php if ($baner_text) : ?>
        <h2 style="color: <?php echo $baner_color; ?>;"><?php echo $baner_text; ?></h2>
    <?php endif; ?>
</section>