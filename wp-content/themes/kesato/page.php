<?php /* default template */ ?>
<?php
get_header();

//post thumbnail
$manPostThumbnail = get_the_post_thumbnail_url(get_the_ID(), 'full');
?>
<main role="main" class="man-main man-default-page">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active d-flex justify-content-center align-items-center" style="background-image: url('<?php echo empty($manPostThumbnail) ? bloginfo('template_url')."/images/no-post-thumbnail.jpg" : $manPostThumbnail; ?>');height: 75vh;">
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
                <div class="col text-justify">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>
<?php wp_footer(); ?>
