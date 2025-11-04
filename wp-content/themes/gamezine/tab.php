<div id="tabzine" class="widgets">

            <ul class="tabnav">
                <li class="sp1"><a href="#sponsor"></a></li>
                <li class="ab2"><a href="#about"></a></li>
                <li class="rn3"><a href="#random"></a></li>
            </ul>

<div id="sponsor" class="tabdiv">
           <div class="sponsor">

<ul>

<li>
<?php 
	$ban1 = get_option('gamz_banner1'); 
	$url1 = get_option('gamz_url1'); 
	?>
<a href="<?php echo ($url1); ?>" rel="bookmark" title=""><img src="<?php echo ($ban1); ?>" alt="" /></a>
</li>	

<li>
<?php 
	$ban2 = get_option('gamz_banner2'); 
	$url2 = get_option('gamz_url2'); 
	?>
<a href="<?php echo ($url2); ?>" rel="bookmark" title=""><img src="<?php echo ($ban2); ?>" alt="" /></a>
</li>

<li>
<?php 
	$ban3 = get_option('gamz_banner3'); 
	$url3 = get_option('gamz_url3'); 
	?>
<a href="<?php echo ($url3); ?>" rel="bookmark" title=""><img src="<?php echo ($ban3); ?>" alt="" /></a>
</li>

<li>
<?php 
	$ban4 = get_option('gamz_banner4'); 
	$url4 = get_option('gamz_url4'); 
	?>
<a href="<?php echo ($url4); ?>" rel="bookmark" title=""><img src="<?php echo ($ban4); ?>" alt="" /></a>
</li>

</ul>
</div>

            </div><!--/popular-->
            
            <div id="about" class="tabdiv">

<?php 
	$img = get_option('gamz_img'); 
	$about = get_option('gamz_about'); 
	?>			
<p class="text">
<img src="<?php echo ($img); ?>" class="avatar" alt="" />
<?php echo ($about); ?> 
</p>
			
			
			
			
			
			
            </div><!--/recent-->
            
            <div id="random" class="tabdiv">
<div class="ranlist">

<?php $my_query = new WP_Query('showposts=4&orderby=rand'); ?>

<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>

<div class="rblock">
<?php $screen = get_post_meta($post->ID,'screen', true); ?>
<img src="<?php echo ($screen); ?>" width="80" height="55" alt=""  />

<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
<div class="auth"> <?php the_time('M-j-Y'); ?>  </div> 
<div class="fmeta"> 	

<?php comments_popup_link('ADD COMMENTS', '1 COMMENT', '% COMMENTS'); ?>
</div>
</div>
<?php endwhile; ?>



</div>

            </div><!--featured-->

        </div><!--/widget-->
		 <div class="clear"></div>