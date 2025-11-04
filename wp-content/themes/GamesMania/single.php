<?php get_header(); ?>
	<div class="span-24" id="contentwrap">	
			<div class="span-16">
				<div id="content" align="right">	
					<?php if (have_posts()) : ?>	
						<?php while (have_posts()) : the_post(); ?>
                        <div class="postwrap">
						<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
							<h2 class="title"><font color="white"><b><?php the_title(); ?></b></font></h2>
							<div class="postdate">Posted by <strong><?php the_author() ?></strong> on  <?php the_time('F jS, Y') ?> <?php if (current_user_can('edit_post', $post->ID)) { ?> | <?php edit_post_link('Edit', '', ''); } ?></div>

							<div class="entry">
                                <?php if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) { the_post_thumbnail(array(300,225), array('class' => 'alignleft post_thumbnail')); } ?>
								<?php the_content('Read more &raquo;'); ?>
								<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
							</div>
							<div class="postmeta"><img src="<?php bloginfo('template_url'); ?>/images/folder.png" /> Posted in <?php the_category(', ') ?> <?php if(get_the_tags()) { ?> <img src="<?php bloginfo('template_url'); ?>/images/tag.png" /> <?php  the_tags('Tags: ', ', '); } ?></div>
						
							<div class="navigation clearfix">
								<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
								<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
							</div>
							
							<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
								// Both Comments and Pings are open ?>
								You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> from your own site.
	
							<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
								// Only Pings are Open ?>
								Responses are currently closed, but you can <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> from your own site.
	
							<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
								// Comments are open, Pings are not ?>
								You can skip to the end and leave a response. Pinging is currently not allowed.
	
							<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
								// Neither Comments, nor Pings are open ?>
								Both comments and pings are currently closed.
	
							<?php } edit_post_link('Edit this entry','','.'); ?>
						</div><!--/post-<?php the_ID(); ?>-->
						</div>
				<?php comments_template(); ?>
				
				<?php endwhile; ?>
			
				<?php endif; ?>
			</div>
<div class="span-24">
<div id="footerwrap" align="center"><font color="white"><span lang="he">&#1492;&#1488;&#1514;&#1512; &#1502;&#1513;&#1502;&#1513; &#1488;&#1497;&#1504;&#1491;&#1511;&#1505; &#1500;&#1511;&#1497;&#1513;&#1493;&#1512;&#1497;&#1501; &#1513;&#1500; &#1510;&#1508;&#1497;&#1497;&#1492; &#1497;&#1513;&#1497;&#1512;&#1492; 
&#1489;&#1505;&#1512;&#1496;&#1497;&#1501; &#1493;&#1505;&#1491;&#1512;&#1493;&#1514; &#1489;&#1488;&#1497;&#1504;&#1496;&#1512;&#1504;&#1496;, &#1493;&#1488;&#1497;&#1504;&#1493; &#1502;&#1488;&#1495;&#1505;&#1503; &#1488;&#1514; &#1492;&#1511;&#1489;&#1510;&#1497;&#1501; &#1506;&#1500; &#1513;&#1512;&#1514;&#1497;&#1493;.</span>
<br> Copyright <strong><a href="http://www.2fun2watch.com/">
2fun2watch</a></strong>- &#1510;&#1508;&#1497;&#1497;&#1492; &#1497;&#1513;&#1497;&#1512;&#1492;, Watch online </p></b></div></font>
</div>	
			</div>
		<?php get_sidebars(); ?>
	</div>
<?php get_footer(); ?>


