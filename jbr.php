<?


// v3.0.2
define('REa','/^(\d\d|\d{4})$/');
define('REs','/^([12])[\/\.\s-](\d\d|\d{4})$/');
define('REq','/^([123])[\/\.\s-](\d\d|\d{4})$/');
define('REt','/^([1-4])[\/\.\s-](\d\d|\d{4})$/');
define('REb','/^([1-6])[\/\.\s-](\d\d|\d{4})$/');
define('REmes','/^(0?[1-9]|1[012])[\/\.\s-](\d\d|\d{4})$/');
define('REdata','/^(0?[1-9]|[12]\d|3[01])[\/\.\s-](0?[1-9]|1[012])[\/\.\s-](\d\d|\d{4})$/');
define('REw3cdata','/^(\d{4})-(\d{2})-(\d{2})T(\d{2}):(\d{2}):(\d{2})(?:\.(\d+))?(?:Z|(?:(\+|-)(\d{2}):(\d{2})))$/i');
define('REemail','/^[-_a-z0-9]+(\.[-_a-z0-9]+)*@([-a-z0-9]+\.)*([a-z]{2,6})$/i');
define('REmd5','/^([0-9a-f]{32})$/i');
define('REtel','/^\(?(\d{2})\)?[\/\.\s-]*(\d{4,5})[\/\.\s-]*(\d{4})$/');
define('REcnpj','/^(\d{2,3})\.?(\d{3})\.?(\d{3})\/?(\d{4})-?(\d\d)$/');
define('REie','/^(\d{3})\.?(\d{3})\.?(\d{3})\.?(\d{3})$/');
define('REcpf','/^(\d{3})\.?(\d{3})\.?(\d{3})-?(\d\d)$/');
define('RErg','/^(.+)$/');
define('REcep','/^(\d{5})-?(\d{3})$/');
define('REhttp','/^(https?:\/\/|ftp:\/\/)$/i');
define('RElink','/((https?:\/\/|ftp:\/\/)([-\w\.]+)|www\d?\.[-\w\.]+)(:\d+)?(\/(([-\w\/\.]*)(\?\S+)?(#\S+)?[^\s\?!\.,;:])?)?/i');
define('RElink2','/^((https?:\/\/|ftp:\/\/)([-\w\.]+)|www\d?\.[-\w\.]+)(:\d+)?(\/(([-\w\/\.]*)(\?\S+)?(#\S+)?)?)?$/i');
define('REag','/^(\d{4})-?(\d)$/');
define('REcc','/^(\d{2})\.?(\d{3})-?(\d)$/');
define('REcor','/^((?:[0-9a-f]{3}){1,2})$/i');
define('REcorc','/^(#(?:[0-9a-f]{3}){1,2})$/i');
define('REcoro','/^(#?(?:[0-9a-f]{3}){1,2})$/i');



if(!function_exists('http_response_code')){
	function http_response_code($code=NULL){
		if($code!==NULL){
			switch($code){
				case 100: $text = 'Continue'; break;
				case 101: $text = 'Switching Protocols'; break;
				case 200: $text = 'OK'; break;
				case 201: $text = 'Created'; break;
				case 202: $text = 'Accepted'; break;
				case 203: $text = 'Non-Authoritative Information'; break;
				case 204: $text = 'No Content'; break;
				case 205: $text = 'Reset Content'; break;
				case 206: $text = 'Partial Content'; break;
				case 300: $text = 'Multiple Choices'; break;
				case 301: $text = 'Moved Permanently'; break;
				case 302: $text = 'Moved Temporarily'; break;
				case 303: $text = 'See Other'; break;
				case 304: $text = 'Not Modified'; break;
				case 305: $text = 'Use Proxy'; break;
				case 400: $text = 'Bad Request'; break;
				case 401: $text = 'Unauthorized'; break;
				case 402: $text = 'Payment Required'; break;
				case 403: $text = 'Forbidden'; break;
				case 404: $text = 'Not Found'; break;
				case 405: $text = 'Method Not Allowed'; break;
				case 406: $text = 'Not Acceptable'; break;
				case 407: $text = 'Proxy Authentication Required'; break;
				case 408: $text = 'Request Time-out'; break;
				case 409: $text = 'Conflict'; break;
				case 410: $text = 'Gone'; break;
				case 411: $text = 'Length Required'; break;
				case 412: $text = 'Precondition Failed'; break;
				case 413: $text = 'Request Entity Too Large'; break;
				case 414: $text = 'Request-URI Too Large'; break;
				case 415: $text = 'Unsupported Media Type'; break;
				case 500: $text = 'Internal Server Error'; break;
				case 501: $text = 'Not Implemented'; break;
				case 502: $text = 'Bad Gateway'; break;
				case 503: $text = 'Service Unavailable'; break;
				case 504: $text = 'Gateway Time-out'; break;
				case 505: $text = 'HTTP Version not supported'; break;
				default:
					exit('Unknown http status code "'.htmlentities($code).'"');
				break;
			}
			$protocol = (isset($_SERVER['SERVER_PROTOCOL'])?$_SERVER['SERVER_PROTOCOL']:'HTTP/1.0');
			header($protocol.' '.$code.' '.$text);
			$GLOBALS['http_response_code'] = $code;
		}else{
			$code = (isset($GLOBALS['http_response_code'])?$GLOBALS['http_response_code']:200);
		}
		return $code;
	}
}



if(!function_exists('mime_content_type')){
	function mime_content_type($filename){
		$mime_types = array(
			'txt'=>'text/plain',
			'htm'=>'text/html',
			'html'=>'text/html',
			'php'=>'text/html',
			'css'=>'text/css',
			'js'=>'application/javascript',
			'json'=>'application/json',
			'xml'=>'application/xml',
			'swf'=>'application/x-shockwave-flash',
			'flv'=>'video/x-flv',
			// images
			'png'=>'image/png',
			'jpe'=>'image/jpeg',
			'jpeg'=>'image/jpeg',
			'jpg'=>'image/jpeg',
			'gif'=>'image/gif',
			'bmp'=>'image/bmp',
			'ico'=>'image/vnd.microsoft.icon',
			'tiff'=>'image/tiff',
			'tif'=>'image/tiff',
			'svg'=>'image/svg+xml',
			'svgz'=>'image/svg+xml',
			// archives
			'zip'=>'application/zip',
			'rar'=>'application/x-rar-compressed',
			'exe'=>'application/x-msdownload',
			'msi'=>'application/x-msdownload',
			'cab'=>'application/vnd.ms-cab-compressed',
			// audio/video
			'mp3'=>'audio/mpeg',
			'qt'=>'video/quicktime',
			'mov'=>'video/quicktime',
			// adobe
			'pdf'=>'application/pdf',
			'psd'=>'image/vnd.adobe.photoshop',
			'ai'=>'application/postscript',
			'eps'=>'application/postscript',
			'ps'=>'application/postscript',
			// ms office
			'doc'=>'application/msword',
			'rtf'=>'application/rtf',
			'xls'=>'application/vnd.ms-excel',
			'ppt'=>'application/vnd.ms-powerpoint',
			// open office
			'odt'=>'application/vnd.oasis.opendocument.text',
			'ods'=>'application/vnd.oasis.opendocument.spreadsheet'
		);
		$ext = strtolower(array_pop(explode('.',$filename)));
		if(isset($mime_types[$ext]))return $mime_types[$ext];
		if(function_exists('finfo_open')){
			$finfo = finfo_open(FILEINFO_MIME);
			$mimetype = finfo_file($finfo,$filename);
			finfo_close($finfo);
			return $mimetype;
		}
		return 'application/octet-stream';
	}
}



function get_ini($f=0,$o=1){
	if(is_array($f)){
		$q = 0;
		$n = 0;
		foreach($f as $k=>&$v){
			if($o===1&&++$q)is_numeric($k)&&++$n;
			if(is_array($v))$v = get_ini($v,$o);
			elseif(is_numeric($v))$v = +$v;
		}
		if($o===2||($o===1&&(!$q||$q>$n)))$f = (object)$f;
		return $f;
	}
	if(!$f||!is_file($f)||($data=@parse_ini_file($f,true))===false)return false;
	return get_ini($data,$o);
}

function set_ini($data=0,$f=0){
	if(!is_array($data)&&!$data instanceof Traversable&&!$data instanceof stdClass)return false;
	$r = '';
	$q = 0;
	foreach($data as $k=>$v){
		++$q;
		if(is_array($v)||$v instanceof Traversable||$v instanceof stdClass){
			if($q>1)$r .= "\n";
			$r .= "[$k]\n";
			foreach($v as $l=>$w){
				if(is_array($w)||$w instanceof Traversable||$w instanceof stdClass){
					foreach($w as $m=>$y){
						$r .= $l.'[';
						$r .= is_numeric($m)?$m:'"'.str_replace('"','\"',$m).'"';
						$r .= ']='.(is_string($y)?'"'.str_replace('"','\"',$y).'"':(is_bool($y)||is_int($y)||is_float($y)?+$y:''))."\n";
					}
				}else $r .= $l.'='.(is_string($w)?'"'.str_replace('"','\"',$w).'"':(is_bool($w)||is_int($w)||is_float($w)?+$w:''))."\n";
			}
		}else $r .= $k.'='.(is_string($v)?'"'.str_replace('"','\"',$v).'"':(is_bool($v)||is_int($v)||is_float($v)?+$v:''))."\n";
	}
	if($f&&is_string($f))return @file_put_contents($f,$r);
	return $r;
}



function get_data($f=0,$o=1){
	if(is_array($f)){
		$q = 0;
		$n = 0;
		foreach($f as $k=>&$v){
			if($o===1&&++$q)is_numeric($k)&&++$n;
			if(is_array($v))$v = get_data($v,$o);
		}
		if($o===2||($o===1&&(!$q||$q>$n)))$f = (object)$f;
		return $f;
	}
	if(!$f||!is_file($f)||($data=@file_get_contents($f))===false)return false;
	return @unserialize($data);
}

function set_data($data=null,$f=0){
	if($data===null||!$f||!is_string($f))return false;
	return @file_put_contents($f,serialize($data));
}



function ip2bin($ip,$t6=0,$h=0){
	$s = $ipv4 = '';
	$v6 = strpos($ip,':')!==false;
	$v4 = strpos($ip,'.')!==false;
	if($t6&&$v4&&!$v6){
		$ip = '::'.$ip;
		$v6 = true;
	}
	if($v6){
		if(!($l=preg_match_all('#(?|::|(?|\d{1,3}\.){3}\d{1,3}|[0-9a-f]{1,4})#i',$ip,$m))||$l>8)return false;
		foreach($m[0] as $p){
			if($p=='::')$s .= str_repeat('0000',8-$l+(strpos($m[0][$l-1],'.')===false));
			elseif(strpos($p,'.')!==false)$ipv4 = ip2bin($p,0,$h);
			else $s .= str_pad($p,4,'0',STR_PAD_LEFT);
		}
		if($ipv4===false)return false;
		if($h)return $s.$ipv4;
		return pack('H*',$s).$ipv4;
	}elseif($v4){
		$x = explode('.',$ip);
		if(count($x)!=4)return false;
		foreach($x as $i)$s .= chr((int)$i);
		if($h)return bin2hex($s);
		return $s;
	}
	return false;
}
function ip2hex($ip,$t6=0){return ip2bin($ip,$t6,1);}
function ip62bin($ip){return ip2bin($ip,1,0);}
function ip62hex($ip){return ip2bin($ip,1,1);}



function geraSenha($l=8,$s=true,$m=true,$n=true){
	$r = '';
	$c = 'abcdefghijklmnopqrstuvwxyz';
	if($s)$c .= '"\'!@#$%&*()-_+=[]{}/\\?<>;:.';
	if($m)$c .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	if($n)$c .= '1234567890';
	$len = strlen($c)-1;
	for($i=0; $i<$l; ++$i)$r .= $c{mt_rand(0,$len)};
	return $r;
}



function merge(&$t){
	if(!is_array($t))return $t;
	$q = func_num_args();
	$f = 'array_merge';
	for($i=1; $i<$q; $i++){
		$v = func_get_arg($i);
		if(is_null($v))continue;
		if(is_bool($v)){
			$f = 'array_merge'.($v?'_recursive':'');
			continue;
		}
		if(!is_array($v))$v = array($v);
		$t = $f($t,$v);
	}
	return $t;
}



function pad($s,$l,$p=' ',$t=0){
	$is = is_array($s);
	if($is||$s instanceof Traversable){
		foreach($s as $k=>$v){
			if($is)$s[$k] = pad($v,$l,$p,$t);
			else $s->$k = pad($v,$l,$p,$t);
		}
		return $s;
	}
	if(is_numeric($p))$p = ''.$p;
	if($t===1)$tp = STR_PAD_LEFT;
	elseif($t===3)$tp = STR_PAD_BOTH;
	else $tp = STR_PAD_RIGHT;
	return str_pad($s,$l,$p,$tp);
}
function pad0($s,$l,$t=0){return pad($s,$l,0,$t);}
function padl($s,$l,$p=' '){return pad($s,$l,$p,1);}
function padr($s,$l,$p=' '){return pad($s,$l,$p,2);}
function padb($s,$l,$p=' '){return pad($s,$l,$p,3);}
function pad0l($s,$l){return pad($s,$l,0,1);}
function pad0r($s,$l){return pad($s,$l,0,2);}
function pad0b($s,$l){return pad($s,$l,0,3);}



function bissexto($a=0){
	if(!$a||!is_numeric($a))return 0;
	return $a%400==0||($a%4==0&&$a%100!=0)?1:0;
}



function mes($m=0,$a=0){
	if(!$m||!is_numeric($m)||$m>12)return 0;
	$mes = array(0,31,28,31,30,31,30,31,31,30,31,30,31);
	if($a&&is_numeric($a)&&$m==2)return $mes[$m]+bissexto($a);
	return $mes[$m];
}



function encrypt($s,$k){
	$q = strlen($s);
	$Q = strlen($k);
	for($x=0,$y=0; $x<$q; $x++){
		$s{$x} = chr(ord($s{$x})^ord($k{$y}));
		if(++$y==$Q)$y = 0;
	}
	return $s;
}



// v1.0.1
function Logger($msg='',$f=0,$i=0){
	if(!$f)$f = INC.'_log.txt';
	$data = date('d-m-y');
	$hora = date('H:i:s');
	$ip = $_SERVER['REMOTE_ADDR'];
	$t = (is_string($i)?$i:'')."[$data $hora][$ip]> $msg\n";
	$f = fopen($f,'a+b');
	fwrite($f,$t);
	fclose($f);
}








function buscaTrata($q,$f=0,$s=0){
	$q = preg_replace('/\\\\/','',$q);
	if(strlen(preg_replace('/[^"]/','',$q))%2==1)$q .= '"';
	$q = preg_replace('/"/',' " ',$q);
	$q = trim(preg_replace('/\s+/',' ',$q));
	$g = array();
	$p1 = 0;
	$p2 = 0;
	$a = false;
	while(($p1=strpos($q,'"',$p2))!==false){
		if(!$p2&&!$p1){
			$p2 = 1;
			continue;
		}
		if(!$p2)$a = true;
		$a = !$a;
		$t = trim(substr($q,$p2,$p1-$p2));
		if($t){
			if($a)$g[] = '"'.$t.'"';
			else $g = array_merge($g,explode(' ',$t));
		}
		$p2 = $p1+1;
	}
	$t = trim(substr($q,$p2));
	if($t)$g = array_merge($g,explode(' ',$t));
	if($f)$r = preg_replace('/\*{2,}/','*',implode('* ',$g).'*');
	else $r = implode(' ',$g);
	if($s===1)$r = ss($r);
	return $r;
}



function linka($c,$b=1,$o=''){
	return preg_replace_callback(RElink,create_function('$m','$P = $m[2];$D = $m[3];$p = $m[4];$d = $m[5];if(!strlen($P)){$P = \'http://\';$D = $m[1];}$url = $D.$p.$d;return "<a href=\"".$P.$url."\"'.addslashes(($b?' target="_blank"':'').$o).'>".$url."</a>";'),$str);
}



// url
// v{valor}
// u{url}; se url==1, então url=valor; se !url e b==numeric, então retorna [span,strong,em] do valor; se !url, então retorna valor
// b{target blank}
// o{opções, atributos}
function url($v,$u=0,$b=0,$o=0){
	if($u===1)$u = $v;
	if(!$u&&$b===2)return '<span>'.$v.'</span>';
	if(!$u&&$b===3)return '<strong>'.$v.'</strong>';
	if(!$u&&$b===4)return '<em>'.$v.'</em>';
	if(!$u)return $v;
	return '<a href="'.$u.'"'.($b?' target="_blank"':'').($o?" $o":'').'>'.$v.'</a>';
}



function BBcodeurlcall($m){
	$u = trim($m[1]);
	$t = trim($m[2]);
	if(preg_match(RElink2,$u,$m)){
		$P = $m[2];
		$D = $m[3];
		$p = $m[4];
		$d = $m[5];
		if(!strlen($P)){
			$P = 'http://';
			$D = $m[1];
		}
		$url = $D.$p.$d;
	}else{
		$P = '';
		$url = $u;
	}
	if(!$t)$t = $url;
	return '<a href="'.$P.$url.'" target="_blank">'.$t.'</a>';
}
function BBcode($str,$br=0){
	$str = htmlspecialchars($str,ENT_QUOTES);
	$c1 = array(
		'i'=>'<em>$1</em>',
		'b'=>'<strong>$1</strong>',
		'u'=>'<u>$1</u>',
		'img'=>'<img src=\"$1\"/>',
		'url'=>'[url=$1][/url]'
	);
	$c2 = array();
	$a = array();
	$b = array();
	foreach($c1 as $k=>$v){
		$a[] = '/\['.$k.'\](.*?)\[\/'.$k.'\]/is';
		$b[] = $v;
	}
	foreach($c2 as $k=>$v){
		$a[] = '/\['.$k.'=(.*?)\](.*?)\[\/'.$k.'\]/is';
		$b[] = $v;
	}
	$str = preg_replace($a,$b,$str);
	$str = preg_replace_callback('/\[url=(.*?)\](.*?)\[\/url\]/is','BBcodeurlcall',$str);
	if(is_string($br))$str = preg_replace('/\n/',"<br/>$br",$str);
	return $str;
}




// v3.3.0
function s($v='',$s=0,$c=0,$h=0,$b=0,$t=1,$g=0){$iss=is_string($v);if($iss&&$g){$k=preg_split('/\s+/',trim($v));$v=NULL;foreach($k as $i=>$w){if($i===0){if($g===1)$v=$_GET[$w];elseif($g===2)$v=$_POST[$w];elseif($g===3)$v=$_REQUEST[$w];elseif($g===4)$v=$_COOKIE[$w];elseif(is_array($g))$v=$g[$w];elseif(is_object($g))$v=$g->$w;}else{if(is_array($v))$v=$v[$w];elseif(is_object($v))$v=$v->$w;else $v=NULL;}}$g=0;}if(is_array($v)){foreach($v as $k=>$w)$v[$k]=s($w,$s,$c,$h,$b,$t,$g);return $v;}if(is_object($v)){foreach($v as $k=>$w)$v->$k=s($w,$s,$c,$h,$b,$t,$g);return $v;}if($t===1)$t=' ';if($t&&$iss)$v=trim($v,$t);$isn=is_numeric($v);if($s>=3&&$s<=8){switch($s){case 3:$v=(int)$v;break;case 4:$v=(float)$v;break;case 5:if(is_int($v))$c=2;else $v=$iss||$isn?preg_replace('/\D/','',''.$v)+0:0;break;case 6:$v=(float)($isn?$v:($iss?str_replace(',','.',$v):0));break;case 7:$v=(int)($isn?$v:($iss?str_replace(',','',$v):0));break;case 8:$v=(float)($isn?$v:($iss?str_replace(',','',$v):0));break;}if($c===1&&$v<0)$v=0;if($c===2&&$v<0)$v=-$v;return $v;}if($isn)return "$v";if(is_bool($v))return $v?'true':'false';if(is_null($v))return '';if(!$iss)return $v;if($s===-2||$s===-1)$v=preg_replace('/(\\\\r)?\\\\n/',"\n",$v);if($s===-2&&get_magic_quotes_gpc())$s=-1;if($s===-1)$v=stripslashes($v);if($h&&$s===2&&get_magic_quotes_gpc()){$v=stripslashes($v);$s=1;}if($h===-1)$v=htmlspecialchars_decode($v,ENT_COMPAT);if($h===-2)$v=htmlspecialchars_decode($v,ENT_NOQUOTES);if($h===-3)$v=htmlspecialchars_decode($v,ENT_QUOTES);if($h===1)$v=htmlspecialchars($v,ENT_COMPAT);if($h===2)$v=htmlspecialchars($v,ENT_NOQUOTES);if($h===3)$v=htmlspecialchars($v,ENT_QUOTES);if($s===2&&!get_magic_quotes_gpc())$s=1;if($s===1)$v=addslashes($v);if($s===1||$s===2)$v=preg_replace('/\r?\n/','\n',$v);if($c===1)$v=mb_strtolower($v,'utf-8');if($c===2)$v=mb_strtoupper($v,'utf-8');if($b===1)$v=preg_replace('/<br\s?\/?>/i',"\n",$v);if($b===2)$v=nl2br($v);return $v;}
//GERAL
function sd($v='',$b=0,$t=1){return s($v,0,0,-3,$b,$t,0);}
function sh($v='',$b=0,$t=1){return s($v,0,0,3,$b,$t,0);}
function sl($v='',$b=0,$t=1){return s($v,0,1,0,$b,$t,0);}
function sld($v='',$b=0,$t=1){return s($v,0,1,-3,$b,$t,0);}
function slh($v='',$b=0,$t=1){return s($v,0,1,3,$b,$t,0);}
function su($v='',$b=0,$t=1){return s($v,0,2,0,$b,$t,0);}
function sud($v='',$b=0,$t=1){return s($v,0,2,-3,$b,$t,0);}
function suh($v='',$b=0,$t=1){return s($v,0,2,3,$b,$t,0);}
function sr($v='',$b=0,$t=1){return s($v,-1,0,0,$b,$t,0);}
function srd($v='',$b=0,$t=1){return s($v,-1,0,-3,$b,$t,0);}
function srh($v='',$b=0,$t=1){return s($v,-1,0,3,$b,$t,0);}
function srl($v='',$b=0,$t=1){return s($v,-1,1,0,$b,$t,0);}
function srld($v='',$b=0,$t=1){return s($v,-1,1,-3,$b,$t,0);}
function srlh($v='',$b=0,$t=1){return s($v,-1,1,3,$b,$t,0);}
function sru($v='',$b=0,$t=1){return s($v,-1,2,0,$b,$t,0);}
function srud($v='',$b=0,$t=1){return s($v,-1,2,-3,$b,$t,0);}
function sruh($v='',$b=0,$t=1){return s($v,-1,2,3,$b,$t,0);}
function ss($v='',$b=0,$t=1){return s($v,1,0,0,$b,$t,0);}
function ssd($v='',$b=0,$t=1){return s($v,1,0,-3,$b,$t,0);}
function ssh($v='',$b=0,$t=1){return s($v,1,0,3,$b,$t,0);}
function ssl($v='',$b=0,$t=1){return s($v,1,1,0,$b,$t,0);}
function ssld($v='',$b=0,$t=1){return s($v,1,1,-3,$b,$t,0);}
function sslh($v='',$b=0,$t=1){return s($v,1,1,3,$b,$t,0);}
function ssu($v='',$b=0,$t=1){return s($v,1,2,0,$b,$t,0);}
function ssud($v='',$b=0,$t=1){return s($v,1,2,-3,$b,$t,0);}
function ssuh($v='',$b=0,$t=1){return s($v,1,2,3,$b,$t,0);}

function sn($v='',$t=1){return s($v,0,0,0,1,$t,0);}
function sb($v='',$t=1){return s($v,0,0,0,2,$t,0);}
function sdn($v='',$t=1){return sd($v,1,$t);}
function sdb($v='',$t=1){return sd($v,2,$t);}
function shn($v='',$t=1){return sh($v,1,$t);}
function shb($v='',$t=1){return sh($v,2,$t);}
//GET
function sg($v='',$b=0,$t=1){return s($v,0,0,0,$b,$t,1);}
function sgd($v='',$b=0,$t=1){return s($v,0,0,-3,$b,$t,1);}
function sgh($v='',$b=0,$t=1){return s($v,0,0,3,$b,$t,1);}
function sgl($v='',$b=0,$t=1){return s($v,0,1,0,$b,$t,1);}
function sgld($v='',$b=0,$t=1){return s($v,0,1,-3,$b,$t,1);}
function sglh($v='',$b=0,$t=1){return s($v,0,1,3,$b,$t,1);}
function sgu($v='',$b=0,$t=1){return s($v,0,2,0,$b,$t,1);}
function sgud($v='',$b=0,$t=1){return s($v,0,2,-3,$b,$t,1);}
function sguh($v='',$b=0,$t=1){return s($v,0,2,3,$b,$t,1);}
function sgr($v='',$b=0,$t=1){return s($v,-2,0,0,$b,$t,1);}
function sgrd($v='',$b=0,$t=1){return s($v,-2,0,-3,$b,$t,1);}
function sgrh($v='',$b=0,$t=1){return s($v,-2,0,3,$b,$t,1);}
function sgrl($v='',$b=0,$t=1){return s($v,-2,1,0,$b,$t,1);}
function sgrld($v='',$b=0,$t=1){return s($v,-2,1,-3,$b,$t,1);}
function sgrlh($v='',$b=0,$t=1){return s($v,-2,1,3,$b,$t,1);}
function sgru($v='',$b=0,$t=1){return s($v,-2,2,0,$b,$t,1);}
function sgrud($v='',$b=0,$t=1){return s($v,-2,2,-3,$b,$t,1);}
function sgruh($v='',$b=0,$t=1){return s($v,-2,2,3,$b,$t,1);}
function sgs($v='',$b=0,$t=1){return s($v,2,0,0,$b,$t,1);}
function sgsd($v='',$b=0,$t=1){return s($v,2,0,-3,$b,$t,1);}
function sgsh($v='',$b=0,$t=1){return s($v,2,0,3,$b,$t,1);}
function sgsl($v='',$b=0,$t=1){return s($v,2,1,0,$b,$t,1);}
function sgsld($v='',$b=0,$t=1){return s($v,2,1,-3,$b,$t,1);}
function sgslh($v='',$b=0,$t=1){return s($v,2,1,3,$b,$t,1);}
function sgsu($v='',$b=0,$t=1){return s($v,2,2,0,$b,$t,1);}
function sgsud($v='',$b=0,$t=1){return s($v,2,2,-3,$b,$t,1);}
function sgsuh($v='',$b=0,$t=1){return s($v,2,2,3,$b,$t,1);}
//POST
function sp($v='',$b=0,$t=1){return s($v,0,0,0,$b,$t,2);}
function spd($v='',$b=0,$t=1){return s($v,0,0,-3,$b,$t,2);}
function sph($v='',$b=0,$t=1){return s($v,0,0,3,$b,$t,2);}
function spl($v='',$b=0,$t=1){return s($v,0,1,0,$b,$t,2);}
function spld($v='',$b=0,$t=1){return s($v,0,1,-3,$b,$t,2);}
function splh($v='',$b=0,$t=1){return s($v,0,1,3,$b,$t,2);}
function spu($v='',$b=0,$t=1){return s($v,0,2,0,$b,$t,2);}
function spud($v='',$b=0,$t=1){return s($v,0,2,-3,$b,$t,2);}
function spuh($v='',$b=0,$t=1){return s($v,0,2,3,$b,$t,2);}
function spr($v='',$b=0,$t=1){return s($v,-2,0,0,$b,$t,2);}
function sprd($v='',$b=0,$t=1){return s($v,-2,0,-3,$b,$t,2);}
function sprh($v='',$b=0,$t=1){return s($v,-2,0,3,$b,$t,2);}
function sprl($v='',$b=0,$t=1){return s($v,-2,1,0,$b,$t,2);}
function sprld($v='',$b=0,$t=1){return s($v,-2,1,-3,$b,$t,2);}
function sprlh($v='',$b=0,$t=1){return s($v,-2,1,3,$b,$t,2);}
function spru($v='',$b=0,$t=1){return s($v,-2,2,0,$b,$t,2);}
function sprud($v='',$b=0,$t=1){return s($v,-2,2,-3,$b,$t,2);}
function spruh($v='',$b=0,$t=1){return s($v,-2,2,3,$b,$t,2);}
function sps($v='',$b=0,$t=1){return s($v,2,0,0,$b,$t,2);}
function spsd($v='',$b=0,$t=1){return s($v,2,0,-3,$b,$t,2);}
function spsh($v='',$b=0,$t=1){return s($v,2,0,3,$b,$t,2);}
function spsl($v='',$b=0,$t=1){return s($v,2,1,0,$b,$t,2);}
function spsld($v='',$b=0,$t=1){return s($v,2,1,-3,$b,$t,2);}
function spslh($v='',$b=0,$t=1){return s($v,2,1,3,$b,$t,2);}
function spsu($v='',$b=0,$t=1){return s($v,2,2,0,$b,$t,2);}
function spsud($v='',$b=0,$t=1){return s($v,2,2,-3,$b,$t,2);}
function spsuh($v='',$b=0,$t=1){return s($v,2,2,3,$b,$t,2);}
//REQUEST
//COOKIE
//MIXIM array, object
function sm($g=0,$v=0,$b=0,$t=1){return s($v,0,0,0,$b,$t,$g);}
function smd($g=0,$v=0,$b=0,$t=1){return s($v,0,0,-3,$b,$t,$g);}
function smh($g=0,$v=0,$b=0,$t=1){return s($v,0,0,3,$b,$t,$g);}
function sml($g=0,$v=0,$b=0,$t=1){return s($v,0,1,0,$b,$t,$g);}
function smld($g=0,$v=0,$b=0,$t=1){return s($v,0,1,-3,$b,$t,$g);}
function smlh($g=0,$v=0,$b=0,$t=1){return s($v,0,1,3,$b,$t,$g);}
function smu($g=0,$v=0,$b=0,$t=1){return s($v,0,2,0,$b,$t,$g);}
function smud($g=0,$v=0,$b=0,$t=1){return s($v,0,2,-3,$b,$t,$g);}
function smuh($g=0,$v=0,$b=0,$t=1){return s($v,0,2,3,$b,$t,$g);}
function smr($g=0,$v=0,$b=0,$t=1){return s($v,-1,0,0,$b,$t,$g);}
function smrd($g=0,$v=0,$b=0,$t=1){return s($v,-1,0,-3,$b,$t,$g);}
function smrh($g=0,$v=0,$b=0,$t=1){return s($v,-1,0,3,$b,$t,$g);}
function smrl($g=0,$v=0,$b=0,$t=1){return s($v,-1,1,0,$b,$t,$g);}
function smrld($g=0,$v=0,$b=0,$t=1){return s($v,-1,1,-3,$b,$t,$g);}
function smrlh($g=0,$v=0,$b=0,$t=1){return s($v,-1,1,3,$b,$t,$g);}
function smru($g=0,$v=0,$b=0,$t=1){return s($v,-1,2,0,$b,$t,$g);}
function smrud($g=0,$v=0,$b=0,$t=1){return s($v,-1,2,-3,$b,$t,$g);}
function smruh($g=0,$v=0,$b=0,$t=1){return s($v,-1,2,3,$b,$t,$g);}
function sms($g=0,$v=0,$b=0,$t=1){return s($v,1,0,0,$b,$t,$g);}
function smsd($g=0,$v=0,$b=0,$t=1){return s($v,1,0,-3,$b,$t,$g);}
function smsh($g=0,$v=0,$b=0,$t=1){return s($v,1,0,3,$b,$t,$g);}
function smsl($g=0,$v=0,$b=0,$t=1){return s($v,1,1,0,$b,$t,$g);}
function smsld($g=0,$v=0,$b=0,$t=1){return s($v,1,1,-3,$b,$t,$g);}
function smslh($g=0,$v=0,$b=0,$t=1){return s($v,1,1,3,$b,$t,$g);}
function smsu($g=0,$v=0,$b=0,$t=1){return s($v,1,2,0,$b,$t,$g);}
function smsud($g=0,$v=0,$b=0,$t=1){return s($v,1,2,-3,$b,$t,$g);}
function smsuh($g=0,$v=0,$b=0,$t=1){return s($v,1,2,3,$b,$t,$g);}

//NUMBER
function si($v=0,$c=0,$g=0){return s($v,3,$c,0,0,1,$g);}
function sf($v=0,$c=0,$g=0){return s($v,6,$c,0,0,1,$g);}
function si0($v=0,$g=0){return si($v,1,$g);}
function sf0($v=0,$g=0){return sf($v,1,$g);}
function sia($v=0,$g=0){return si($v,2,$g);}
function sfa($v=0,$g=0){return sf($v,2,$g);}
//INT
function sgi($v=0){return si($v,0,1);}
function spi($v=0){return si($v,0,2);}
function sqi($v=0){return si($v,0,3);}
function sci($v=0){return si($v,0,4);}
function smi($g=0,$v=''){return si($v,0,$g);}
function sgi0($v=0){return si($v,1,1);}
function spi0($v=0){return si($v,1,2);}
function sqi0($v=0){return si($v,1,3);}
function sci0($v=0){return si($v,1,4);}
function smi0($g=0,$v=''){return si($v,1,$g);}
function sgia($v=0){return si($v,2,1);}
function spia($v=0){return si($v,2,2);}
function sqia($v=0){return si($v,2,3);}
function scia($v=0){return si($v,2,4);}
function smia($g=0,$v=''){return si($v,2,$g);}
//FLOAT
function sgf($v=0){return sf($v,0,1);}
function spf($v=0){return sf($v,0,2);}
function sqf($v=0){return sf($v,0,3);}
function scf($v=0){return sf($v,0,4);}
function smf($g=0,$v=''){return sf($v,0,$g);}
function sgf0($v=0){return sf($v,1,1);}
function spf0($v=0){return sf($v,1,2);}
function sqf0($v=0){return sf($v,1,3);}
function scf0($v=0){return sf($v,1,4);}
function smf0($g=0,$v=''){return sf($v,1,$g);}
function sgfa($v=0){return sf($v,2,1);}
function spfa($v=0){return sf($v,2,2);}
function sqfa($v=0){return sf($v,2,3);}
function scfa($v=0){return sf($v,2,4);}
function smfa($g=0,$v=''){return sf($v,2,$g);}




function tag($v,$c=0,$s=0,$n=0,$e=0){
	if(is_string($c)){
		$e = $n;
		$n = $s;
		$s = $c;
		$c = 0;
	}
	if($s===1&&!is_string($n))$n = 1;
	if(!is_string($s))$s = '-';
	if($n===1)$n = $s;
	if(!is_string($n))$n = '_';
	$p = preg_quote($s,'/');
	if(!$p)$p = ' ';
	if($e===1)$e = '';
	if($e===2)$e = 'utf-8';
	$a=array(
		'/À|Á|Â|Ã|Ä|Å|Ā|Ă|Ą|Ǻ|Ǎ/','/à|á|â|ã|ä|å|ā|ă|ą|ǎ|ǻ|ª|@/','/Æ|Ǽ/','/æ|ǽ/'
		,'/ß/'
		,'/Ç|Ć|Ĉ|Ċ|Č|¢/','/ç|ć|ĉ|ċ|č/'
		,'/Ð|Ď|Đ/','/ď|đ/'
		,'/È|É|Ê|Ë|Ē|Ĕ|Ė|Ę|Ě|€/','/è|é|ê|ë|ē|ĕ|ė|ę|ě|\&/'
		,'/ƒ/'
		,'/Ĝ|Ğ|Ġ|Ģ/','/ĝ|ğ|ġ|ģ/'
		,'/Ĥ|Ħ/','/ĥ|ħ/'
		,'/Ì|Í|Î|Ï|Ĩ|Ī|Ĭ|Į|İ|Ǐ/','/ì|í|î|ï|ĩ|ī|ĭ|į|ı|ǐ/','/Ĳ/','/ĳ/'
		,'/Ĵ/','/ĵ/'
		,'/Ķ/','/ķ/'
		,'/Ĺ|Ļ|Ľ|Ŀ|£/','/ĺ|ļ|ľ|ŀ|Ł|ł/'
		,'/Ñ|Ń|Ņ|Ň/','/ñ|ń|ņ|ň|ŉ/'
		,'/Ò|Ó|Ô|Õ|Ö|Ø|Ō|Ŏ|Ő|Ơ|Ǒ|Ǿ/','/ò|ó|ô|õ|ö|ø|ō|ŏ|ő|ơ|ǒ|ǿ|º/','/Œ/','/œ/'
		,'/Ŕ|Ŗ|Ř/','/ŕ|ŗ|ř/'
		,'/Ś|Ŝ|Ş|Š|§|\$/','/ś|ŝ|ş|š|ſ/'
		,'/Ţ|Ť|Ŧ/','/ţ|ť|ŧ|†/'
		,'/Ù|Ú|Û|Ü|Ũ|Ū|Ŭ|Ů|Ű|Ų|Ư|Ǔ|Ǖ|Ǘ|Ǚ|Ǜ/','/ù|ú|û|ü|ũ|ū|ŭ|ů|ű|ų|ư|ǔ|ǖ|ǘ|ǚ|ǜ/'
		,'/Ŵ/','/ŵ/'
		,'/Ý|Ÿ|Ŷ/','/ý|ÿ|ŷ/'
		,'/Ź|Ż|Ž/','/ź|ż|ž/'
		,'/¹/','/²/','/³/'
		,'/\s+|"|\'|#|%|!|\.|:|,|;|´|`|~|-|=|'.urldecode('%E2%80%93|%E2%80%98|%E2%80%99|%E2%80%9C|%E2%80%9D').'|\^|\+|\*|\?|\||\/|\\\\|\(|\)|\[|\]|\{|\}/'
		,'/([^0-9a-zA-Z'.preg_replace('/([\-\\\]])/','\\$1',$s).'])/'
		,'/('.$p.')+/'
	);
	$b=array(
		'A','a','AE','ae'
		,'B'
		,'C','c'
		,'D','d'
		,'E','e'
		,'f'
		,'G','g'
		,'H','h'
		,'I','i','IJ','ij'
		,'J','j'
		,'K','k'
		,'L','l'
		,'N','n'
		,'O','o','OE','oe'
		,'R','r'
		,'S','s'
		,'T','t'
		,'U','u'
		,'W','w'
		,'Y','y'
		,'Z','z'
		,'1','2','3'
		,$s
		,$n
		,$s
	);
	$v = preg_replace($a,$b,is_string($e)?($e?htmlentities($v,ENT_NOQUOTES,$e):htmlentities($v,ENT_NOQUOTES)):$v);
	return s($v,0,$c,0,0,$s?$s:0);
}
function tagl($v,$s=0,$n=0,$e=0){return tag($v,1,$s,$n,$e);}
function tagu($v,$s=0,$n=0,$e=0){return tag($v,2,$s,$n,$e);}
function tage($v,$s=0,$n=0){return tag($v,0,$s,$n,1);}
function tag8($v,$s=0,$n=0){return tag($v,0,$s,$n,2);}
function tagle($v,$s=0,$n=0){return tag($v,1,$s,$n,1);}
function tagl8($v,$s=0,$n=0){return tag($v,1,$s,$n,2);}
function tague($v,$s=0,$n=0){return tag($v,2,$s,$n,1);}
function tagu8($v,$s=0,$n=0){return tag($v,2,$s,$n,2);}





















function datef($t=0,$mk=13,$oha=0,$t2=0,$u=1){
	if(!$t)$t = time();
	if(is_string($t)&&is_string($t2))$t = strtotime($t);
	elseif(is_string($t)){
		$tmp = $t2;
		$t2 = $t;
		$t = $tmp?$tmp:time();
	}
	if(is_string($t2))$t = strtotime($t2,$t);
	/*if(!$t)$t = time();
	if(!$t2)$t2 = time();
	if(is_string($t2))$t2 = strtotime($t);
	if(is_string($t))$t = strtotime($t,$t2);*/
	if($mk===0)return $t;
	if($mk===1)$mk = '%A, %d de %B de %Y';
	if($mk===2)$mk = '%A, %d de %B de %Y %H:%M:%S';
	if($mk===3)$mk = '%A, %d de %B de %Y %H:%M';
	if($mk===4)$mk = '%A, %d de %B de %Y %Hh%M';
	if($mk===5)$mk = '%H:%M:%S';
	if($mk===6)$mk = '%H:%M';
	if($mk===7)$mk = '%Hh%M';
	if($mk===8)$mk = '%d/%m/%Y';
	if($mk===9)$mk = '%d/%m/%Y %H:%M:%S';
	if($mk===10)$mk = '%d/%m/%Y %H:%M';
	if($mk===11)$mk = '%d/%m/%Y %Hh%M';
	if($mk===12)$mk = '%Y-%m-%d';
	if($mk===13)$mk = '%Y-%m-%d %H:%M:%S';
	if($mk===14)$mk = '%Y-%m-%d %H:%M';
	if($mk===15)$mk = '%Y-%m-%d %Hh%M';
	if($mk===16)$mk = '%d/%m/%Y às %H:%M:%S';
	if($mk===17)$mk = '%d/%m/%Y às %H:%M';
	if($mk===18)$mk = '%d/%m/%Y às %Hh%M';
	if($mk===19)$mk = '%A, %d de %B de %Y às %H:%M:%S';
	if($mk===20)$mk = '%A, %d de %B de %Y às %H:%M';
	if($mk===21)$mk = '%A, %d de %B de %Y às %Hh%M';
	if($mk===22)$mk = '%d de %B de %Y às %H:%M:%S';
	if($mk===23)$mk = '%d de %B de %Y às %H:%M';
	if($mk===24)$mk = '%d de %B de %Y às %Hh%M';
	if($mk===25)$mk = '%d de %B de %Y';
	if($mk===26)$mk = '%d de %B de %Y %H:%M:%S';
	if($mk===27)$mk = '%d de %B de %Y %H:%M';
	if($mk===28)$mk = '%d de %B de %Y %Hh%M';
	if($mk===29)$mk = '%a, %d de %b de %Y às %H:%M:%S';
	if($mk===30)$mk = '%a, %d de %b de %Y às %H:%M';
	if($mk===31)$mk = '%a, %d de %b de %Y às %Hh%M';
	if($mk===32)$mk = '%a, %d de %b de %Y';
	if($mk===33)$mk = '%a, %d de %b de %Y %H:%M:%S';
	if($mk===34)$mk = '%a, %d de %b de %Y %H:%M';
	if($mk===35)$mk = '%a, %d de %b de %Y %Hh%M';
	if($mk===50)$mk = '%Y%m%d%H%M%S';
	if($mk===51)$mk = '%Y,%m,%d,%H,%M,%S';
	if($mk===52)$mk = 'new Date(%Y,%m,%d,%H,%M,%S)';
	if($mk===53)$mk = 'new Date(\'%Y-%m-%d %H:%M:%S\')';
	if($mk===60)$mk = '%d/%m';
	if($mk==='')$mk = '%Z';
	if($oha){
		$dt = datef($t,12);
		if($dt==datef('-1 day',12))$oha = 'ontem';
		elseif($dt==datef(0,12))$oha = 'hoje';
		elseif($dt==datef('+1 day',12))$oha = 'amanhã';
		$mk = templ($mk,array('mk'=>$oha));
	}
	$r = strftime(mb_convert_encoding($mk,'ISO-8859-1','UTF-8'),$t);
	if($u)$r = ucfirst($r);
	return mb_convert_encoding($r,'UTF-8','ISO-8859-1');
/*
%a – Dia da semana abreviado de acordo com a localidade
%A – Nome da semana completo de acordo com a localidade
%b – Nome do mês abreviado de acordo com a localidade
%B – Nome do mês completo de acordo com a localidade
%c – Representação da data e hora preferida pela a localidade
%C – Número do século (o ano dividido por 100 e truncado para um inteiro, de 00 até 99)
%d – Dia do mês como um número decimal (de 01 até 31)
%D – Mesmo que %m/%d/%y
%e - Dia do mês como um número decimal, um simples dígito é precedido por espaço (de ' 1' até '31')
%g – Como %G, mas sem o século.
%G – O 4-dígito do ano correspodendo as ISO week number (see %V). Este tem o mesmo formato e valor que %Y, exceto que se o ISO week number pertence ao prévio ou próximo ano, aquele ano é usado ao invés deste.
%h – Mesmo que %b
%H – Hora como um número decimal usando um relógio de 24-horas (de 00 até 23)
%I - Hora como um número decimal usando um relógio de 12-hoas (de 01 até 12)
%j – Dia do ano como número decimal (de 001 até 366)
%m – Mês como número decimal (de 01 até 12)
%M – Minuto como número decimal
%n – Caracter novalinha
%p - Um dos dois `am' ou `pm' de acordo com o valor da hora dada, ou as strings correspondentes para a localidade
%r - Hora em a.m. e p.m. notação
%R – Hora em notação de 24 horas
%S – Segundo como um número decimal
%t - Caracter tab
%T – Hora corrente, igual a %H:%M:%S
%u – Dia da semana como número decimal [1,7], com 1 representando Segunda-feira
%U – Dia da semana do ano corrente como número decimal, começando com o primeiro domingo como o primeiro dia da primeira semana
%V - O número da semana corrente ISO 8601:1988 do ano corrente como um número decimal, de 01 até 53, onde semana 1 é a primeira semana que tem pelo menos 4 dias no ano corrente, e com segunda-feira como o primeiro dia da semana. (Use %G ou %g para o componente anual que corresponde ao dia da semana para o para o timestamp especificado.)
%W – Dia da semana do ano corrente como número decimal, começando com o a segunda-feira como o primeiro dia da primera semana
%w – Dia da semana como número decimal, domingo sendo 0
%x – Representação preferida para a data para a localidade corrente sem a hora
%X - Representação preferida para a hora para a localidade corrente sem a data
%y - Ano como número decimal sem o século (de 00 até 99)
%Y - Ano como número decimal incluindo o século
%Z ou %z – Time zone, nome ou abreviação (dependendo do sistema operacional)
%% – A literal '%' characte
*/
}



function templ($s,$va=array()){
	foreach($va as $k=>$v)$s = preg_replace('/\[!'.$k.'!\]/',$v,$s);
	$s = preg_replace('/\[!!/','[!',$s);
	$s = preg_replace('/!!\]/','!]',$s);
	return $s;
}



function nreal($v,$m=0,$s=0,$d=2){
	if($m&&is_int($m)){
		$d = $m;
		$m = 0;
	}
	if($s&&is_int($s)){
		$d = $s;
		$s = 0;
	}
	if($m===0)$m = '.';
	if($s===0)$s = ',';
	$v = (float)$v;
	return number_format($v,$d,$s,$m);
}
function nreal0($v,$m=0,$s=0){
	return nreal($v,$m,$s,0);
}
function nfloat($v,$d=2){
	return +nreal($v,'','.',$d);
}



function greal($v){
	return (float)str_replace(',','.',preg_replace('/[^0-9\-.,]/','',$v));
}



function ireal($v,$g=0,$d=2,$s='',$m=''){
	if($g)$v = greal($v);
	if($s==''&&$m=='')return (int)number_format($v,$d,$s,$m);
	return number_format($v,$d,$s,$m);
}



function pgnl($qt=0,$qtp=0,$c=0){//QT: number ou sql; QTP: quantidade por pg; C: pg atual
	$b = &$GLOBALS[_VAR_B];
	//echo "[$qt]";
	if(is_string($qt))$qt = ($rs=$b->query(strpos($qt,'select')===0?$qt:'select count(1) qt from '.$qt)->fetchObject())?$rs->qt+0:0;
	$A = 1;
	$B = $qt?ceil($qt/$qtp):1;
	$C = $c;
	if($C<$A)$C = $A;
	if($C>$B)$C = $B;
	$r->a = $A;// primeira pg
	$r->b = $B;// ultima pg
	$r->c = $C;// pg atual ou 1
	$r->e = $c===$C?false:true;// pg passada não está entre $A e $B

	$r->p = $qtp;// quantidade por pg
	$r->q = $qt;// total de registros

	$r->i = $C*$qtp-$qtp;// inicio do SQL limit
	$r->A = $r->i+1;// registro inicio
	$r->B = $C*$qtp;// registro fim
	if($r->B>$qt)$r->B = $qt;
	$r->l = $r->B-$r->i;// limite do SQL limit
	return $r;
}



function pgnbt($a,$b,$c,$q=0,$sp='',$lk,$nl=0,$at=0,$px=0,$pr=0,$ut=0,$nob=0){
	if($q){
		$i = $c-$q;
		$f = $c+$q;
		$si = $i<$a?$a-$i:0;
		$sf = $f>$b?$f-$b:0;
		$i -= $sf;
		$f += $si;
		if($i<$a)$i = $a;
		if($f>$b)$f = $b;
	}else{
		$i = $a;
		$f = $b;
	}
	if($nl===0)$nl = $lk;
	if($at===0)$at = 'Anterior';
	if($px===0)$px = 'Próximo';
	if($pr===0)$pr = 'Primeira';
	if($ut===0)$ut = 'Última';
	if($at===1){
		$at = '&lsaquo;';
		$px = '&rsaquo;';
		$pr = '&laquo;';
		$ut = '&raquo;';
	}
	if($at===2){
		$at = '&lt;';
		$px = '&gt;';
		$pr = '&lt;&lt;';
		$ut = '&gt;&gt;';
	}
	$bt = array();
	if(($pr&&!$nob)||($pr&&$nob&&$a!=$i))$bt[] = templ(($a==$c?$nl:$lk),array('num'=>$a,'txt'=>$pr));
	if(($at&&!$nob)||($at&&$nob&&$a!=$i))$bt[] = templ(($a==$c?$nl:$lk),array('num'=>$c-1,'txt'=>$at));
	for($j=$i; $j<=$f; $j++)$bt[] = templ(($j==$c?$nl:$lk),array('num'=>$j,'txt'=>$j));
	if(($px&&!$nob)||($px&&$nob&&$b!=$f))$bt[] = templ(($b==$c?$nl:$lk),array('num'=>$c+1,'txt'=>$px));
	if(($ut&&!$nob)||($ut&&$nob&&$b!=$f))$bt[] = templ(($b==$c?$nl:$lk),array('num'=>$b,'txt'=>$ut));
	return $sp.implode($sp,$bt);
}



function ford($a=array(),$h='',$p='',$l=0){
	$s = &$GLOBALS[_VAR_S];
	$r->o = '';
	$r->o2 = '';
	$r->h = $h;
	$r->p = $p;
	$r->np = true;
	$r->dp = '';
	foreach($a as $v){
		$r->c->$v[1] = templ('<a href="'.$h.'" class="'.($p==$v[1]?'ord':($p==$v[1].'-d'?'ord d':'')).'">[!t!]</a>',array('h'=>$v[1].($p==$v[1]?'-d':''),'t'=>$v[2]));
		if($p==$v[1]){
			$r->o = $v[0];
			$r->np = false;
		}elseif($p==$v[1].'-d'){
			$r->o = $v[0].' desc';
			$r->np = false;
		}
		if($v[3]===1)$d = $v[1];
		elseif($v[3]===2)$d = $v[1].'-d';
		if($d)$r->dp = templ($h,array('h'=>$d));
	}
	if($l==1&&$r->np)$s->loc($r->dp);
	if($r->o)$r->o2 = 'order by '.$r->o;
	return $r;
}





// ------------------ Email

function pgMail($cnt,$tit=''){
return '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>'.$tit.'</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style type="text/css"><!--
	body {font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;font-size: 14px;color: #404040;background: #ffffff;}
	h1,h2 {margin: 0;padding: 0;}
	h1 {color: #25489a;}
	h2 {color: #404040;}
	a {color: #039;text-decoration: none;cursor: pointer;}
	a,img,a img {border: none;}
	a:hover {text-decoration: underline;}
--></style>
</head>
<body>
'.$cnt.'
</body>
</html>';
}
// ------------------ / Email

?>
