<?php if (is_single()): ?>
    <span class="blog-post-meta">
        <?php
        $terms = wp_get_post_terms(get_the_ID(), 'category', array());
        foreach ($terms as $term) {
            $s = end($terms) != $term ? ",&nbsp;" : " | ";
            echo "<a href=\"" . get_category_link($term->term_id) . "\" title=\"$term->name\">" . $term->name . "</a>$s";
        }
        ?>
        <?php the_time("F j, Y g:i a"); ?> - by 
        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>
    </span>
    <h1 class="font-weight-bold"><?php the_title(); ?></h1>
    <hr>
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
    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-5">
        <article>
            <div class="man-picture-container">
                <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo empty($manPostThumbnail) ? bloginfo('template_url')."/images/no-post-thumbnail.jpg" : $manPostThumbnail; ?>" alt="<?php echo $manPostThumbnailAlt; ?>" class="w-100 mb-3">
                </a>
            </div>
            <?php
            $terms = wp_get_post_terms(get_the_ID(), 'category', array());
            foreach ($terms as $term) {
                $s = end($terms) != $term ? ",&nbsp;" : "";
                echo "<a href=\"" . get_category_link($term->term_id) . "\" title=\"$term->name\">" . $term->name . "</a>$s";
            }
            ?>
            <a href="<?php the_permalink(); ?>"><h3 class="font-weight-bold"><?php the_title(); ?></h3></a>
        </article>
    </div>
<?php endif; ?>