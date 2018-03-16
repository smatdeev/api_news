<?php
header('Content-Type: text/html; charset=windows-1256');
//header('content-type:text/html;charset=utf-8');

include"../global.php";
$siteurl = $apt->getsettings("siteURL");
$sitetitle = $apt->getsettings("sitetitle");

if(substr($siteurl,-1) != '/')
{$siteurls = $siteurl . '/';
}else{
$siteurls = $siteurl;}

 function myhtml($txt)
 {  return strip_tags( $txt,"");}
//header('Content-Type: text/htm');
$response = array();

 $result = mysql_query("SELECT id,title,news_head,uploadfile FROM rafia_news
                                 WHERE allow='yes'
                                 ORDER BY id DESC limit 2") or die(mysql_error());
 

    while ($row = mysql_fetch_array($result))
		{$product = array();
        $product["id"]         = $row["id"];
        $product["uploadfile"] = $row["uploadfile"];
        $product["title"] 	   = $row["title"];
        $product["linknews"]   = $siteurls."news.php?action=view&id=$row[id]";
        $product["imgnews"]    = $siteurls."filemanager.php?action=image&id=$row[uploadfile].jpg";

		
        array_push($response, $product) ;
		}
		
   echo json_encode($response);

	
?>
