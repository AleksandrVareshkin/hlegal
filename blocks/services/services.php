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
$services_cards   = get_field('services_cards');
$services_button   = get_field('services_button');
$services_intro      = get_field('services_intro');

$background_color = get_field('background_color');
$text_color       = get_field('text_color');

// Build a valid style attribute for background and text colors.
$styles = array('background-color: ' . $background_color, 'color: ' . $text_color);
$style  = implode('; ', $styles);

?>
<section class="services">
    <div class="container">
        <div class="services__list-block">
            <a href="<?php echo $services_button['url']; ?>">
                <button class="list-btn">
                    <span class="list-btn__name"><?php echo $services_button['title']; ?></span>
                    <span class="list-btn__arow"></span>
                </button>
            </a>
            <div class="list__title">
                <?php echo $services_intro; ?>
            </div>

            <div class="services__list">
                <?php if ($services_cards) { ?>
                    <?php foreach ($services_cards as $item) {
                        $img = $item['card_image'];
                        $title = $item['card_title'];
                        $info = $item['card_info'];
                    ?>
                        <div class="list-item">
                            <?php if ($img) : ?>
                                <div class="list-item__icon">
                                    <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
                                </div>
                            <?php endif; ?>
                            <?php if ($title) : ?>
                                <div class="list-item__title">
                                    <?php echo $title; ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($info) : ?>
                                <div class="list-item__text">
                                    <?php echo $info; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                <?php
                    }
                } ?>
            </div>
        </div>
    </div>
</section>