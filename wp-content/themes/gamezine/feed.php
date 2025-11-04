<div class="feed">

<?php $feed = get_option('gamz_feed')?>
	
<form action="http://www.feedburner.com/fb/a/emailverify" method="post" target="popupwindow" onsubmit="window.open('http://www.feedburner.com/fb/a/emailverifySubmit?feedId=<?php echo($feed); ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
<input type="text" class="input" value="Sign Up here for email feed..." onfocus="if (this.value == 'Sign Up here for email feed...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Sign Up here for email feed...';}" name="email"/><input type="hidden" value="http://feeds.feedburner.com/~e?ffid=<?php echo($feed); ?>" name="url"/>
<input type="submit" class="sbutton" value="Submit"  />

</form>
	
	
	
	
</div>
