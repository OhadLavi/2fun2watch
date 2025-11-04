<?php

//header adv

$random=rand(1, 2);
if($random==1){
?>
<style>
.oadv
{
border-style:solid;
border-width:1px;
border-color:red;
width:336px;
height:280px;
}
</style>
<div class="oadv">
<script type="text/javascript">
<!--
google_ad_client = "ca-pub-4195622678811351";
/* ad1 */
google_ad_slot = "1628091494";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
<?php
}
else {
?>
<style>
.gadv
{
border-style:solid;
border-width:1px;
border-color:green;
width:336px;
height:280px;
}
</style>
<div class="gadv">
<script type="text/javascript">
<!--
google_ad_client = "ca-pub-4195622678811351";
/* ad1 */
google_ad_slot = "1628091494";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
<?php } ?>