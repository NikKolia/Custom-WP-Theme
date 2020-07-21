<?php
/*
Template Name: НАШИ САМЫЕ БОЛЬШИЕ ПРОЕКТЫ
*/
?>
<?php get_header(); ?>

    <!-- Local page styles
    ================================================== -->
    <style>
        .masthead {
            background: url(<?php echo get_template_directory_uri(); ?>/assets/images/header-bg.png);
        }
    </style>

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-auto center">
                <?php if (is_active_sidebar('counter')) : ?>
                    <div class="frontCounter">
                        <?php dynamic_sidebar('counter'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-auto center">
                <h2><?php echo get_the_title(); ?></h2>
            </div><!-- /.col-md -->
        </div>
    </div><!-- /.container -->

    <div class="container">
        <div class="row justify-content-center">

            <?php
            global $post;
            $args = array(
                'numberposts' => 3,
                'post_type' => 'articles',
                'publish' => true
            );
            $page_posts = get_posts($args);
            foreach ($page_posts as $post) {
                ?>
                <div class="col-md-4 imageGrid">

                    <div class="imageGrid-image">
                        <?php echo get_the_post_thumbnail(get_the_ID(), 'article-image'); ?>
                    </div>
                    <div class="line">
                        <hr/>
                    </div>
                    <h3><?php the_title(); ?></h3>
                    <?php the_excerpt(); ?>

                </div><!-- /.col-md -->
                <?php
            }
            wp_reset_postdata();
            ?>

        </div>
    </div><!-- /.container -->

<?php get_footer(); ?>