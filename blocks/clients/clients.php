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

$anchor = '';
if (!empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}
$class_name = 'services-block';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}

$clients   = get_field('clients');
$clients_title  = get_field('clients_title');

?>
<?php if ($clients) :  ?>
    <section class="clients">
        <div class="clients__title"><?php echo $clients_title; ?></div>
        <div class="clients__block">
            <?php foreach ($clients as $item) {
                $color = $item['bg_color'];
                $image = $item['image'];
            ?>
                <div class="clients__item" style="background-color:<?php echo $color; ?>;">
                    <img class="clients__img" src="<?php echo $image['url']; ?>" alt="">
                </div>
            <?php
            } ?>
        </div>
    </section>
<?php endif; ?>