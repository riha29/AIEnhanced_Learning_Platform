<?php
// Your API key (if needed)
$apiKey = 'YOUR_API_KEY';

// API Endpoint
$apiUrl = 'https://api.scholarshipapi.org/undergrad'; // This is a placeholder URL.

// cURL Setup
$ch = curl_init($apiUrl);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $apiKey
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute cURL request
$response = curl_exec($ch);

// Check for cURL errors
if (curl_errno($ch)) {
    // Handle error scenario
    curl_close($ch);
    die('Failed to fetch scholarships: ' . curl_error($ch));
}

// Close cURL session
curl_close($ch);

// Decode JSON response
$scholarships = json_decode($response, true);

// Handle the case where no scholarships are available
if (empty($scholarships)) {
    echo "No scholarships available at the moment.";
    exit;
}

// Proceed to use $scholarships in your view
?>
