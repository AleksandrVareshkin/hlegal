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
$class_name = 'intro-block';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}

$intro_logo      = get_field('intro_logo');
$intro_btn      = get_field('intro_btn');
$intro_text      = get_field('intro_text');
//        <?php echo '<pre>' . var_export($intro_logo, true) . '</pre>'; 
?>
<section class="intro">
    <div class="intro__block" style="background-image: url('<?php echo $intro_logo['url']; ?>')">
        <?php if ($intro_text) : ?>
            <div class="intro__title"><?php echo $intro_text; ?></div>
        <?php endif; ?>
        <button class="intro__btn">
        </button>
    </div>
</section>