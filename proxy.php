<?php
include __DIR__ . '/helpers.php';

// Main Endpoint
$targetServer = 'http://google.com/';

// Received Data from Client
$username  = getPost('username');
$inputData = array(
    'username' => $username,
);

// Forward Client Data to Target Server
$response = sendRequest($targetServer, $inputData);

// Received Response from targetServer and response to Client
if ($response === FALSE) {
    $data     = array('resultCode' => 0, 'desc' => 'Error');
    $response = json_encode($data);
}
// Output
header('Content-Type: application/json');
echo $response;
