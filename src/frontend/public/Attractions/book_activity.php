<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $content = file_get_contents('php://input');
    $decoded = json_decode($content, true);

    if(isset($decoded['activity'])) {
        $activity = $decoded['activity'];


        // Send a success response
        echo json_encode(['success' => true]);
    } else {
        // Activity not set
        echo json_encode(['success' => false]);
    }
} else {
    // Not a POST request
    echo json_encode(['success' => false]);
}
?>
