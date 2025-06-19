<?php 

// Kjør tokenautentisering
require_once "inkluderer/autentisering.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    // Lag databasen om den ikkje finst og få tilgang til den
    require_once "inkluderer/lag-database.php";

    try {
        // Sett ny brukar inn i databasen med epost og hasha passord
        $sth = $dbh->prepare(
            <<<SQL
                SELECT id, epost, verifisert 
                FROM brukarkontoar
            SQL
        );

        if($sth->execute()) {
            http_response_code(200); // OK
            echo json_encode(["message" => "Oversikt henta.", "data" => $sth->fetchAll(PDO::FETCH_ASSOC)]);
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