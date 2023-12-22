<?php
// Include necessary files
include_once 'config.php';
include_once 'functions.php';

// Sample user data (replace with actual user authentication)
$userId = 1;

// Fetch user profile data
$userProfileData = getUserProfile($userId);

// Return the user profile data as JSON
echo json_encode($userProfileData);

// Function to fetch user profile data from the database
function getUserProfile($userId) {
    global $conn;

    // Modify the SQL query based on your database structure
    $sql = "SELECT username, email, proficiency_level FROM users WHERE user_id = '$userId'";
    $result = $conn->query($sql);

    $userProfileData = array();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $userProfileData['username'] = $row['username'];
        $userProfileData['email'] = $row['email'];
        $userProfileData['proficiency_level'] = $row['proficiency_level'];
    }

    return $userProfileData;
}
?>
