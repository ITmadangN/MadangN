<?php

use Migliori\PowerLitePdo\Db;

[$container, $container2] = require_once __DIR__ . '/../../../vendor/migliori/power-lite-pdo/src/bootstrap.php';

$db = $container->get(Db::class);
$db2 = $container2->get(Db::class);