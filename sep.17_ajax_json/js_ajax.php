<html>
<head>
	<title>Hello</title>

	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>

	<script>
		$(document).ready(function(){
				$("#btn1").click(function(){
			    $.ajax({url: "jsonresponse.php", success: function(result){
			        console.log('info: ' + result);
			        jsres = JSON.parse(result);
			        // alert(jsres.name);

			    }});
			});
		});
		
	</script>

</head>
<body>

	<div id="hello">  
	  <input id="btn1" type="button" name="btn1" value="Say Hello!">  
	</div>  
</body>
</html>