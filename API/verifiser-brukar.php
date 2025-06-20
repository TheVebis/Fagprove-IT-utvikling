<?php

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

    // Sjekk at id og eingongskode er satt
    if (empty($data["id"]) || empty($data["eingongskode"])) {
        http_response_code(400); // Bad Request
        echo json_encode(["error" => "ID og eingongskode er påkravd."]);
        exit();
    }

    // Lag databasen om den ikkje finst og få tilgang til den
    require_once "inkluderer/lag-database.php";

    // Henter brukaren frå databasen
    $sth = $dbh->prepare(
        <<<SQL
            SELECT eingongskode
            FROM eingongskodar
            WHERE 
                brukar_id LIKE ? AND eingongskode LIKE ?
        SQL
    );
    $sth->execute([$data["id"], $data["eingongskode"]]);
    $eingongskode = $sth->fetch(PDO::FETCH_ASSOC);

    // Sjekker at eingongskoden finst
    if ($eingongskode == false) {
        http_response_code(400); // Bad Request
        echo json_encode(["error" => "Ugyldig eingongskode eller ID."]);
        exit();
    }

    try {
        // Oppdater at brukaren er verifisert
        $sth = $dbh->prepare(
            <<<SQL
                UPDATE brukarkontoar 
                SET verifisert = 1
                WHERE id = ?
            SQL
        );

        if($sth->execute([$data["id"]])) {
            // Fjern eingongskoden frå databasen
            $sth = $dbh->prepare(
                <<<SQL
                    DELETE FROM eingongskodar
                    WHERE eingongskode = ?
                SQL
            );
            if($sth->execute([$eingongskode["eingongskode"]])) {
                http_response_code(200); // OK
                echo json_encode(["message" => "Brukar verifisert."]);
            }
        } else {
            http_response_code(500); // Internal Server Error
            echo json_encode(["error" => "Feil under verifisering av brukar."]);
        }

    } catch (PDOException $feil) {
        // Håndtere databasefeil
        http_response_code(500); // Internal Server Error
        echo json_encode(["error" => "Databasefeil: " . $feil->getMessage()]);
    }   

}