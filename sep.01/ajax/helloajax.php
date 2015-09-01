<html>
<head>
	<title>Hello</title>
<script type="text/javascript">
     
// create a new instance of XMLHttpRequest
// return false if Ajax not supported by browser
function getXMLHttpRequest() {  
  var xmlHttpReq;  
  // non-IE
  if (window.XMLHttpRequest) {  
    xmlHttpReq = new XMLHttpRequest();  
  } else if (window.ActiveXObject) {  
    try {
    	// some versions of IE
      xmlHttpReq = new ActiveXObject("Msxml2.XMLHTTP");  
    } catch (exp1) {  
      try {  
        // other versions of IE... a lot of IE  
        xmlHttpReq = new ActiveXObject("Microsoft.XMLHTTP");  
      } catch (exp2) {  
        //xmlHttpReq = false;  
        alert("Exception in getXMLHttpRequest()!");  
      }  
    }  
  }  
  return xmlHttpReq;  
}  
  
// create a new Ajax call
function makeRequest() {  
  var xmlHttpRequest = getXMLHttpRequest();  
  alert ("xmlHttpRequest=" + xmlHttpRequest);  
  xmlHttpRequest.onreadystatechange = getReadyStateHandler(xmlHttpRequest);  
  xmlHttpRequest.open("POST", "response.php", true);    
  alert("inside makeRequest()!");  
  xmlHttpRequest.send(null);  
  alert("sent!");  	
}  
  
// alert for changes in state of XMLHttpRequest
function getReadyStateHandler(xmlHttpRequest) {
	// return anonymous function which listens for changes in XMLHttpRequest
  return function() {  
    if (xmlHttpRequest.readyState == 4) {  
      if (xmlHttpRequest.status == 200) {  
        document.getElementById("hello").innerHTML = xmlHttpRequest.responseText;  
      } else {  
        alert("Http error " + xmlHttpRequest.status + ":" + xmlHttpRequest.statusText);  
      }  
    }  
  };  
}  

 </script>
</head>  
<body>  
  <div>AJAX Hello World!</div>  
  <div id="hello">  
  <input type="button" onclick="makeRequest();" name="btn1" value="Say Hello!">  
  </div>  
</body>  
</html>  

