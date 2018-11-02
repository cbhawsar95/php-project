<!DOCTYPE html>
<html>
<head>
	<title>Server Ststus</title>
</head>
<body>
 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="domain">
        Domain name:<br>
        <table>
          <input name="domainname" type="text" >
          <input type="submit" name="submitBtn" value="Ping domain">
        </table>
 </form>

</body>
</html>

<?php
/**
 * PHP/cURL function to check a web site status. If HTTP status is not 200 or 302, or
 * the requests takes longer than 10 seconds, the website is unreachable.
 * 
 * Follow me on Twitter: @HertogJanR
 *
 * @param string $url URL that must be checked
 */
function url_test( $url ) {
  $timeout = 10;
  $ch = curl_init();
  curl_setopt ( $ch, CURLOPT_URL, $url );
  curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
  curl_setopt ( $ch, CURLOPT_TIMEOUT, $timeout );
  $http_respond = curl_exec($ch);
  $http_respond = trim( strip_tags( $http_respond ) );
  $http_code = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
  if ( ( $http_code == "200" ) || ( $http_code == "302" ) ) {
    return true;
  } else {
    // return $http_code;, possible too
    return false;
  }
  curl_close( $ch );
}
 
    // Check whether the form was submitted
    if (isset($_POST['submitBtn'])){
        $website = (isset($_POST['domainname'])) ? $_POST['domainname'] : '';
       
    if( !url_test( $website ) ) {
  		echo "<br><h2>Site is down!</h2><br>";
	}
	else { echo "<br><h2>Site functions correctly.<br>"; }
	}
?>