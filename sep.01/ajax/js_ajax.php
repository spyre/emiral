<html>
<head>
	<title>Hello</title>

	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>

	<script>
		$(document).ready(function(){
				$("#btn1").click(function(){
			    $.ajax({url: "response.php", success: function(result){
			        // alert('result  = ' + result);
			        $('#hello').html(result);
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