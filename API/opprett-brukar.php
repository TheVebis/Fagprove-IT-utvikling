<?php

// Opprett brukar

// Køyr tokenautentisering
require_once "inkluderer/autentisering.php";

// Sjekk om token er administrator
if (!in_array($token, ADMIN_TOKENS)) {
    http_response_code(403); // Forbidden
    echo json_encode(["error" => "Krev opphøga rettar."]);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Hent data frå forespørselen
    $json = file_get_contents("php://input");
    $data = json_decode($json, true);

    // Sjekk at data er satt
    if (empty($data)) {
        http_response_code(400); // Bad Request
        echo json_encode(["error" => "Ingen data mottatt."]);
        exit();
    }

    // Sjekk at epost og passord er satt
    if (empty($data["epost"]) || empty($data["passord"])) {
        http_response_code(400); // Bad Request
        echo json_encode(["error" => "E-postadresse og passord er påkrevd."]);
        exit();
    }

    // Lag databasen om den ikkje finst og få tilgang til den
    require_once "inkluderer/lag-database.php";

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

            // Opprette eingongskode
            $kode = rand(100000,999999);

            // Hente ID-en til brukaren
            $sth = $dbh->prepare(
                <<<SQL
                    SELECT id
                    FROM brukarkontoar
                    WHERE 
                        epost LIKE ?
                SQL
            );
            $sth->execute([$data["epost"]]);
            $brukar_id = $sth->fetch(PDO::FETCH_ASSOC);

            // Legg eingongskoden inn i databasen
            $sth = $dbh->prepare(
                <<<SQL
                    INSERT INTO eingongskodar (brukar_id, eingongskode)
                    VALUES (?, ?)
                SQL
            );
            if ($sth->execute([$brukar_id["id"], $kode])) {
                // Send mail
                // mail() fungerer ikkje utan server men er tatt med likevell for å demonstrere konseptet.
                mail(
                    "$data[epost]", 
                    "Verifiser brukar", 
                    "Hei, du har fått ein brukar. Bruk den vedlagte lenkja for å verifisere deg. https://fagprove.no/verifisering/?id=$brukar_id[id]&eingongskode=$kode"
                );
                echo json_encode(["message" => "Brukar oppretta.", "mail" => "https://fagprove.no/verifisering/?id=$brukar_id[id]&eingongskode=$kode"]);
            }
        } else {
            http_response_code(500); // Internal Server Error
            echo json_encode(["error" => "Feil under lagring av brukar."]);
        }

    } catch (PDOException $feil) {
        // Håndtere databasefeil
        http_response_code(500); // Internal Server Error
        echo json_encode(["error" => "Databasefeil: " . $feil->getMessage()]);
    }   
}