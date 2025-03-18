<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        'FirstName' => $_POST['fName'],
        'LastName' => $_POST['lName'],
        'Email' => $_POST['email'],
        'Password' => $_POST['password']
    ];

    // Node.js API endpoint
    $url = 'http://localhost:8080/signup';

    // Initialize cURL session
    $ch = curl_init($url);

    // Encode data as JSON
    $payload = json_encode($data);

    // cURL options
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute cURL request
    $response = curl_exec($ch);

    // Check for errors
    if (curl_errno($ch)) {
        echo 'Error: ' . curl_error($ch);
    } else {
        $decodedResponse = json_decode($response, true);
        if (isset($decodedResponse['message'])) {
            echo $decodedResponse['message'];
        } else {
            echo 'An error occurred during registration.';
        }
    }

    // Close cURL session
    curl_close($ch);
}
?>
