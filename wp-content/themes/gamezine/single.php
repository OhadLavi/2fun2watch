<?php get_header(); ?>

<div id="content">

<?php if (have_posts()) : ?>

<?php while (have_posts()) : the_post(); ?>
<div class="single" id="post-<?php the_ID(); ?>">

<table width="100%"><tr><td width="50%"><div class="title"><h2><div class="title1" align="right"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><b><font size="6"><?php the_title(); ?></font></b></a></div></h2></div></td>
<td width="50%"><div align="left" class="postdate">Posted by <strong><?php the_author() ?></strong> on  <?php the_time('F jS, Y') ?> <?php if (current_user_can('edit_post', $post->ID)) { ?> | <?php edit_post_link('Edit', '', ''); } ?></div>
</td></tr></table>

<div class="entry">
<?php if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) { the_post_thumbnail(array(150,150), array('class' => 'aligncenter post_thumbnail')); } ?>
</div>
<div class="cover">
<div class="sentry">
<font size="3"><?php the_content('Read the rest of this entry &raquo;'); ?></font>
<div class="clear"></div>
<?php include (TEMPLATEPATH . '/ad1.php'); ?>
</div>

</div>

<div class="spostinfo">
<div class="category"><?php the_category(', '); ?> </div>				
</div>

</div>

<?php comments_template(); ?>
<?php endwhile; else: ?>
<h1 class="title">Not Found</h1>
<p>I'm Sorry,  you are looking for something that is not here. </p>

<?php endif; ?>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>