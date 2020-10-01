<?php get_header(); ?>
<main role="main" class="man-main">

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active d-flex justify-content-center align-items-center" style="background-image: url('<?php echo empty($manPostThumbnail) ? bloginfo('template_url') . "/images/Web-Banner.jpg" : $manPostThumbnail; ?>');height: 75vh;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col text-center">
                            <a href="<?php echo home_url(); ?>" class="font-size-2 d-inline-block font-weight-bold font-color-3">
                                <i class="fas fa-hotel"></i>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center text-uppercase">
                            <h1 class="font-color-3"><?php the_title(); ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="man-content">
        <div class="man-overview py-5">
            <div class="man-container container mx-auto">
                <div class="row text-center">
                    <div class="col">
                        <h1><?php single_post_title(); ?></h1>
                        <?php
                        $page_for_posts_id = get_option('page_for_posts');
                        echo get_post_field('post_content', $page_for_posts_id);
                        ?>
                    </div>
                </div>
                <div class="row">
                    <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <?php get_template_part('content', get_post_format()); ?>
                        <?php endwhile; ?>
                    <?php else : ?>
                        <p><?php echo __("There is no posts."); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>
<?php wp_footer(); ?>