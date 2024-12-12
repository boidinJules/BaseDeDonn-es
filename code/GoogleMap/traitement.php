<?php
if (isset($_GET['id'])) {
    $courseId = $_GET['id'];
    $json = file_get_contents('course.json');
    $courses = json_decode($json, true);

    $filteredCourse = array_filter($courses, function($course) use ($courseId) {
        return $course['id'] === $courseId;
    });

    header('Content-Type: application/json');
    echo json_encode(array_values($filteredCourse));
} else {
    http_response_code(400);
    echo json_encode(["error" => "Invalid or missing 'id' parameter"]);
}
?>
