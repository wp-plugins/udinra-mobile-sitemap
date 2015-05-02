<?php
/*
Plugin Name: Udinra Mobile Sitemap 
Plugin URI: https://udinra.com/blog/google-mobile-sitemap-plugin-for-wordpress
Description: Automatically generates Google Mobile Sitemap and submits it to Google,Bing and Ask.com.
Author: Udinra
Version: 1.2
Author URI: https://udinra.com
*/

function Udinra_Mobile() {
if(!isset($_POST['udinra_ping_google_m'])){
$_POST['udinra_ping_google_m'] = "";
}
if(!isset($_POST['udinra_ping_bing_m'])){
$_POST['udinra_ping_bing_m'] = "";
}
if(!isset($_POST['udinra_ping_ask_m'])){
$_POST['udinra_ping_ask_m'] = "";
}
if(!isset($_POST['udinra_gzip_m'])){
$_POST['udinra_gzip_m'] = "";
}
if(!isset($_POST['udinra_autogen_m'])){
$_POST['udinra_autogen_m'] = "";
}
if(!isset($_POST['udinra_mobile_post'])){
$_POST['udinra_mobile_post'] = "";
}
if(!isset($_POST['udinra_mobile_page'])){
$_POST['udinra_mobile_page'] = "";
}
if($_POST['udinra_mob_site_m']){
update_option('udinra_ping_google_m',$_POST['udinra_ping_google_m']);
update_option('udinra_ping_bing_m',$_POST['udinra_ping_bing_m']);
update_option('udinra_ping_ask_m',$_POST['udinra_ping_ask_m']);
update_option('udinra_gzip_m',$_POST['udinra_gzip_m']);
update_option('udinra_autogen_m',$_POST['udinra_autogen_m']);
update_option('udinra_mobile_post',$_POST['udinra_mobile_post']);
update_option('udinra_mobile_page',$_POST['udinra_mobile_page']);
}
$wp_udinra_ping_google_m = get_option('udinra_ping_google_m');
$wp_udinra_ping_bing_m  = get_option('udinra_ping_bing_m');
$wp_udinra_ping_ask_m = get_option('udinra_ping_ask_m');
$wp_udinra_gzip_m = get_option('udinra_gzip_m');
$wp_udinra_autogen_m = get_option('udinra_autogen_m');
$wp_udinra_mobile_page = get_option('udinra_mobile_page');
$wp_udinra_mobile_post = get_option('udinra_mobile_post');
$udinra_sitemap_response_m = "";
if(isset($_POST['udinra_mob_site_m'])){
$udinra_sitemap_response_m = udinra_mobile_sitemap_loop(); 
}
?>
<div class="wrap">
<h2>Udinra Mobile Sitemap (Configuration)</h2>
<form method="post" id="Udinra_Mobile">
<fieldset class="options">
<p><input type="checkbox" id="udinra_autogen_m" name="udinra_autogen_m" value="udinra_autogen_m" <?php if($wp_udinra_autogen_m == true) { echo('checked="checked"'); } ?> />Automatically generate Sitemap after a post is published</p>
<p><input type="checkbox" id="udinra_gzip_m" name="udinra_gzip_m" value="udinra_gzip_m" <?php if($wp_udinra_gzip_m == true) { echo('checked="checked"'); } ?> />Create gzip file sitemap-mobile.xml.gz</p>
<p><input type="checkbox" id="udinra_mobile_page" name="udinra_mobile_page" value="udinra_mobile_page" <?php if($wp_udinra_mobile_page == true) { echo('checked="checked"'); } ?> />Include Pages</p>
<p><input type="checkbox" id="udinra_mobile_post" name="udinra_mobile_post" value="udinra_mobile_post" <?php if($wp_udinra_mobile_post == true) { echo('checked="checked"'); } ?> />Include Posts</p>
<p><input type="checkbox" id="udinra_ping_google_m" name="udinra_ping_google_m" value="udinra_ping_google_m" <?php if($wp_udinra_ping_google_m == true) { echo('checked="checked"'); } ?> />Ping Google (Recommended)</p>
<p><input type="checkbox" id="udinra_ping_bing_m" name="udinra_ping_bing_m" value="udinra_ping_bing_m" <?php if($wp_udinra_ping_bing_m == true) { echo('checked="checked"'); } ?> />Ping Bing (Recommended)</p>
<p><input type="checkbox" id="udinra_ping_ask_m" name="udinra_ping_ask_m" value="udinra_ping_ask_m" <?php if($wp_udinra_ping_ask_m == true) { echo('checked="checked"'); } ?> />Ping Ask.com (Recommended)</p>
<p><em>If you have a minute, please <a href="http://wordpress.org/extend/plugins/udinra-mobile-sitemap/" target="_blank">rate this plugin</a> on WordPress.org... thanks!</em></p>
<p><input type="submit" name="udinra_mob_site_m" value="Create Sitemap" /></p>
<p><?php echo "Status:"."<br><br>".$udinra_sitemap_response_m; ?></p>
</fieldset>
</form>
<p>Get Lifetime free updates and eCommerce plugin support <a href="http://udinra.com/blog/google-mobile-sitemap-plugin-for-wordpress">Buy Udinra Mobile Sitemap Pro</a></p>
<table>
<tr><td>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">  
 <input type="hidden" name="business" value="pitaji@udinra.com">  
 <input type="hidden" name="cmd" value="_donations">  
 <input type="hidden" name="item_name" value="udinra">  
 <input type="hidden" name="item_number" value="Udinra Image Sitemap plugin">  
 <input type="hidden" name="currency_code" value="USD">  
 <input type="image" name="submit" border="0" 
        src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif"  
        alt="PayPal - The safer, easier way to pay online">  
 <img alt="" border="0" width="1" height="1" src="https://www.paypal.com/en_US/i/scr/pixel.gif" >  
</form>
</td><td>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=238475612916304";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-like-box" data-href="http://www.facebook.com/udinra" data-width="300" data-show-faces="false" data-stream="false" data-header="false"></div>
</td>
</tr></table>
</div>
<?php

}

function udinra_mobile_sitemap_loop() {

$wp_udinra_ping_google_m = get_option('udinra_ping_google_m');
$wp_udinra_ping_bing_m  = get_option('udinra_ping_bing_m');
$wp_udinra_ping_ask_m = get_option('udinra_ping_ask_m');
$wp_udinra_gzip_m = get_option('udinra_gzip_m');
$wp_udinra_autogen_m = get_option('udinra_autogen_m');
$wp_udinra_mobile_page = get_option('udinra_mobile_page');
$wp_udinra_mobile_post = get_option('udinra_mobile_post');
$udinra_mob_pluginurl = plugin_dir_url( __FILE__ );

global $post;
$udinra_post_id = $post->post_id;

if($post != null) {
	if ($wp_udinra_autogen_m == true) {
	}
	else { return false;}
}

if ( preg_match( '/^https/', $udinra_mob_pluginurl ) && !preg_match( '/^https/', get_bloginfo('url') ) )
	$udinra_mob_pluginurl = preg_replace( '/^https/', 'http', $udinra_mob_pluginurl );

define( 'UDINRA_MOB_FRONT_URL', $udinra_mob_pluginurl );

global $wpdb;

if ($wp_udinra_mobile_page == true) {

$udinra_pages_mobile = $wpdb->get_results("SELECT id,post_modified_gmt FROM $wpdb->posts
				 			WHERE post_type = 'page'
							and post_status = 'publish'
							ORDER BY post_date desc");
	}

if ($wp_udinra_mobile_post == true) {

$udinra_posts_mobile = $wpdb->get_results("SELECT id,post_modified_gmt FROM $wpdb->posts
				 			WHERE post_type = 'post'
							and post_status = 'publish'
							ORDER BY post_date desc");
	}

if (empty ($udinra_posts_mobile) && empty ($udinra_pages_mobile)) {
	
	return false;

} else {
	$udinra_xml_mobile   = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
	$udinra_xml_mobile  .= '<?xml-stylesheet type="text/xsl" href='.'"'. UDINRA_MOB_FRONT_URL . 'xml-mobile-sitemap.xsl'. '"'.'?>' . "\n"; 
	$udinra_xml_mobile  .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:mobile="http://www.google.com/schemas/sitemap-mobile/1.0">' . "\n";
	
	if (empty ($udinra_pages_mobile)) { }
	else {
		foreach ($udinra_pages_mobile as $udinra_page_mobile) { 
			$udinra_page_url_mobile = get_permalink($udinra_page_mobile->id);
			$udinra_xml_mobile .= "\t"."<url>"."\n";
			$udinra_xml_mobile .= "\t\t"."<loc>".htmlspecialchars($udinra_page_url_mobile)."</loc>"."\n";
			$udinra_dateTime = new DateTime($udinra_page_mobile->post_modified_gmt);
			$udinra_xml_mobile .= "\t\t"."<lastmod>".$udinra_dateTime->format(DateTime::W3C)."</lastmod>"."\n";
			$udinra_xml_mobile .= "\t\t"."<priority>"."0.8"."</priority>"."\n";
			$udinra_xml_mobile .= "\t\t"."<mobile:mobile/>"."\n";
			$udinra_xml_mobile .= "\t"."</url>"."\n";
			
		} 
	}
	
	if (empty ($udinra_posts_mobile)) { }
	else {
		foreach ($udinra_posts_mobile as $udinra_post_mobile) { 
			$udinra_post_url_mobile = get_permalink($udinra_post_mobile->id);
			$udinra_xml_mobile .= "\t"."<url>"."\n";
			$udinra_xml_mobile .= "\t\t"."<loc>".htmlspecialchars($udinra_post_url_mobile)."</loc>"."\n";
			$udinra_dateTime = new DateTime($udinra_post_mobile->post_modified_gmt);
			$udinra_xml_mobile .= "\t\t"."<lastmod>".$udinra_dateTime->format(DateTime::W3C)."</lastmod>"."\n";
			$udinra_xml_mobile .= "\t\t"."<priority>"."0.6"."</priority>"."\n";
			$udinra_xml_mobile .= "\t\t"."<mobile:mobile/>"."\n";
			$udinra_xml_mobile .= "\t"."</url>"."\n";
		
		} 
	}
	
	$udinra_xml_mobile .= "</urlset>";

	$udinra_mobile_sitemap_url = ABSPATH . '/sitemap-mobile.xml';
	if (UdinraWritableMobile(ABSPATH) || UdinraWritableMobile($udinra_mobile_sitemap_url)) {
	if (file_put_contents ($udinra_mobile_sitemap_url, $udinra_xml_mobile)) {
		$udinra_tempurl_mobile = get_bloginfo('url'). '/sitemap-mobile.xml';
		$udinra_sitemap_response_m = "Sitemap created successfully"."<br>";
		}
	}

	if ($wp_udinra_gzip_m == true) {
		$udinra_mobile_sitemap_url = ABSPATH . '/sitemap-mobile.xml.gz';
		if (UdinraWritableMobile(ABSPATH) || UdinraWritableMobile($udinra_mobile_sitemap_url)) {
		$udinra_gz_m = gzopen($udinra_mobile_sitemap_url,'w9');
		gzwrite($udinra_gz_m, $udinra_xml_mobile);
		gzclose($udinra_gz_m);
		$udinra_tempurl_mobile = get_bloginfo('url'). '/sitemap-mobile.xml.gz';
		$udinra_sitemap_response_m = "Sitemap created successfully"."<br>";
		}
	}
			
	if ($wp_udinra_ping_google_m == true) {
		$udinra_ping_url_m ='';
		$udinra_ping_url_m = "http://www.google.com/webmasters/tools/ping?sitemap=" . urlencode($udinra_tempurl_mobile);
		$udinra_response_m = wp_remote_get( $udinra_ping_url_m );
		if (is_wp_error($udinra_response_m)) {
		}
		else {
		if($udinra_response_m['response']['code']==200)
			{ $udinra_sitemap_response_m .= "Pinged Google Successfully"."<br>"; }
			else { $udinra_sitemap_response_m .= "Failed to ping Google.Please submit your mobile sitemap(sitemap-mobile.xml) at Google Webmaster."."<br>";}}}
	if ($wp_udinra_ping_bing_m == true) {
		$udinra_ping_url_m ='';
		$udinra_ping_url_m = "http://www.bing.com/webmaster/ping.aspx?sitemap=" . urlencode($udinra_tempurl_mobile);
		$udinra_response_m = wp_remote_get( $udinra_ping_url_m );
		if (is_wp_error($udinra_response_m)) {
		}
		else {
		if($udinra_response_m['response']['code']==200)
			{ $udinra_sitemap_response_m .= "Pinged Bing Successfully"."<br>"; }
			else { $udinra_sitemap_response_m .= "Failed to ping Bing.Please submit your mobile sitemap(sitemap-mobile.xml) at Bing Webmaster."."<br>";}}}
	if ($wp_udinra_ping_ask_m == true) {
		$udinra_ping_url_m ='';
		$udinra_ping_url_m = "http://submissions.ask.com/ping?sitemap=" . urlencode($udinra_tempurl_mobile);
		$udinra_response_m = wp_remote_get( $udinra_ping_url_m );
		if (is_wp_error($udinra_response_m)) {
		}
		else {
		if($udinra_response_m['response']['code']==200)
			{ $udinra_sitemap_response_m .= "Pinged Ask.com Successfully"."<br>"; }
			else { $udinra_sitemap_response_m .= "Failed to ping Ask.com."."<br>"; }}}
		}
		$udinra_tempurl_mobile = get_bloginfo('url'). '/sitemap-mobile.xml';
		$udinra_sitemap_response_m .= '<a href='.$udinra_tempurl_mobile.' target="_blank" title="Mobile Sitemap URL">View Mobile Sitemap</a>';
	return $udinra_sitemap_response_m;
}
function udinra_mobile_sitemap_admin() {
	if (function_exists('add_options_page')) {
	add_options_page('Udinra Mobile Sitemap', 'Udinra Mobile Sitemap', 'manage_options', basename(__FILE__), 'Udinra_Mobile');
	}
}

function UdinraWritableMobile($udinra_filename_m) {
	if(!is_writable($udinra_filename_m)) {
		$udinra_sitemap_response_m = "The file sitemap-mobile.xml is not writeable please check permission of the file for more details visit http://udinra.com/blog/udinra-mobile-sitemap";
		return false;
	}
	return true;
}

add_action ('publish_post','udinra_mobile_sitemap_loop');
add_action ('publish_page','udinra_mobile_sitemap_loop');
add_action('admin_menu','udinra_mobile_sitemap_admin');

?>
