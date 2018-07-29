<?php
	
	$hostname_DS = "localhost";
	$database_DS = "pareomic_quotedb";
	$username_DS = "pareomic_proot";
	$password_DS = "admin@123";
	$DS = mysql_connect($hostname_DS, $username_DS, $password_DS) or die ('Not connected');//trigger_error(mysql_error(),E_USER_ERROR);	
	mysql_select_db($database_DS,$DS);
	define('DATABASE',$database_DS);
	define('PASSWORD',$password_DS);
	define('USERNAME',$username_DS);
	define('DATABASEHOST',$hostname_DS);
	require_once 'db.inc.php';
	$db	=	new db();
	if (!function_exists("GetSQLValueString")) {
		function GetSQLValueString($theValue, $theType='text', $theDefinedValue = "", $theNotDefinedValue = "") 
		{
			$theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
			$theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);
			switch ($theType) {
				case "text":
					$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
					break;    
				case "long":
				case "int":
					$theValue = ($theValue != "") ? $theValue : "NULL";
					break;
				case "double":
					$theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
					break;
				case "date":
					$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
					break;
				case "defined":
					$theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
					break;
			}
			return $theValue;
		}
	}
	if (!function_exists("isEmpty")) {
		function isEmpty($string){
			if(!isset($string) || empty($string) || $string==NULL){
				return true;
			}
			return false;
		}
	}
	if (!function_exists("nl2br_custom")) {
		function nl2br_custom($str) {
    	return str_replace(array("\r\n", "\r", "\n"), "<br />", $str);
		}
	}
	if (!function_exists("file_get_contents_curl")) {
		function file_get_contents_curl($url)
		{
			
			$ch = curl_init();
			curl_setopt( $ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; U; PPC Mac OS X; en) AppleWebKit/419.2.1 (KHTML, like Gecko) Safari/419.3" );
			curl_setopt( $ch, CURLOPT_URL, $url );
			curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
			curl_setopt( $ch, CURLOPT_ENCODING, "" );
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
			curl_setopt( $ch, CURLOPT_AUTOREFERER, true );
			curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );    # required for https urls
			curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, 10 );
			curl_setopt( $ch, CURLOPT_TIMEOUT, 10 );
			curl_setopt( $ch, CURLOPT_MAXREDIRS, 10 );
			$data = curl_exec($ch);
			 $response = curl_getinfo( $ch );
			
				curl_close($ch);
				return $data;
		}
	}
	if (!function_exists("get_video_id")) {
		function get_video_id($url){
			$html = '';
			$html = file_get_contents_curl($url);
			$dataArray=array(); 
			if($html==''){
				return 0;
			}
			//parsing begins here:
			$doc = new DOMDocument();
			@$doc->loadHTML($html);
			$img='';
			$metas = $doc->getElementsByTagName('meta');
			$links = $doc->getElementsByTagName('link');
			$vidparser = parse_url($url);
			//print_r($vidparser);		
		if(strpos($vidparser['host'],'youtube')!==false ){
			//echo 'test';
			//echo $links->length;
			//echo $meta->getAttribute('property');
			/*for ($i = 0; $i < $links->length; $i++)
					{
						$link = $links->item($i);
						$meta = $metas->item($i);					
						if($meta->getAttribute('property') == 'og:url')
						{
							$video_url_temp = $meta->getAttribute('content');
							$parsed_link = parse_url($video_url_temp);
							parse_str($parsed_link['query'],$var_array);
							$vid = isset($var_array['v'])?$var_array['v']:'';
							
						}
						if($meta->getAttribute('property') == 'og:image'){
							$img = $meta->getAttribute('content');
						}
				}*/
			$video_url = $url;
			if(isset($video_url)){
				$vidparser = parse_url($video_url);
				$vid=end(explode("v=",$vidparser['query']));
			}else{
				$vid='';
			}
		}else if(strpos($vidparser['host'],'dailymotion')!==false){
			
					for ($i = 0; $i < $links->length; $i++)
					{
							$meta = $metas->item($i);
						$link = $links->item($i);
						if($link->getAttribute('rel') == 'video_src')
						{
							$video_url = $link->getAttribute('href');
						}
						if($meta->getAttribute('property') == 'og:image'){
							$img = $meta->getAttribute('content');
						}
					}
				
			if(isset($video_url)){
				$vidparser = parse_url($video_url);
				$vid=end(explode("/",$vidparser['path']));
			}else{
				$vid='';
			}
		}else if(strpos($vidparser['host'],'vimeo')!==false){
			for ($i = 0; $i < $metas->length; $i++)
			{
				$meta = $metas->item($i);
				if($meta->getAttribute('property') == 'og:url'){
					$video_url_temp = $meta->getAttribute('content');
					$parsed_link = parse_url($video_url_temp);
					$vid = str_replace('/','',$parsed_link['path']);
					$vid=isset($vid)?$vid:'';
				}
				if($meta->getAttribute('property') == 'og:image'){
							$img = $meta->getAttribute('content');
				}
			}
		}
		if(isset($vid)){
			$dataArray['vid']=$vid;
			$dataArray['img']=$img;
			$dataArray['type']=$vidparser['host'];
			return $dataArray;
		}
		return 0;
	}
	}
	if (!function_exists("check_url")) {
		function check_url($url){
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_VERBOSE, 0);
			curl_setopt($ch, CURLOPT_NOBODY, 0);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$response = curl_exec($ch);
			$responseInfo=curl_getinfo($ch);
			if($responseInfo['http_code'] == "200") {
				return true;
			}
			return false;
		}
	}
	if (!function_exists("getVideoSource")) {
		function getVideoSource($videoId,$videoType, $width='340', $height='270')
		{
			if(strpos($videoType,'youtube')!==false )
			{
				$flash_src='http://www.youtube.com/v/' . $videoId . '&autoplay=0';
			}
			else if(strpos($videoType,'dailymotion')!==false)
			{
				$flash_src='http://www.dailymotion.com/swf/' . $videoId .'&autoplay=0';
			}
			else if(strpos($videoType,'vimeo')!==false)
			{
				$flash_src='http://vimeo.com/moogaloop.swf?clip_id=' . $videoId. '&autoplay=0';
			}
			$embedCode='<object width="'.$width.'" height="'.$height.'">
									<param name="movie" value="'.$flash_src.'"></param>
									<param name="allowfullscreen" value="true"></param>
									<param name="wmode" value="transparent"></param>
									<embed src="'.$flash_src.'" type="application/x-shockwave-flash" width="'.$width.'" height="'.$height.'" wmode="transparent" allowfullscreen="true"></embed></object>';
			return $embedCode;
		}
	}

?>