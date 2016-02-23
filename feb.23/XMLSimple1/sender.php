<?php


function sendRequestMethod1(){
	
}

$url = "http://localhost/XMLSimple1/receiver.php";
$xml = '<?xml version="1.0" encoding="UTF-8"?><Request PartnerID="asasdsadsa" Type="TrackSearch"> <TrackSearch> <Title>love</Title>    <Tags> <MainGenre>Blues</MainGenre> </Tags> <Page Number="1" Size="20"/> </TrackSearch> </Request>';

$headers = array(
//     "Content-type: text/xml",
//     "Content-length: " . strlen($xml),
    "Connection: close",
);

$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
// curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$data = curl_exec($ch); 
echo $data;
if(curl_errno($ch))
    print curl_error($ch);
else
    curl_close($ch);
?>


<?php 
    /**  
     * Define POST URL and also payload 
     */ 
    define('XML_PAYLOAD', '<?xml version="1.0"?><member><name>name</name></member>'); 
    define('XML_POST_URL', 'http://localhost/XMLSimple1/receiver.php'); 
         
    /** 
     * Initialize handle and set options 
     */ 
    $ch = curl_init();  
    curl_setopt($ch, CURLOPT_URL, XML_POST_URL);  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
    curl_setopt($ch, CURLOPT_TIMEOUT, 4);  
    curl_setopt($ch, CURLOPT_POSTFIELDS, XML_PAYLOAD);  
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: close')); 
     
    /** 
     * Execute the request and also time the transaction 
     */ 
    $start = array_sum(explode(' ', microtime())); 
    $result = curl_exec($ch);  
    $stop = array_sum(explode(' ', microtime())); 
    $totalTime = $stop - $start; 
     
    /** 
     * Check for errors 
     */ 
    if ( curl_errno($ch) ) { 
        $result = 'cURL ERROR -> ' . curl_errno($ch) . ': ' . curl_error($ch); 
    } else { 
        $returnCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE); 
        switch($returnCode){ 
            case 200: 
                break; 
            default: 
                $result = 'HTTP ERROR -> ' . $returnCode; 
                break; 
        } 
    } 
     
    /** 
     * Close the handle 
     */ 
    curl_close($ch); 
     
    /** 
     * Output the results and time 
     */ 
    echo 'Total time for request: ' . $totalTime . "\n"; 
    echo $result;       
     
    /** 
     * Exit the script 
     */ 
    exit(0); 
?>