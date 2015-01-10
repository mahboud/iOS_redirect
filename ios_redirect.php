<?php
function agent_has($value)
{
  return strpos($_SERVER['HTTP_USER_AGENT'], $value) !== FALSE;
}

$isIOS = agent_has('AppleWebKit') && agent_has('Mobile') && (agent_has('iPhone') || agent_has('iPad'));

// the following can be utilized if you want to parse the URL
// $serverName = $_SERVER['SERVER_NAME'];
// 
// $action = $_GET['action'];
// 
// $query = $_ENV['QUERY_STRING'];
//   print($query);


$appURL = "twitter1://";
//$otherURL = "http://apple.com"; // an example. A URL that does a similar thing as the app, or
$otherURL = "itms-apps://itunes.com/apps/twitter"; // could be the app store app url so they can download the app

if ($isIOS) {
?>
<html>
<head>
<script language="javascript">
var redirect = function (location) {

    var iframe = document.createElement('iframe');
    iframe.setAttribute('src', location);
    iframe.setAttribute('width', '1px');
    iframe.setAttribute('height', '1px');
    iframe.setAttribute('position', 'absolute');
    iframe.setAttribute('top', '0');
    iframe.setAttribute('left', '0');
    document.documentElement.appendChild(iframe);
    iframe.parentNode.removeChild(iframe);
    iframe = null;
};

var timeout;

// function preventPopup() {
//     clearTimeout(timeout);
//     timeout = null;
//     window.removeEventListener('pagehide', preventPopup);
//     window.removeEventListener('blur', preventPopup);
// console.log(60);
// }

function tryAppLoad() {
//     window.addEventListener('pagehide', preventPopup);
//     window.addEventListener('blur', preventPopup);
	var now = new Date().valueOf();
console.log(10);
console.log(now);
	timeout = setTimeout(function () {

		if (new Date().valueOf() - now > 500) {
//			 window.location.replace("http://lemon.org");
console.log(30);

			return;
		}
// 		if (!window.document.webkitHidden) {
		// window.location = '<?= $otherURL ?>';
		 window.location.replace('<?= $otherURL ?>');
console.log(40);
// 		}
	}, 100);
console.log(0);
	redirect('<?= $appURL ?>');
};
   
</script>
</head>
<!-- 
<?
  print("try app first.");
?>
 -->
<body onload="tryAppLoad();">
</body>
</html>
<?
} else {
	// Always redirect non-iOS
console.log(50);
	header('Location: ' . $otherURL);
}
?>
