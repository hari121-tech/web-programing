<html>

<head>
    <title>Indian Cricket Players</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px auto;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
            border: 1px solid black;
        }

        th {
            background-color: lightgrey;
        }
    </style>
</head>

<body>
    <h2 style="text-align: center;">List of Indian Cricket Players</h2>
    <?php

$players = array(
 "Virat Kohli",
 "Rohit Sharma",
 "Sachin Tendulkar",
 "MSDhoni",
 "Shikhar Dhawan",
 "KL Rahul",
 "Jadeja",
 "Hardik Pandya",
 "Bhuvneshwar Kumar",
 "Ishant Sharma"
 );
 echo "<table>";
 echo "<tr><th>S.No</th><th>Player Name</th></tr>";
 foreach ($players as $x => $player) {
 echo "<tr><td>" . ($x + 1) . "</td><td>" . $player . "</td></tr>";
 }
 echo "</table>";
 ?>
</body>

</html>