<html>
<head>
	<title>Hello</title>
<script type="text/javascript">
     
function getXMLHttpRequest() {  
  var xmlHttpReq;  
  if (window.XMLHttpRequest) {  
    xmlHttpReq = new XMLHttpRequest();  
  } else if (window.ActiveXObject) {  
    try {
      xmlHttpReq = new ActiveXObject("Msxml2.XMLHTTP");  
    } catch (exp1) {  
      try {  
        xmlHttpReq = new ActiveXObject("Microsoft.XMLHTTP");  
      } catch (exp2) {  
        alert("Exception in getXMLHttpRequest()!");  
      }  
    }  
  }  
  return xmlHttpReq;  
}  
  
function makeRequest() {  
  var xmlHttpRequest = getXMLHttpRequest();  
  alert ("xmlHttpRequest=" + xmlHttpRequest);  
  xmlHttpRequest.onreadystatechange = getReadyStateHandler(xmlHttpRequest);  
  xmlHttpRequest.open("POST", "PAGINA.jsp", true);    
  alert("inside makeRequest()!");  
  xmlHttpRequest.send(null);  
  alert("sent!");  	
}  
  
function getReadyStateHandler(xmlHttpRequest) {
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

