<?php
$themename = "Gamezine";
$shortname = "gamz";
$mx_categories_obj = get_categories('hide_empty=0');
$mx_categories = array();
foreach ($mx_categories_obj as $mx_cat) {
	$mx_categories[$mx_cat->cat_ID] = $mx_cat->cat_name;
}
$categories_tmp = array_unshift($mx_categories, "Select a category:");	
$number_entries = array("Select a Number:","1","2","3","4","5","6","7","8","9","10", "12","14", "16", "18", "20" );
$options = array (

			

	array(  "name" => "Featured Post Gallery Settings",
            "type" => "heading",
			"desc" => "This section customizes the featured post area on the top of the theme .",
       ),
	array( 	"name" => "Featured Post Category",
			"desc" => "Select the category that you would like to have displayed in the top featured post section on your homepage.",
			"id" => $shortname."_gldcat",
			"std" => "Uncategorized",
			"type" => "select",
			"options" => $mx_categories),
			
	array(	"name" => "Number of featured posts",
			"desc" => "Select the number of posts to display .",
			"id" => $shortname."_gldct",
			"std" => "1",
			"type" => "select",
			"options" => $number_entries),

    array(  "name" => "Sliding Panel Settings",
            "type" => "heading",
			"desc" => "This section customizes the sliding panel area and the number of panels to be displayed.",
       ),

	array( 	"name" => "Sliding Panel category",
			"desc" => "Select the category that you would like to have displayed on the sliding.",
			"id" => $shortname."_slide_category",
			"std" => "Uncategorized",
			"type" => "select",
			"options" => $mx_categories),
			
	array(	"name" => "Number of sliding panels",
			"desc" => "Select the number of panels to display .",
			"id" => $shortname."_slide_count",
			"std" => "1",
			"type" => "select",
			"options" => $number_entries),
			
	 array(  "name" => "Gamezine top 5 section",
            "type" => "heading",
			"desc" => "This section customizes the top 5 games area on the top of the sidebar and the number of stories displayed there.",
       ),		
	array( 	"name" => "Gamezine top 5 section category",
			"desc" => "Select the category that you would like to have displayed in the top-5 games list on your homepage.",
			"id" => $shortname."_story_category",
			"std" => "Uncategorized",
			"type" => "select",
			"options" => $mx_categories),
	array(	"name" => "Number of highlight reel posts",
			"desc" => "Select the number of posts to display ( Upto 5 is good).",
			"id" => $shortname."_story_count",
			"std" => "1",
			"type" => "select",
			"options" => $number_entries),
		
			
			
	array(  "name" => "About Me Settings",
            "type" => "heading",
			"desc" => "Set your About me image and text from here .",
       ),			
		
  	array("name" => "About me Image",
			"desc" => "Enter your avatar image url here.",
            "id" => $shortname."_img",
            "std" => "My image",
            "type" => "text"),    
	   
	array("name" => "About me text",
			"desc" => "Enter some descriptive text about you, or your site.",
            "id" => $shortname."_about",
            "std" => "There is something about me..",
            "type" => "textarea"),    
	      		
			
	array(  "name" => "Featured Video Settings",
            "type" => "heading",
			"desc" => "Displays a featured video on the homepage .",
       ),		
	
	array( 	"name" => "Featured Video category",
			"desc" => "Select the category that you would like to have displayed in the videos section on your homepage.",
			"id" => $shortname."_video_category",
			"std" => "Select a category:",
			"type" => "select",
			"options" => $mx_categories),
	
  
	array(  "name" => "Banner Ads Settings",
            "type" => "heading",
			"desc" => "You can setup four 125x125 banners for your blog from here",
       ), 
	   
	array("name" => "Banner-1 Image",
			"desc" => "Enter your 125x125 banner image url here.",
            "id" => $shortname."_banner1",
            "std" => "Banner-1 image",
            "type" => "text"),    
	   
	array("name" => "Banner-1 Url",
			"desc" => "Enter the banner-1 url here.",
            "id" => $shortname."_url1",
            "std" => "Banner-1 url",
            "type" => "text"),    
	      
	 
	array("name" => "Banner-2 Image",
			"desc" => "Enter your 125x125 banner image url here.",
            "id" => $shortname."_banner2",
            "std" => "Banner-2 image",
            "type" => "text"),    
	   
	array("name" => "Banner-2 Url",
			"desc" => "Enter the banner-2 url here.",
            "id" => $shortname."_url2",
            "std" => "Banner-2 url",
            "type" => "text"), 

	array("name" => "Banner-3 Image",
			"desc" => "Enter your 125x125 banner image url here.",
            "id" => $shortname."_banner3",
            "std" => "Banner-3 image",
            "type" => "text"),    
	   
	array("name" => "Banner-3 Url",
			"desc" => "Enter the banner-3 url here.",
            "id" => $shortname."_url3",
            "std" => "Banner-3 url",
            "type" => "text"),

	array("name" => "Banner-4 Image",
			"desc" => "Enter your 125x125 banner image url here.",
            "id" => $shortname."_banner4",
            "std" => "Banner-4 image",
            "type" => "text"),    
	   
	array("name" => "Banner-4 Url",
			"desc" => "Enter the banner-4 url here.",
            "id" => $shortname."_url4",
            "std" => "Banner-4 url",
            "type" => "text"),
			
		
	
	array(  "name" => "Adsense Settings",
            "type" => "heading",
			"desc" => "Adjust the adsense settings for your blog here .",
       ),
	   
	array("name" => "AdSense setup",
			"desc" => "Enter your  adsense code here ( Example:- pub-00012345678900 ).",
            "id" => $shortname."_ad",
            "std" => "Adsense Code",
            "type" => "text"),   
	   
	
   
);

function mytheme_add_admin() {

    global $themename, $shortname, $options;

    if ( $_GET['page'] == basename(__FILE__) ) {
    
        if ( 'save' == $_REQUEST['action'] ) {

                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

                header("Location: themes.php?page=controlpanel.php&saved=true");
                die;

        } else if( 'reset' == $_REQUEST['action'] ) {

            foreach ($options as $value) {
                delete_option( $value['id'] ); 
                update_option( $value['id'], $value['std'] );}

            header("Location: themes.php?page=controlpanel.php&reset=true");
            die;

        }
    }

      add_theme_page($themename." Options", "$themename Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}

function mytheme_admin() {

    global $themename, $shortname, $options;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
    
    
?>
<div class="wrap">
<h2><b><?php echo $themename; ?> theme options</b></h2>

<form method="post">

<table class="optiontable" >

<?php foreach ($options as $value) { 
    
	
if ($value['type'] == "text") { ?>
        
<tr align="left"> 
    <th scope="row"><?php echo $value['name']; ?>:</th>
    <td>
        <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" size="40" />
				
    </td>
	
</tr>
<tr><td colspan=2> <small><?php echo $value['desc']; ?> </small> <hr /></td></tr>

<?php } elseif ($value['type'] == "textarea") { ?>
<tr align="left"> 
    <th scope="row"><?php echo $value['name']; ?>:</th>
    <td>
                   <textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" cols="40" rows="5"/><?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>
</textarea>

				
    </td>
	
</tr>
<tr><td colspan=2> <small><?php echo $value['desc']; ?> </small> <hr /></td></tr>

<?php } elseif ($value['type'] == "select") { ?>

    <tr align="left"> 
        <th scope="top"><?php echo $value['name']; ?>:</th>
	        <td>
            <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
                <?php foreach ($value['options'] as $option) { ?>
                <option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; }?>><?php echo $option; ?></option>
                <?php } ?>
            </select>
			
        </td>
	
</tr>
<tr><td colspan=2> <small><?php echo $value['desc']; ?> </small> <hr /></td></tr>



<?php } elseif ($value['type'] == "heading") { ?>

   <tr valign="top"> 
		    <td colspan="2" style="text-align: left;"><h2 style="color:green;"><?php echo $value['name']; ?></h2></td>
		</tr>
<tr><td colspan=2> <small> <p style="color:red; margin:0 0;" > <?php echo $value['desc']; ?> </P> </small> <hr /></td></tr>

<?php } ?>
<?php 
}
?>
</table>
<p class="submit">
<input name="save" type="submit" value="Save changes" />    
<input type="hidden" name="action" value="save" />
</p>
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
</form>
<h2>Preview (updated when options are saved)</h2>
<iframe src="../?preview=true" width="100%" height="600" ></iframe>
<p>Visit us for more free <a href="http://web2feel.com/" >wordpress themes</a>. For support related issues visit the <a href="http://web2feel.com/forum/" >support forums</a></p>
<?php
}
add_action('admin_menu', 'mytheme_add_admin'); ?>
