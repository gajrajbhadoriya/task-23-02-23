<?php

require_once __DIR__ . '/vendor/autoload.php';

$data = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = require __DIR__ . '/fetch-data.php';
    // dd($data);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Country Info</title>
    <style>
        body {
        background-color: lightblue;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 5px;
            text-align: left;
        }
        tr {
            border-style: solid;
            border-color: red green blue yellow;
        }
    </style>
</head>
<body>
    <h1>Country Info</h1>

    <?php if (isset($error)) { ?>
        <p style="color: red"><?php echo $error ?></p>
    <?php } ?>

    <form method="post">
        <label for="country">Country Name:</label>
        <input type="text" id="country" name="country" required>
        <button type="submit">Submit</button>
    </form>
    <br><br>
    <table>
    <thead>
        <tr style="border:2px solid Tomato";>
            <th>Name</th>
            <th>Official</th>
            <th>Capital</th>
            <th>Region</th>
            <th>Subregion</th>
            <th>Population</th>
            <th>Area</th>
            <th>Currencies</th>
            <th>Languages</th>
            <th>Borders</th>
            <th>Timezones</th>
            <th>Continents</th>
            <th>Fifa</th>
            <th>Latlng</th>
            <th>Longitude</th>
            <th>Flag</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $ctr) { ?>
            <tr>
                <td><?= $ctr['name']?></td>
                <td><?= $ctr['official']?></td>
                <td><?= $ctr['capital'] ?></td>
                <td><?= $ctr['region'] ?></td>
                <td><?= $ctr['subregion'] ?></td>
                <td><?= $ctr['population'] ?></td>
                <td><?= $ctr['area'] ?></td>
                <td><?= $ctr['currencies'] ?></td>
                <td><?= $ctr['languages'] ?></td>
                <td><?= $ctr['borders'] ?></td>
                <td><?= $ctr['timezones']?></td>
                <td><?= $ctr['continents']?></td>
                <td><?= $ctr['fifa']?></td> 
                <td><?= $ctr['latlng']?></td>
                <th><?= $ctr['longitude']?></th>
                <td><img src="<?= $ctr['flag'] ?>" alt="Flag of <?= $ctr['name'] ?>" width="50"></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
</body>
</html>
