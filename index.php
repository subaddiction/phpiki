<?php

/*  PhPiki - a modernized pawfaliki ( http://www.pawfal.org/pawfaliki/ )
 *  
 *  Addons:
 *  
 *  Localization
 *  Tableless html5 responsive template
 *  .htaccess url rewrite
 *  CSS print support
 *  BASE64 encoded image javascript utility (only in html mode)
 *  Recognize apache2handler php_sapi_name()
 *  Ignore ".git" in pages folder
 *  WTFPL license
 *  PhPiki favicon
 *  
 *  This program is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program; if not, write to the Free Software
 *  Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA 02111-1307, USA.
 */

// setup some global storage
$config = array();
$config['PHPIKI_VERSION'] = "0.5.5"; // Phpiki version
$config['GENERAL'] = array();
$config['SYNTAX'] = array();
$config['BACKUP'] = array();
$config['RSS'] = array();
$config['EMAIL'] = array();
$config['USERS'] = array();
$config['RESTRICTED'] = array();
$config['BLOCKED_IPS'] = array();
$config['MISC'] = array();
$config['LOCALE'] = array();
$config['SPECIAL'] = array();
$config['LICENSE'] = array();
$config['INTERNAL'] = array('VERBATIM', 'ERRORS', 'DATA'); // used internally
$config['INTERNAL']['VERBATIM'] = array();
$config['INTERNAL']['ERRORS'] = array();
$config['INTERNAL']['DATA'] = array();

//================
//================
// CONFIGURATION
//================
//================
$config['CONFIGFILE'] = ""; // filename for an additonal configuration file

// GENERAL: General configuration stuff
$config['GENERAL']['BASE_URL'] = "//".$_SERVER['HTTP_HOST'].""; // Wiki url (no trailing slash please)
$config['GENERAL']['TITLE'] = "Phpiki"; // Title of the wiki
$config['GENERAL']['HOMEPAGE'] = "HomePage"; // The title of the homepage
//$config['GENERAL']['ADMIN'] = "webmaster at nowhere dot example"; // not used currently
$config['GENERAL']['CSS'] = "phpiki.css"; // CSS file (title:filename)
$config['GENERAL']['PRINT_CSS'] = "print.css"; // Print CSS file (title:filename)
$config['GENERAL']['PAGES_DIRECTORY'] = "./PhpikiPages/"; // Path to stored wiki pages
$config['GENERAL']['TEMP_DIRECTORY'] = "./PhpikiTemp/"; // Path to temporary directory for backups
$config['GENERAL']['MODTIME_FORMAT'] = "(Y-m-d H:i:s T)"; // date() compatible format string for the pagelist
$config['GENERAL']['SHOW_CONTROLS'] = true; // show all the wiki controls - edit, save, PageList etc...
$config['GENERAL']['DEBUG'] = false; // display debug information (pagegen time, uptime, load)
$config['GENERAL']['URL_REWRITE'] = false;
$config['GENERAL']['URL_PREFIX'] = ($config['GENERAL']['URL_REWRITE'])?'/':'/?page=';
$config['GENERAL']['URL_POSTFIX'] = ($config['GENERAL']['URL_REWRITE'])?'/':'';

// SYNTAX: Wiki editing syntax
$config['SYNTAX']['SHOW_BOX'] = true; // Display the wiki syntax box on edit page
$config['SYNTAX']['WIKIWORDS'] = false; // Auto-generation of links from WikiWords
$config['SYNTAX']['AUTOCREATE'] = false; // Display ? next to wiki pages that don't exist yet.
$config['SYNTAX']['HTMLCODE'] = true; // Allows raw html using %% tags

// BACKUP: Backup & Restore settings
$config['BACKUP']['ENABLE'] = false; // Enable backup & restore
$config['BACKUP']['USE_ZLIB'] = true; // If available use the libz module to produce gzipped backups
$config['BACKUP']['MAX_SIZE'] = 3000000; // maximum file size (in bytes) for uploading restore files

// RSS: RSS feed
$config['RSS']['ENABLE'] = false; // Enable rss support (http://mywiki.example?format=rss)
$config['RSS']['ITEMS'] = 10; // The number of items to display in rss feed (-1 for all).
$config['RSS']['TITLE_MODTIME'] = false; // Prints the modification time in the item title.
$config['RSS']['MODTIME_FORMAT'] = "(Y-m-d H:i:s T)"; // date() compatible format string

// CHANGES: email page changes
$config['EMAIL']['ENABLE'] = false; // do we email page changes?
$config['EMAIL']['CHANGES_TO'] = "admin@localhost"; // if so, where to
$config['EMAIL']['CHANGES_FROM'] = "phpiki-changes@localhost"; // & where from
$config['EMAIL']['MODTIME_FORMAT'] = "Y-m-d H:i:s T"; // date() compatible format string for the pagelist
$config['EMAIL']['SHOW_IP'] = false; // show the modifiers ip in the email subject

// USERS: setup user passwords
$config['USERS']['admin'] = "youshouldchangethis"; // changing this would be a good idea!
//$config['USERS']['group1'] = "group1password"; // create a new user password

// RESTRICTED: give access to some users to edit restricted pages
$config['RESTRICTED']['RestoreWiki'] = array("admin"); // only admin can restore wiki pages
//$config['RESTRICTED']['HTTP'] = array("admin"); // uses HTTP auth to make entire wiki private
$config['RESTRICTED']['HomePage'] = array("admin"); // lock the homepage - admin only
//$config['RESTRICTED']['Group1Page'] = array("admin","group1"); // restrict this page to the listed users

// IP BLOCKING: blocked IP addresses
// $config['BLOCKED_IPS'][] = "192.168.0.*"; // block this ip address (can take wildcards)

// LOCALE: text for some titles, icons, etc - you can use wiki syntax in some of these for images etc...
$config['LOCALE']['EDIT_TITLE'] = array(); // title prefix for edit pages
$config['LOCALE']['HOMEPAGE_LINK'] = array(); // link to the homepage
$config['LOCALE']['PAGELIST_LINK'] = array(); // link to the pagelist
$config['LOCALE']['REQ_PASSWORD'] = array(); // printed next to the edit btn on a locked page
$config['LOCALE']['PASSWORD_TEXT'] = array(); // printed next to the password entry box

/*
$config['LOCALE']['LANG'] = "EN";
$config['LOCALE']['EDIT_TITLE']['EN'] = "Edit: "; 
$config['LOCALE']['HOMEPAGE_LINK']['EN'] = "HomePage";
$config['LOCALE']['PAGELIST_LINK']['EN'] = "PageList";
$config['LOCALE']['NEW_PAGE']['EN'] = "New Page: ";
$config['LOCALE']['NEW_PAGE_PLACEHOLDER']['EN'] = "NewPage";
$config['LOCALE']['CREATE']['EN'] = "Create";
$config['LOCALE']['NEWPAGE_TEMPLATE']['EN'] = "This is the new page for ".htmlentities($_GET['page'];
$config['LOCALE']['SAVE']['EN'] = "Save";
$config['LOCALE']['EDIT']['EN'] = "Edit";
$config['LOCALE']['CANCEL']['EN'] = "Cancel";
$config['LOCALE']['REQ_PASSWORD']['EN'] = "(locked)";
$config['LOCALE']['PASSWORD_TEXT']['EN'] = "Password: ";
$config['LOCALE']['SYNTAX']['EN'] = "Syntax";
$config['LOCALE']['OPTIONAL_VALUES']['EN'] = "optional values";
$config['LOCALE']['IMAGE_TEXT']['EN'] = "Insert image (copy and paste the code in the box)";
$config['LOCALE']['LICENCE']['EN'] = "Contents released under [[https://en.wikipedia.org/wiki/WTFPL|WTFPL License]]";
$config['LOCALE']['NO_LICENCE']['EN'] = "Powered by Phpiki v".$config['PHPIKI_VERSION'];
*/

$config['LOCALE']['LANG'] = "IT";
$config['LOCALE']['EDIT_TITLE']['IT'] = "Modifica: "; 
$config['LOCALE']['HOMEPAGE_LINK']['IT'] = "HomePage";
$config['LOCALE']['PAGELIST_LINK']['IT'] = "ListaPagine";
$config['LOCALE']['NEW_PAGE']['IT'] = "Nuova Pagina: ";
$config['LOCALE']['NEW_PAGE_PLACEHOLDER']['IT'] = "NuovaPagina";
$config['LOCALE']['CREATE']['IT'] = "Crea";
$config['LOCALE']['NEWPAGE_TEMPLATE']['IT'] = "Questa &egrave; la nuova pagina per ".htmlentities($_GET['page']);
$config['LOCALE']['SAVE']['IT'] = "Salva";
$config['LOCALE']['EDIT']['IT'] = "Modifica";
$config['LOCALE']['CANCEL']['IT'] = "Annulla";
$config['LOCALE']['REQ_PASSWORD']['IT'] = "(protetta)";
$config['LOCALE']['PASSWORD_TEXT']['IT'] = "Password: ";
$config['LOCALE']['SYNTAX']['IT'] = "Sintassi";
$config['LOCALE']['OPTIONAL_VALUES']['IT'] = "valori opzionali";
$config['LOCALE']['IMAGE_TEXT']['IT'] = "Inserisci immagine (copia e incolla il codice nel box)";
$config['LOCALE']['LICENSE']['IT'] = "Contenuti rilasciati sotto [[https://en.wikipedia.org/wiki/WTFPL|WTFPL License]]";
$config['LOCALE']['NO_LICENSE']['IT'] = "Powered by Phpiki v".$config['PHPIKI_VERSION'];

// SPECIAL PAGES - reserved and unmodifiable by users
$config['SPECIAL']['ListaPagine'] = 1; // the page list
$config['SPECIAL']['BackupWiki'] = 0; // the backup page
$config['SPECIAL']['RestoreWiki'] = 0; // the restore page

// LICENSES: pages with special licenses
$config['LICENSE']['DEFAULT'] = "WTFPLicense"; // will call WTFPLicense() function
$config['LICENSE']['BackupWiki'] = "noLicense"; // will call noLicense() function
$config['LICENSE']['RestoreWiki'] = "noLicense"; // will call noLicense() function

// MISC: Misc stuff
$config['MISC']['EXTERNALLINKS_NEWWINDOW'] = true; // Open external links in a new window
$config['MISC']['REQ_PASSWORD_TEXT_IN_EDIT_BTN'] = false; // Include the req password text in the edit button

//===========================================================================
//===========================================================================

// our licensing information
function WTFPLicense()
{
	global $config;
	echo("\t\t\t\t".wikiparse($config['LOCALE']['LICENSE'][$config['LOCALE']['LANG']])."\n");
}

// blank license()
function noLicense()
{
	global $config;
	echo(wikiparse($config['LOCALE']['NO_LICENSE'][$config['LOCALE']['LANG']]));
}

// initialise our style sheets
function css( $pagename )
{
	global $config;
	$css = $config['GENERAL']['CSS'];
	if ($css!="")
	{
	    echo( "\t<link rel=\"stylesheet\" type=\"text/css\" href=\"".$config['GENERAL']['BASE_URL']."/".$config['GENERAL']['CSS']."\" media=\"screen\" />\n");
		
	}
	
	$printcss = $config['GENERAL']['PRINT_CSS'];
	if ($printcss!="")
	{
	    echo( "\t<link rel=\"stylesheet\" type=\"text/css\" href=\"".$config['GENERAL']['BASE_URL']."/".$config['GENERAL']['PRINT_CSS']."\" media=\"print\" />\n");
	}
	
	
	if ( $config['RSS']['ENABLE'] &&$pagename=="HomePage" )
		echo( "\t<link rel=\"alternate\" title=\"".$config['GENERAL']['TITLE']." RSS\" href=\"".$config['GENERAL']['BASE_URL']."?format=rss\" type=\"application/rss+xml\" />\n" );
	
	
}

// emails page changes
function emailChanges( $title, $contents )
{
	global $config;
	if ( $config['EMAIL']['ENABLE'] )
	{
		$date = date($config['EMAIL']['MODTIME_FORMAT']);
		$subject = $title." :: ".$date;
		if ( $config['EMAIL']['SHOW_IP'] )
		{
			$ipaddress = $_SERVER['REMOTE_ADDR'];
			$subject .= " :: IP ".$ipaddress;
		}
		mail( $config['EMAIL']['CHANGES_TO'], $subject, $contents, "From: ".$config['EMAIL']['CHANGES_FROM']."\r\n" );
	}
}

// writes a file to disk
function writeFile( $title, $contents )
{
	if (!$fd = @fopen( pagePath( $title ), "w" ))
	{ 
		error("Cannot open server's file for writing: ".pagePath( $title ));
		return 1;
	}
	
	if (@fwrite( $fd, $contents ) === FALSE)
	{
		error("Cannot write to server's file: ".pagePath( $title ));
		return 2;
	}
	
	// email page changes
	emailChanges( $title, $contents );
	
	fclose( $fd );	
	return 0;	
}

// reads the contents of a file into a string (php<4.3.0 friendly)
function phpikiReadFile( $filename )
{
	$result = "";			
	$size = filesize($filename);
	if ( $size>0 )
	{
		$handle = fopen($filename, "r");
		$result = fread($handle, $size);
		fclose($handle);					
	}
	return $result;
}

// returns the contents of a directory (php<4.3.0 friendly)
function phpikiReadDir($path)
{
	$results = array();
	if ($handle = @opendir($path)) 
	{
		while (false !== ($file = readdir($handle))) 
		{
			if ($file != "." && $file != ".." && $file != ".git") 
			{
				$results[] = $path."/".$file;
			}
		}
		closedir($handle);
	}
	return $results;
}

// init the wiki if no pages exist
function initWiki( $title )
{
	$contents = "Hello and welcome to Phpiki!";	
	writeFile( $title, $contents );
}

// get the title of a page
function getTitle()
{
	$page = "";
	if ( !isset($_REQUEST['page']) )
	{
		$page = "HomePage";
		if ( !pageExists( $page ) )
		{
			initWiki( $page );
		}
	}
	else
	{
		$page = $_REQUEST['page'];
		if (count(explode("/", $page))>1)
			$page = "HomePage";
	}
	return $page;
}

// get the current wiki 'mode'
function getMode()
{
	$mode = "";
	if ( !isset($_POST['mode']) )
	{
		$mode = "display";
	}
	else
	{
		$mode = $_POST['mode'];
	}
	return $mode;
}

// check 
function authPassword( $title, $password )
{
	global $config;
	$auth = false;
	foreach ($config['RESTRICTED'][$title] as $user)
	{
		if ($config['USERS'][$user]==$_POST['password']) 
		$auth = true;
	}
	return $auth;
}

// update the wiki - save/edit/backup/restore/cancel
function updateWiki( &$mode, $title, $config )
{	

	$contents = false;
	$backupEnabled = $config['BACKUP']['ENABLE'];
	// cleanup any temp files
	if ( $backupEnabled )
		cleanupTempFiles();
	
	// backup the wiki
	if ( $title=="BackupWiki")
		if( $backupEnabled )
		{
			$wikiname = str_replace( " ", "_", $config['GENERAL']['TITLE'] );
			$date = date( "Y-m-d_H-i-s" );
			$filename = tempDir().$wikiname."_".$date.".bkup";
			backupPages( $filename );
			$mode = "backupwiki";
		}
		else
		{
			error( "Backups have been disabled." );
		}
		
	// restore from backup
	if ( $title=="RestoreWiki")
		if ( $backupEnabled )
		{
			if ( $mode=="restorewiki"&&isset($_FILES['userfile']['name']) )
				restorePages();
			else
				$mode = "restorewiki";
		}
		else		
		{
			error( "Restore has been disabled." );
			$mode = "restorewiki";
		}

	// save page
	if ( $mode==$config['LOCALE']['SAVE'][$config['LOCALE']['LANG']] )
	{
	
		if ( isset($_POST['contents']) )
		{
			$contents = stripslashes( $_POST['contents'] );

			// restricted access
			$restricted=false;
			if (isLocked($title))
			{
				// check if the password is correct
				$restricted=!authPassword($title, $_POST['password']);
				if ($restricted)
					error("Wrong password. Try again.");
			}

			// write file    
			if (!isIpBlocked() && !$restricted)
				$error = writeFile( $title, $contents );
		}
		$mode = "display";

		// go back if you can't write the data (avoid data loss)
		if (($restricted) || ($error!=0))
			$mode=$config['LOCALE']['EDIT'][$config['LOCALE']['LANG']];
	}
	
	// cancel a page edit
	if ($mode==$config['LOCALE']['CANCEL'][$config['LOCALE']['LANG']])
	{
		$mode = "display";
	}
	return $contents;
}

// generate our html header
function htmlHeader( $title, $config )
{
	$origTitle = $title;
	if ($title=="HomePage") 
	  $title = $config['GENERAL']['HOMEPAGE'];  
	echo("<!DOCTYPE html>\n");
	echo("<html>\n");
	echo("<head>");
	echo("\n");
	echo("\t<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n");
	css($origTitle);
	echo("\t<title>");
	if ($config['GENERAL']['TITLE']==$title)
		echo($config['GENERAL']['TITLE']);
	else
	  echo($config['GENERAL']['TITLE']." :: ".$title);	
	echo("</title>\n");
	echo("</head>\n");
	echo("<body>\n");

	// any errors?
	foreach ($config['INTERNAL']['ERRORS'] as $err)
	  echo( "<p class=\"error\">ERROR: ".$err."</p>" );
	  
	if ( getMode()=="restore" )
	{
		if (!isset($config['INTERNAL']['DATA']['RESTORED']))
			echo( "\t<form enctype=\"multipart/form-data\"  action=\"".$config['GENERAL']['BASE_URL'].$config['GENERAL']['URL_PREFIX'].$title.$config['GENERAL']['URL_POSTFIX']."\" method=\"post\">\n" );
	}	
	  
	echo("\t<div class=\"wiki_body_header\">\n");
	echo("\t\t\t<div class=\"pull-left\"><span class=\"wiki_header\">".$title."</span></div>\n");
	echo("\t\t\t<div class=\"pull-right\">");
	if ($config['GENERAL']['SHOW_CONTROLS'])
		echo("<a href=\"".$config['GENERAL']['BASE_URL'].$config['GENERAL']['URL_PREFIX'].$config['LOCALE']['HOMEPAGE_LINK'][$config['LOCALE']['LANG']].$config['GENERAL']['URL_POSTFIX']."\">".$config['LOCALE']['HOMEPAGE_LINK'][$config['LOCALE']['LANG']]."</a>");
		echo("\n");
		echo("<a href=\"".$config['GENERAL']['BASE_URL'].$config['GENERAL']['URL_PREFIX'].$config['LOCALE']['PAGELIST_LINK'][$config['LOCALE']['LANG']].$config['GENERAL']['URL_POSTFIX']."\">".$config['LOCALE']['PAGELIST_LINK'][$config['LOCALE']['LANG']]."</a>");
		
		
		echo("&nbsp;|&nbsp;".$config['LOCALE']['NEW_PAGE'][$config['LOCALE']['LANG']]."<form id=\"NewPage\" method=\"get\" action=\"".$config['GENERAL']['BASE_URL']."\"><input id=\"NewPageName\" style=\"width:12em;\" type=\"text\" name=\"page\" value=\"\" placeholder=\"".$config['LOCALE']['NEW_PAGE_PLACEHOLDER'][$config['LOCALE']['LANG']]."\" /> <input type=\"submit\" value=\"".$config['LOCALE']['CREATE'][$config['LOCALE']['LANG']]."\" /></form>");
	echo( "</div>\n");
	echo("\t</div>\n");
}

// generate our html footer
function htmlFooter()
{
	global $config;
	if ( $config['GENERAL']['DEBUG'] )
	{		
   		list($usec, $sec) = explode(" ", microtime());
		$end_time = (float)$sec + (float)$usec;
		$duration = $end_time - $config['GENERAL']['DEBUG_STARTTIME'];
		$uptime = shell_exec("cut -d. -f1 /proc/uptime");
		$load_ar = explode(" ", exec("cat /proc/loadavg"));
		$load = $load_ar[2];
		$days = floor($uptime/60/60/24);
		$hours = $uptime/60/60%24;
		$mins = $uptime/60%60;
		$secs = $uptime%60;
		
		echo( "<hr><b><u>DEBUG</u></b><br />" );
		echo( wikiparse( "~~#FF0000:PAGE GENERATION:~~ $duration secs\n" ) );	
		echo( wikiparse( "~~#FF0000:SERVER UPTIME:~~ $days day(s) $hours hour(s) $mins minute(s) and $secs second(s)\n" ) );
		echo( wikiparse( "~~#FF0000:SERVER LOAD:~~ $load\n" ) );
	}
	echo("\t</body>\n</html>\n");
}

// the start of our wiki body
function htmlStartBlock()
{
	echo("\t<div class=\"wiki_body_container\">\n");
}

// the end of our wiki body
function htmlEndBlock()
{
	echo("\t</div>\n");
}

// link to another wiki page
function wikilink( $title )
{
	global $config;
	if ( pageExists( $title ) )
		return ("<a href=\"".$config['GENERAL']['BASE_URL'].$config['GENERAL']['URL_PREFIX'].$title.$config['GENERAL']['URL_POSTFIX']."\">".$title."</a>");
	elseif ( $config['SYNTAX']['AUTOCREATE'] )
		return ($title."<a href=\"".$config['GENERAL']['BASE_URL'].$config['GENERAL']['URL_PREFIX'].$title.$config['GENERAL']['URL_POSTFIX']."\">?</a>");
	else
		return ($title);
}

// link to another web page
function webpagelink( $text )
{
	global $config;
	$results = explode( "|", $text );
	$size=count($results);
	if ($size==0)
		return $text;		
		
	// page link
	$src=$results[0];

	// link text
	$desc="";
	if ($size>1)
		$desc = $results[1];
	else
		$desc = $src;	
	// is our text an image?
	$patterns = "/{{(['^{']*)}}/";
	$replacements = "\".image( \"$1\" ).\"";	
	$cmd = (" \$desc = \"".preg_replace( $patterns, $replacements, $desc )."\";");
	eval($cmd);			

	// link target	
	$window="";                
	if ($size>2)
		$window = $results[2];
	else
	if ( $config['MISC']['EXTERNALLINKS_NEWWINDOW'] )
		$window = "_blank";
	else
		$window = "_self";
		
	// see whether it is a Wiki Link or not
	$prefix = explode( "/", $src );
	if ((count($prefix)==1)) // looks like a local file, an anchor link or a wikipage
	{
		if (pageExists($src)) // is it a wiki page
		{
			$src = $config['GENERAL']['BASE_URL'].$config['GENERAL']['URL_PREFIX'].$src.$config['GENERAL']['URL_POSTFIX'];
			$window = "_self";
			$resultstr = "<a href=\"".$src."\">".$desc."</a>";
		}
		elseif ($src[0]=="#") // maybe its an anchor link
		{
			$window = "_self";
			$resultstr = "<a href=\"".$src."\">".$desc."</a>";
		}
		elseif ($config['SYNTAX']['AUTOCREATE']) // maybe autolink
		{
			$search_for_dot = strrchr( $src, "." ); // don't support names with dots in - prevents creating executable scripts
			if( !$search_for_dot )		
				$resultstr = ($src."<a href=\"".$config['GENERAL']['BASE_URL']."/".$src."/\">?</a>");
			else
				$resultstr = $src;
		}
		else
			$resultstr = $desc;
	}
	else
	{		
		$resultstr = "<a href=\"".$src."\" target=\"$window\">".$desc."</a>";			
	}
	return verbatim( $resultstr );
}

// evaluate a chunk of text
function wikiEval( $str )
{	
	$result = "";
	$cmd = (" \$result = \"".$str."\";" );
	eval($cmd);
	return strip_tags($result, '<h2><h3><h4><h5><div><p><a><img><b><i><u><strong><em><ul><ol><li>');
}

// colour some text
function colouredtext( $text )
{
	$results = explode( ":", $text );
	$size=count($results);
	if ($size<2)
		return $text;		
	$colour=$results[0];
	$contents = wikiEval(implode(":", array_slice( $results, 1)));
	$resultstr = "<span style=\"color: #".$colour.";\">".$contents."</span>";
	return verbatim( $resultstr );
}

// place an image
function image( $text )
{	
  $results = explode( "|", $text );
  $size=count($results);
  $src="";
  $desc="";
  $width='';
  $height='';
  $align="";
  $valign="";
  if ($size>=1)
     $src = " src=\"".$results[0]."\"";
  if ($size>=2)
     $desc = " alt=\"".$results[1]."\"";
  else
     $desc = " alt=\"[img]\"";
  if ($size>=3)
     $width .= " width: ".$results[2]."px;";
  if ($size>=4)
     $height .= " height: ".$results[3]."px;";
  if ($size>=5)
     $align = " float: ".$results[4].";";
  if ($size>=6)
     $valign=" vertical-align: ".$results[5].";";
  $resultstr="";
  if ($size>0)
     $resultstr = "<img" . $src. " style=\"border:0pt none;" . $width . 
     	$height . $align . $valign . "\"" .$desc . " />";
  return verbatim( $resultstr );
}

// get some verbatim text
function getVerbatim( $index )
{
	global $config;
	$verbat = &$config['INTERNAL']['VERBATIM'];
	return $verbat[$index];
}

// store some verbatim text
function verbatim( $contents )
{
	global $config;
	$verbat = &$config['INTERNAL']['VERBATIM'];
	$index = count($verbat);
	$verbat[$index] = $contents;
	return "\".getVerbatim(".$index.").\"";
}

// replace special chars with the appropriate html
function htmltag( $contents )
{
	// ' must be used for fields
	$result = str_replace ("&lt;", "<", $contents);
	$result = str_replace ("&gt;", ">", $result);
	$result = str_replace ("&quot;", "\\\"", $result);
	return $result;
}

// parse wiki code & replace with html
function wikiparse( $contents )
{
	global $config;
	$patterns = array();
	$replacements = array();
	$contents = htmlspecialchars($contents, ENT_COMPAT, "UTF-8");

	// verbatim text
	$patterns[0] = "/~~~(.*)~~~/";
	$replacements[0] = "\".verbatim( \"$1\" ).\"";

	// webpage links
	$patterns[1] = "/\[\[([^\[]*)\]\]/";
	$replacements[1] = "\".webpagelink( \"$1\" ).\"";		

	// images
	$patterns[2] = "/{{([^{]*)}}/";
	$replacements[2] = "\".image( \"$1\" ).\"";	

	// coloured text
	$patterns[3] = "/~~#([^~]*)~~/";
	$replacements[3] = "\".colouredtext( \"$1\" ).\"";	
	
	$patterns[4] = '/\$/';
	$replacements[4] = "&DOLLAR;";
	
	if ( $config['SYNTAX']['HTMLCODE'] )
	{
		$patterns[5] = "/%%(.*)%%/";
		$replacements[5] = "\".htmltag( \"$1\" ).\"";		
	}

	// substitute complex expressions
	$contents = wikiEval( preg_replace( $patterns, $replacements, $contents ) );
	$patterns = array();
	$replacements = array();

	// bold
	$patterns[0] = "/\*\*([^\*]*[^\*]*)\*\*/";
	$replacements[0] = "<b>$1</b>";

	// italic
	$patterns[1] = "/''([^']*[^']*)''/";
	$replacements[1] = "<i>$1</i>";

	// underline
	$patterns[2] = "/__([^_]*[^_]*)__/";
	$replacements[2] = "<span style=\\\"text-decoration: underline;\\\">$1</span>";	

	// html shortcuts
	$patterns[3] = "/@@([^@]*)@@/";
	$replacements[3] = "<a name=\\\"$1\\\"></a>";
	
	// wiki words	
	if ( $config['SYNTAX']['WIKIWORDS'] )
	{
		$patterns[4] = "/([A-Z][a-z0-9]+[A-Z][A-Za-z0-9]+)/";
		$replacements[4] = "\".wikilink( \"$1\" ).\"";	
	}

	// substitute simple expressions & final expansion
	$contents = wikiEval( preg_replace( $patterns, $replacements, $contents ) );
	$patterns = array();
	$replacements = array();

	// replace some whitespace bits & bobs  
	$patterns[0] = "\t";
	$replacements[0] = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	$patterns[1] = "  ";
	$replacements[1] = "&nbsp;&nbsp;";
	$patterns[2] = "&DOLLAR;";
	$replacements[2] = "$";
	$contents = str_replace( $patterns, $replacements, $contents );
	$contents = nl2br($contents);

	return $contents;
}

// returns the directory where the wiki pages are stored
function pageDir()
{
	global $config;
	return ($config['GENERAL']['PAGES_DIRECTORY']);
}

// returns the directory where the temporary backups are stored
function tempDir()
{
	global $config;
	return ($config['GENERAL']['TEMP_DIRECTORY']);
}

// returns the full path to a page
function pagePath( $title )
{
	return (pageDir().$title);
}

// clean up the temp directory
function cleanupTempFiles()
{
	$files = phpikiReadDir(tempDir());
	foreach( $files as $file )
	{
		$mtime = filemtime( $file );
		$now = date("U");
		if ( $now-$mtime>300 ) // delete any files that are older than 5 minutes
			unlink( $file ); 
	}
}

// is this page 'special'?
function isSpecial( $title )
{
	global $config;
	return ( isset( $config['SPECIAL'][$title] ) );
}

// is this page 'locked'?
function isLocked( $title )
{
	global $config;
	return ( isset( $config['RESTRICTED'][$title] ) );
}

// print the appropriate license
function printLicense( $title )
{
	global $config;
	$license_func = $config['LICENSE']['DEFAULT'];
	if ( isset( $config['LICENSE'][$title] ))
		$license_func = $config['LICENSE'][$title];
	eval( $license_func."();" );
}

// add an error to our error buffer
function error( $string )
{
	global $config;
	$config['INTERNAL']['ERRORS'][] = $string;
}

// are there any errors so far?
function anyErrors()
{
	global $config;
	if (count($config['INTERNAL']['ERRORS'])==0)
		return false;
	else
		return true;
}

// is this ip address blocked?
function isIpBlocked( )
{
	global $config;
	$result = false;
	$ipaddress = $_SERVER['REMOTE_ADDR'];  
	foreach ($config['BLOCKED_IPS'] as $ip)
	{
		if (preg_match( "/".$ip."/", $ipaddress ))
		{
			error( "Your ip address has been blocked from making changes!" );
			$result = true;
			break;
		}	
	}
	return $result;
}

// does a given page exist yet?
function pageExists( $title )
{
	if (file_exists( pagePath( $title ) ) || isSpecial( $title ) )
		return true;
	else
		return false;
}

// returns a list of pages
function pageList()
{
	global $config;
	$contents = "";
	$files = phpikiReadDir(pageDir());
	$details = array();
	foreach ($files as $file)
		$details[$file] = filemtime( $file );
	arsort($details);
	reset($details);
	while ( list($key, $val) = each($details) )  	
		$contents .= "[[".basename($key)."]] ".date($config['GENERAL']['MODTIME_FORMAT'], $val )."\n";
	return $contents;
}

// returns the pageList in RSS2.0 format
function rssFeed()
{
	global $config;
	echo( "<?xml version=\"1.0\"?>\n" );
	echo( "<rss version=\"2.0\">\n" );
	echo( "\t<channel>\n" );
	$title = $config['GENERAL']['TITLE'];
	echo( "\t\t<title>$title</title>\n" );
	$url = "http://".$_SERVER['SERVER_NAME'].$config['GENERAL']['BASE_URL'];
	echo( "\t\t<link>$url</link>\n" );
	echo( "\t\t<description>Recently changed pages on the $title wiki.</description>\n" );
	echo( "\t\t<generator>Phpiki v".$config['PHPIKI_VERSION']."</generator>\n" );	
	$files = phpikiReadDir(pageDir());
	$details = array();
	foreach ($files as $file)
		$details[$file] = filemtime( $file );
	arsort($details);
	reset($details);
	$item = 0;
	$numItems = $config['RSS']['ITEMS'];
	while ( list($key, $val) = each($details) )  	
	{
		$title = basename($key);
		$modtime = date( $config['RSS']['MODTIME_FORMAT'], $val );
		$description = $title." ".$modtime;
		echo( "\t\t<item>\n" );
        if ($config['RSS']['TITLE_MODTIME'])             
			echo( "\t\t\t<title>$description</title>\n" );
        else
            echo( "\t\t\t<title>$title</title>\n" );
		echo( "\t\t\t<link>$url/$title/</link>\n" );	
		echo( "\t\t\t<description>$description</description>\n" );
		echo( "\t\t</item>\n" );	
		$item++;
		if ($numItems!=-1&&$item>=$numItems)
			break;
	}
	echo( "\t</channel>\n" );
	echo( "</rss>\n" );
}

// backup all the wiki pages to a file
function backupPages( &$filename )
{	
	global $config;
	$files = phpikiReadDir(pageDir());
	$details = array();
	foreach ($files as $file)
		$details[$file] = filemtime( $file );
	arsort($details);
	reset($details);	
	$pages = array();
	$pos = 0;
	while ( list($key, $val) = each($details) )  	
	{
		$pages[$pos] = array();
		$pages[$pos]['title'] = basename($key);
		$pages[$pos]['datestring'] = date("U", $val );
		$pos = $pos+1;
	}	
	$numpages = count($pages);
	if ($numpages==0) // must have at least 1 page for a backup
	{
		error("No pages to backup yet!");
		return;
	}
	if ( extension_loaded('zlib')&&$config['BACKUP']['USE_ZLIB'] ) // write a gzipped backup file
	{
		$filename = $filename.".gz";
		$zp = gzopen($filename, "w9");
		gzwrite($zp, $numpages."\n");
		foreach( $pages as $page )
		{
			$contents = $page['title']."\n".$page['datestring']."\n";
			$lines = rtrim( phpikiReadFile( pagePath( $page['title'] ) ) );
			$numlines = count( explode("\n", $lines) );
			if ($numlines==0) // no lines?! weird - we must have at least 1 line for restore
			{
				$numlines=1;
				$lines.="\n";
			}
			$contents .= "$numlines\n$lines\n";
			gzwrite( $zp, $contents );
		}
		gzclose($zp);	
	}
	else // otherwise normal binary file
	{
		$fd = fopen( $filename, "wb" );
		fwrite( $fd, $numpages."\n" );
		foreach( $pages as $page )
		{
			$contents = $page['title']."\n".$page['datestring']."\n";
			$lines = rtrim( phpikiReadFile( pagePath( $page['title'] ) ) );
			$numlines = count( explode("\n", $lines) );
			if ($numlines==0) // no lines?! weird - we must have at least 1 line for restore
			{
				$numlines=1;
				$lines.="\n";
			}
			$contents .= "$numlines\n$lines\n";
			fwrite( $fd, $contents );
		}
		fclose( $fd );	
	}
	return 0;
}

// restore all the wiki pages from a file
function restorePages()
{
	global $config, $_FILES;
	unset($config['INTERNAL']['DATA']['RESTORED']);
	if (!authPassword("RestoreWiki", $_POST['password']))
	{
		error("Wrong password. Try again.");
		return;
	}
	
	$filename = $_FILES['userfile']['tmp_name'];
	if ($filename=="none"||$_FILES['userfile']['size']==0||!is_uploaded_file($filename))
	{
		error( "No file was uploaded!<BR>Maybe the filesize exceeded the maximum upload size of ".$config['BACKUP']['MAX_SIZE']."bytes." );
		return;
	}
	
	// if we can use zlib functions - they can read uncompressed files as well
	$zlib = false;
	if ( extension_loaded('zlib')&&$config['BACKUP']['USE_ZLIB'] ) $zlib = true;

	// sanity check on file
	if ($zlib)
		$fd = gzopen($filename, "rb9");
	else
		$fd = fopen($filename, "rb");
	if (!$fd)
	{
		error("Could not read temporary upload file: $filename!");
		return;
	}				
	$fileerror = "NO ERROR";
	if ($zlib)
		$numPages = trim(gzgets($fd));
	else
		$numPages = trim(fgets($fd));
		
	if ($numPages>0) // must be at least 1 page
	{
		for ($i=0; $i<$numPages; $i++)
		{
			if ($zlib)
			{
				@gzgets($fd); if (gzeof($fd)) {$fileerror="GZ: Invalid title on page $i!";} // read title
				@gzgets($fd); if (gzeof($fd)) {$fileerror="GZ: Invalid mod time on page $i!";} // mod time
				$numLines = trim(gzgets($fd)); // num lines
			}
			else
			{
				@fgets($fd); if (feof($fd)) {$fileerror="Invalid title on page $i!";} // read title
				@fgets($fd); if (feof($fd)) {$fileerror="Invalid mod time on page $i!";} // mod time
				$numLines = trim(fgets($fd)); // num lines
			}		
							
			if ($numLines>0) // must have at least 1 line
			{
				for ($j=0; $j<$numLines; $j++)
				{
					if ($zlib)
					{
						@gzgets($fd); if (gzeof($fd)&&$i!=$numPages-1) {$fileerror="GZ: Invalid line read on page $i!";} // page content
					}
					else
					{
						@fgets($fd); if (feof($fd)&&$i!=$numPages-1) {$fileerror="Invalid line read on page $i!";} // page content
					}
				}
			}
			else
			{
				$fileerror = "Invalid number of page lines on page $i!";
			}
		}
	}
	else
	{
		$fileerror = "Invalid number of backup pages!";
	}
	if ($zlib)
		gzclose($fd);
	else
		fclose($fd);		
	if ($fileerror!="NO ERROR")
	{
		$str = "This does not appear to be a valid backup file!";
		if(!$zlib)
			$str .= "<br />NOTE: Zlib is not enabled so restoring a compressed file will not work.";
		error($str);
		return;
	}		
	
	// if we got here the file is OK - restore the pages!!
	$restored = &$config['INTERNAL']['DATA']['RESTORED'];
	$restored = array();		
	if ($zlib)
		$fd = gzopen($filename, "rb9");
	else
		$fd = fopen($filename, "rb");
	if ($zlib)
		$numPages = trim(gzgets($fd));
	else
		$numPages = trim(fgets($fd));
	for ($i=0; $i<$numPages; $i++)
	{
		if ($zlib)
		{
			$title = trim(gzgets($fd));
			$modtime = trim(gzgets($fd));
			$numLines = trim(gzgets($fd));
			$contents = "";
			for ($j=0; $j<$numLines; $j++)
				$contents .= gzgets($fd);		
		}
		else
		{
			$title = trim(fgets($fd));
			$modtime = trim(fgets($fd));
			$numLines = trim(fgets($fd));
			$contents = "";
			for ($j=0; $j<$numLines; $j++)
				$contents .= fgets($fd);
		}
		if (!writeFile($title, $contents))
		{
			if (@touch(pagePath( $title ), $modtime, $modtime)==false)
			{
				error("Could not modify filetimes for $title - ensure php owns the file!");
			}
			$restored[] = $title;
		}
	}
	if ($zlib)
		gzclose($fd);
	else
		fclose($fd);	
}

// print a little wiki syntax box
function printWikiSyntax()
{
	global $config;
	echo("\t<div class=\"wikisyntax\">\n");
		
		echo("\t<div class=\"syntax clearfix\">\n");
		echo(wikiparse("**__".$config['LOCALE']['SYNTAX'][$config['LOCALE']['LANG']]."__** ")."<span class=\"optionalvalue\">(".$config['LOCALE']['OPTIONAL_VALUES'][$config['LOCALE']['LANG']].")</span>");
		echo("</div>");
		
		echo("\t<div class=\"syntax clearfix\">\n");
			echo("<span class=\"syntax_title\">");
			echo( "bold text: " );
			echo("</span>");
		echo( "**abc**" );
		echo("</div>");
		
		echo("\t<div class=\"syntax clearfix\">\n");
			echo("<span class=\"syntax_title\">");
			echo( "italic text: " );
			echo("</span>");
		echo( "''abc''" );
		echo("</div>");
		
		echo("\t<div class=\"syntax clearfix\">\n");
			echo("<span class=\"syntax_title\">");
			echo( "underlined text: " );
			echo("</span>");
		echo( "__abc__" );
		echo("</div>");
		
		echo("\t<div class=\"syntax clearfix\">\n");
			echo("<span class=\"syntax_title\">");
			echo( "verbatim text: " );
			echo("</span>");
		echo( "~~~abc~~~" );
		echo("</div>");
		
		echo("\t<div class=\"syntax clearfix\">\n");
			echo("<span class=\"syntax_title\">");
			echo( "link: " );
			echo("</span>");
		echo( "[[url|<span class=\"optionalvalue\">description</span>|<span class=\"optionalvalue\">target</span>]]" );
		echo("</div>");
		
		
		if ( $config['SYNTAX']['WIKIWORDS'] ){
			echo("\t<div class=\"syntax clearfix\">\n");
				echo("<span class=\"syntax_title\">");
				echo( "wiki link: " );
				echo("</span>");
			echo( "WikiWord" );
			echo("</div>");
		}
		
		
		echo("\t<div class=\"syntax clearfix\">\n");
			echo("<span class=\"syntax_title\">");
			echo( "image: " );
			echo("</span>");
		echo( "{{url|<span class=\"optionalvalue\">alt</span>|<span class=\"optionalvalue\">width</span>|<span class=\"optionalvalue\">height</span>|<span class=\"optionalvalue\">align</span>|<span class=\"optionalvalue\">vertical-align</span>}}" );
		echo("</div>");
		
		echo("\t<div class=\"syntax clearfix\">\n");
			echo("<span class=\"syntax_title\">");
			echo( "hex-coloured text: " );
			echo("</span>");
		echo( "~~#AAAAAA:grey~~" );
		echo("</div>");
		
		if ( $config['SYNTAX']['HTMLCODE'] ){
			echo("\t<div class=\"syntax clearfix\">\n");
				echo("<span class=\"syntax_title\">");
				echo( "html code: " );
				echo("</span>");
			echo( "%%html code%%" );
			echo("</div>");
		}
		
		
		echo("\t<div class=\"syntax clearfix\">\n");
			echo("<span class=\"syntax_title\">");
			echo( "anchor link: " );
			echo("</span>");
		echo( "@@name@@" );
		echo("</div>");
	

	echo("\t</div>\n");
}

// display a wiki page
function displayPage( $title, &$mode, $contents="" )
{ 	
	global $config;

	// handle special pages 
	switch ($title)
	{
		case $config['LOCALE']['PAGELIST_LINK'][$config['LOCALE']['LANG']]:
			$contents = pageList();
			break;
			
		case "RestoreWiki":		
			if ( !isset($config['INTERNAL']['DATA']['RESTORED']) )
			{			
				$contents .= "<b>WARNING: Restoring wiki pages will overwrite any existing pages with the same name!</b><br /><br />" ;
				$contents .= "Backup File: ";    
				$contents .= "<input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"".$config['BACKUP']['MAX_SIZE']."\" /><br />";
				$contents .= "<input name=\"userfile\" type=\"file\" class=\"fileupload\" size=\"32\" /><br /><br />";
				$contents .= "Enter the password below and click <b>restore</b>.";
			}
			else
			{
				$contents = wikiparse("Restored **".count($config['INTERNAL']['DATA']['RESTORED'])."** wiki pages:\n");
				foreach($config['INTERNAL']['DATA']['RESTORED'] as $page)
				{
					$contents .= wikiparse("-> [[$page]]\n");
				}
			}
			break;
			
		case "BackupWiki":
			if (!anyErrors())
			{
				$wikiname = str_replace( " ", "_", $config['GENERAL']['TITLE'] );
				$files = phpikiReadDir(pageDir());
				$backups = phpikiReadDir(tempDir());
				$contents = "Backed up ".count($files)." pages.\n\nRight-click on the link below and \"Save Link to Disk...\".\n";
			}
			break;
			
		default:
			if ( pageExists( $title ) )
			{
				if (!( ($mode==$config['LOCALE']['EDIT'][$config['LOCALE']['LANG']]) && ($contents!="") ))
					$contents = phpikiReadFile( pagePath( $title ) );
			}
			else
			{
				$contents = $config['LOCALE']['NEWPAGE_TEMPLATE'][$config['LOCALE']['LANG']];
				$mode = "editnew";
			}
			break;
	}
	
	switch ($mode)
	{
		case "display":
			echo("<span class=\"wiki_body\">\n");
			echo( wikiparse( $contents ) );
			echo("</span>\n");
			break;		
		case "backupwiki":
			echo("<span class=\"wiki_body\">\n");
			echo( wikiparse( $contents ) );
			echo("</span>\n");
			break;		
		case "restorewiki": 
			echo("<span class=\"wiki_body\">\n");
			echo( $contents );
			echo("</span>\n");
			break;			
		case $config['LOCALE']['EDIT'][$config['LOCALE']['LANG']]: case "editnew":
		  echo( "<form action=\"".$config['GENERAL']['BASE_URL'].$config['GENERAL']['URL_PREFIX'].$title.$config['GENERAL']['URL_POSTFIX']."\" method=\"post\">\n" );
		  echo( "<textarea name=\"contents\" rows=\"24\" cols=\"78\">".$contents."</textarea>\n" );
		  
		  if(file_exists('img2b64.php') && ( $config['SYNTAX']['HTMLCODE'] )){
		  	include('img2b64.php');
		  }
		  
		  break;
	}    	
}

// display the wiki controls
function displayControls( $title, &$mode )
{
	global $config;
	
	echo("\t<div class=\"wiki_body_footer\">\n");
	echo("\t\t\t<div class=\"pull-left\">\n"); 
	if ($config['GENERAL']['SHOW_CONTROLS'])
	{
		switch ($mode)
		{
			case "display":
				if (!(isSpecial($title)))
				{
					echo( "\t\t\t\t<form action=\"".$config['GENERAL']['BASE_URL'].$config['GENERAL']['URL_PREFIX'].$title.$config['GENERAL']['URL_POSTFIX']."\" method=\"post\">\n" );
					echo( "\t\t\t\t\t<p>\n" );
	
					if( $config['MISC']['REQ_PASSWORD_TEXT_IN_EDIT_BTN'] )
					{
						echo( "<input name=\"mode\" value=\"".$config['LOCALE']['EDIT'][$config['LOCALE']['LANG']]."\" type=\"hidden\" />");
						echo( "\t\t\t\t\t\t<input value=\"".$config['LOCALE']['EDIT'][$config['LOCALE']['LANG']] );
						if (isLocked($title))
							echo($config['LOCALE']['REQ_PASSWORD'][$config['LOCALE']['LANG']]);
						echo( "\" type=\"submit\" />");
					}
					else
					{
						echo( "<input name=\"mode\" value=\"".$config['LOCALE']['EDIT'][$config['LOCALE']['LANG']]."\" type=\"hidden\" />");
						echo( "\t\t\t\t\t\t<input value=\"".$config['LOCALE']['EDIT'][$config['LOCALE']['LANG']]."\" type=\"submit\" />" );
						if (isLocked($title))
							echo( wikiparse($config['LOCALE']['REQ_PASSWORD'][$config['LOCALE']['LANG']]));		
					} 
			
					echo( "\n\t\t\t\t\t</p>\n" );
					echo( "\t\t\t\t</form>\n" );
				}
				if ($title==$config['LOCALE']['PAGELIST_LINK'][$config['LOCALE']['LANG']]&&$config['BACKUP']['ENABLE'])
				{				
					echo( "\t\t\t\t<form action=\"".$config['GENERAL']['BASE_URL'].$config['GENERAL']['URL_PREFIX'].$title.$config['GENERAL']['URL_POSTFIX']."\" method=\"post\">\n" );
					echo( "\t\t\t\t\t<p>\n" );
					echo( "\t\t\t\t\t\t<input name=\"mode\" value=\"backup\" type=\"submit\" />" );
					echo( "\t\t\t\t\t\t<input name=\"mode\" value=\"restore\" type=\"submit\" />" );
					echo( "\n\t\t\t\t\t</p>\n" );
					echo( "\t\t\t\t</form>\n" );
				}
				break;
			case "backupwiki":
				if (!anyErrors())
				{
					$wikiname = str_replace( " ", "_", $config['GENERAL']['TITLE'] );
					$files = phpikiReadDir(pageDir());
					$backups = phpikiReadDir(tempDir());
					$details = array();
					foreach ($backups as $backup)
						$details[$backup] = filemtime( $backup );
					arsort($details);
					reset($details);	
					while ( list($key, $val) = each($details) )  	
					{
						$size = filesize($key);
						echo( wikiparse("[[".$config['GENERAL']['BASE_URL']."/".$key."|".basename($key)."]] ($size bytes)\n"));
					}
				}
				break;
			case "restorewiki":
				if ( !isset($config['INTERNAL']['DATA']['RESTORED']) )
				{
					echo( "\t\t\t\t\t<p>\n" );
					echo(wikiparse(" ".$config['LOCALE']['PASSWORD_TEXT'][$config['LOCALE']['LANG']])); 
					echo("<input name=\"password\" type=\"password\" class=\"pass\" size=\"17\" />");
					echo( "\t\t\t\t\t<input name=\"mode\" value=\"restorewiki\" type=\"hidden\" />\n" );	
					echo( "\t\t\t\t\t<input value=\"restore\" type=\"submit\" />\n" );		
					echo( "\t\t\t\t\t</p>\n" );
				}
				break;
			case $config['LOCALE']['EDIT'][$config['LOCALE']['LANG']]:
				echo( "\t\t\t\t\t<p>\n" );
				if (isLocked($title))
				{
					echo(wikiparse($config['LOCALE']['PASSWORD_TEXT'][$config['LOCALE']['LANG']])); 
					echo("<input name=\"password\" type=\"password\" class=\"pass\" size=\"17\" />");
				}
				echo( "\t\t\t\t\t<input name=\"mode\" value=\"".$config['LOCALE']['SAVE'][$config['LOCALE']['LANG']]."\" TYPE=\"submit\" />\n" );
				echo( "\t\t\t\t\t<input name=\"mode\" value=\"".$config['LOCALE']['CANCEL'][$config['LOCALE']['LANG']]."\" TYPE=\"submit\" />\n" );
				echo( "\t\t\t\t\t</p>\n" );
				echo( "\t\t\t\t</form>\n" );
				break;
			case "editnew":
				echo( "\t\t\t\t\t<p>\n" );
				if (isLocked($title))
				{
					echo(wikiparse($config['LOCALE']['PASSWORD_TEXT'][$config['LOCALE']['LANG']])); 
					echo("<input name=\"password\" type=\"password\" class=\"pass\" size=\"17\" />");
				}
				echo( "\t\t\t\t\t\t<input name=\"mode\" value=\"".$config['LOCALE']['SAVE'][$config['LOCALE']['LANG']]."\" type=\"submit\" />" );
				echo( "\t\t\t\t\t</p>\n" );
				echo( "\t\t\t\t</form>\n" );
				break;
		}
	}
	echo("\t\t\t</div>\n");
	echo("\t\t\t<div class=\"pull-right\">\n");
	echo("\t\t\t\t<p>\n");
	printLicense( $title );
	echo("\t\t\t\t</p>\n");
	echo("\t\t\t</div>\n");
	echo("\t</div>\n");
	if ( getMode()=="restore" )
		echo( "\t</form>\n" );
	if ( ($mode==$config['LOCALE']['EDIT'][$config['LOCALE']['LANG']]||$mode=="editnew")&&$config['SYNTAX']['SHOW_BOX']&&$title!="RestoreWiki" )
		printWikiSyntax();
}

//==============
//==============
// MAIN BLOCK!
//==============
//==============
if ($config['CONFIGFILE']!="")
	include($config['CONFIGFILE']); // load some external configuration settings

// Restrict access to entire wiki using HTTP Authentication mechanism
// (only available if php interface is via apache module).
if (isset($config['RESTRICTED']['HTTP']))
{
	if ( php_sapi_name()=="apache" || php_sapi_name()=="apache2handler" )
	{
		$http_auth_users = array_values($config['RESTRICTED']['HTTP']);
		if (count($http_auth_users)>0)
		{
			$ServerKeys = array_keys( $_SERVER );
			$User = in_array( 'PHP_AUTH_USER', $ServerKeys ) ? $_SERVER['PHP_AUTH_USER'] : '';
			$Password = in_array( 'PHP_AUTH_PW', $ServerKeys ) ? $_SERVER['PHP_AUTH_PW'] : '';
			$Auth = false;
			if ( in_array( $User, $http_auth_users ) )
			{
				if ( $config['USERS'][$User]==$Password )
					$Auth = true;
			}
			if ( !$Auth )
			{
				 Header( "WWW-authenticate: basic realm=\"".$config['GENERAL']['TITLE']."\"" );
				 Header( 'HTTP/1.0 401 Unauthorized' );
				 echo( "<html>\n\t<head>\n\t\t<title>401 Unauthorised</title>\n\t</head>\n\t<body>\n" );
				 echo( "\t\t<h1>You are not authorised to access ".$config['GENERAL']['TITLE'].".</h1>" );
				 echo( "\n\t</body>\n</html>\n" );
				 exit();
			}
		}	
	}
	else
		error( "HTTP authentication is only available when PHP interface is via apache module!");
}


// by defining $PHPIKI_FUNCTIONS_ONLY and including this file we can use all
// the wiki functions without actually displaying a wiki.
if (!isset($PHPIKI_FUNCTIONS_ONLY))
{
	if ($config['GENERAL']['DEBUG'])
	{
   		list($usec, $sec) = explode(" ", microtime());
		$config['GENERAL']['DEBUG_STARTTIME'] = (float)$sec + (float)$usec;
	}

	// stop the page from being cached
	header("Cache-Control: no-store, no-cache, must-revalidate");

	// find out what wiki 'mode' we're in
	$mode = getMode();
	$format = in_array('format', array_keys ($_GET)) ? $_GET['format'] : false;
	if ( $format=="rss"&&$config['RSS']['ENABLE'] )
	{
		rssFeed();
		exit();
	}
	
	// get the page title
	$title = getTitle();
	if ( $mode=="backup" )
		$title = "BackupWiki";
	if ( $mode=="restore" )
		$title = "RestoreWiki";

	// get the page contents
	$contents = updateWiki( $mode, $title, $config );

	// page header
	if ($mode==$config['LOCALE']['EDIT'][$config['LOCALE']['LANG']]) 
		htmlHeader(wikiparse($config['LOCALE']['EDIT_TITLE'][$config['LOCALE']['LANG']]).$title, $config); 
	else
		htmlHeader($title, $config); 

	// page contents
	htmlStartBlock();
	displayPage($title, $mode, $contents);
	htmlEndBlock();

	// page controls
	displayControls($title, $mode);

	// page footer
	htmlFooter();
}
?>
