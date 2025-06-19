<?php

// Kjør tokenautentisering
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'inkluderer/autentisering.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Hent data frå forespørselen
    $json = file_get_contents("php://input");
    $data = json_decode($json, true);

    // Sjekk at data er satt
    if (empty($data)) {
        http_response_code(400); // Bad Request
        echo json_encode(['error' => 'Ingen data mottatt.']);
        exit();
    }

    // Sjekk at epost og passord er satt
    if (empty($data["epost"]) || empty($data["passord"])) {
        http_response_code(400); // Bad Request
        echo json_encode(['error' => 'E-postadresse og passord er påkrevd.']);
        exit();
    }

    // Lag databasen om den ikkje finst
    require_once 'lag-database.php';

    // Hasher passord for økt sikkerheit
    $hash = password_hash($data["passord"], PASSWORD_DEFAULT);

    try {
        // Sett ny brukar inn i databasen med epost og hasha passord
        $sth = $dbh->prepare(
            <<<SQL
                INSERT INTO brukarkontoar (epost, passord_hash)
                VALUES (?, ?)
            SQL
        );

        if($sth->execute([$data["epost"], $hash])) {
            http_response_code(201); // Created
            echo json_encode(['message' => 'Brukar oppretta.']);
        } else {
            http_response_code(500); // Internal Server Error
            echo json_encode(['error' => 'Feil under lagring av brukar.']);
        }

    } catch (PDOException $feil) {
        // Håndtere databasefeil
        http_response_code(500); // Internal Server Error
        echo json_encode(['error' => 'Databasefeil: ' . $feil->getMessage()]);
    }   
}