#!/usr/local/bin/php
<?php

require_once("legacy_bindings.inc");

function getDescription($o) {
    return $o["description"];
}

$system_ciphers = configd_run("system ssl ciphers");
$ciphers = array();
if ($system_ciphers != null) {
    $ciphers = json_decode($system_ciphers, true);
    ksort($ciphers);
}

echo json_encode(array_map('getDescription', $ciphers));
?>
