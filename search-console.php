<html lang="de">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Digitalagentur Berlin: Online Marketing Consulting, SEO, SEM, Social, Mobile</title>
    <link rel="icon" type="image/png" sizes="32x32" href="https://digitalagenten.com/images/favicon-32x32.png">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<h1>Digitalagenten - Google Search Console</h1>
<h2 id="warning">Arbeitet zur Zeit nur für die Domain <a href="https://vertretung.allianz.de/" target="_blank">vertretung.allianz.de</a>.
    Bei Fehlermeldungen bitte größeren Zeitraum abfragen.</h2>
<main>
    <button id="allianz_enable" type="button" class="btn btn-primary" disabled>Allianz</button>
    <button type="button" class="btn btn-secondary" disabled>Test</button>
    <div class="suche">
        <form action="/result.php" method="post" id="form">
            <div id="ainput" class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">https://vertretung.allianz.de/</span>
                </div>
                <input id="ainput basic-url" type="text" name="URI" placeholder="max.mustermann" class="form-control"
                       aria-describedby="basic-addon1">
            </div>
            <!--            <div id="input" class="input-group mb-3">-->
            <!--                <div class="input-group-prepend">-->
            <!--                    <label class="input-group-text" for="inputGroupSelect01">Domain</label>-->
            <!--                </div>-->
            <!--                <select name="URI" id="domains" class="custom-select" id="inputGroupSelect01" required></select>-->
            <!--            </div>
            //Das hier muss wieder geändert werden. Wurde nur zum demonstrieren so eingestellt!!!!!-->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Startdatum</span>
                </div>
                <input type="date" name="startdate" class="form-control" aria-describedby="basic-addon1" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Enddatum</span>
                </div>
                <input type="date" name="enddate" class="form-control" aria-describedby="basic-addon1" required>
            </div>
            <input class="btn btn-success" id="submit" type="submit" value="Suchen">
        </form>
    </div>
</main>
<script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="/assets/js/script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
