<?php
// Include necessary files
include_once 'config.php';
include_once 'functions.php';

// Sample user data (replace with actual user authentication)
$userId = 1;

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming the form contains an array of user answers with question IDs
    $userAnswers = $_POST['user_answers'];

    // Fetch the difficulty level for each question from the database
    $quizQuestions = getQuizQuestions($_POST['language']);
    $questionDifficulties = array_column($quizQuestions, 'difficulty');

    // Map user answers to corresponding difficulty levels
    $userAnswersWithDifficulty = array_map(function ($answer, $difficulty) {
        return ['answer' => $answer, 'difficulty' => $difficulty];
    }, $userAnswers, $questionDifficulties);

    // Submit answers and get scores
    $scores = submitAnswers($userAnswersWithDifficulty);

    // Update user progress in the database
    updateProgress($userId, $_POST['language'], $scores);
}

// Fetch new quiz questions for the user
$language = $_POST['language'];
$newQuizQuestions = getQuizQuestions($language);

// Return the new quiz questions as JSON
echo json_encode($newQuizQuestions);
?>
