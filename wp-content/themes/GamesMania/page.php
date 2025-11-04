<?php get_header(); ?>
<div class="span-24" id="contentwrap">
<div class="span-16"> 
<div id="content">	

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="postwrap">
<div class="post" id="post-<?php the_ID(); ?>">
<h2 class="title" align="right"><?php the_title(); ?></h2>
<div class="entry">
<?php if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) { the_post_thumbnail(array(300,225), array('class' => 'alignleft post_thumbnail')); } ?>
<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
	
<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
	
</div>
</div>
</div>
<?php endwhile; endif; ?>
<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
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