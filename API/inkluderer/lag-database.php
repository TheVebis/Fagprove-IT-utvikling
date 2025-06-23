<?php
// Banen til databasen
$dsn = "sqlite:" . dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . "database_brukarkontoar.sqlite3";
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

// Lager tabellen eingongskodar som refererer brukerkontoar
$dbh->query(
    <<<SQL
        CREATE TABLE IF NOT EXISTS eingongskodar (
            id INTEGER PRIMARY KEY,
            brukar_id INTEGER NOT NULL REFERENCES brukarkontoar (id),
            eingongskode TEXT NOT NULL UNIQUE
        )
    SQL
);

/*$dbh->query(
    <<<SQL
        INSERT INTO eingongskodar (brukar_id, eingongskode)
        VALUES (1, "47587664")
    SQL
);*/