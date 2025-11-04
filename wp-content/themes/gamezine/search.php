<?php get_header(); ?>

<div id="content"><a name="content"></a>
<?php if (have_posts()) : ?>
<h2 class="pagetitle">Search Results</h2>
<?php while (have_posts()) : the_post(); ?>
<div class="single" id="post-<?php the_ID(); ?>">
<div class="title">

<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><div class="title1" align="right"><?php the_title(); ?></div></a></h2>
<div class="data"><span class="author">Posted by <?php the_author(); ?></span> <span class="clock"> On <?php the_time('F - j - Y'); ?></span></div>	
</div>

<div class="cover">
<div class="sentry">
<div class="text">
<?php
$content = get_the_excerpt();
echo substr($content, 0, 200);
?>
</div>

<div class="clear"></div>
						
</div>

</div>

<div class="spostinfo">
					<div class="category"><?php the_category(', '); ?> </div>
				
</div>


</div>

<?php endwhile; ?>

<div class="navigation">
<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
</div>

<?php else : ?>

<h1 class="title">Not Found</h1>
<p>Sorry, no post matched your criteria. Try a different search?</p>

<?php endif; ?>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>