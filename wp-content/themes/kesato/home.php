<?php
global $wp_query;
get_header();
$page_for_posts_id = get_option('page_for_posts');
$img = wp_get_attachment_image_src(get_post_thumbnail_id($page_for_posts_id), 'full');
$featured_image = $img[0];
$myCarousel = empty($featured_image) ? get_template_directory_uri() . "/images/Web-Banner.jpg" : $featured_image;
?>
<main role="main" class="man-main man-default-page">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active d-flex justify-content-center align-items-center" style="background-image: url('<?php echo $myCarousel; ?>');height: 75vh;">
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
    <div id="man-content" class="man-content">
        <div class="man-container container mx-auto">
            <div class="row">
                <div class="col text-justify man-content-padding">
                    <div class="row">
                        <div class="col">
                            <h1 class="font-weight-bold"><?php single_post_title(); ?></h1>
                            <?php
                            echo get_post_field('post_content', $page_for_posts_id);
                            ?>
                        </div>
                    </div>
                    <div class="row blog-post mb-5">
                        <?php // the query
                        $args = array(
                            "category_name" => "featured",
                            "posts_per_page" => 1
                        );
                        $the_query = new WP_Query($args); ?>
                        <?php if ($the_query->have_posts()) : ?>
                            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                                <?php get_template_part('content-featured', get_post_format()); ?>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        <?php else : ?>
                            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="row blog-post mb-5">
                        <?php if (have_posts()) : ?>
                            <?php while (have_posts()) : the_post(); ?>
                                <?php get_template_part('content', get_post_format()); ?>
                            <?php endwhile; ?>
                            <div class="man-loadmore-container col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <?php
                                global $wp_query; // you can remove this line if everything works for you
                                // don't display the button if there are not enough posts
                                if ($wp_query->max_num_pages > 1)
                                    echo '<div class="man-loadmore-btn btn btn-secondary w-100">More posts</div>'; // you can use <a> as well
                                ?>
                            </div>
                        <?php else : ?>
                            <p><?php echo __("There is no posts."); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>
<?php wp_footer(); ?>