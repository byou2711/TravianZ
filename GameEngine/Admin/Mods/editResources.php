<?php
#################################################################################
##              -= YOU MAY NOT REMOVE OR CHANGE THIS NOTICE =-                 ##
## --------------------------------------------------------------------------- ##
##  Filename       editResources.php                                           ##
##  Developed by:  aggenkeech                                                  ##
##  License:       TravianMaX Project                                            ##
##  Copyright:     TravianMaX (c) 2010-2012. All rights reserved.                ##
##                                                                             ##
#################################################################################

include_once("../../config.php");

mysql_connect(SQL_SERVER, SQL_USER, SQL_PASS);
mysql_select_db(SQL_DB);

$session = $_POST['admid'];
$id = $_POST['did'];

$sql = mysql_query("SELECT * FROM ".TB_PREFIX."users WHERE id = ".$session."");
$access = mysql_fetch_array($sql);
$sessionaccess = $access['access'];

if($sessionaccess != 9) die("<h1><font color=\"red\">Access Denied: You are not Admin!</font></h1>");

mysql_query("UPDATE ".TB_PREFIX."vdata SET 
	wood  = '".$_POST['wood']."', 
	clay  = '".$_POST['clay']."', 
	iron  = '".$_POST['iron']."', 
	crop  = '".$_POST['crop']."', 
	maxstore  = '".$_POST['maxstore']."', 
	maxcrop   = '".$_POST['maxcrop']."' 
	WHERE wref = '".$id."'") or die(mysql_error());

header("Location: ../../../Admin/admin.php?p=village&did=".$id."");
?>