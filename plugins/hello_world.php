<?php
/*
Plugin Name: Hello World
Description: Echos "Hello World" in footer of theme
Version: 1.0
Author: Chris Cagle
Author URI: http://www.cagintranet.com/
*/
 
# get correct id for plugin
$thisfile=basename(__FILE__, ".php");
 
# register plugin
register_plugin(
	$thisfile, //Plugin id
	'Hello World', 	//Plugin name
	'1.0', 		//Plugin version
	'Chris Cagle',  //Plugin author
	'http://get-simple.info/', //author website
	'GetSimpleCMS Hello World Plugin Example', //Plugin description
	'theme', //page type - on which admin tab to display
	'hello_world_show'  //main function to auto execute on plugins page (administration)
);
 
# activate filter 
add_action('theme-footer','hello_world'); 
 
# add a link in the admin tab 'theme'
add_action('theme-sidebar','createSideMenu',array($thisfile,'Hello World Sidebar'));
 
# functions
function hello_world() {
	echo '<p>Hello World</p>';
}
 
function hello_world_show() {
	echo '<p>I like to echo "Hello World" in the footers of all themes.</p>';
}
?>
