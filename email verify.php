<?php

$email = $_POST['email'];

              // Initialize cURL.
              $ch = curl_init();

              // Set the URL that you want to GET by using the CURLOPT_URL option.
              curl_setopt($ch, CURLOPT_URL, "https://emailvalidation.abstractapi.com/v1/?api_key=5ea2f64ae28a442db9d975ad24706d77&email=$email");

              // Set CURLOPT_RETURNTRANSFER so that the content is returned as a variable.
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

              // Set CURLOPT_FOLLOWLOCATION to true to follow redirects.
              curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

              // Execute the request.
              $data = curl_exec($ch);

              // Close the cURL handle.
              curl_close($ch);
            echo $data;
              // Print the data out onto the page.
              $result = json_decode($data, true);
            if ($result['deliverability'] === "UNDELIVERABLE" ||$result['deliverability'] === "UNKNOWN" ) {
    
                exit("Undeliverable");
                
            }
            
            if ($result["is_disposable_email"]["value"] === true) {
                
                exit("Disposable");
                
            }
            echo "email address is valid";    
?>