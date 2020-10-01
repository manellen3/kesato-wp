<?php if (is_single()): ?>
    <h1><?php the_title(); ?></h1>
    <div class="blog-post-thumbnail w-100 mb-3">
        <?php if (has_post_thumbnail()): ?>
            <?php the_post_thumbnail(); ?>
        <?php endif; ?>
    </div>
    <p class="blog-post-meta">
        <?php the_time("F j, Y g:i a"); ?> - by 
        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
            <?php the_author(); ?>
        </a>
    </p>
    <?php the_content(); ?>
<?php else: ?>
    <?php
    //post thumbnail
    $manPostThumbnail = get_the_post_thumbnail_url(get_the_ID(), 'full');
    
    //post thumbnail alt or title
    $manPostThumbnailAlt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true );
    if($manPostThumbnailAlt){
        $manPostThumbnailAlt = esc_html($manPostThumbnailAlt);
    }
    else{
        $manPostThumbnailAlt = get_the_title();
    }
    ?>
    <article class="d-flex flex-wrap">
        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
            <div class="man-picture-container">
                <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo empty($manPostThumbnail) ? bloginfo('template_url')."/images/no-post-thumbnail.jpg" : $manPostThumbnail; ?>" alt="<?php echo $manPostThumbnailAlt; ?>" class="img-fluid">
                </a>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            <?php
            $terms = wp_get_post_terms(get_the_ID(), 'category', array());
            foreach ($terms as $term) {
                $s = end($terms) != $term ? ",&nbsp;" : "";
                echo "<a href=\"" . get_category_link($term->term_id) . "\" title=\"$term->name\">" . $term->name . "</a>$s";
            }
            ?>
            <a href="<?php the_permalink(); ?>"><h3 class="font-weight-bold"><?php the_title(); ?></h3></a>
            <?php the_excerpt(); ?>
        </div>
    </article>
<?php endif; ?>