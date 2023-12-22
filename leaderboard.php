<?php
// Include necessary files
include_once 'config.php';
include_once 'functions.php';

// Sample user data (replace with actual user authentication)
$userId = 1;

// Fetch leaderboard data
$language = $_GET['language']; // Assuming you're filtering by language
$leaderboardData = getLeaderboard($language);

// Return the leaderboard data as JSON
echo json_encode($leaderboardData);

// Function to fetch leaderboard data from the database
function getLeaderboard($language) {
    global $conn;

    // Modify the SQL query based on your database structure
    $sql = "SELECT username, score FROM leaderboard WHERE language = '$language' ORDER BY score DESC LIMIT 10";
    $result = $conn->query($sql);

    $leaderboardData = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $leaderboardData[] = $row;
        }
    }

    return $leaderboardData;
}
?>
