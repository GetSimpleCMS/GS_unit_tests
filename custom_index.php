<?php
/**
 * CUSTOM GetSimpleCMS Index
 *
 * Front-End public index
 * @version 3.4
 * @author shawn_a
 * @package GetSimple
 * @subpackage CustomFrontEnd
 */

if(!defined('GSBASE'))          define('GSBASE',true);
if(!defined('GSADMINDEFAULT'))  define('GSADMINDEFAULT','admin');
if(!defined('GSCOMMON'))        define('GSCOMMON','/inc/common.php');
if(!defined('GSCONFIGFILE'))    define('GSCONFIGFILE','gsconfig.php');
if(!defined('GSSTYLEWIDE' ))    define('GSSTYLEWIDE','wide');
if(!defined('GSSTYLE_SBFIXED')) define('GSSTYLE_SBFIXED','sbfixed');

//load config and determine custom GSADMIN path
if (file_exists(GSCONFIGFILE)) require_once(GSCONFIGFILE);
$GSADMIN = defined('GSADMIN') ? GSADMIN : GSADMINDEFAULT;

$load['template'] = false;
$load['plugins'] = false;

# Include common.php
include($GSADMIN.GSCOMMON);


//CUSTOM
// loads codemirror and outputs the current page $data_index

queue_script('gscodeeditor',GSBOTH);
get_scripts_backend();

$output = print_r($data_index,true);
echo '<div class="codewrap"><textarea data-mode="php" class="code_edit"><?php '.$output.'?></textarea></div>';

?>