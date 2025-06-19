<?php
// Banen til databasen
$dsn = "sqlite:" . dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . "./database.sqlite3";
$dbh = new PDO($dsn);

// Lager tabellen brukarkontoar
$dbh->query(
    <<<SQL
        CREATE TABLE IF NOT EXISTS brukarkontoar (
            id INTEGER PRIMARY KEY,
            epost TEXT NOT NULL UNIQUE,
            passord_hash TEXT NOT NULL,
            verifisert INT DEFAULT 0
        )
    SQL
);