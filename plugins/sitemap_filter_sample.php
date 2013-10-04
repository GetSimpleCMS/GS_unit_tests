<?php

/**
 * sitemap filter sample
 * removes priority 0.5 items from sitemap ( pages not in menu )
 */

function init_plugin(){
	$thisfile = basename(__FILE__, ".php");	// Plugin File
	$name     = "sitemap filter";
	$version  = "0.1";
	$author   = "getsimple";
	$url      = "http://getsimple-cms.info";
	$desc     = "sample plugin for sitemap filtering";
	$type     = "";
	$func     = "";

	register_plugin($thisfile,$name,$version,$author,$url,$desc,$type,$func);
}

function sitemap_filter_callback($sitemap){	
	debugLog("Sitemap Filter");
	debugLog("BEFORE ###############################");
	debugLog(print_r($sitemap,true));


	foreach($sitemap->xpath("url/priority[.='0.5']/parent::*") as $node){
		unset($node[0]);
	}
	
	debugLog("AFTER ###############################");
	debugLog(print_r($sitemap,true));

	return $sitemap;
}

init_plugin();
add_filter("sitemap","sitemap_filter_callback");

?>