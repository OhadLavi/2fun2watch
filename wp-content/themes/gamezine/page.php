<?php get_header(); ?>



<div id="content"><a name="content"></a>
<?php include (TEMPLATEPATH . "/tab.php"); ?>

<?php if (have_posts()) : ?>

<?php while (have_posts()) : the_post(); ?>
<div class="single" id="post-<?php the_ID(); ?>">
<div class="title">

<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><div align="right"><?php the_title(); ?></div></a></h2>
<div class="data"><span class="author">Posted by <?php the_author(); ?></span> <span class="clock"> On <?php the_time('F - j - Y'); ?></span></div>	
</div>

<div class="cover">
<div class="sentry">
					<?php the_content('Read the rest of this entry &raquo;'); ?>
						<div class="clear"></div>
							<?php include (TEMPLATEPATH . '/ad1.php'); ?>
</div>

</div>

<div class="spostinfo">
					<div class="category"><?php the_category(', '); ?> </div>
				
</div>


</div>

		<?php endwhile; endif; ?>
						
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>