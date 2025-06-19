<?php

// Sjekk om server har token
if (!isset($_SERVER["HTTP_X_TOKEN"])) {
    http_response_code(400); // Bad Request
    echo json_encode(["error" => "Ugyldig føre­spurnad"]);
    exit();
}

// Henter inn TOKENS-konstanten
require "tokens.php";

$token = $_SERVER["HTTP_X_TOKEN"];

// Sjekk om token er gyldig
if (!in_array($token, TOKENS)) {
    http_response_code(403); // Forbidden
    echo json_encode(["error" => "Ugyldig token.", "token" => $_SERVER["HTTP_X_TOKEN"]]);
    exit();
}
