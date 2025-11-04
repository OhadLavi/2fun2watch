
<div id="fideohead"></div>

<div id="fvideo">
<?php 
	$video = get_option('gamz_video_category'); // Number of other entries to be shown
	
	$my_query = new WP_Query('category_name= '. $video .'&showposts=1');
while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID;
?>

<?php the_content('Continue...'); ?>
<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
 <div class="fat"> Posted by <?php the_author(); ?> </div>
<?php endwhile; ?>
</div>
<div id="fideofoot"></div>
 <div class="clear"></div>