<?php include 'app.php'; ?>

<head>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="/css/style.css">
    <script
            src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
    <script src="/js/main.js"></script>
    <title>OLYMPIC TOILETS</title>
</head>
<body>
<header>
    <h1>OLYMPIC TOILETS</h1>
</header>
<nav>
    <div class="tabs">
        <a tab="default">Welcome</a>
        <a tab="countries">Countries</a>
        <a tab="average">Average Calculator</a>
        <a tab="gold">FAQ</a>
    </div>
</nav>
<div class="container" id="tab-container">

</div>
<script>
    loadTab('default');
</script>
</body>