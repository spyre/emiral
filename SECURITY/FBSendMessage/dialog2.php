<html>
<head>
<title>Dialog</title>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1521549781473163',
      xfbml      : true,
      version    : 'v2.5'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
</head>
<body>

	<?php 
	?>

<script>
FB.ui({
	  method: 'send',
	  link: 'http://www.nytimes.com/interactive/2015/04/15/travel/europe-favorite-streets.html',
	});
</script>
</body>
</html>


