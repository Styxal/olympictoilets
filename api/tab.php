<?php

include '../app.php';

$tab = $_GET['tab'];

include "../tabs/{$tab}.php";
