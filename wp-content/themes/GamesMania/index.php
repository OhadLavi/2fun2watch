<?php get_header(); ?>
		<div class="span-24" id="contentwrap">
			<div class="span-16">
				<div id="content">	
                <?php if(is_home()) { include (TEMPLATEPATH . '/featured.php'); } ?>		
					<?php if (have_posts()) : ?>	
						<?php while (have_posts()) : the_post(); ?>
						<div class="postwrap" align="right">
						<div <?php post_class() ?> id="post-<?php the_ID(); ?>" onmouseover="style.backgroundColor='#35332d'" onmouseout="style.backgroundColor='#38352e'">
							<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><b><font color="white"><?php the_title(); ?></font></b></a></h2>
							<div class="postdate">Posted by <strong><?php the_author() ?></strong> on  <?php the_time('F jS, Y') ?> <?php if (current_user_can('edit_post', $post->ID)) { ?> | <?php edit_post_link('Edit', '', ''); } ?></div>
							<div class="entry">
                                <?php if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) { the_post_thumbnail(array(200,160), array('class' => 'alignleft post_thumbnail')); } ?>
<?php 
$content = get_the_excerpt();
echo substr($content, 0, 645);
?>
<br/>
<br/>
<br/>
<div class="readmorecontent"><a class="readmore" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">Read More &raquo;</a></div>
<br/>
<br/>					
</div>
							
						</div><!--/post-<?php the_ID(); ?>-->
						</div>

				<?php endwhile; ?>
				<div class="navigation">
					<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } else { ?>
					<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
					<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
					<?php } ?>
				</div>
				<?php else : ?>
					<h2 class="center"><font color="white">Not Found</font></h2>
					<p class="center">Sorry, but you are looking for something that isn't here.</p>
					<?php get_search_form(); ?>
			
				<?php endif; ?>
				</div>
<div class="span-24">
<div id="footerwrap" align="center">
<p>
<div class="span-2" align="left"><div id="eXTReMe" class="tracker"><a href="http://extremetracking.com/open?login=watchfun">
<img src="http://t1.extreme-dm.com/i.gif" style="border: 0;"
height="38" width="41" id="EXim" alt="eXTReMe Tracker" /></a>
<script type="text/javascript"><!--
EXref="";top.document.referrer?EXref=top.document.referrer:EXref=document.referrer;//-->
</script><script type="text/javascript"><!--
var EXlogin='watchfun' // Login
var EXvsrv='s10' // VServer
EXs=screen;EXw=EXs.width;navigator.appName!="Netscape"?
EXb=EXs.colorDepth:EXb=EXs.pixelDepth;EXsrc="src";
navigator.javaEnabled()==1?EXjv="y":EXjv="n";
EXd=document;EXw?"":EXw="na";EXb?"":EXb="na";
EXref?EXref=EXref:EXref=EXd.referrer;
EXd.write("<img "+EXsrc+"=http://e1.extreme-dm.com",
"/"+EXvsrv+".g?login="+EXlogin+"&amp;",
"jv="+EXjv+"&amp;j=y&amp;srw="+EXw+"&amp;srb="+EXb+"&amp;",
"l="+escape(EXref)+" height=1 width=1>");//-->
</script><noscript><div id="neXTReMe"><img height="1" width="1" alt=""
src="http://e1.extreme-dm.com/s10.g?login=watchfun&amp;j=n&amp;jv=n" />
</div></noscript>
</div>
</div>

<font color="white"><span lang="he">&#1492;&#1488;&#1514;&#1512; &#1502;&#1513;&#1502;&#1513; &#1488;&#1497;&#1504;&#1491;&#1511;&#1505; &#1500;&#1511;&#1497;&#1513;&#1493;&#1512;&#1497;&#1501; &#1513;&#1500; &#1510;&#1508;&#1497;&#1497;&#1492; &#1497;&#1513;&#1497;&#1512;&#1492; 
&#1489;&#1505;&#1512;&#1496;&#1497;&#1501; &#1493;&#1505;&#1491;&#1512;&#1493;&#1514; &#1489;&#1488;&#1497;&#1504;&#1496;&#1512;&#1504;&#1496;, &#1493;&#1488;&#1497;&#1504;&#1493; &#1502;&#1488;&#1495;&#1505;&#1503; &#1488;&#1514; &#1492;&#1511;&#1489;&#1510;&#1497;&#1501; &#1506;&#1500; &#1513;&#1512;&#1514;&#1497;&#1493;.</span>
<br /> Copyright <strong><a href="http://www.2fun2watch.com/">2fun2watch</a></strong>
- &#1510;&#1508;&#1497;&#1497;&#1492; &#1497;&#1513;&#1497;&#1512;&#1492;, Watch online </font> </p>
</div>
</div>
</div>
		<?php get_sidebars(); ?>

	</div>
	
<?php get_footer(); ?>
