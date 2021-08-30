<?php
error_reporting(0);

$_REQ = array_merge($_GET, $_POST);

$kpc = new Keva();

$blocknum=$kpc->getblockcount();

$freeadd=trim($_REQ["num"]);

//data

$comm=$freeadd;

$checkkey="PLAYER";



session_start();

if(!$_SESSION['knum']){$_SESSION['knum']=$comm;}else{$comm=$_SESSION['knum'];}


if($_REQUEST["change"]<>"")

	{
		$comm="";
$_SESSION = array();}

	
if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP") , "unknown")) {
        $ip = getenv("HTTP_CLIENT_IP");
    } else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR") , "unknown")) {
        $ip = getenv("HTTP_X_FORWARDED_FOR");
    } else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR") , "unknown")) {
        $ip = getenv("REMOTE_ADDR");
    } else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")) {
        $ip = $_SERVER['REMOTE_ADDR'];
    } else {
        $ip = "unknown";
    }

	

	


if(is_numeric($comm) & strlen($comm)>4) 
	
	
	{



$blength=substr($comm , 0 , 1);
$block=substr($comm , 1 , $blength);
$btxn=$blength+1;
$btx=substr($comm , $btxn);





$blockhash= $kpc->getblockhash(intval($block));


$blockdata= $kpc->getblock($blockhash);


$txa=$blockdata['tx'][$btx];

if(!$txa) {$url ="/";echo "<script>window.location.href=decodeURIComponent('".$url."')</script>";}

				
		$transaction= $kpc->getrawtransaction($txa,1);

					foreach($transaction['vout'] as $vout)
	   
						  {

					$op_return = $vout["scriptPubKey"]["asm"]; 

				
					$arr = explode(' ', $op_return); 

					if($arr[0] == 'OP_KEVA_NAMESPACE') 
								{

								 $cona=$arr[0];
								 $cons=$arr[1];
								 $conk=$arr[2];

						$freeadd=$vout["scriptPubKey"]["addresses"][0];
								

								}
						  }
				
				$asset=Base58Check::encode($cons, false , 0 , false);

			$checknew=$kpc->keva_get($asset,$checkkey);
			
			$iptime=$checknew['height'];

			$timeleft=$blocknum-$iptime;


if(!$checknew['value'] or $checknew['value']!=$ip){$_SESSION = array();echo "<script>alert('Your IP is ".$ip.". You need to create a key PLAYER with the value ".$ip." in your name space. (at least 1 confirmation)');history.go(-1);</script>";exit;}

if($timeleft>30){$_SESSION = array();echo "<script>alert('Your PLAYER key is expired. You need to edit the key PLAYER with the value ".$ip." in your name space and post again.');history.go(-1);</script>";exit;}


			  $namespace=$kpc->keva_get($asset,"_KEVA_NS_");

			  $rvncheck=$kpc->keva_get($asset,"RAVENCOIN");

			  $dogecheck=$kpc->keva_get($asset,"DOGECOIN");

			  $btccheck=$kpc->keva_get($asset,"BITCOIN");

			  $chiacheck=$kpc->keva_get($asset,"CHIA");

			  $firstcheck=$kpc->keva_get($asset,"Congratulations");

			  if($firstcheck['value']!=""){
			  
			  $newtx= $kpc->getrawtransaction($firstcheck['txid'],1);

			  $vnum=$firstcheck['vout'];

			  $freeadd=$newtx['vout'][$vnum]["scriptPubKey"]["addresses"][0];
			  
			  }}




$title=$namespace['value'];

if($title!=""){

$chiaipwallet="NMGFUrYJVnbMy5uokLKPRmSn3eTGabT4qG";
$kevaipwallet="NSBNHgPCKrWeYSDd2TbuUR4tchbYgVNgBx";
$freekva="NdCKikkfyDxGBz6xScNNkFup6CuTKZXsjt";

	$comm=strval($comm);

$checkkeva=$kpc->keva_get($kevaipwallet,$comm);

						if(!$checkkeva['value']){

						$accaddress=$kpc->getaccountaddress($comm);

						$accaddress=$kpc->getaddressesbyaccount($comm);
					
						$shopaddress=$accaddress[0];
						
						$putnew=$kpc->keva_put($kevaipwallet,$comm,$shopaddress);

						

						$age= $kpc->sendtoaddress($shopaddress,"0.1");

						//reward

						

		$firstcheck=$kpc->keva_get($asset,"Congratulations");

			  if($firstcheck['value']!=""){
			  
			  $newtx= $kpc->getrawtransaction($firstcheck['txid'],1);

			  $vnum=$firstcheck['vout'];

			  $addrone=$newtx['vout'][$vnum]["scriptPubKey"]["addresses"][0];
			  
			  }

			  $age= $kpc->sendtoaddress($addrone,"0.1");
						
						echo "You got 0.1 free KVA to buy mojo. Wait for confirmation.(2-10 Mins)";
						
						}else

						{$shopaddress=$checkkeva['value'];}

$commb=$comm."B";

$commb=strval($commb);

$shopbalance=$kpc->getbalance($comm);

$shopbalance=strval($shopbalance);

$checkkevab=$kpc->keva_get($kevaipwallet,$commb);

						if(!$checkkevab['value']){

						
						$putnew=$kpc->keva_put($kevaipwallet,$commb,$shopbalance);}





//require('bitdoge.php');



echo "&nbsp;&nbsp;[ ".$title." ]"." [ ".$comm." ] "." [ Time Left:".(60-$timeleft*2)." MIN ]";
echo "<br><br>";

if(!$chiacheck['value']){echo "&nbsp;&nbsp;<font color=green>You need to create a key CHIA with the value your xch wallet address in your name space.</font><br>&nbsp;&nbsp;Now use demo address <a target=\"_blank\"  href=\"https://www.chiaexplorer.com/blockchain/address/xch1n92we22h9leh9u69ps0uv3frqg2axeah0wcksv4z6qynjlcrgxds59qnag\"><font color=blue size=2>xch1n92we22h9leh9u69ps0uv3frqg2axeah0wcksv4z6qynjlcrgxds59qnag</font></a><br><br>";}
else
	{


echo "&nbsp;&nbsp;<font color=green>[ CHIA WALLET ADDRESS in your space ]<br><br>&nbsp;&nbsp;".$chiacheck['value'];

echo "</font><br><br>";


	}

$shopbalance=$kpc->getbalance($comm);

	
		$shopbalance=substr($shopbalance,0,5);


echo "&nbsp;&nbsp;<font color=blue>[ KEVA IP WALLET ] [ ".$shopbalance." KVA ]<br><br>&nbsp;&nbsp;".$shopaddress;

echo "</font><br><br>";

echo "&nbsp;&nbsp;<img src=https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=".$shopaddress."><br>";

echo "<br>&nbsp;&nbsp;ASSETS LIST<br><br>";

	//list assets

$shoplist=file("shop.txt");
	$shopnum=count($shoplist);


 //wallet chia

 $pdata=array('wallet_id' => "1");

$postfields="get_wallet_balance";



$url="https://localhost/".$postfields;



            $postData = json_encode($pdata);
            
            
        
       
						$ch = curl_init();
						$params[CURLOPT_URL] = $url;   
						$params[CURLOPT_HEADER] = false; 
						$params[CURLOPT_RETURNTRANSFER] = true; 
						$params[CURLOPT_FOLLOWLOCATION] = true; 
						$params[CURLOPT_POST] = true;
						$params[CURLOPT_PORT] = 9256;
						$params[CURLOPT_POSTFIELDS] = $postData;
						$params[CURLOPT_SSL_VERIFYPEER] = false;
						$params[CURLOPT_SSL_VERIFYHOST] = false;

						$params[CURLOPT_SSLCERTTYPE] = 'PEM';
						$params[CURLOPT_SSLCERT] = 'pcrt.pem';
						$params[CURLOPT_SSLKEYTYPE] = 'PEM';
						$params[CURLOPT_SSLKEY] = 'pkey.pem';


     curl_setopt_array($ch, $params); 
     $content = curl_exec($ch); 
	$output = curl_getinfo($ch);
     curl_close($ch);




$total=json_decode($content, true);

$stock=$total['wallet_balance']['spendable_balance'];
	


	for ($i=1;$i<$shopnum;$i++) 
		{
		list($one[$i],$count,$price)=explode("|",$shoplist[$i]);

		//check chia stock

		

		if($one[$i]=="Token"){$stock=11111111;}

print("&nbsp;&nbsp;[<font color=blue>".$one[$i]."</font>] (".$stock."), ".$assetbr."&nbsp;<font color=red>".$count."</font> asset <font color=blue>".$price." KVA</font><br><br>");

		}
	



	
	echo "<form action=\"index.php\" method=\"post\">";

	$html = '&nbsp;&nbsp;<select name="asset" style="height:35px;font-size:36px;height:50px;">';

	foreach($one as $vo)
		{
		if(preg_match('/[a-zA-Z]/',$vo)){
		$html .= '<option value="'.$vo.'">'.$vo.'</option>';}
		}
	$html .= '</select>';

	echo "";
	
	echo "<br>";

	if($shopbalance>0.01){

	echo $html."&nbsp;<input type=\"number\" name=\"bnum\" style=\"width:100px;height:25px;font-size:26px;height:50px;\">&nbsp;<input type=\"submit\" value=\"buy\" style=\"width:150px;height:35px;font-size:36px;height:50px;\">";$_SESSION['guest']="";}else {
	
	echo "&nbsp;&nbsp;Keva IP wallet address balance < 0.01, no chia mojo available. Deposit some kva and refresh again.";}

    echo "</form>";

}

//$ns="NaSbDGrRDrPGnnzfP2urCoJH39X9FWdEYB";

//buy

	$buyasset=trim($_REQUEST["asset"]);
	$buynum=trim($_REQUEST["bnum"]);

	echo "<br>&nbsp;&nbsp;".$buyasset." ";


if($buyasset<>""){

	for ($i=1;$i<$shopnum;$i++) 
		{
		list($one[$i],$count,$price)=explode("|",$shoplist[$i]);
		
		if($one[$i]==$buyasset)
			
		{$buytotal=$buynum*$count;
			echo $buytotal;
			
			if($one[$i]=="Token"){$stock=0;}

			$totalfund=$buytotal*$price;
			if($stock>$buytotal & $totalfund<$shopbalance)
				{
				
				echo " cost ".$totalfund." KVA";
				
				echo "<br><br>&nbsp;&nbsp;SENDING...<br><br>";

			

					$totalfund=strval($totalfund);

				$getfund=$kpc->sendfrom($comm,"VX79gyf6kL2cFSowBKZ8NkEdxCNd4xnVCZ",$totalfund);

				$errort = $kpc->error;

					if($errort != "") 
		
					{
					echo "<p>&nbsp;&nbsp;Error, buy failed</p>";
				
					}
					else
					{
					
					$shopbalance=$kpc->getbalance($comm);

$shopbalance=strval($shopbalance);



						
						$putnew=$kpc->keva_put($kevaipwallet,$commb,$shopbalance);

					
					//send mojo

					$pdata=array('wallet_id' => "1",'amount' => 1,'address' => 0,'fee' => 0);
					
					if(!$chiacheck['value']){$pdata['address']="xch17t9ppfa2puqrfeuk4n27m5l3nzjn83pg379ek0vaehdn3xsd4vwsh9kcmr";}else{
					
					$pdata['address']=$chiacheck['value'];}

					$pdata['amount']=intval($buynum);
					$postfields="send_transaction";

					$url="https://localhost/".$postfields;



					 $postData = json_encode($pdata);
            
            
        
       
							$ch = curl_init();
						$params[CURLOPT_URL] = $url;   
						$params[CURLOPT_HEADER] = false; 
						$params[CURLOPT_RETURNTRANSFER] = true; 
						$params[CURLOPT_FOLLOWLOCATION] = true; 
						$params[CURLOPT_POST] = true;
						$params[CURLOPT_PORT] = 9256;
						$params[CURLOPT_POSTFIELDS] = $postData;
						$params[CURLOPT_SSL_VERIFYPEER] = false;
						 $params[CURLOPT_SSL_VERIFYHOST] = false;

							$params[CURLOPT_SSLCERTTYPE] = 'PEM';
							$params[CURLOPT_SSLCERT] = 'pcrt.pem';
						$params[CURLOPT_SSLKEYTYPE] = 'PEM';
						$params[CURLOPT_SSLKEY] = 'pkey.pem';


     curl_setopt_array($ch, $params); 
     $content = curl_exec($ch); 
	$output = curl_getinfo($ch);
     curl_close($ch);



//echo $content;

//print_r(json_decode($content, true));

//print_r($output);

$total=json_decode($content, true);

echo "&nbsp;&nbsp;chia transaction_id<br><br>&nbsp;&nbsp;".$total['transaction_id'];


					

					if(!$total['transaction_id']) 
		
						{
					echo "<p>&nbsp;&nbsp;Error, <font color=red>Error, send asset failed, kva lost</font></p>";
				
						}
					else
						{

					echo '&nbsp;&nbsp;, <font color=green>SEND OK!</font>';


				
						}
					
					}

				}else { echo "&nbsp;&nbsp;<font color=red>out of stock or balance</font>";}
			}
		}

		
}



if($title!=""){echo "<br><br><form action=\"\" method=\"post\"><input type=\"hidden\" name=\"change\" value=\"logout\"><br>&nbsp;&nbsp;<input type=\"submit\" value=\"logout\" style=\"height:35px;font-size:36px;height:50px;\"></form>";}
	
if(!$title){

echo "<!DOCTYPE html><head><title>KEVA</title><meta name=\"apple-mobile-web-app-capable\" content=\"yes\"><meta charset=\"UTF-8\"><meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">";

echo "<style>html, body {background-color: #212121;color: #fff;font-size: 15px;margin: 0 auto -100px;padding: 0;}a:link,a:visited,a:active{transition:0.5s;color: #28f428;	text-decoration: none;}a:hover { color:yellow; }.timeline {width:380px;padding-top:20px;position: relative;}.timeline:before {content: '';position: absolute;top: 0px;left: calc(42%);bottom: 0px;width: 2px;background: #ddd;}.timeline:after {content: ''; display: table;clear: both;}.entry {clear: both;text-align: left;position: relative;}.entry .title {margin-bottom: .5em;font-size:16px;float: left;width: 40%;text-align: right;position: relative;}.entry .title:before {}.entry .title h3 {margin: 0;font-size: 120%;}.entry .title p {margin: 0;line-height:30px;font-size: 100%;}.entry .body {float: right;font-size:16px;width: 55%;padding-top:1px;}.entry .body p {line-height: 1.4em;}.entry .body p:first-child {margin-top: 0;font-weight: 400;}entry .body ul {color: #ddd;padding-left: 0;list-style-type: none;}.entry .body ul li:before {content: '–';margin-right: .5em;}</style>";

echo "</head>";

echo "<body style=\"background-color: #212121;\">";


echo "<div style=\"padding: 5px;margin-bottom: 5px;box-shadow: 2px 2px 2px hsla(0,0%,0%,0.1);background: var(--ck-color-toolbar-background);text-align:right;font-size:10px;\"><p style=\"padding-right:7px;\">[ <a href=https://hackerlink.io/buidl/1175 target=_blank><font color=white>VOTE</font></a> ] [ <font color=grey>".$ip."</font> ] [ <a href=https://github.com/kevacoin-project/keva_wallet/releases target=_blank><font color=grey>KEVA WALLET</font></a> ] [ <a href=\"https://api.qrserver.com/v1/create-qr-code/?size=300x300&data="."https://keva.app\" target=_blank><font color=grey>".$blocknum."</font></a> ]</p></div>";
		

			echo "<form action=\"\" method=\"post\" >";	

	
			
			echo "<center><img src=win.png><div style=\"display:block;width:100%;font-family: coda_regular, arial, helvetica, sans-serif;\"><ul style=\"padding-left:0px;border: 0px solid #59fbea;height:50px;margin-top:0px;padding-top:5px;\"><li style=\"list-style:none;color: #28f428;font-size:30px;letter-spacing:3px;display:inline;height:45px;background-color:#0b0c0d;\">";

			echo "<input type=\"text\" name=\"num\" id=\"editor\" class=\"textarea-inherit\"  style=\"width:175px;border: 1px solid #666666;font-family: coda_regular, arial, helvetica, sans-serif;-webkit-appearance: none;-webkit-border-radius:0;height:50px;font-size: 30px; background-color: rgb(11, 12, 13);color: #ddd;padding-left:10px;letter-spacing:2px;
\" value=\"".$_REQUEST["hvalue"]."\" maxlength=34 placeholder=\"0\"><input type=\"hidden\" name=\"keva\" vaule=\"1\"></center></li></ul>";


echo "<ul style=\"padding-left:0px;border: 0px solid #59fbea;height:50px;margin-top:0px;padding-top:5px;\"><li style=\"list-style:none;color: #28f428;font-size:10px;letter-spacing:3px;display:inline;height:45px;background-color:#0b0c0d;-webkit-appearance:none ;-webkit-border-radius: 0;border-radius:0;\">";

echo "<center><input type=\"submit\" value=\"[ OPEN IP WALLET ]\" style=\"border: 0px solid #666666;-webkit-appearance:none ;-webkit-border-radius: 0;border-radius:0;height:36px;background-color:#212121;color: #59fbea;height:50px;width:200px;font-size: 20px;padding-top:0px;\"></center></li></ul></div>";

echo "<script>document.getElementById(\"editor\").addEventListener(\"input\", function(){var op=\"\";var tmp = document.getElementById(\"editor\").value.replace(/\-/g, \"\");for (var i=0;i<tmp.length;i++){if (i%4===0 && i>0){op = op + \"\" + tmp.charAt(i);} else {op = op + tmp.charAt(i);} }document.getElementById(\"editor\").value = op;});</script>";
			

			
echo "</form></div>";

}

class Keva {

    private $proto;

    private $url;
    private $CACertificate;

    public $status;
    public $error;
    public $raw_response;
    public $response;

    private $id = 0;

    public function __construct($url = null) {
		
        $this->username      = 'galaxy'; // RPC Username
        $this->password      = 'frontier'; // RPC Password
		//$this->host          = '192.168.152.6'; // Localhost
		$this->host          = '127.0.0.1'; // Localhost
        $this->port          = '9992';
        $this->url           = $url;

        $this->proto         = 'http';
        $this->CACertificate = null;
    }

    public function setSSL($certificate = null) {
        $this->proto         = 'https';
        $this->CACertificate = $certificate;
    }

    public function __call($method, $params) {
        $this->status       = null;
        $this->error        = null;
        $this->raw_response = null;
        $this->response     = null;

        $params = array_values($params);

        $this->id++;

        $request = json_encode(array(
            'method' => $method,
            'params' => $params,
            'id'     => $this->id
        ));

        $curl    = curl_init("{$this->proto}://{$this->host}:{$this->port}/{$this->url}");
        $options = array(
            CURLOPT_HTTPAUTH       => CURLAUTH_BASIC,
            CURLOPT_USERPWD        => $this->username . ':' . $this->password,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_HTTPHEADER     => array('Content-type: text/plain'),
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => $request
        );

        if (ini_get('open_basedir')) {
            unset($options[CURLOPT_FOLLOWLOCATION]);
        }

        if ($this->proto == 'https') {
            if (!empty($this->CACertificate)) {
                $options[CURLOPT_CAINFO] = $this->CACertificate;
                $options[CURLOPT_CAPATH] = DIRNAME($this->CACertificate);
            } else {
                $options[CURLOPT_SSL_VERIFYPEER] = false;
            }
        }

        curl_setopt_array($curl, $options);

        $this->raw_response = curl_exec($curl);
        $this->response     = json_decode($this->raw_response, true);

        $this->status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        $curl_error = curl_error($curl);

        curl_close($curl);

        if (!empty($curl_error)) {
            $this->error = $curl_error;
        }

        if ($this->response['error']) {
            $this->error = $this->response['error']['message'];
        } elseif ($this->status != 200) {
            switch ($this->status) {
                case 400:
                    $this->error = 'HTTP_BAD_REQUEST';
                    break;
                case 401:
                    $this->error = 'HTTP_UNAUTHORIZED';
                    break;
                case 403:
                    $this->error = 'HTTP_FORBIDDEN';
                    break;
                case 404:
                    $this->error = 'HTTP_NOT_FOUND';
                    break;
            }
        }

        if ($this->error) {
			return false;
        }

        return $this->response['result'];
    }
}


//check58

class Hash

{
    public static function SHA256(string $data, $raw = true): string
    {
        return hash('sha256', $data, $raw);
    }

    public static function sha256d(string $data): string
    {
        return hash('sha256', hash('sha256', $data, true), true);
    }

    public static function RIPEMD160(string $data, $raw = true): string
    {
        return hash('ripemd160', $data, $raw);
    }
}

class Base58
{
    const AVAILABLE_CHARS = '123456789ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz';

    public static function encode($num, $length = 58): string
    {
        return Crypto::dec2base($num, $length, self::AVAILABLE_CHARS);
    }

    public static function decode(string $addr, int $length = 58): string
    {
        return Crypto::base2dec($addr, $length, self::AVAILABLE_CHARS);
    }
}

/**
 * @codeCoverageIgnore
 */
class Base58Check
{
    /**
     * Encode Base58Check
     *
     * @param string $string
     * @param int $prefix
     * @param bool $compressed
     * @return string
     */
    public static function encode(string $string, int $prefix = 128, bool $compressed = true)
    {
        $string = hex2bin($string);

        if ($prefix) {
            $string = chr($prefix) . $string;
        }

        if ($compressed) {
            $string .= chr(0x01);
        }

        $string = $string . substr(Hash::SHA256(Hash::SHA256($string)), 0, 4);

        $base58 = Base58::encode(Crypto::bin2bc($string));
        for ($i = 0; $i < strlen($string); $i++) {
            if ($string[$i] != "\x00") {
                break;
            }

            $base58 = '1' . $base58;
        }
        return $base58;
    }

    /**
     * Decoding from Base58Check
     *
     * @param string $string
     * @param int $removeLeadingBytes
     * @param int $removeTrailingBytes
     * @param bool $removeCompression
     * @return bool|string
     */
    public static function decode(string $string, int $removeLeadingBytes = 1, int $removeTrailingBytes = 4, bool $removeCompression = true)
    {
        $string = bin2hex(Crypto::bc2bin(Base58::decode($string)));

        //If end bytes: Network type
        if ($removeLeadingBytes) {
            $string = substr($string, $removeLeadingBytes * 2);
        }

        //If the final bytes: Checksum
        if ($removeTrailingBytes) {
            $string = substr($string, 0, -($removeTrailingBytes * 2));
        }

        //If end bytes: compressed byte
        if ($removeCompression) {
            $string = substr($string, 0, -2);
        }

        return $string;
    }
}


/**
 * @codeCoverageIgnore
 */
class Crypto
{
    public static function bc2bin($num)
    {
        return self::dec2base($num, 256);
    }

    public static function dec2base($dec, $base, $digits = false)
    {
        if ($base < 2 || $base > 256) {
            die("Invalid Base: " . $base);
        }

        bcscale(0);
        $value = "";

        if (!$digits) {
            $digits = self::digits($base);
        }

        while ($dec > $base - 1) {
            $rest = bcmod($dec, $base);
            $dec = bcdiv($dec, $base);
            $value = $digits[$rest] . $value;
        }
        $value = $digits[intval($dec)] . $value;

        return (string)$value;
    }

    public static function base2dec($value, $base, $digits = false)
    {
        if ($base < 2 || $base > 256) {
            die("Invalid Base: " . $base);
        }

        bcscale(0);

        if ($base < 37) {
            $value = strtolower($value);
        }
        if (!$digits) {
            $digits = self::digits($base);
        }

        $size = strlen($value);
        $dec = "0";

        for ($loop = 0; $loop < $size; $loop++) {
            $element = strpos($digits, $value[$loop]);
            $power = bcpow($base, $size - $loop - 1);
            $dec = bcadd($dec, bcmul($element, $power));
        }

        return (string)$dec;
    }

    public static function digits($base)
    {
        if ($base > 64) {
            $digits = "";
            for ($loop = 0; $loop < 256; $loop++) {
                $digits .= chr($loop);
            }
        } else {
            $digits = "0123456789abcdefghijklmnopqrstuvwxyz";
            $digits .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ-_";
        }
        $digits = substr($digits, 0, $base);

        return (string)$digits;
    }

    public static function bin2bc($num)
    {
        return self::base2dec($num, 256);
    }
}

 function getBase58CheckAddress($addressBin){
            $hash0 = Hash::SHA256($addressBin);
            $hash1 = Hash::SHA256($hash0);
            $checksum = substr($hash1, 0, 4);
            $checksum = $addressBin . $checksum;
            $result = Base58::encode(Crypto::bin2bc($checksum));

            return $result;
        }

?>


</body>
</html