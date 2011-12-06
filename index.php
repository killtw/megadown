<!DOCTYPE HTML>
<html lang="zh-TW">
<head>
  <meta charset="UTF-8">
  <title></title>
</head>
<body>
  <form action="" method="post">
    <p>
      <label for="url">網址</label>
      <textarea name="url" cols="30" rows="10"></textarea>
    </p>
    <p>
      <input type="submit" name="submit" value="Submit" />
    </p>
  </form>

  <div style="background-color: gray;">
<?php
  $urls = explode("\n", $_POST['url']);
  $cookie = "ver=761e40bd35a29dd83cd4ce463ab55599f4389cb6d75eaef87395226d0ca98babe88fcd85097be748ee4ef7101d1987764de48ab3f8ac8e9c1ac2f405ee76bffc761e40bd35a29dd83cd4ce463ab55599397f5602d02357bfea8ed3931ad2e40ef512553466b22eec94b167731800cd30; user=4XA3M8EI.DKDUUQMVTRLFXOIBHXQB80X;";

  if(!empty($_POST['url']))
  {
    foreach($urls as $url)
    {
      $ch = curl_init();
      $opt = array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_COOKIE => $cookie
      );
      curl_setopt_array($ch, $opt);
      $fp = curl_exec($ch);
      curl_close($ch);

      preg_match("/<div class=\"down_ad_pad1\">.+<a href=\"(.*)\" class=\"down_ad_butt1\"><\/a>/si", $fp, $match);
      echo $match[1].'<br />';
    }
  }
?>
  </div>

</body>
</html>