<?php
//https://restcountries.com/v3/name/india?fullName=true
error_reporting(0);
require_once dirname(__DIR__, 1) . '/vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $country = $_POST['country'];
    if (!preg_match('/^[a-zA-Z ]+$/', $country)) {
        $error = 'Invalid country name';
    } else {
        $client = new GuzzleHttp\Client();
        $response = $client->request('GET', "https://restcountries.com/v3/name/$country");

        if ($response->getStatusCode() === 200) {
            $data = json_decode($response->getBody(), true)[0];
            // var_dump(json_encode(json_decode($response->getBody(), true)[0]));
            // exit;
        } else {
            $error = 'Failed to fetch country data';
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Country Info</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 5px;
            text-align: left;
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
    <?php if (isset($data)) {
        ?>
        <h2><?php echo $data['name'] ;
            // echo '<pre>';
            // var_dump($data);
            // echo '</pre>';
            // exit;
        ?></h2>
        <table>
            <tr>
                <th>Capital</th>
                <td><?php echo $data['capital'][0] ?></td>
            </tr>
            <tr>
                <th>Region</th>
                <td><?php echo $data['region'] ?></td>
            </tr>
            <tr>
                <th>Population</th>
                <td><?php echo $data['population'] ?></td>
            </tr>
            <tr>
                <th>Currency</th>
                <td><?php echo $data['currencies']['name']['symbol'] ?></td>
            </tr>
            <tr>
                <th>Flag</th>
                <td><img src="<?php echo $data['flag'] ?>" alt="<?php echo $data['name'] ?> flag" width="200"></td>
            </tr>
        </table>
        <?php  } ?>
</body>
</html>