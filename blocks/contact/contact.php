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
$class_name = 'contact';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}

$address = get_field('address', 'option');
$phone = get_field('phone', 'option');
$social_link = get_field('social_link', 'option');
$social_icon = get_field('social_icon', 'option');
$e_mail = get_field('e-mail', 'option');

$contact_intro = get_field('contact_intro');
$shortcode_form = get_field('shortcode_form');


?>

<section class="contact">
    <div class="container">

        <div class="contact__container">
            <div class="contact-info">
                <a class="contact-info__address"><?php echo $address ?></a>
                <div class="contact-info__line"></div>
                <a class="contact-info__phone" href="tel:<?php echo $phone ?>"><?php echo $phone ?></a>
                <a class="contact-info__email" href="mailto:<?php echo $e_mail ?>"><?php echo $e_mail ?></a>
                <div class="contact-info__line"></div>
                <a class="contact-info__fb" href="<?php echo $social_link['url']; ?>">
                    <div class="fb-logo">
                        <svg width="38" height="38" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M24 12.0733C24 5.40541 18.6274 0 12 0C5.37258 0 0 5.40541 0 12.0733C0 18.0995 4.38823 23.0943 10.125 24V15.5633H7.07813V12.0733H10.125V9.41343C10.125 6.38755 11.9165 4.71615 14.6576 4.71615C15.9705 4.71615 17.3438 4.95195 17.3438 4.95195V7.92313H15.8306C14.3399 7.92313 13.875 8.85379 13.875 9.80857V12.0733H17.2031L16.6711 15.5633H13.875V24C19.6118 23.0943 24 18.0995 24 12.0733Z" fill="#B3B3BA" />
                        </svg>
                    </div>
                    <div class="fb-name">Our page
                        <hr />
                        on facebook
                    </div>
                </a>
            </div>


            <div class="contact-form">
                <div class="contact-form__header">
                    <?php echo $contact_intro ?>
                </div>
                <div class="contact-form__block">
                    <?php echo $shortcode_form ?>
                </div>
            </div>

        </div>
    </div>
</section>