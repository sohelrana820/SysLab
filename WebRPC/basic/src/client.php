<?php

function sendRpcRequest($url, $method, $params) {
    $payload = json_encode(['method' => $method, 'params' => $params]);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type:application/json']);

    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}

// Server URL
$url = 'http://localhost:8080';

// Create a new user
$response = sendRpcRequest($url, 'createUser', [
    'name' => 'John Doe',
    'email' => 'john.doe@example.com'
]);

if ($response['success']) {
    $userId = $response['user']['id'];
    echo "User created successfully with ID: " . $userId . "\n";
} else {
    echo "Failed to create user\n";
}

// Retrieve the created user
$response = sendRpcRequest($url, 'getUser', [
    'id' => $userId
]);

if ($response['success']) {
    $user = $response['user'];
    echo "User details:\n";
    echo "ID: " . $user['id'] . "\n";
    echo "Name: " . $user['name'] . "\n";
    echo "Email: " . $user['email'] . "\n";
} else {
    echo "Failed to retrieve user: " . $response['message'] . "\n";
}
