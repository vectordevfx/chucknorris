<?php
// Example using file_get_contents() and cURL
// Explore API @ http://www.icndb.com/api/
//----------------------------------------------------------------------------------------------------------------------
// Basic example using file_get_contents()
function chuckNorrisGetContents(){	
	$url = 'http://api.icndb.com/jokes/random';
	$contents = @file_get_contents($url);	
	if (!empty($http_response_header) && $http_response_header !== false){
			if ($http_response_header[0] === 'HTTP/1.1 200 OK'){		
				if(!empty($contents) && $contents !== false) {
					$contents = json_decode($contents);
					echo $contents->value->joke;
				}			
			}else{
				echo 'We could not confirm status code 200.';
			}	
	}else{
		die('error');
	}
}
//Basic example using cURL
function chuckNorrisCurl(){
	$ch = curl_init("http://api.icndb.com/jokes/random"); // such as http://example.com/example.xml
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	$data = curl_exec($ch);
	curl_close($ch);
	$result = json_decode($data, true);
	echo '<br><br>';
	echo $result['value']['joke'];
}

// call function
chuckNorrisGetContents();

// call function
chuckNorrisCurl();
?>
