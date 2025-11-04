<?php

add_action('admin_menu', 'pp_theme_store');

function pp_theme_store() {

  add_menu_page('Theme Store', 'Theme Store', 'administrator', basename(__FILE__), 'pp_theme_store_options', get_stylesheet_directory_uri().'/images/screen.png');

}

function pp_theme_store_options() {

   if (!current_user_can('manage_options'))  {
     wp_die( __('You do not have sufficient permissions to access this page.') );
   }

   $plugin_url = get_stylesheet_directory_uri().'/theme_store';
?>
<div class="wrap" style="width:800px; margin: 17px 0 40px 10px; border: 1px solid #ccc; background: #EAEEF3; -webkit-box-shadow: 0 1px 3px rgba(0,0,0,.2); -moz-box-shadow: 0 1px 3px rgba(0,0,0,.2); box-shadow: 0 1px 3px rgba(0,0,0,.2);">
 <div class="header_wrap">
  <div style="padding:20px 20px 20px 20px; font-weight: bold; font-size: 14pt;">
   Premium Wordpress Themes
  </div>
 </div>

 <div style="padding:20px; background:#fff">
            <script type="text/javascript" src="http://www.templatehelp.com/codes/pr_interface.php?cols=4&amp;rows=5&amp;sadult=0&amp;sp=0&amp;bgcolor=%23FFFFFF&amp;type=17&amp;iw=670&amp;ih=1015&amp;category=0&amp;pr_code=53v5DMN24n11s9l16N75mY7K3bH75q"></script>
    </div>
</div>
<br style="clear:both"/>
<img src="http://c.statcounter.com/7176002/0/fd1bc4c9/1/" style="border:none;" />
<?php

}
?>