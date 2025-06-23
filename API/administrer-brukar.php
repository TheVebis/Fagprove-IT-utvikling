<?php

// Køyr tokenautentisering
require_once "inkluderer/autentisering.php";

if ($_SERVER["REQUEST_METHOD"] === "PUT") {
    // Hent data frå forespørselen
    $json = file_get_contents("php://input");
    $data = json_decode($json, true);

    // Sjekk at data er satt
    if (empty($data)) {
        http_response_code(400); // Bad Request
        echo json_encode(["error" => "Ingen data mottatt."]);
        exit();
    }

    // Sjekker om brukaren er administrator
    if (in_array($token, ADMIN_TOKENS)) {
        // Sjekk at epost og nytt passord er satt for administrator
        if (empty($data["epost"]) || empty($data["nyttPassord"])) {
            http_response_code(400); // Bad Request
            echo json_encode(["error" => "E-postadresse og nytt passord er påkravd."]);
            exit();
        } 

    } else {
        // Sjekk at epost, gamalt passord og nytt passord er satt for ikkje-administrator
        if (empty($data["epost"]) || empty($data["passord"] || empty([$data["nyttPassord"]]))) {
            http_response_code(400); // Bad Request
            echo json_encode(["error" => "E-postadresse, gamalt passord og nytt passord er påkravd."]);
            exit();
        } 
    }

    // Lag databasen om den ikkje finst og få tilgang til den
    require_once "inkluderer/lag-database.php";

    // Henter brukaren frå databasen
    $sth = $dbh->prepare(
        <<<SQL
            SELECT passord_hash
            FROM brukarkontoar
            WHERE 
                epost LIKE ?
                
        SQL
    );
    $sth->execute([$data["epost"]]);
    $brukar = $sth->fetch(PDO::FETCH_ASSOC);

    if (in_array($token, ADMIN_TOKENS)) {
        // Sjekker at brukaren finst
        if ($brukar == false) {
            http_response_code(400); // Bad Request
            echo json_encode(["error" => "Ugyldig e-postadresse."]);
            exit();
        }
    } else {
        // Sjekker at brukaren finst og at passord matcher
        if ($brukar == false || !password_verify($data["passord"], $brukar["passord_hash"])) {
            http_response_code(401); // Unauthorized
            echo json_encode(["error" => "Ugyldig e-postadresse eller passord."]);
            exit();
        }
    }

    // Hasher passord for økt sikkerheit
    $hash = password_hash($data["nyttPassord"], PASSWORD_DEFAULT);

    try {
        // Oppdater brukaren med nytt passord
        $sth = $dbh->prepare(
            <<<SQL
                UPDATE brukarkontoar 
                SET passord_hash = ?
                WHERE epost = ?
            SQL
        );

        if($sth->execute([$hash, $data["epost"],])) {
            http_response_code(200); // OK
            echo json_encode(["message" => "Nytt passord er satt."]);
        } else {
            http_response_code(500); // Internal Server Error
            echo json_encode(["error" => "Feil under setting av passord."]);
        }

    } catch (PDOException $feil) {
        // Håndtere databasefeil
        http_response_code(500); // Internal Server Error
        echo json_encode(["error" => "Databasefeil: " . $feil->getMessage()]);
    }   
}

if ($_SERVER["REQUEST_METHOD"] === "DELETE") {
    // Sjekk om token er administrator
    if (!in_array($token, ADMIN_TOKENS)) {
        http_response_code(403); // Forbidden
        echo json_encode(["error" => "Krev opphøga rettar."]);
        exit();
    }
    // Hent data frå forespørselen
    $json = file_get_contents("php://input");
    $data = json_decode($json, true);

    // Sjekk at data er satt
    if (empty($data)) {
        http_response_code(400); // Bad Request
        echo json_encode(["error" => "Ingen data mottatt."]);
        exit();
    }

    // Sjekk at epost er satt
    if (empty($data["epost"])) {
        http_response_code(400); // Bad Request
        echo json_encode(["error" => "E-postadresse er påkravd."]);
        exit();
    }

    // Lag databasen om den ikkje finst og få tilgang til den
    require_once "inkluderer/lag-database.php";

    //TODO sjekk om brukarkontoen finst først

    try {
        // Slett brukarkonto
        $sth = $dbh->prepare(
            <<<SQL
                DELETE FROM brukarkontoar 
                WHERE epost = ?
            SQL
        );

        if($sth->execute([$data["epost"],])) {
            http_response_code(200); // OK
            echo json_encode(["message" => "Brukarkontoen er sletta."]);
        } else {
            http_response_code(500); // Internal Server Error
            echo json_encode(["error" => "Feil under sletting av brukarkonto."]);
        }

    } catch (PDOException $feil) {
        // Håndtere databasefeil
        http_response_code(500); // Internal Server Error
        echo json_encode(["error" => "Databasefeil: " . $feil->getMessage()]);
    }
}