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
$class_name = 'achievements';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}



$achievements = get_field('achievements-slider');
?>
<section class="achievements">
    <div class="container">
        <div class="achievements__title">achievements</div>

        <?php if ($achievements) :  ?>
            <div class="achievements__block">
                <div class="swiper swiper-about">
                    <div class="swiper-wrapper">
                        <?php foreach ($achievements as $item) {
                            $image = $item['achievements-img'];
                        ?>
                            <div class="swiper-slide">
                                <img src="<?php echo $image['url']; ?>" alt="#">
                            </div>
                        <?php
                        } ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    </div>
</section>