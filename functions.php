<?php

// Include the database configuration
include_once 'config.php';

// Function to fetch languages from the database
function getLanguages() {
    global $conn;

    $sql = "SELECT * FROM languages";
    $result = $conn->query($sql);

    $languages = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $languages[] = $row['language_name'];
        }
    }

    return $languages;
}

// Function to fetch quiz questions based on the selected language
function getQuizQuestions($language) {
    global $conn;

    $sql = "SELECT * FROM quiz_questions WHERE language = '$language'";
    $result = $conn->query($sql);

    $questions = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $questions[] = $row;
        }
    }

    return $questions;
}

// Function to submit user answers and calculate scores
function submitAnswers($userAnswers) {
    // Implement your logic to store user answers in the database
    // Calculate scores based on the difficulty level of each question
    // Return an array of scores corresponding to each question
    $scores = array();

    foreach ($userAnswers as $answer) {
        // Placeholder logic, replace with your actual scoring mechanism
        $scores[] = $answer['difficulty'];
    }

    return $scores;
}

// Function to update user progress and proficiency levels in the database
function updateProgress($userId, $language, $scores) {
    global $conn;

    // Calculate average score for the user
    $averageScore = array_sum($scores) / count($scores);

    // Update user progress in the database
    $sql = "UPDATE user_progress SET proficiency_level = '$averageScore' WHERE user_id = '$userId' AND language = '$language'";
    $conn->query($sql);
}

?>
