<!DOCTYPE HTML>
<html lang="zh-TW">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<form action="" method="post">
		<textarea name="url" cols="30" rows="10"></textarea>
		<br />
		<input type="submit" name="submit" value="Submit" />
	</form>
</body>
</html>

<?php
	$urls = explode("\n", $_POST['url']);
	$cookie = "ver=761e40bd35a29dd83cd4ce463ab55599f4389cb6d75eaef87395226d0ca98babe88fcd85097be748ee4ef7101d1987764de48ab3f8ac8e9c1ac2f405ee76bffc761e40bd35a29dd83cd4ce463ab55599397f5602d02357bfea8ed3931ad2e40ef512553466b22eec94b167731800cd30;user=4XA3M8EI.DKDUUQMVTRLFXOIBHXQB80X;";
	
	if(!empty($_POST['url']))
	{
		foreach($urls as $url)
		{
			$ch = curl_init();
			$opt = array(CURLOPT_URL => $url, CURLOPT_RETURNTRANSFER => true, CURLOPT_COOKIE => $cookie);
			curl_setopt_array($ch, $opt);
			$fp = curl_exec($ch);
			curl_close($ch);
			list($list01, $list02, $list03) = split('<div class="down_ad_pad1">', $fp);
			list($list01, $list02, $list03) = split('</div>', $list02);
			list($list01, $list02, $list03) = split('<a href="', $list01);
			list($list01, $list02, $list03) = split('" class="down_ad_butt1">', $list02);
			
			echo '<p>'.$list01.'</>';
		}
	}
?>