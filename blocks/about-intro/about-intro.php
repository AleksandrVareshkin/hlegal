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
$title  = get_field('title');
$content  = get_field('content');
$stat  = get_field('stat');
?>

<section class="about-intro">
    <div class="container">
        <?php if ($title) : ?>
            <div class="content__title"><?php echo $title; ?></div>
        <?php endif; ?>
        <div class="about-intro__inner">
            <?php if ($content) :  ?>
                <div class="about-intro__inner-content">
                    <?php foreach ($content as $item) {
                        $content_block  = $item['content_block'];
                    ?>
                        <p><?php echo $content_block ?></p>
                    <?php
                    } ?>
                </div>
            <?php endif; ?>
            <?php if ($stat) :  ?>
                <div class="about-intro__inner-stat">
                    <?php foreach ($stat as $item) {
                        $stat_icon  = $item['stat_icon'];
                        $stat_value  = $item['stat_value'];
                        $stat_info  = $item['stat_info'];
                    ?>
                        <div class="stat__item">
                            <div class="stat__header">
                                <div class="stat__icon">
                                    <?php echo file_get_contents($stat_icon['url']) ?>
                                </div>
                                <div class="stat__value">
                                    <?php echo $stat_value; ?>
                                </div>
                            </div>
                            <div class="stat__text">
                                <?php echo $stat_info; ?>
                            </div>
                        </div>
                    <?php
                    } ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>