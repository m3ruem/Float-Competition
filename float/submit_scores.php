<?php
session_start();
require('../db/db_connection.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit;
}


$user_query = "SELECT name FROM user WHERE id = ?";
$stmt = $conn->prepare($user_query);
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$stmt->bind_result($judge_name);
$stmt->fetch();
$stmt->close();


$entry_num = $_POST['entry_num'];
$overall_appearance = $_POST['overall_appearance'];
$artistry_design = $_POST['artistry_design'];
$craftsmanship = $_POST['craftsmanship'];
$relevance_theme = $_POST['relevance_theme'];


$checkJudgeScoreSql = "SELECT * FROM scores WHERE entry_num = ? AND judge_name = ?";
$stmt = $conn->prepare($checkJudgeScoreSql);
$stmt->bind_param("ss", $entry_num, $judge_name);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo "You have already scored this contestant.";
    $stmt->close();
    exit;
}

$stmt->close();


$sql = "INSERT INTO scores (entry_num, judge_name, overall_appearance, artistry_design, craftsmanship, relevance_theme) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isssss", $entry_num, $judge_name, $overall_appearance, $artistry_design, $craftsmanship, $relevance_theme);
$stmt->execute();
$stmt->close();


// $sql_update = "UPDATE contestant SET scored = 1 WHERE entry_num = ?";
// $stmt = $conn->prepare($sql_update);
// $stmt->bind_param("i", $entry_num);
// $stmt->execute();
// $stmt->close();

header("Location: judgeTable.php?entry_num=" . $entry_num);
exit;
?>
