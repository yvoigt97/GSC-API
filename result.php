<html lang="de">
<head>
    <meta http-equiv="Content-Type" content="application/json; charset=utf-8"/>
    <title>Digitalagentur Berlin: Online Marketing Consulting, SEO, SEM, Social, Mobile</title>
    <link rel="icon" type="image/png" sizes="32x32" href="https://digitalagenten.com/images/favicon-32x32.png">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"
            integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>
    <script src="/assets/js/script.js"></script>
</head>
<?php
//$uri = $_POST['URI'];
//Das hier muss wieder geändert werden. Wurde nur zum demonstrieren so eingestellt!!!!!
$uri = "https://vertretung.allianz.de/";
$start_date = $_POST['startdate'];
$end_date = $_POST['enddate'];
echo "<h3>";
echo $uri . " " . $start_date . " " . $end_date;
echo "</h3><br>";
?>
<a href="/search-console.php">Zurück</a><br><br>
<a href="https://github.com/yvoigt97/GSC-API" target="_blank">https://github.com/yvoigt97/GSC-API</a><br>
<a href="https://developers.google.com/apis-explorer/#p/webmasters/v3/webmasters.searchanalytics.query" target="_blank">https://developers.google.com/apis-explorer/#p/webmasters/v3/webmasters.searchanalytics.query</a><br>
<a href="https://developers.google.com/apis-explorer/#p/webmasters/v3/webmasters.sites.list" target="_blank">https://developers.google.com/apis-explorer/#p/webmasters/v3/webmasters.sites.list</a><br>
<br>
<a href="/assets/data/vt.json" target="_blank">Liste der abgefragten Vertretungen</a>
<svg width="38" height="38" viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg" stroke="#fff">
    <g fill="none" fill-rule="evenodd">
        <g transform="translate(1 1)" stroke-width="2">
            <circle stroke-opacity=".5" cx="18" cy="18" r="18"/>
            <path d="M36 18c0-9.94-8.06-18-18-18">
                <animateTransform
                        attributeName="transform"
                        type="rotate"
                        from="0 18 18"
                        to="360 18 18"
                        dur="1s"
                        repeatCount="indefinite"/>
            </path>
        </g>
    </g>
</svg>
<?php
echo '<div class="main">';
//exec("python3 --version 2>&1", $out, $result);
$jsonFileContents = file_get_contents("/www/htdocs/w010903c/gsc.digitalagenten.com/assets/data/vt.json");
$keys = json_decode($jsonFileContents, false, 512, JSON_PRETTY_PRINT);
echo "<br><br>";
if (count($keys->rows)) {
    foreach ($keys->rows as $idx => $row) {
//        echo $row->vertretung . '<br>';
        echo "<table class='city'>";
        echo "<tr><th><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"12\" height=\"12\" viewBox=\"0 0 24 24\"><path d=\"M24 10h-10v-10h-4v10h-10v4h10v10h4v-10h10z\"/></svg>$row->vertretung</th></tr>";
        foreach ($row->domains as $t => $domain) {
            $python_data = exec("python3 /www/htdocs/w010903c/gsc.digitalagenten.com/GSC-API-master/search_analytics_api_sample.py " . $uri . " " . $start_date . " " . $end_date . " " . $domain);
            /*$python_data = exec("python3 /www/htdocs/w010903c/gsc.digitalagenten.com/GSC-API-master/search_analytics_api_sample.py " . $uri . " " . $start_date . " " . $end_date . " 2>&1", $out, $result);
            echo "Returncode: " . $result . "<br>";
            echo "Ausgabe des Scripts: " . $out . "<br>";*/
            $data = json_decode($python_data, false, 512, JSON_PRETTY_PRINT);
//            print_r($python_data);
            if (count($data->rows)) {
                echo "<table>";
                echo "<tr><th><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"12\" height=\"12\" viewBox=\"0 0 24 24\"><path d=\"M24 10h-10v-10h-4v10h-10v4h10v10h4v-10h10z\"/></svg>$domain</th></tr>";
                echo "<tr>";
                echo "<th>Keywords</th>";
                echo "<th>CTR</th>";
                echo "<th>Position</th>";
                echo "<th>Impressions</th>";
                echo "<th>Clicks</th>";
                echo "<tr>";
                foreach ($data->rows as $idx => $row) {
                    echo "<tr>";
                    foreach ($row->keys as $t => $key) {
                        echo "<td>$key</td>";
                    }
                    $CTR = $row->ctr;
                    echo "<td>" . round($CTR * 100, 3) . "</td>";
                    echo "<td>$row->position</td>";
                    echo "<td>$row->impressions</td>";
                    echo "<td>$row->clicks</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        }
        echo "</table>";
    }
}
echo '</div>';
?>
<br><br>
<!--<a href="/assets/data/results.json" download>Download der Resultate als JSON-Datei</a>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script>