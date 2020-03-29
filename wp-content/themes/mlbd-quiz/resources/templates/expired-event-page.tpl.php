<?php get_header(); ?>

<section class="thank-you">
    <div class="wrap-expire">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post() ?>
                        <?php
                        the_content();
                        ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>