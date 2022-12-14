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
$benefits_slider   = get_field('benefits_slider');
$benefits_title   = get_field('benefits_title');
$benefits_info      = get_field('benefits_info');

?>
<section class="benefits">
    <div class="container">
        <div class="benefits__info">
            <?php if ($benefits_slider) { ?>
                <div class="benefits__info-slider">
                    <?php foreach ($benefits_slider as $item) {
                        $benefits_slider_item = $item['benefits_slider_item'];
                    ?>
                        <?php if ($benefits_slider_item) : ?>
                            <div class="info-slider__item"><?php echo $benefits_slider_item; ?></div>
                    <?php endif;
                    }
                    ?>
                </div>
            <?php
            } ?>
            <div class="benefits__info-block">
                <?php if ($benefits_title) : ?>
                    <div class="info-block__title"><?php echo $benefits_title; ?></div>
                <?php endif; ?>
                <?php if ($benefits_info) : ?>
                    <div class="info-block__text"><?php echo $benefits_info; ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>