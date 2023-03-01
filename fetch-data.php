<?php

require_once __DIR__ . '/vendor/autoload.php';

$fData = getPostData(); 

$req = [
    'url' => 'https://restcountries.com/v3/name',
];
// dd($req);

$client = new GuzzleHttp\Client();
$url = $req['url'] . "/" . $fData['country'];
$response = $client->get($url);
$data = json_decode((string) $response->getBody(), true);
// dd($data);
// return $data;
// $key = fn;
// $currencyData = $data[$key]

$country = [];
foreach ($data as $ctr) {
    $currencies = [];
        foreach($ctr['currencies'] as $currency){
            $currencies[] = $currency['name'] . '(' . $currency['symbol'] . ')';
        }
        foreach($ctr['languages'] as $language){
            $languages[] = $language;
        }

        foreach($ctr['borders'] as $border){
            $borders[] = $border;
        }
    $country[] = [
        'name'=> $ctr['name']['common'],
        'official' => $ctr['name']['official'],
        'capital'=> $ctr['capital'][0],
        'region'=> $ctr['region'],
        'subregion'=> $ctr['subregion'],
        'population'=> $ctr['population'],
        'area'=> $ctr['area'],
        'flag'=> $ctr['flags'][0],
        'currencies'=> implode(', ' , $currencies),
        'languages' => implode(', ' , $languages),
        'borders' => implode(', ' , $borders),
        'timezones' => $ctr['timezones'][0],
        'continents' => $ctr['continents'][0],
        'fifa' => $ctr['fifa'],
        'latlng' => $ctr['latlng'][0],
        'longitude' => $ctr['latlng'][1]
    ];
}
// dd($country);

return $country;

// $allData = getCountryData($country, 'name', 'capital', 'region', 'subregion', 'population', 'area' , 'flag');

// dd($allData);

?>

