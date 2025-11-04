
<div class="featlist">
<div class="highlight"></div>
<?php 
	$highcat = get_option('gamz_story_category'); 
	$highcount = get_option('gamz_story_count');
	
	$my_query = new WP_Query('category_name= '. $highcat .'&showposts='.$highcount.'');
while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID;
?>

<div class="fblock">
<?php $screen = get_post_meta($post->ID,'screen', true); ?>
<img src="<?php echo ($screen); ?>" width="80" height="55" alt=""  />

<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
<div class="auth"> Posted by <?php the_author(); ?> </div> 
<div class="fmeta"> 	

<?php the_time('M-j-Y'); ?> 

</div>
</div>
<?php endwhile; ?>



</div>
 <div class="clear"></div>