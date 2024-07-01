
<?php
require('../db/db_festiveconn.php');

$sql = "SELECT entry_num, 
               AVG(festive_spirit_of_parade) AS avg_fsp, 
               AVG(costume_and_props) AS avg_cap, 
               AVG(relevance_to_theme) AS avg_rt, 
               (AVG(festive_spirit_of_parade) + AVG(costume_and_props) + AVG(relevance_to_theme)) AS avg_total 
        FROM scores 
        GROUP BY entry_num 
        ORDER BY avg_total DESC";

$result = $conn->query($sql);

$scores = [];
$ranking = 1;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $row['ranking'] = $ranking++;
        $scores[] = $row;
    }
}


$judge_query = "SELECT name FROM user WHERE role = 1"; 
$judge_result = $conn->query($judge_query);

$judges = [];
if ($judge_result->num_rows > 0) {
    while ($judge_row = $judge_result->fetch_assoc()) {
        $judges[] = $judge_row['name'];
    }
}

$conn->close();
?>
