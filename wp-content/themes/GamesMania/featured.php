<?php
/**
 * Featured Posts Gallery
 * Displays featured posts using jd gallery if enabled
 */

// Only show featured posts if the option is enabled
$featured_posts = get_theme_option('featured_posts');

if ($featured_posts != '') {
    // Parse the featured posts (could be comma-separated post IDs or category ID)
    $post_ids = array();
    
    // Check if it's a comma-separated list of post IDs
    if (strpos($featured_posts, ',') !== false) {
        $post_ids = array_map('trim', explode(',', $featured_posts));
    } else {
        // Assume it's a single post ID or category ID
        $post_ids = array($featured_posts);
    }
    
    // Query for featured posts
    $featured_query = new WP_Query(array(
        'post_type' => 'post',
        'posts_per_page' => 5,
        'post__in' => $post_ids,
        'orderby' => 'post__in',
        'ignore_sticky_posts' => true
    ));
    
    if ($featured_query->have_posts()) {
        ?>
        <div id="featured-gallery" class="featured-posts">
            <div class="jdGallery" style="height: 300px; width: 100%;">
                <?php while ($featured_query->have_posts()) : $featured_query->the_post(); ?>
                    <div class="galleryItem">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('large', array('class' => 'gallery-image')); ?>
                                <div class="gallery-caption">
                                    <h3><?php the_title(); ?></h3>
                                    <?php if (has_excerpt()) : ?>
                                        <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                                    <?php endif; ?>
                                </div>
                            </a>
                        <?php else : ?>
                            <a href="<?php the_permalink(); ?>">
                                <div class="gallery-caption">
                                    <h3><?php the_title(); ?></h3>
                                    <?php if (has_excerpt()) : ?>
                                        <p><?php echo wp_trim_words(get_the_excerpt(), 30); ?></p>
                                    <?php endif; ?>
                                </div>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        
        <script type="text/javascript">
        window.addEvent('domready', function() {
            if (typeof Gallery != 'undefined') {
                var myGallery = new Gallery($('featured-gallery').getElement('.jdGallery'), {
                    timed: true,
                    delay: 5000,
                    showArrows: true,
                    showCarousel: false
                });
            }
        });
        </script>
        <?php
        wp_reset_postdata();
    }
}
?>

