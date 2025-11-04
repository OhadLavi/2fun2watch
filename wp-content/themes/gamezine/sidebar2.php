
<div class="sidebar2" align="center">
<ul>
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar 2') ) : else : ?>

 <li>
	<h2>Recent Posts</h2>	
<ul>
	<?php $myposts = get_posts('numberposts=10&offset=1');foreach($myposts as $post) :?>
<li>
	<a href="<?php the_permalink(); ?>"><?php the_title();?></a>
</li>
<?php endforeach; ?>
</ul>
</li>
	<?php wp_list_categories('orderby=name&show_count=0&title_li=<h2>Categories</h2>'); ?>
		<li>
			<h2>Archives</h2>
			<ul>
				<?php wp_get_archives('type=monthly&limit=12'); ?>
			</ul>
		</li>
		<li>
			<h2>Meta</h2>
			<ul>
				<?php wp_register(); ?>
				<li><?php wp_loginout(); ?></li>
				<li><a href="http://validator.w3.org/check/referer">Valid XHTML</a></li>
			</ul>
		</li>

	<?php endif; ?>
		<li>
			<h2></h2>
			<ul>
				<li>
<div id="eXTReMe"><a href="http://extremetracking.com/open?login=watchfun">
<img src="http://t1.extreme-dm.com/i.gif" style="border: 0;"
height="38" width="41" id="EXim" alt="eXTReMe Tracker" /></a>
<script type="text/javascript"><!--
EXref="";top.document.referrer?EXref=top.document.referrer:EXref=document.referrer;//-->
</script><script type="text/javascript"><!--
var EXlogin='watch4fu' // Login
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
</div></noscript></div>

</li>
                                          </ul>
		</li>
</ul>
</div>

