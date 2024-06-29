<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JUDGING SHEET</title>
    <link rel="stylesheet" href="/float/css/float.css">
</head>

<body>
    <div class="tnalaklogo">
        <img src="../tnalak.png" alt="t'nalak image">
    </div>
    <div class="emblem">
        <img src="../emblem.png" alt="t'nalak image">
    </div>
    <div class="container">
        <h1>FLOAT COMPETITION</h1>
        <h1>JUDGING SHEET</h1>
        <table>
            <thead>
                <tr>
                    <th>Entry No.</th>
                    <th>Overall Appearance and Impact (30%)
                        <p>(Overall look, aesthetic value, and attractiveness of the float)</p>
                    </th>
                    <th>Artistry/Design (20%)
                        <p>(Concept and artistic merits of the design and costumes if there is/are any taking into account balance, proportion, emphasis, harmony as primarily reflected in shapes/image and colors)</p>
                    </th>
                    <th>Craftsmanship (30%)
                        <p>(This pertains to how the design is realized and how the float is made. Such factors to be considered are the quality of the craftsmanship, stability of structure and decoration, choice, and creative use of materials)</p>
                    </th>
                    <th>Relevance to the Festive Theme (20%)
                        <p>"Onward South Cotabato: Dreaming Big, Weaving more progress. Rising above challenges"</p>
                    </th>
                    <th>Total</th>
                    <th>Ranking</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'fetch_scores.php';

                foreach ($scores as $score) {
                    echo "<tr>";
                    echo "<td>{$score['entry_num']}</td>";
                    echo "<td>{$score['overall_appearance']}</td>";
                    echo "<td>{$score['artistry_design']}</td>";
                    echo "<td>{$score['craftsmanship']}</td>";
                    echo "<td>{$score['relevance_theme']}</td>";
                    echo "<td>{$score['total']}</td>";
                    echo "<td>{$score['ranking']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
