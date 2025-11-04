<script type="text/javascript">
stepcarousel.setup({
	galleryid: 'mygallery', //id of carousel DIV
	beltclass: 'belt', //class of inner "belt" DIV containing all the panel DIVs
	panelclass: 'panel', //class of panel DIVs each holding content
	panelbehavior: {speed:500, wraparound:true, persist:true},
	defaultbuttons: {enable: true, moveby: 3, leftnav: ['http://web2feel.com/gamezine/wp-content/uploads/tl.jpg', -48, 0], rightnav: ['http://web2feel.com/gamezine/wp-content/uploads/tr.jpg', 0, 0]},
	statusvars: ['statusA', 'statusB', 'statusC'], //register 3 variables that contain current panel (start), current panel (last), and total panels
	contenttype: ['external'] //content setting ['inline'] or ['external', 'path_to_external_file']
})


</script>

<div id="mygallery" class="stepcarousel">
<div class="belt">
<?php 
	$slidecat = get_option('gamz_slide_category'); 
	$slidecount = get_option('gamz_slide_count');
	
	$my_query = new WP_Query('category_name= '. $slidecat .'&showposts='.$slidecount.'');
while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID;
?>

<div class="panel">
<?php $screen = get_post_meta($post->ID,'screen', true); ?>

<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" > <img src="<?php echo ($screen); ?>" width="160" height="110" alt="<?php the_title(); ?>"/> </a>


</div>

<?php endwhile; ?>



</div>

</div>
