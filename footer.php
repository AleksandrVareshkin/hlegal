<?php $address = get_field('address', 'option'); ?>
<?php $phone = get_field('phone', 'option'); ?>
<?php $e_mail = get_field('e-mail', 'option'); ?>
<?php $copyright = get_field('copyright', 'option'); ?>
<?php $social_link = get_field('social_link', 'option'); ?>
<?php $social_icon = get_field('social_icon', 'option'); ?>
<?php $map_link = get_field('map_link', 'option'); ?>

<footer class="footer">
    <div class="container">
        <div class="footer__inner">
            <div class="footer__location">
                <div class="footer__address">
                    <?php echo $address; ?>
                </div>
                <div class="footer__dot"></div>
                <a href="<?php echo $map_link['url']; ?>" class="footer__map-btn" target="blank">
                    On map
                </a>
            </div>
            <div class="footer__contact">
                <a class="footer__fb" href="<?php echo $social_link['url']; ?>" target="_blank">
                    <?php echo file_get_contents($social_icon['url']) ?>
                </a>
                <div class="footer__dot"></div>
                <a class="footer__phone" href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a>
                <div class="footer__dot"></div>
                <a class="footer__email" href="mailto:<?php echo $e_mail; ?>"><?php echo $e_mail; ?></a>
            </div>
            <div class="footer__copyright">
                <a href="<?php echo $copyright['url']; ?>" target="_blank">
                    <?php echo $copyright['title']; ?>
                </a>
            </div>
        </div>
    </div>
</footer>
</div>
<!--wrapper-->
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<?php wp_footer(); ?>
</body>

</html>