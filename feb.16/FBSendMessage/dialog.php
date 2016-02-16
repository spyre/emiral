<html>
<head>
<title>Dialog</title>
<?php require_once 'CONSTANTS.php'; ?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  -->


<!--  bootstrap -->
<!-- complete JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


<!-- complete CSS -->
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<script>

	// SPYRE = 796389207060460

 	

  window.fbAsyncInit = function() {
    FB.init({
      appId      : '<?php echo APP_ID; ?>',
      xfbml      : true,
      version    : 'v2.5'
    });
    $(document).trigger('fbload'); 
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));


  function facebook_send_message(to) {
	  	console.log('sending');
	  	/*
	  	FB.ui({
	  	  method: 'send',
	  	  link: 'http://www.nytimes.com/interactive/2015/04/15/travel/europe-favorite-streets.html',
	  	});
	  	*/
	    FB.ui({		   
	        app_id:'<?php echo APP_ID; ?>',
	        method: 'send',
	        name: "kek",
	        link: 'http://stackoverflow.com/questions/2574431/send-private-messages-to-friends',
	        to:to,
	        description:'kek2 '

	    });
	    console.log('done sending');
	}
	
  $(document).ready(function(){


	  $(document).on(
			    'fbload',  //  <---- HERE'S OUR CUSTOM EVENT BEING LISTENED FOR
			    function(){
				    console.log('FB LOADED!');
			        //some code that requires the FB object
			        //such as...
			        FB.getLoginStatus(function(res){
			            if( res.status == "connected" ){
			                FB.api('/me', function(fbUser) {
			                    console.log("Open the pod bay doors, " + fbUser.name + ".");
			                });
			            }
			        });


			        facebook_send_message('796389207060460');
			    }
			);


	  });
</script>
</head>
<body>
	<?php 
	?>

</body>
</html>


