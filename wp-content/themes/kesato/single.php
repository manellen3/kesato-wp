<?php get_header(); ?>
<?php if (have_posts()) : the_post(); ?>
    <?php
    //post thumbnail
    $manPostThumbnail = get_the_post_thumbnail_url(get_the_ID(), 'full');

    //post thumbnail alt or title
    $manPostThumbnailAlt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
    if ($manPostThumbnailAlt) {
        $manPostThumbnailAlt = esc_html($manPostThumbnailAlt);
    } else {
        $manPostThumbnailAlt = get_the_title();
    }
    ?>
    <main role="main" class="man-main">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active d-flex justify-content-center align-items-center" style="background-image: url('<?php echo empty($manPostThumbnail) ? bloginfo('template_url') . "/images/no-post-thumbnail.jpg" : $manPostThumbnail; ?>');height: 75vh;">
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
                <div class="row text-justify">
                    <div class="col text-justify man-content-padding">
                        <div class="blog-post col">
                            <?php get_template_part('content', get_post_format()); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php else : ?>
    <main role="main" class="man-main">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active d-flex justify-content-center align-items-center" style="background-image: url('<?php bloginfo('template_url') . "/images/no-post-thumbnail.jpg"; ?>');height: 75vh;">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col text-center">
                                <a href="<?php echo home_url(); ?>" class="font-size-2 d-inline-block font-weight-bold font-color-3">
                                    <i class="fas fa-hotel"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="man-content">
            <section class="man-section1 py-5">
                <div class="man-container container mx-auto">
                    <div class="row text-justify">
                        <div class="blog-post col">
                            <?php echo __("There is no post."); ?>
                            <?php // get_template_part( 404 ); exit(); 
                            ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
<?php endif; ?>
<?php get_footer(); ?>
<?php wp_footer(); ?>