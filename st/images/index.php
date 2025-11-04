<?php get_header(); ?>
<div id="content">

<?php if (have_posts()) : ?>

<?php while (have_posts()) : the_post(); ?>
<div class="post" id="post-<?php the_ID(); ?>">
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><div align="center"><?php the_title(); ?></div></a></h2>
<?php $screen = get_post_meta($post->ID,'screen', true); ?>
<?php if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) { ?>
<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
<?php 
if (strlen(the_title('','',FALSE)) > 25) 
the_post_thumbnail(array(150,150), array('class' => 'aligncenter post_thumbnail2')); 
else
the_post_thumbnail(array(150,150), array('class' => 'aligncenter post_thumbnail')); }
?>
</a>


</div>
<?php endwhile; ?>
	
<div class="navigation">
<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div> 
</div>

<?php else : ?>

<div class="post">
<h1 class="title">Not Found</h1>
<p>You are looking for something that isn't here.</p>
</div>

<?php endif; ?>	

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
