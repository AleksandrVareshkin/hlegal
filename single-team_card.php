<?php
get_header('single');

$team_email = get_field('team_email');
$team_position = get_field('team_position');
$team_linkedin = get_field('team_linkedin');
$team_intro = get_field('team_intro');
$team_property = get_field('team_property');

?>

<main class="main">
    <section class="single-team">
        <div class="container">
            <div class="single-team__block">
                <div class="single-team__photo" style=" background-image: url(<?php echo get_the_post_thumbnail_url($id, 'large'); ?>)">
                </div>
                <div class="single-team__description">
                    <div class="single-team__name"><?php echo the_title() ?></div>
                    <div class="single-team__prof"><?php echo $team_position; ?></div>
                    <div class="single-team__email"><a href="mailto:<?php echo $team_email; ?>"><?php echo $team_email; ?></a></div>
                    <div class="single-team__linkedin"><a href="<?php echo $team_linkedin['url']; ?>"><?php echo $team_linkedin['title']; ?></a></div>
                </div>
                <div class="separated-line"></div>
                <div class="single-team__info">
                    <div class="info-block"><?php echo $team_intro ?></div>

                    <?php if ($team_property) :  ?>

                        <?php foreach ($team_property as $item) {
                            $property_name = $item['property_name'];
                            $property_text = $item['property_text'];
                        ?>
                            <div class="info-block">
                                <h2 class="info-block__header"><?php echo $property_name; ?></h2>
                                <div class="info-block__text"><?php echo $property_text; ?></div>
                            </div>
                        <?php
                        } ?>

                    <?php endif; ?>

                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>