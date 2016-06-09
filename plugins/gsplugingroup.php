<?php

/**
* GSPLUGINGROUP
* unit test hooks `plugin-activate` `plugin-deactivate`
* toggles a group of plugins on and off all togather, see $gspg_pluginlist
*
* @name GS Plugin Grouper
* @since  3.4
* @version 0.1
* @author Shawn Alverson
* @link http://get-simple.info
* @file gsplugingroup.php
*/

$pluginid = "gsplugingroup";

$gspg_pluginlist = array(
	// $pluginid.'.php',
	'i18n_navigation.php',
	'i18n_customfields.php',
	'i18n_base.php',
	'i18n_gallery.php',
	'i18n_search.php',
	'i18n_specialpages.php'
);

function init_gsplugingroup($pluginid){
	$thisfile = basename(__FILE__, ".php");	// Plugin File
	$name     = $pluginid;
	$version  = "0.1";
	$author   = "getsimple";
	$url      = "http://get-simple.info";
	$desc     = "Groups plugins togather";
	$type     = "";
	$func     = "";

	register_plugin($thisfile,$name,$version,$author,$url,$desc,$type,$func);
}

init_gsplugingroup($pluginid);

add_action("plugin-activate",'gspg_group');
add_action("plugin-deactivate",'gspg_group');

function gspg_group(){
	GLOBAL $gspg_pluginlist, $pluginid, $live_plugins;
	
	$active = $live_plugins[$pluginid];
	
	debugLog($pluginid . " is now " . ($active ? 'enabled' : 'disabled'));
	
	if(in_array($pluginid, $gspg_pluginlist)){
		foreach($gspg_pluginlist as $plugin){
			if($plugin == $pluginid) continue;

			debugLog($plugin . " is now also " . ($active ? 'enabled' : 'disabled'));	

			if(isset($live_plugins[$plugin])) $live_plugins[$plugin] = $active ? 'true' : 'false';
		}
		create_pluginsxml(true);
	}
	// debugDie($live_plugins);
}


?>