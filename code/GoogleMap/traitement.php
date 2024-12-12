<?php
header('Content-Type: application/json');

if (isset($_GET['id']) && is_numeric($_GET['id'])) { // Vérifiez que l'ID est bien un entier
    $courseId = intval($_GET['id']); // Convertir en entier
    $json = file_get_contents('course.json');

    if ($json === false) {
        http_response_code(500);
        echo json_encode(["error" => "Failed to load course data"]);
        exit;
    }

    $courses = json_decode($json, true);

    if (!is_array($courses)) {
        http_response_code(500);
        echo json_encode(["error" => "Invalid course data format"]);
        exit;
    }

    // Rechercher la course correspondante
    foreach ($courses as $course) {
        if ($course['id'] === $courseId) {
            echo json_encode($course);
            exit;
        }
    }

    // Si aucune course ne correspond
    http_response_code(404);
    echo json_encode(["error" => "Course not found"]);
} else {
    http_response_code(400);
    echo json_encode(["error" => "Invalid or missing 'id' parameter"]);
}
?>
