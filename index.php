<?php
// Include necessary files
include_once 'config.php';
include_once 'functions.php';

// Fetch available languages
$languages = getLanguages();

// Fetch default quiz questions for the first language
$defaultLanguage = $languages[0]; // You can set a default language
$quizQuestions = getQuizQuestions($defaultLanguage);

// Sample user data (replace with actual user authentication)
$userId = 1;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Language Learning Game</title>
</head>
<body>
    <header>
        <h1>Language Learning Game</h1>
    </header>
    
    <main>
        <section id="language-selection">
            <label for="language">Choose a language:</label>
            <select id="language">
                <?php
                foreach ($languages as $language) {
                    echo "<option value='$language'>$language</option>";
                }
                ?>
            </select>
        </section>

        <section id="quiz">
            <!-- Display quiz questions here -->
            <h2>Quiz Questions</h2>
            <ul>
                <?php
                foreach ($quizQuestions as $question) {
                    echo "<li>{$question['question']}</li>";
                }
                ?>
            </ul>
            <button id="submit-answers-btn">Submit Answers</button>
        </section>

        <section id="leaderboard">
            <!-- Display leaderboard here -->
            <h2>Leaderboard</h2>
            <!-- Implement your logic to fetch and display leaderboard data -->
        </section>

        <section id="profile">
            <!-- Display user profile here -->
            <h2>User Profile</h2>
            <!-- Implement your logic to fetch and display user profile data -->
        </section>
    </main>

    <footer>
        <p>&copy; 2023 Language Learning Game</p>
    </footer>

    <script src="js/script.js"></script>
</body>
</html>
