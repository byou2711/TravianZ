<?php
#################################################################################
##              -= YOU MAY NOT REMOVE OR CHANGE THIS NOTICE =-                 ##
## --------------------------------------------------------------------------- ##
##  Filename       deletemedalsbyweek.php                                      ##
##  Developed by:  aggenkeech                                                  ##
##  License:       TravianMaX Project                                            ##
##  Copyright:     TravianMaX (c) 2010-2012. All rights reserved.                ##
##                                                                             ##
#################################################################################

include_once("../../config.php");

mysql_connect(SQL_SERVER, SQL_USER, SQL_PASS);
mysql_select_db(SQL_DB);

$deleteweek = $_POST['deleteweek'];
$session = $_POST['admid'];

$sql = mysql_query("SELECT * FROM ".TB_PREFIX."users WHERE id = ".$session."");
$access = mysql_fetch_array($sql);
$sessionaccess = $access['access'];

if($sessionaccess != 9) die("<h1><font color=\"red\">Access Denied: You are not Admin!</font></h1>");

mysql_query("DELETE FROM ".TB_PREFIX."allimedal WHERE week = ".$deleteweek."");

header("Location: ../../../Admin/admin.php?p=delallymedal");
?>