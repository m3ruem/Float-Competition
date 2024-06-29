<?php
session_start();
require('../db/db_connection.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit;
}

$user_query = "SELECT name FROM user WHERE id = ?";
$stmt = $conn->prepare($user_query);
if ($stmt === false) {
    die('Prepare failed: ' . htmlspecialchars($conn->error));
}
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$stmt->bind_result($judge_name);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation</title>
    <link rel="stylesheet" href="css/navigation.css">
    <style>
        .panel {
            display: block;
            padding: 10px;
            margin: 5px;
            text-decoration: none;
            color: black;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
        }
        .panel.scored {
            background-color: gray;
            pointer-events: none;
            opacity: 0.6;
        }
    </style>
</head>

<body>
    <div class="sidebyside">
        <div class="sidebar">
            <div class="panel">
                <img src="../images/Eulap.png" alt="Eulap image">
            </div>

            <?php

            $sql = "SELECT entry_num FROM contestant";
            $result = $conn->query($sql);

            if ($result === false) {
                die('Query failed: ' . htmlspecialchars($conn->error));
            }

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $entry_num = $row["entry_num"];
                    $class = '';

                    $checkJudgeScoreSql = "SELECT * FROM scores WHERE entry_num = ? AND judge_name = ?";
                    $stmt = $conn->prepare($checkJudgeScoreSql);

                    if ($stmt === false) {
                        die('Prepare failed: ' . htmlspecialchars($conn->error));
                    }

                    $stmt->bind_param("ss", $entry_num, $judge_name);
                    $stmt->execute();
                    $stmt->store_result();

                    if ($stmt->num_rows > 0) {

                        $class = 'scored';
                    }

                    $stmt->close();

                    echo '<a href="judgeTable.php?entry_num=' . htmlspecialchars($entry_num) . '" class="panel ' . $class . '"><strong>Contestant ' . htmlspecialchars($entry_num) . '</strong></a>';
                }
            } else {
                echo '<p>No contestants found</p>';
            }

            $conn->close();
            ?>

            <form method="post" action="../logout.php">
                <div class="logout-button">
                    <button type="submit" name="logout"><strong>LOGOUT</strong></button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
