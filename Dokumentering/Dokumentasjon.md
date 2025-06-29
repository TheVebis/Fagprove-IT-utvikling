# Fagprøve i IT-utviklerfaget

### _Vebjørn Hjelmeseter_

_17.6.25 - 26.5.25_

# Planlegging

## Sjølve oppgåva

I denne fagprøven har eg fått i oppgåve å lage eit REST-API som skal brukast for administrasjon av brukarar med deira respektive datakontoar. Brukarkontoane skal lagrast i ein database.

Applikasjonens endepunkt forventer å levera:

-   Oppretting av konto
-   Verifikasjon og godkjenning av konto
-   Oversikt over kontoar
-   Administrasjon av kontoar

Sikkerheita i og rundt pålogging, behandling og lagring må være ivaretatt.

Undervegs i gjennomføringa vil prøvenemda presentere ei lita endring, og det må settast av tid til å beskrive korleis endringa påverkar oppgåva, og skissere forslag til evt tilpassningar.

## Skisse

Eg har laga ei skisse over korleis dei ulike endepunkta skal fungere. Den gir et estimat på kva headers og data som skal bli sendt til REST-APIet, og kva CRUD\*-operasjoner den skal utføre i databasen.

> **Opprettelse av konto:**
>
> POST (epost, passord, token) -> INSERT. Bare administratorar med gyldig token skal kunne lage brukarar. Må være unikt brukarnamn. Passord skal hashast. Sende epost til epostadressa med ei lenkje der brukaren kan verifisere seg (Verifikasjon og godkjenning av konto)
>
> **Verifikasjon og godkjenning av konto:**
>
> PUT (epost) -> UPDATE. Sett brukar som verifisert (evt. og lag passord her)
>
> **Oversikt over kontoer:**
>
> GET (token) -> SELECT. returnerer liste over brukarar og evt. anna relevant info
>
> **Administrasjon av kontoer:**
>
> -   Endre passord (brukar kan gjør dette sjølv)
> -   Sette nytt passord (Bare admin)
> -   Slette brukar (Bare admin)
>
> PUT (epost, gammalt passord, nytt passord) -> UPDATE. Må sjekke at brukar med det brukarnamnet og passord finst
>
> PUT (epost, nytt passord, token) -> UPDATE
>
> DELETE (epost, token) -> DELETE

\*CRUD står for Create, Read, Update og Delete. Desse fire er dei grunnleggande operasjonane som kan bli utført i ein database.

-   Create legger til nye rader i databasen. SQL brukar INSERT-uttrykket.
-   Read henter data frå databasen. SQL brukar SELECT-uttrykket.
-   Update endrer eksisterande rader i databasen. SQL brukar UPDATE-uttrykket.
-   Delete fjerner rader frå databasen. SQL brukar DELETE-uttrykket.

## Teknologi og programvare

For å lage REST-APIet skal eg bruke kodespråket PHP til å utføre logikken til dei ulike endepunkta. PHP er eit server-side-programmeringspråk, så eg må hoste det ein plass. Då kan eg enten hoste det lokalt via localhost, eller på HVL sin server.

-   Kjelde: [snl.no/PHP](https://snl.no/PHP)

Eg skal bruke SQLite for databasen brukarkontoane skal lagrast i. SQLite er ein lettvektig relasjonsdatabase som blir ein integrert del av programmet. Databasen blir lagra i ei enkel fil (evt. fleire filer ved store databasar), og krever ingen dedikert server eller spesialisert filsystem. Den enkle bruken av SQLite har ressultert i massiv bruk av SQLite, og blitt det foretrukne databasesystemet for applikasjonar og innebygde einingar. SQLite er derfor veldig relevant teknologi, og det databasesystemet eg har brukt mest.

-   Kjelde: [Hva er SQLite og hvorfor er det så populært?](https://no.linux-console.net/?p=7556)

Eg brukar Visual Studio Code for å skrive koden. Visual Studio Code er ein lett, men kraftig kildekode-editor som er utvikla av Microsoft og fungerer med nesten alle språk. Det er veldig populært og blei brukt av [73,6% av utviklarar i 2024](https://survey.stackoverflow.co/2024/technology#1-integrated-development-environment).

Når REST-APIet er ferdig skal det leggast ut på GitHub. GitHub er ein plattform for utviklarar som brukast til å lagra, administrere og dele kodeprosjekt. Der kan REST-APIet enkelt bli delt og tatt i bruk av andre utviklarar.

-   Kjelde: [Hva er GitHub?](https://mediseo.no/hva-er-github/)

## Utstyr og kostnad

Følgande tabell er utstyret eg brukar ved arbeidsplassen min, og det meste er standard som tilsette får utdelt. Til denne oppgåva er det ingenting som er kjøpt inn, men prisoppslaget er tatt med likevell. Av dette er hodetelefonane og musematta utanom standard, men det blir dekka av avdelinga.

| Type            | Spesifikasjonar                              | Pris (NOK) |
| --------------- | -------------------------------------------- | ---------- |
| Laptop          | AMD Ryzen 5 PRO 3500U, 16 GB RAM, 256 GB SSD | 10000      |
| Skjerm          | Standard 49" Bredskjerm                      | 8000       |
| Docking         | Standard dockingstasjon                      | 3000       |
| Tastatur og mus | Standard tastatur og mus-sett                | 500        |
| Hodetelefonar   | Trådlause hodetelefonar med støydemping      | 3000       |
| Musematte       | Ergonomisk musematte                         | 200        |

_Prisane er estimert._

Total pris: 24 700

## Hjelpemidler

Det er ei rekkje hjelpemidler eg tenkjer å bruke under fagprøven.

Som samarbeidspartnar tenkte eg å bruke Ole Brede som og er lærling i IT-utviklarfaget. Han har god kunnskap om programmering og utvikling og har vert ein god ressurs for meg i læretida. Eg vil og bruke Terje Rudi, som har det faglege ansvaret for oss i læretida, då han har lang erfaring innan utvikling og skreiv oppgåva mi.

Eg har tenkt å bruke dokumentasjon for dei respektive programmeringspråka eg skal bruke.

-   https://www.php.net/docs.php
-   https://www.sqlitetutorial.net/
-   https://www.sqlite.org/docs.html
-   https://developer.mozilla.org/en-US/ (Om eg sku få bruk for HTML, CSS, eller JavaScript)

Eg vil bruke [SQLite Viewer](https://inloop.github.io/sqlite-viewer/) for å visualisere SQLite-databasen min undervegs. SQLite Viewer henter og visualiserer data frå databasen i ei SQLite-fil basert på SQLite-uttrykk. Slik kan ein sjå den komplette databasen eller bare enkelte deler basert på SELECT-uttrykket ein skreiv inn.

Eg vil bruke OpenAIs ChatGPT, levert til oss via https://gpt.uio.no/, som vi får av Universitetet i Oslo. Den lar meg bruke ChatGPT innanfor dei krava UiO sett til personvern. UiO lovar at samtalar og data ikkje blir brukt til trening av KI-modellar, noko som gjer det sikrare enn den vanlege ChatGPT.

For rettskriving vil eg bruke [ordbøkene.no](https://ordbokene.no/), då sjølv om rettskriving ikkje er eit krav synest eg fortsatt det er ein viktig del. Ordbøkene har både bokmål og nynorsk som er bra sidan eg skriv på nynorsk.

## Tidsskjema

| Tysdag 17.6                                 | Onsdag 18.6                                           | Torsdag 19.6                                                | Fredag 20.6                                               | Måndag 23.6                                         | Tysdag 24.6                                   | Onsdag 25.6                               |
| ------------------------------------------- | ----------------------------------------------------- | ----------------------------------------------------------- | --------------------------------------------------------- | --------------------------------------------------- | --------------------------------------------- | ----------------------------------------- |
| 9:00 - 11:30: Planlegging                   | 8:00 - 8:20: Starte dagen                             | 8:00 - 8:20: Starte dagen                                   | 8:00 - 8:20: Starte dagen                                 | 8:00 - 8:20: Starte dagen                           | 8:00 - 8:20: Starte dagen                     | 8:00 - 8:30: Førebuing framføring         |
| 11:30 - 12:00: Lunsjpause                   | 8:20 - 9:20 Sette opp SQLite database                 | 8:20 - 10:00: Lage endepunkt for administrering av brukarar | 8:20 - 10:00: Lage endepunkt for verifisering av brukarar | 8:20 - 10:30: Ferdigstille REST-APIet               | 8:20 - 11:30: Ferdigstille dokumentasjon      | 8:30: Framføring av arbeid for prøvenemda |
| 12:00 - 15:00: Planlegging                  | 9:20 - 10:30: Sette opp sikkerheit med token          | 10:00 - 11:30: Teste/feilsøking av endepunkt                | 10:00 - 11:30: Teste/feilsøking av endepunkt              | 10:30 - 11:30: Legge REST-APIet ut på GitHub        | 11:30 - 12:00: Lunsjpause                     |                                           |
| 17:00: Siste frist for å levere planlegging | 10:30 - 11:30: Lage endepunt for oppretting av brukar | 11:30 - 12:00: Lunsjpause                                   | 11:30 - 12:00: Lunsjpause                                 | 11:30 - 12:00: Lunsjpause                           | 12:00 - 15:00: Førebuing framføring           |
|                                             | 11:30 - 12:00: Lunsjpause                             | 12:00 - 13:00: Lage endepunkt for oversikt over kontoer     | 12:00 - 14:00: Implementere evt. endringar frå prøvenemda | 12:00 - 13:00: Lage testplan                        | 17:00: Siste frist for å levere dokumentasjon |
|                                             | 12:00 - 13:00: Testing/feilsøking av endepunkt        | 13:00 - 14:00: Teste/feilsøking av endepunkt                | 14:00 - 15:00: Dokumentering og gå gjennom oppgåver       | 13:00 - 14:00: Gjennomfør test                      |
|                                             | 13:00 - 15:00: Dokumentering og gå gjennom oppgåver   | 14:00 - 15:00: Dokumentering og gå gjennom oppgåver         |                                                           | 14:00 - 15:00: Dokumentering og gå gjennom oppgåver |

Dokumentering og gå gjennom oppgåver inkluderer å ferdigstille ting eg eventuelt ikkje fekk tid til i løpet av dagen.

# Gjennomføring

# Onsdag 18.6

## Database

Eg byrjar med å sette opp SQLite-databasen som skal lagre alle brukarkontoane. Eg slår fast at den trenger ID, epost, passord og om brukaren er verifisert. Koden blir sjåande slik ut:

```php
// Banen til databasen
$dsn = "sqlite:" . dirname(__DIR__) . DIRECTORY_SEPARATOR . "database_brukarkontoar.sqlite3";
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
```

Forklaring av koden:

`$dsn = "sqlite:" . dirname(__DIR__) . DIRECTORY_SEPARATOR . "database_brukarkontoar.sqlite3";`

Koden begynner med å definere ein variabel `$dsn`, som skal spesifisere banen til databasen.

`sqlite:` indikerer at det er ein SQLite-database.

`dirname(__DIR__)` hentar banen til mappa over den noverande mappa.
`DIRECTORY_SEPARATOR` gir den riktige mappa-separatoren for operativsystemet (til dømes / for Unix, \ for Windows).

Resultatet av denne koden blir ein fullstendig bane til SQLite-databasen `database_brukarkontoar.sqlite3` som ligg i ei overordna mappe. Dette er nødvendig då denne fila ligg i ei undermappe i prosjektet.

`$dbh = new PDO($dsn);` bruker PHP sin PDO (PHP Data Objects) klasse for å opprette ein tilkopling til databasen ved hjelp av den definerte DSN.

`$dbh->query(...)` utfører ein SQL-spørring, i dette tilfellet for å opprette ei tabell.

```SQL
CREATE TABLE IF NOT EXISTS brukarkontoar (
    id INTEGER PRIMARY KEY,
    epost TEXT NOT NULL UNIQUE,
    passord_hash TEXT NOT NULL,
    verifisert INT DEFAULT 0
)
```

I SQL-spørringa lagar ein tabellen `brukarkontoar` dersom den ikkje allereie eksisterer. Dette forhindrar feil som kan oppstå ved å prøve å opprette ein tabell som allerede finst.

I tabellen blir kolonnene `id`, `epost`, `passord_hash` og `verifisert` laga.

-   `id` blir satt til eit heiltal (integer) og som primærnøkkelen i tabellen. Primærnøkkelen er unik og blir brukt for å identifisere kvar rad i tabellen.

-   `epost` blir satt til tekst med kolonneavgrensingane `NOT NULL` og `UNIQUE`. `NOT NULL` seier at denne ikkje kan være tom, og `UNIQUE` at den må være unik. Alle brukarar må ha ei e-postadresse og ingen kan ha same.

-   `passord_hash` blir satt til tekst, og som epost har `NOT NULL`. Den har ikkje `UNIQUE`-avgrensinga då fleire kan ha same passord, men grunna hashinga på passordet er det ikkje så veldig relevant.

-   `verifisert` blir satt til eit heiltal med ein `DEFAULT`-verdi på 0. Det er fordi dette skal fungere som ein boolean, enten sann (1) eller usann (0), og når brukaren først blir oppretta er den ikkje verifisert.

## Kjøre PHP

PHP er eit server-side-programmeringspråk og kan ikkje bli køyrt direkte i nettlesaren som ein kan med HTML, CSS og JavaScript. Det må hostast ein stad. Vi har ein web-server som eg kan bruke til å hoste, men eg har gått for å kjøre PHP lokalt på maskina via localhost.

Ole Brede har laga ei løysing for å køyre PHP lokalt på maskina, men den hadde problemer med å opne mappa mi. Vi fann ut av at skriptet ikkje likte spesialtegn, då mappa "Fagprøve IT-utvikling" har ein Ø i seg. Å endre mappenamnet til "Fagprove IT-utvikling" fiksa problemet.

## Sikkerheit med token

For å forsikre seg at ikkje kven som helst kan bruke API-et og byrje å opprette og slette brukarar sett eg inn sikkerheit med hjelp av ein token. I headers som blir sendt inn skal det være ein `X_TOKEN` som blir lest og sjekka opp mot gyldige tokens.

```php
// Sjekk om server har token
if (!isset($_SERVER["HTTP_X_TOKEN"])) {
    http_response_code(400); // Bad Request
    echo json_encode(["error" => "Ugyldig føre­spurnad"]);
    exit();
}
```

Først sjekker ein om `X_TOKEN` er satt. Om den ikkje er det sender skriptet tilbake feilkoden 400 med Ugyldig føre­spurnad. Ein må sjekke om den er satt fordi det ville skapt problemer lenger ned i koden om den ikkje var det.

```PHP
// Henter inn TOKENS-konstanten
require "tokens.php";

$token = $_SERVER["HTTP_X_TOKEN"];
```

Skriptet krever `tokens.php` som inneheld `TOKENS`-konstanten som er ein array med gyldige tokens. Tokenen til føre­spurnaden blir og lagra som `$token`.

```php
// Administrator
define("ADMIN_TOKENS", [
    // Administratortokens
]);

// Alle gyldige tokens
define("TOKENS", [
    ...ADMIN_TOKENS,
    // Brukartokens
]);
```

I `tokens.php` blir `ADMIN_TOKENS` og `TOKENS` satt som arrays med gyldige tokens. `TOKENS` får og alle tokens frå `ADMIN_TOKENS` med `...ADMIN_TOKENS`.

```PHP
// Sjekk om token er gyldig
if (!in_array($token, TOKENS)) {
    http_response_code(403); // Forbidden
    echo json_encode(["error" => "Ugyldig token.", "token" => $_SERVER["HTTP_X_TOKEN"]]);
    exit();
}
```

Til slutt sjekker skriptet om tokenen er ein gyldig token med å sjå om `$token` finnst i `TOKENS`. Visst ikkje sender skriptet tilbake feilkoden 403 Forbudt med Ugyldig token.

Med å kjøre fetch-kall utan token, med feil token og med rett token får vi dette resultatet:

![Fetch-kall](Bilder/fetch_kall.png)

## Opprette brukar

Eit av endepunkta til API-et er at ein skal kunne opprette brukarar i databasen.

```php
// Kjør tokenautentisering
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "inkluderer/autentisering.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Hent data frå føre­spurnaden
    $json = file_get_contents("php://input");
    $data = json_decode($json, true);

    // Sjekk at data, brukarnamn og passord er satt
    if (!empty($data)) {
        if (!empty($data["epost"]) && !empty($data["passord"])) {
            // Lag databasen om den ikkje finst
            require_once "lag-database.php";

            // Hasher passord for økt sikkerheit
            $hash = password_hash($data["passord"], PASSWORD_DEFAULT);

            // Sett ny brukar inn i databasen med epost og hasha passord
            $sth = $dbh->prepare(
                <<<SQL
                    INSERT INTO brukarkontoar (epost, passord_hash)
                    VALUES (?, ?)
                SQL
            );
            $sth->execute([$data["epost"], $hash]);
        }
    }
}
```

Forklaring av koden:

`require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "inkluderer/autentisering.php";`
køyrer autentiseringscriptet eg satt opp tidligare. Det passer på at føre­spurnaden har eit gyldig token.

`$_SERVER["REQUEST_METHOD"] === "POST"`
sjekker om metoden til føre­spurnaden er satt til POST. Det betyr at skriptet skal legge til noko nytt i databasen

```php
$json = file_get_contents("php://input");
$data = json_decode($json, true);
```

Denne koden henter så ut innhaldet i føre­spurnaden og dekoder det frå JSON til eit objekt som PHP forstår.

#### JSON

> JSON (JavaScript Object Notation) er eit av dei mest brukte formata å strukturere og sende data mellom ulike programmeringsspråk og mellom klient og server. Det er lett for både menneske og maskinar å lese og skrive det, og har brei støtte blant programmeringspråka. Formatet er og veldig kompakt som hjelp med å redusere bandbredde og lastetid i applikasjoner og nettstader.
>
> Her bruker eg det for å sende data som API-et treng for å opprette brukarkonto: e-postadresse og passord.

`!empty($data)` og `!empty($data["epost"]) && !empty($data["passord"])` sjekkar om det faktisk er innhald i føre­spurnaden, og om det er innhaldet endepunktet treng.

`$hash = password_hash($data["passord"], PASSWORD_DEFAULT);` hashar passordet. Det andre parameteret i `password_hash`, er kva algoritme den skal bruke. Eg har brukt `PASSWORD_DEFAULT` som bruker bvcrypt-algoritmen for hashing og er den PHP anbefaler.

#### Hashing

> Hashing er ein einvegsfunksjon som tar inn data og produserer ein fast lengde tegn. Sidan det er einvegs er det ikkje mogleg å rekonstruere dataen frå hash-verdien. Dette er optimalt for lagring av passord i databasen då det gjør det vanskeleg for angriparar å hente dei opprinnelege passorda sjølv om dei får tilgong til hash-verdien.
>
> Hashing bruker eit "salt", som er ein tilfeldeg generert streng som legges til passordet før hashing. Sjølv om to brukarar har samme passord gjer saltet at hashane blir forskjellege.
>
> Når ein brukar logger seg inn med passordet henter systemet saltet for den lagrede hashen. Den kombinerer det innsendte passordet med saltet, hasher det, og samanliknar den med den lagra hashen. Er dei like er det korrekt passord.

```php
$sth = $dbh->prepare(
    <<<SQL
        INSERT INTO brukarkontoar (epost, passord_hash)
        VALUES (?, ?)
    SQL
);
$sth->execute([$data["epost"], $hash]);
```

Her lagrar skriptet brukaren og det hasha passordet i databasen. Spørsmålstegna i `VALUES` blir kjørt som innhaldet i `execute(...)` når ein kjører den. Eg brukar `prepare(...)` og `execute(...)` her istaden for `query(...)` (som gjer begge deler på ein gong), då det er sikrare og forhindrar SQL-injeksjon.

#### SQL-injeksjon

> SQL-injeksjon går ut på at brukaren sender inn SQL-kode som har som mål å kjøre i databasen, tildømes å slette ein tabell. Den gjer det med å avslutte den gjeldane spørringa og starte ei ny som brukaren har laga.
>
> ![Exploits of a Mom](https://imgs.xkcd.com/comics/exploits_of_a_mom.png)
>
> -https://xkcd.com/327/

### Feilmeldingar

Eg innsåg det kunne være ein ide å legge til feilmeldingar i koden for ein betre brukaropplevelse og gjer det enklare å feilsøkje. Eg gjor dette med `http_response_code` og å sende ein feilmelding tilbake, ikkje ulikt det eg gjor med token-autentiseringa. Eg snudde og litt rundt på if-statements for at koden sku bli meir oversikteleg. Då fekk eg følgande kode:

```php
// Kjør tokenautentisering
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "inkluderer/autentisering.php";

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
        echo json_encode(["error" => "E-postadresse og passord er påkravd."]);
        exit();
    }

    // Lag databasen om den ikkje finst
    require_once "lag-database.php";

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
            echo json_encode(["message" => "Brukar oppretta."]);
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
```

`try {...} catch {...}` er og satt inn då skriptet prøver å legge til ein brukar i databasen. Om det sku oppstå ein feil, som at ein brukar med same epost-adresse blir forsøkt å legges til, vil forsøket mislykkast og feilmeldinga fanga opp av `catch`

Når eg no prøvar å kjøre eit fetch-kall inn mot API-et får eg forventa resultat.

Fetch-kall brukt under testing:

```js
fetch("/API/opprett-brukar.php", {
	method: "POST",
	headers: {
		"content-type": "application/json",
		X_TOKEN: "strengMedBokstavarOgTall",
	},
	body: JSON.stringify({
		epost: "eksempel@fagprøve.no",
		passord: "Passord123",
	}),
});
```

-   Sendar eg eit kall utan `body` eller manglar `epost` eller `passord`, får eg ein 400 melding om at eg manglar data.

-   Sendar eg fullstendeg fetch-kall med alt som skal med får eg ein 201-melding tilbake med at brukaren er oppretta.

-   Sender eg same kallet på nytt får eg ein 500-melding (internal server error) med følgande feilmelding:

    > Databasefeil: SQLSTATE[23000]: Integrity constraint violation: 19 UNIQUE constraint failed: brukarkontoar.epost

    Dette skjer fordi det finst allereie ein brukar med epost `eksempel@fagprøve.no`

# Torsdag 19.6

## Laste opp på GitHub

Eg blei råda av Terje Rudi å ta backup av prosjektet mitt på GitHub, då det ville vere veldig kjipt om noko sku gå gale og alt arbeidet mitt blei sletta. Med GitHub har eg og ein versjonslogg, så om noko sku gå gale i programmet så kan eg gå tilbake til ein tidligare versjon.

### Kva er GitHub?

Som eg skreiv i planlegginga mi er GitHub ein plattform for utviklarar som brukast til å lagra, administrere og dele kodeprosjekt.

GitHub er ein nettbasert plattform for versjonskontroll og samarbeid, spesielt populær blant utviklara. Den brukar Git, eit versjonskontrollsystem, for å spore endringer i kildekode og lar fleire personar jobbe saman på prosjekter.

GitHub er ein viktig plattform i utviklingsmiljøet og brukast av mange selskap og individuelle utviklarar for å dele og samarbeide om programvareprosjekter.

### Laste opp på GitHub med VS Code

I Visual Studio Code, som er verktøyet eg bruker for å skrive koden min, er det integrert GIT Source Control som gjer det enkelt å laste opp prosjekt-mappa i eit GitHub-repository. Vidare får eg oversikt over endringar sidan forige commit, moglegheita å commite dei endringane, og få ein oversikt over dei forskjellege versjonane.

Hadde eg hatt fleire utviklarar med meg kunne dei ha lagd branches og seinare sendt pull requests med den nye koden utan at eg blir forstyrra i arbeidet mitt av endringar.

Så med Source Control i VS Code var det berre å trykke på nokon knappar, logge meg inn på GitHub, og vipps så har eg koden min oppe på GitHub.

![GitHub](Bilder/GitHub.png)

## Administrasjon av brukar

Eit av endepunkta til REST-API-et er at ein skal kunne administrere brukarar. Då er planen min at ein skal kunne endre passord, sette nytt passord og slette brukaren.

Eg kopierer ein del av koden frå opprett brukar-endepunktet då mykje av prosessen er den same.

```php
// Kjør tokenautentisering
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

    // Lag databasen om den ikkje finst og få tilgang til den
    require_once "inkluderer/lag-database.php";

    try {
        // Utfør handling i database
        $sth = $dbh->prepare(

        );

        if($sth->execute()) {
            http_response_code(); //
            echo json_encode(["message" => ""]);
        } else {
            http_response_code(500); // Internal Server Error
            echo json_encode(["error" => "Feil under utføring av handling."]);
        }

    } catch (PDOException $feil) {
        // Håndtere databasefeil
        http_response_code(500); // Internal Server Error
        echo json_encode(["error" => "Databasefeil: " . $feil->getMessage()]);
    }
}
```

Det første eg lagar er å prosessen for å endre passord. Det er to måtar å endre et passord på:

-   Brukar endrer passordet sjølv. Då må brukaren skrive inn det gamle passordet i tillegg for autentisering.
-   Administrator setter nytt passord på ein brukar. Då trengs bare e-postadressa og det nye passordet.

For å skille på desse må skriptet sjekke om brukaren er administrator eller ikkje. Det gjør den via tokens. Det er definert kva tokens som har administratorrettar og kva tokens som berre er vanlege brukarar.

```php
// Administrator
define("ADMIN_TOKENS", [
    "strengMedBokstavarOgTall"
]);

// Alle gyldige tokens
define("TOKENS", [
    ...ADMIN_TOKENS,
    "strengMedTallOgBokstavar"
]);
```

`...ADMIN_TOKENS` legger alle administratortokens inn i arrayen med alle tokens slik at ein slepp å spesifisere det på nytt.

### Endre passord

Når ein skal endre passord må ein bruke metoden `PUT`, då det er det ein brukar for å oppdatere rader i databasen.

```php
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
```

Her har eg lagt til at ein sjekker om brukaren er administrator med `in_array($token, ADMIN_TOKENS)` eller ikkje. Ein må ha e-postadresse uansett, men vanlege brukarar må ha gamalt passord i tillegg. Dette sjekkes ved bruk av `empty($data["..."])`. Om nokon av dei faktisk er tomme returnerer serveren ein feilmelding.

```sql
<<<SQL
    SELECT passord_hash
    FROM brukarkontoar
    WHERE
        epost LIKE ?

SQL
```

Denne SQL-spørringa henter ut passordet til brukaren som skal få nytt passord. Det gjer at ein kan sjekke om brukaren faktisk finst, og verifisere passordet for vanlege brukarar sin del.

Med `$sth->execute([$data["epost"]]);` og `$brukar = $sth->fetch(PDO::FETCH_ASSOC);` køyrer skriptet spørringa og henter resultatet som ein array i variabelen `$brukar`. `$brukar` skal sjå noko slik ut om brukaren finst med eit hasha passord:

> {"passord_hash":"$2y$10$dMVAFxB3XydwSRCfLiAwOeqdnhj79HcOJ4fcWLbQOURbDGY6xOx82"}

Om brukaren ikkje finst skal `$brukar` bli `false`.

```php
// Sjekker at brukaren finst og at passord matcher
if ($brukar == false || !password_verify($data["passord"], $brukar["passord_hash"])) {
    http_response_code(401); // Unauthorized
    echo json_encode(["error" => "Ugyldig e-postadresse eller passord."]);
    exit();
}
```

Denne koden sjekker at brukaren finst med `$brukar == false` og sjekker om passordet som er gitt stemmer med passordet i databasen. I `password_verify()` er det første parameteret passordet som blei sendt inn og andre parameteret som er lagra i databasen. `password_verify()` hashar det innsendte passordet og samanliknar det med hashen i databasen.

Om brukaren ikkje finst eller passordet ikkje matchar sender REST-API-et ein feilmelding med at e-postadressa eller passordet er ugyldig.

Om forespørselen har ein administrator-token sjår denne koden slik ut i staden for:

```php
// Sjekker at brukaren finst
if ($brukar == false) {
    http_response_code(400); // Bad Request
    echo json_encode(["error" => "Ugyldig e-postadresse."]);
    exit();
}
```

Skriptet hashar det nye passordet med `$hash = password_hash($data["nyttPassord"], PASSWORD_DEFAULT);` før det blir lagt inn i databasen.

```sql
<<<SQL
    UPDATE brukarkontoar
    SET passord_hash = ?
    WHERE epost = ?
SQL
```

SQL-spørringa brukar `UPDATE` for å oppdatere ei rad. `SET` spesifiserar at det er `passord_hash` som skal bli oppdatert med den nye `$hash`-variabelen, og `WHERE` avgrenser spørringa til rader der `epost` er lik den i førespurnaden. For å kjøre denne spørringa bruker skriptet `$sth->execute([$hash, $data["epost"]])`.

Her er den fulle koden for å sette nytt passord:

```php
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
```

### Slette brukarkonto

Å slette brukarkonto er eigentleg ganske enkelt samanlikna med å endre passord. Enten har brukaren tilgang og sendt inn rett data, og brukaren blir sletta. Elles får ein feilmelding med informasjon om feilen.

Ein brukar metoden `DELETE` for å slette data frå ein database.

Det er lagt til ein sjekk om brukaren er administrator, då berre administratorar har tilgang til å slette brukarkontoar. Dette sjekkast med å sjå om tokenen ligg i `ADMIN_TOKENS`-arrayen.

SQL-spørringa brukar `WHERE epost = ?` for å avgrense søket slik at ein slettar den rada ein er ute etter. `?` blir kjørt som `$data["epost"]` som er e-postadressa som er lagt ved i førespurnaden

```SQL
<<<SQL
    DELETE FROM brukarkontoar
    WHERE epost = ?
SQL
```

Sidan endepunktet for å slette postar ligg i same fil som endepunktet for å endre passord blir `require_once "inkluderer/autentisering.php";` køyrt i tillegg til følgande kode:

```php
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

    try {
        // Slett brukarkonto
        $sth = $dbh->prepare(
            <<<SQL
                DELETE FROM brukarkontoar
                WHERE epost = ?
            SQL
        );

        if($sth->execute([$data["epost"]])) {
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
```

#### Request Method

> Sidan førespurnadden sender ein metode kvar gong den skal bruke eit endepunkt, kan ein ha fleire endepunkt i same fil. Her har eg både ein `PUT` og ein `DELETE` i ei og same fil. Dette går fint fordi skriptet har `if ($_SERVER["REQUEST_METHOD"] === "...") {...}` i starten før sjølve handlinga blir køyrt. Dette passer på at rett endepunkt blir køyrt.
>
> Ein bør ikkje ha fleire endepunkt med same metode i same fil då ein må begynne med meir logikk rundt dette og applikasjonar vil behandle det som same endepunkt sjølv om det eigentleg er fleire. Eg var litt usikker på å gjere dette med endepunktet for endring av passord, då dette gjer to litt forskjellige ting (endre passord på eigen brukar og på andre sin brukar), men beslutta at sidan koden var tilnærma identisk var det enklare og betre å gjer det same stad, då ein slepp å repetere så mykje kode.
>
> Ein kan teoretisk ha ein god del endepunkt i same fil så lenge dei har forskjellege metodar, men å gjere dette med endepunkt som gjer forskjellege ting kan skape forvirring og gjere det vanskeleg å lese koden. Derfor har eg laga forskjellege filer for dei ulike endepunkta. Endring av passord og slette brukarkonto kjem begge under administrering av brukar, så eg har difor lagt dei i same fil.

## Oversikt over brukarar

Oversikt over kva brukarar som er i databasen utan å måtte ty til verktøy som [SQLite Viewer](https://inloop.github.io/sqlite-viewer/) er greit å ha i sida si. Det er og eit av punkta i oppgåva som REST-API-et skal kunne returnere. Derfor har eg laga eit endepunkt for å hente ut relevant informasjon frå databasen.

Ein `GET`-metode er ikkje så veldig avansert, då den berre skal hente data frå eit endepunkt. Eg har heller ikkje laga noko banebrytande kode rundt det som skal være veldig sjølvforklarande om du har sett dei forige endepunkta. Eg skal likevel forklare det som er annleis.

```php
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
```

SQL-spørringa er veldig enkel. `SELECT` velger kva kolonner den skal hente ut frå databasen, i dette tilfellet `id`, `epost` og `verifisert`, og `FROM` seier kva tabell den skal hente frå, `brukarkontoar`.

```sql
<<<SQL
    SELECT id, epost, verifisert
    FROM brukarkontoar
SQL
```

> Om eg hadde brukt `*` i staden for `id, epost, verifisert` ville eg fått alle kolonner i tabellen, men sidan passorda er hasha er det ikkje så relevant å sjå det. Det kunne og vert eit sikkerheitsproblem då det er noko enklare å "brute force" passordet når du har hashen. Fortsatt så er hashing veldig sikkert.

Ein ting som er greit å bite seg merke i er at om SQL-spørringa er ein suksess blir alt sendt tilbake til klienten i JSON-format med `"data" => $sth->fetchAll(PDO::FETCH_ASSOC)`. Slik kan ein bruke dataen frå databasen, tildømes vise den i ein tabell.

## Applikasjon og endring

I samtalen min med prøvenemnda oppdaga vi at vi litt forskjellege tolkingar av oppgåva. Eg hadde tolka den som om eg berre sku lage eit REST-API, og hadde planlagt å lage det mest mogleg uavhengeg av applikasjonen som spør etter det. Dette er for at kven som helst skal kunne bruke REST-API-et i sine eigne applikasjonar utan at dei må gjere endringar med koden min.

Prøvenemnda tolka oppgåva som at eg sku lage ein applikasjon i tillegg som skal køyre dette API-et. Dei innrømma at oppgåva kunne tolkast på måten eg hadde tolka den på, og tok ansvar for at dei hadde godkjent ei oppgåve som ikkje var formulert slik som dei hadde tenkt. Eg kan ta på meg litt ansvar sjølv då eg ikkje hadde kontakta dei når eg var usikker, men i staden spurte ein kollega.

Vi blei einige om at endringa som sku komme i løpet av gjennomføringa sku då være eit enkelt brukargrensesnitt som brukar REST-API-et eg lagar. Det skal og være mogleg å opprette kontoar, verifisere og godkjenne kontoar.

# Fredag 20.6

## Verifisering av brukar

Det siste endepunktet i REST-API-et er at ein brukar skal kunne verifisere seg. Då er planen at ein e-post blir sendt ut til brukaren når brukaren blir oppretta. E-posten inneheld ei lenkje som tar den til verifiseringsida, som sender ein forespørsel til endepunktet. Planen er at lenkja skal ha ID-en til brukaren og ein eingongskode som ein Query String. Då vil den sjå ut noko slik: `https://eksempelnettside.no/verifisering/?id=int&eingongskode=string`.

> Ein Query String er ein måte å sende data med ein URL. Den fungerer slik at bak nettadressa kjem det eit `?` med noko tekst bak. Den har syntaxen `?parameterNamn=parameterVerdi`. Du kan og legge på fleire parameter med eit `&` bak parameterverdien fulgt av fleire parameter.

For å sjekke om eingongskoden er gyldig må eg lagre eingongskodane i databasen på ein måte. Eg kan lagre det direkte i `brukarkontoar`, men eg velger heller å lage ein eigen tabell for det som heller referrer til `brukarkontoar`, slik at eingongskodane fortsatt er kopla til brukarkontoen.

Fordelane med å ha det i ein eigen tabell er at ein enklare kan legge til og slette eingongskodane som er midlertidige data som skal bli sletta etter bruk, i motsetning til brukarkontoar som er meir permanente data. Det gir og betre oversikt i databasen då ei potensiell tom kolonne i tabellen med brukarkontoar kan auke størrelsen på tabellen unaudig.

I fila for å lage database legg eg til kode for å opprette denne nye tabellen:

```php
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
```

Den brukar `REFERENCES brukarkontoar (id)` for å kople seg opp mot brukarkontoen med den ID-en. Dette blir kalla ein Foreign Key.

> Ein Foreign Key er ei kolonne eller ei gruppe av kolonner i ein tabell som refererer til ein primærnøkkel i ein annan tabell. Foreign Keys brukes for å opprette ein relasjon mellom to tabellar, noko som bidrar til å opprettholde dataintegritet ved å sikre at verdiane i den refererande tabellen matcher verdiane i den refererte tabellen.

Eg hadde litt problemer når eg sku teste ut endepunktet seinare, då eg ikkje oppdaga at eg hadde kalla tabellen for eingongkodar i staden for eingong**s**kodar. Eg hadde det same problemet med `eingongskode`. Det gjor at eg fekk feilmelding med beskjed om at ein tabell med det namnet ikkje eksisterte. Heldegvis fekk eg fanga det opp raskt og endra det. Hadde eg ikkje det ville det potensielt blitt mykje kode som var avhengig av `eingongkodar`, og å endre det til `eingongskodar` seinare ville vere meir jobb enn det var no.

Tilbake i fila for endepunktet legg eg til følgjande kode:

```php
// Henter eingongskoden frå databasen
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
```

Eingongskoden blir henta frå tabellen `eingongskodar`. Det blir sjekka om eingongskoden er den rette med å samanligne brukar_id og eingongskoden.

```php
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

            // Sende melding...
        }
```

Når den rette eingongskoden er funne blir `verifisert`-verdien satt til 1 (sann). Eingongskoden blir så sletta frå databasen slik at den ikkje kan bli brukt fleire gonger.

## Applikasjon og brukargrensesnitt

Endringa som kom i løpet av oppgåva var at det sku være eit brukargrensesnitt ein kan bruke til å sende data til endepunkta i REST-API-et. Eg har planlagt å lage eit enkelt brukargrensesnitt som består av eit skjema der ein skriv inn dei ulike verdiane endepunktet treng. Eg vil gjerne at skjemaet skal være dynamisk og at dei relevante felta dukkar opp etter kva endepunkt ein har tenkt å nå.

For å lage brukargrensesnittet må eg ta i bruk HTML, CSS og JavaScript for å lage ein applikasjon/ei nettside som kan vise brukargrensesnittet. HTML (HyperText Markup Language) er sjølve elementa på sida som skjemaet, felt og knappar. CSS (Cascading Style Sheets) lager stil på dei ulike elementa slik at dei ser fine ut og slik eg vil ha dei. JavaScript tar seg av det dynamiske på sida i tillegg til å kalle på dei rette endepunkta. Det er desse tre språka som blir brukt for å lage nettsidene du brukar kvar dag.

> **Merk:** Eg har ikkje lagt til noko innloggingsystem på sida. Sida er berre meint for interne testar og har difor inga sikkring. Ein har automatisk administratortilgangar, men kan bytte mellom roller for å teste begge deler. Om ein skal bruke denne applikasjonen i produksjon må ein først implementere eit sikkert innloggingsystem.

Eg har satt opp følgande brukargrensesnitt med hjelp av HTML, CSS og JavaScript, og eg skal forklar korleis koden er bygd opp.

![Brukargrensesnitt](Bilder/brukargrensesnitt.png)

### HTML

HTML er den viktigaste delen av ei nettside. Utan den er det ingen element på sida. Under er den komplette HTML-koden for applikasjonen over.

```html
<!DOCTYPE html>
<html lang="nn">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Brukarsystem</title>
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<h1 id="tittel">Hei, administrator!</h1>
		<button onclick="byttRolle()">Bytt rolle</button>

		<form
			id="form"
			method="post"
			onsubmit="sendInn(); event.preventDefault()"
			class="flex-column"
		>
			<select id="handling" name="handling" onchange="byttHandling()">
				<option value="">Velg handling</option>
				<option value="oversikt-brukarar">Sjå alle brukarar</option>
				<option value="opprett-brukar">Opprett brukar</option>
				<option value="endre-passord">Endre passord</option>
				<option value="slett-brukar">Slett brukar</option>
			</select>
			<div id="epost" class="flex-column">
				<label for="epost-input">E-post</label>
				<input id="epost-input" name="epost" />
			</div>
			<div id="passord" class="flex-column">
				<label for="passord-input">Passord</label>
				<input id="passord-input" name="passord" type="password" />
			</div>
			<div id="nyttPassord" class="flex-column">
				<label for="nyttPassord-input">Nytt passord</label>
				<input
					id="nyttPassord-input"
					name="nyttPassord"
					type="password"
				/>
			</div>
			<div id="gjentaPassord" class="flex-column">
				<label for="gjentaPassord-input">Gjenta passord</label>
				<input
					id="gjentaPassord-input"
					name="gjentaPassord"
					type="password"
				/>
			</div>
			<button type="submit">Send</button>
		</form>
		<script src="public.js"></script>
	</body>
</html>
```

Forklaring av koden:

Alle elementer i HTML må definerast med ein tag, tildømes `<button>` for ein knapp, slik at nettlesaren veit kva type element det er, kva ein kan gjer med det elementet i JavaScript, og korleis CSS skal legge stiler på det. Element må og som regel ha ein slutt-tag. Slutt-taggen er lik start-taggen, men har ein skråstrek for å vise at den er ein slutt tag. Tildømes `</button>` for å avslutte ein knapp. Elementer mellom `<button>` og `</button>` vil vere eit barn av knapp-elementet.

`<!DOCTYPE html>` blir brukt til å sette dokument-typen slik at nettlesaren forstår kva dokumenttype den kan forvente. Alle HTML-dokument må starte med dette.

Likeså må ein ha `<html>` for å representere rota av HTML-dokumentet. All koden (bortsett frå `<!DOCTYPE html>`) må være inni eit HTML-element. Det er standard å definere kva språk nettsida er på ved hjelp av språk-attributet `lang` inni HTML-taggen. Dette er for å hjelpe nettlesaren å vite kva språk sida har, og å eventuelt kunne oversette den. Eg har satt sida til nynorsk med å bruke `lang="nn"`, då språkkoden for nynorsk er `nn`.

`<head>` inneheld alt av metadata til nettsida. Det som er inni den blir ikkje vist på sida. Den pleier å definere tittelen på nettsida `<title>Brukarsystem</title>`, stiler `<link rel="stylesheet" href="style.css" />` og annan metadata.

Mesteparten av HTML-koden ligg inni `<body>`-elementet. Den inneheld alt som skal visast på sida.

Ein `<h1>` er ei overskrift som blir vist i stor skrift. Dei kjem i mange versjonar frå h1 og nedover til h6, der h1 er den største. Her inneheld den ein velkomst til den som er innpå sida og viser kva rolle den har.

Eg har lagt til ein knapp som endrer rollen for brukaren med hjelp av `byttRolle`-funksjonen som blir køyrt når ein klikkar på knappen. Eg skal forklare meir om korleis funksjonen fungerer i JavaScript-delen. Knappen er lagt til for testing av sida.

Skjemaet er hovuddelen av nettsida. I HTML blir skjema definert med `<form>`-taggen. Den har fått ein ID slik at det er lettare å finne fram til den. Metoden er satt til `post` då skjemaet skal sende inn data.

Det er og lagt til ei hending når skjemaet blir sendt inn med `onsubmit="sendInn(); event.preventDefault()"`. Dette attributet seier at når skjemaet blir sendt inn skal den kjøre `sendInn`-funksjonen. `event.preventDefault()` hindrar skjemaet å faktisk sende inn, noko som ville last inn sida på nytt og fjerna eventuell data vi ville fått tilbake frå endepunkta som blir køyrt i `sendInn`.

Skjemaet har og klassen `flex-column` som blir brukt til å legge stil på skjemaet. Eg skal forklare meir kva den gjer i CSS-delen.

Det første elementet i skjemaet er ein `<select>`, ein nedtrekksmeny som definerer kva handling brukaren vil utføre. Attributtet `name` seier kva namn elementet har. I eit skjema blir namnet ein referanse for data som blir sendt inn. Nedtrekksmenyen køyrer og `byttHandling`-funksjonen når den blir endra, som når ein velger eit av alternativa i nedtrekksmenyen.

Nedtrekksmenyen består av fleire alternativ representert med fleire `<option>`-taggar. Dei har `<value>`, verdien som er valgt. Det valgte alternativet sin verdi blir og satt som verdien til nedtrekksmenyen og blir sendt inn som ein del av skjemaet. Dei ulike verdiane korresponderer med ulike handlingar i `sendInn`-funksjonen.

Vidare er det fleire `<div>`-ar som inneheld ein `<label>` og ein `<input>`. Desse representer dei ulike tekstfelta om ein kan skrive inn data i.

Ein `<div>` er eit av dei mest brukta taggane i HTML. Ein div representerer ein boks med innhald i og dekker behova som andre HTML-taggar ikkje gjer. Det er vanleg å putte innhald som høyrer i lag inni ein div for å ha betre kontroll på den i HTML-hierarkiet. I denne koden høyrer `<label>` og `<input>` i lag, så då gir det meining å plassere dei i ein div. Diven har blitt gitt ein ID for å lettare kunne finnast av JavaScriptet som skal vise og skjule dei ulike alternativa.

Ein `<label>` er ein bit med tekst som blir brukt til å forklare eit felt. `for`-attributet viser kva element den høyrer til med å bruke ID-en til elementet.

Ein `<input>`, eller ein merkelapp, kan være forskjellige typar felt og knappar ein brukar kan samhandle med. Her er dei satt om som tekstfelt som er standardtypen for input. Dei har ein ID slik at merkelappane kan referer til dei. Passord-felta har `type="password"` som gjer at nettlesaren registrerer det som passord og skjuler teksten som er skreve i dei.

I slutten av skjemaet er det ein `<button>` med typen `submit`. Den sender inn skjemaet som vil kjøre `sendInn`-funksjonen som forklart tidligare.

Nederst i koden er det eit `<script>`-tag som henter inn JavaScript. `src`-attributtet seier kvar den finn JavaScript-fila. Ein kunne potensielt ha JavaScript-koden direkte i HTML-en under eit `<script>`-tag, men for oversikten sin del er det vanleg å ha separate filer for det.

### CSS

CSS er det som gjer at nettsider ser ut slik dei gjer. Alle nettlesarar har ein standard CSS, kalla User Agent Stylesheet, som gjer at alle elementa får passande stil utan at ein treng ei eiga CSS-fil. Det er allikevel vanleg at webutviklarar lager sin eigen CSS for å få det slik ein vil ha det.

-   [What is a User Agent Stylesheet? - GeeksForGeeks](https://www.geeksforgeeks.org/css/what-is-a-user-agent-stylesheet/)

Dette er stilarket eg har på applikasjonen over:

```css
p,
label {
	font-size: medium;
}

button,
select,
input {
	margin-bottom: 0.67em;
	font-size: medium;
}

form {
	padding: 0.5em;
	background-color: lightgrey;
	max-width: 400px;
}

.flex-column {
	display: flex;
	flex-direction: column;
	align-items: flex-start;
}
```

Du kjenner kanskje igjen fleire av taggane og klassen brukt i HTML-en. Dei er det ein kallar ein CSS-selektor, som seier kva element følgande stil skal gjelde på. Klassar har eit punktum forran namnet, som `.flex-column`, medan ID-ar har ein hashtag, tildømes `#passord-input`. Dette er for å differere mellom dei, då klassar og ID-ar kan ha samme namn som taggar.

Etter selektoren kjem erklæringane, stilane som skal bli lagt på elementa, inni krøllparantesar. Kvar erklæring består av ein egenskap og ein verdi, som `background-color: lightgrey;`. Ein selektor kan ha fleire erklæringar, og det kan være fleire selektorar, separert med eit komma.

```css
button,
select,
input {
	margin-bottom: 0.67em;
	font-size: medium;
}
```

Eg har satt at element med `button`-, `select`- og `input`-tagganne skal ha ein margin på `0.67em`, og skriftstørrelsen skal være `medium`. `em` er ein relativ eining som blir definert utifrå størrelesen på teksten i elementet. Å bruke `em` framfør piksler gjer at sida blir meir tilgjengelig, då den skalerer seg opp om nokon gjer skriftstørrelsen større. Eg har satt ein `margin-bottom` for å få avstand mellom elementa under slik at dei ikkje ligg heilt inntil kvarandre.

```css
form {
	padding: 0.5em;
	background-color: lightgrey;
	max-width: 400px;
}
```

Eg har gitt skjemaet `padding`, som gjer at element inni formen blir dytta innover i element, vekk frå kanten. Eg har og gitt ein bakgrunnsfarge for å visualisere kva element som høyrer til skjemaet. For at skjemaet ikkje skal strekke seg over heile skjermen har eg satt ein maksimum vidde på 400 pikslar. Det gir meir enn nok plass til innhaldet og er cirka vidden på mobiltelefonar, så det ser likt ut på alle enheter.

```css
.flex-column {
	display: flex;
	flex-direction: column;
	align-items: flex-start;
}
```

Med `flex-column`-klassen har eg satt at alle elementer med den klassen, uavhengig av kva element det er, skal ha desse stilane. Klassar blir mykje brukt i CSS når ein vil gi uniform stil til mange element på ei side.

`display: flex;` er ein artig sak ein kan gjere mykje med når det gjeld layout på sida. Med eigenskapane som følger med Flexbox kan ein lage ei fleksibel side som ser ut slik vi vil ha den. Det er for mykje under Flexbox til å forklare alt her, men eg skal forklare dei eigenskapane eg har brukt.

`flex-direction` sett kva rettning elementa i Flexboxen skal bli vist. Eg har brukt `column` for å vise dei under kvarandre, men det går og an å bruke `row` for å vise elementa etter kvarandre.

`align-items` seier kvar elementa i Flexboxen skal legge seg. Med `flex-start` skal dei legge seg i byrjinga på FLexboxen, som er venstresida i dette tilfellet.

### JavaScript

JavaScript er det som gjer applikasjonen dynamisk og som køyrer fetch-kalla til REST-API-et. Det er ein viktig del av applikasjonen, for utan den vil den ikkje få tilgang til endepunkta eg har laga.

Følgande JavaScript-kode er det eg har satt opp til no. Eg skal forklare koden under.

```js
let rolle = "administrator";

// Tilgjengeleg for testing
const adminToken = "strengMedBokstavarOgTall";
const brukarToken = "strengMedTallOgBokstavar";

function sendInn() {
	// Henter data frå skjemaet
	const formData = new FormData(document.getElementById("form"));

	// Lager eit objekt med innhaldet i skjemaet
	const entries = Object.fromEntries(formData.entries());

	if (entries.handling === "oversikt-brukarar") {
		fetch("/API/oversikt-brukarar.php", {
			method: "GET",
			headers: {
				"content-type": "application/json",
				X_TOKEN: rolle === "administrator" ? adminToken : brukarToken,
			},
		})
			.then((svar) => {
				return svar.json();
			})
			.then((svar) => {
				console.log(svar);
			});
	} else if (entries.handling === "opprett-brukar") {
		fetch("/API/opprett-brukar.php", {
			method: "POST",
			headers: {
				"content-type": "application/json",
				X_TOKEN: rolle === "administrator" ? adminToken : brukarToken,
			},
			body: JSON.stringify(entries),
		})
			.then((svar) => {
				return svar.json();
			})
			.then((svar) => {
				console.log(svar);
			});
	} else if (entries.handling === "endre-passord") {
		fetch("/API/administrer-brukar.php", {
			method: "PUT",
			headers: {
				"content-type": "application/json",
				X_TOKEN: rolle === "administrator" ? adminToken : brukarToken,
			},
			body: JSON.stringify(entries),
		})
			.then((svar) => {
				return svar.json();
			})
			.then((svar) => {
				console.log(svar);
			});
	} else if (entries.handling === "slett-brukar") {
		fetch("/API/administrer-brukar.php", {
			method: "DELETE",
			headers: {
				"content-type": "application/json",
				X_TOKEN: rolle === "administrator" ? adminToken : brukarToken,
			},
			body: JSON.stringify(entries),
		})
			.then((svar) => {
				return svar.json();
			})
			.then((svar) => {
				console.log(svar);
			});
	}
}

function byttHandling() {
	// Loggikk for dynamisk skjema kjem her
}

function byttRolle() {
	rolle = rolle === "administrator" ? "brukar" : "administrator";
	document.getElementById("tittel").innerText = "Hei, " + rolle + "!";

	if (rolle !== "administrator") {
		document.getElementById("handling").value = "endre-passord";

		// Fjerne alternativa for handlingar
		document.getElementById("handling").style.display = "none";
		document.getElementById("handling-brukar").style.display = "block";
	} else {
		// Legge til alternativa for handlingar
		document.getElementById("handling").style.display = "flex";
		document.getElementById("handling-brukar").style.display = "none";
	}
	byttHandling();
}
```

Den første linja i koden, `let rolle = "administrator";` sett ein variabel kalla `rolle` med teksten `administrator`. Det er for å halde styr på om klienten er administrator eller brukar.

Det neste skriptet gjer er å definere to konstantar, `adminToken`og `brukarToken`, slik at ein kan sende dei inn i fetch-kallet. Desse ville vert kopla til brukaren som er innlogga, men sidan applikasjonen ikkje har innlogging ligg dei er.

> Konstantar og variablar liknar på kvarandre men fungerer på litt forskjellig måtar. Konstantar blir satt med `const` og kan ikkje bli endra på seinare i koden. Som namnet tilseier er den konstant. Variablar blir satt med `let` eller `var`, og kan bli endra etter kvart i koden. Rollen til brukaren er noko som kan bli endra med `byttRolle`-funksjonen, mens tokens skal ikkje bli endra.

#### Send inn

Den første og viktigaste funkjsonen i skriptet er `sendInn`. Den skal bli køyrt når brukaren sender inn skjemaet til endepunktet. Som ein såg tidligare i HTML-koden blir den køyrt av `onsubmit`-hendinga på skjemaet.

Funksjonen startar med å hente informasjonen frå skjemaet i ein konstant kalla `formData`. For å bryte koden ned: `document.getElementById("form")` finner fram til skjemaet, sidan det har ID-en `form`. `new Formdata(...)` tar så å legg dette i eit format med felta og verdiane til skjemaet.

Skriptet tar `formData` og lager eit objekt frå oppføringane der, og plasserer det i `entries`. Nå kan skriptet enkelt få tilgang til informasjonen i frå skjemaet. Tildømes vil `entries.handling` vere kva handling som er blitt valgt i skjemaet.

No kjem den spennande delen. Ut i frå kva handling som er valgt skal forksjellige fetch-kall køyrast. Dette blir gjort med ein `if...else if`-settning. Kvar handling blir sjekka opp mot `entries.handling` og viss det er handling som blir valgt blir det skriptet køyrt.

Fetch-kalla er veldig like, så eg treng ikkje å gå over alle, men skal forklare korleis dei fungerer. `fetch()` henter eller sender data til ei adresse, i dette tilfellet endepunktet ein brukar.

Dataen som blir sendt består av tre deler: `method`, `headers`, og `body`.

Metoden er den relevante metoden som endepunktet treng.

Headers er informasjon om dataen som blir sendt som `content-type` som forklarer kva type data det er. Her er det JSON, så den er satt til `applicationn/json`. Token blir og sendt her i form av `X_TOKEN`. Kva token som blir sendt er bestemt frå kva rolle som er valgt.

Dette blir køyrt gjennom ein "ternary"-operator. Den er eit alternativ til `if...else` og tar tre operander: Ein betingelse fulgt av eit spørsmålstegn `?`, eit uttrykk for kva som skal skje viss betingelsen er sann fulgt av ein kolon `:`, og til slutt eit uttryk for om betingelsen er usann. Når dette blir satt som del av ein konstant, variabel eller i dette tilfellet ein header blir headeren satt til eit av dei uttrykka. Her dåå bli `X_token` enten satt til `adminToken` eller `brukarToken` ut i frå aktiv brukar.

Body er sjølve innhaldet i forespørselen og inneheld relevant informasjon. Her blir `entries` gjort om frå eit objekt til JSON med hjelp av `JSON.stringify()`. Merk at `oversikt-brukarar` ikkje har noko `body` då `get`-metoden ikkje treng noko `body`.

`fetch` returnerer ein lovnad som blir fullført når svaret er tilgjengeleg. Det er og ein asynkron-funksjon, noko som betyr at resten av skriptet fortsetter med å køyre mens fetch-kallet venter på eit svar. For å vente på det svaret må det leggast i ein `.then()`.

Når svaret kjem tilbake frå serveren kjører skriptet ein pilfunksjon (`() => {...}`) der `svar` representerer svaret frå serveren. Vi vil ha svaret i JSON-format, så må kjøre `svar.json()` som blir returnert som ein ny lovnad.

Når svaret frå `svar.json()` kjem kan vi gjere ting med svaret frå serveren. Det er som regel berre ein beskjed om at handlingen var vellykka eller eventuelle feilkodar, med unntak av `oversikt-brukarar` som returnerer ein tabell frå databasen. Til nå har eg berre lagt `svar` i ein `console.log()` som viser svaret i konsollen i nettlesaren. Eg skal komme tilbake og gjere meir med det seinare.

#### Bytt handling

Denne funksjonen er ikkje blitt utvikla endå. Det den skal gjer er å få skjemaet til å bli dynamisk ut i frå kva handling som er valgt. Eg kjem tilbake til det.

#### Bytt rolle

Denne funksjonen blir brukt for å bytte rollen til brukaren. Det er berre for testgrunnar, då applikasjonen ikkje har innlogging av brukar.

Det første funksjonen gjer er å bytte `rolle`-variabelen til den ikkje-aktive rolla. Dette blir gjort med ein ternary. Viss `rolle` er `"administrator"` blir den satt til `"brukar"` og motsatt.

Om brukaren ikkje er administrator skal ein berre få endre passord, ikkje dei andre handlingane. Dette blir gjhort med å sette handlingen til `"endre-passord"`, skjule alternativa, og i staden for vise ein tekst der det står Endre passord. Om brukaren bytter rolle igjen blir teksten fjerna og handlingane vist igjen.

Denne funksjonen køyrer og `byttHandling` for å oppdatere skjemaet for den nye rolla.

# Laurdag 21.6

## Dynamisk skjema

Skjemaet skal vere dynasmisk ut i frå kva handling som er valgt. Funksjonen `byttHandling` skal ta seg av å gøyme og vise relevante felt for den handlinga.

```js
const handling = document.getElementById("handling").value;
const epost = document.getElementById("epost");
const passord = document.getElementById("passord");
const nyttPassord = document.getElementById("nyttPassord");
const gjentaPassord = document.getElementById("gjentaPassord");
```

Først henter funksjonen dei relevante elementa som skal brukast i funksjonen. Sidan vi berre er interessert i verdien til nedtrekksmenyen `handling` treng vi berre å hente ut `value`.

```js
// Gøymer alle felta
epost.style.display = "none";
passord.style.display = "none";
nyttPassord.style.display = "none";
gjentaPassord.style.display = "none";
```

For å gjere det enkelt for funksjonen tar den å gøymer alle felta først. Merk at det er sjølve `div`-en som blir skjult, som inkluderer merkelappen og skrivefeltet.

```js
// Tar vekk at felta er nødvendige
epost.querySelector("input").required = false;
passord.querySelector("input").required = false;
nyttPassord.querySelector("input").required = false;
gjentaPassord.querySelector("input").required = false;
```

Den fjerner og `required` frå felta. Sidan `epost` osv. er divane må ein bruke ein `querySelector()` på den for å finne `input`-elementet. `querySelector()` fungerer slik at den går ned i barn-elementa til elementet den blir kalt på og via ein CSS Selektor returnerer det første elementet med den selektoren.

```js
// Opprett brukar
if (handling === "opprett-brukar") {
	epost.style.display = "flex";
	passord.style.display = "flex";
	gjentaPassord.style.display = "flex";

	epost.querySelector("input").required = true;
	passord.querySelector("input").required = true;
	gjentaPassord.querySelector("input").required = true;
}
```

Ut i frå kva handling som er valgt blir felta vist og satt til `required`, slik at skjemaet ikkje kan bli sendt inn utan at dei er fyllt ut. Dette er i utgongspunktet det same for alle handlingar, så eg legg berre ved resten av funkjsonen under.

```js
// Sjå alle brukarar
if (handling === "oversikt-brukarar") {
	// Treng ikkje gjer noko
}

// Endre passord
if (handling === "endre-passord") {
	epost.style.display = "flex";
	if (rolle !== "administrator") {
		passord.style.display = "flex";
		passord.querySelector("input").required = true;
	}
	nyttPassord.style.display = "flex";
	gjentaPassord.style.display = "flex";

	epost.querySelector("input").required = true;
	nyttPassord.querySelector("input").required = true;
	gjentaPassord.querySelector("input").required = true;
}

// Slett brukar
if (handling === "slett-brukar") {
	epost.style.display = "flex";

	epost.querySelector("input").required = true;
}
```

Med denne funksjonen blir skjemaet dynamisk og enkelt å bruke for brukaren då berre nødvendige felt blir vist. Det fine med å gjere det dynamisk med JavaScript er at felta fortsatt er der, så om brukaren held på å fylle ut skjemaet, men finn ut at den må bytte handling kan ein enkelt gjere det utan at felta blir viska ut og felt som blir brukt i samme handling blir der fortsatt utan å måttast fyllast ut på nytt.

# Sundag 22.6

## Jobbe heimefrå

Jobbe heimefrå
Eg valgte å jobbe heimefrå nokon dagar etter jobbtid og i helga. Ein fagprøve krever mykje arbeid og dokumentasjon av det arbeidet. Det var derfor nødvendig å ta i bruk helga i tillegg. I løpet av veka laga eg ein liten plan over kor mykje eg sku gjere i helga, men etterkvart blei det klart at denne planen var overambisiøs. Eg klarte rett og slett ikkje å halde fokuset oppe slik som eg ville.

Det er mange distraksjonar når ein jobbar heime i staden for på arbeidsplassen. For det første er det eit heilt anna "kontor"-oppsett. Eg har eit gaming-oppsett med to skjermar og tastatur, men gjekk heller for å bruke laptopen min. Det fungerte fint, men det var ikkje heilt det same som mus, tastatur, og breiskjerm som eg har på kontoret. Den bærbare datamaskina er mindre og har ein annan skjermoppløysing, som gjer det vanskelegare å sjå fleire dokument samtidig, noko som er viktig når eg arbeider med mykje tekst og kode.

Eg har ein HyperX-gamingstol, så det var ikkje så mykje å klage på komforten, men pulten min var litt liten og eg måtte ha armane mine oppå den varme laptoppen, så eg kunne ikkje støtte armane mine like komfortabelt. Dette sette ein del begrensningar på kor lenge eg klarte å halde fokus, då eg måtte ta fleire pausar som gjerne strekte seg lenger enn eg hadde tenkt.

Det er og ting som husarbeid og husdyr som ber om merksemd og mat som kjem og forstyrrar arbeidet mitt. Med ein katt som ofte vil ha oppmerksomheit, er det lite som skal til før eg blir distrahert. Katten min, Vissi, er veldig glad i å "hjelpe" meg ved å sette seg på tastaturet eller ligge midt på pulten, noko som gjer det endå meir utfordrande å konsentrere seg.

![Katt forstyrrer arbeidet](Bilder/vissi.jpg)

Det er mange som føretrekk å jobbe heime, og eg kan sjå kvifor det appelerer. Auka fridom, redusert reisetid, ein slepp å styre med parkering, og ingen kollegaer kjem og forstyrrar arbeidet med å banke på døra. Det gjer at mange kan føle seg meir produktive i eit heimekontor. For min del, derimot, er det for mange distraksjonar heime til at eg vil prioritere det. Eg lik noko av strukturen og samhaldet ein får frå å jobbe på arbeidsplassen saman med andre. Interaksjon med kollegaer gir energi, og det er lettare å holde fokus når ein er i eit miljø dedikert til arbeid.

Før eg vurderer å jobbe heime oftare, vil eg derfor sjå på måtar å minimere distraksjonar og kanskje lage eit meir tilpassa og komfortabelt arbeidsmiljø. Kanskje skulle eg investert i ein større pult og betre moglegheiter for å bruke det eksisterande utstyret mitt med laptopen for å gjenskape noko av den gode arbeidsopplevinga eg har på kontoret. Samtidig er det verdifullt å erkjenne mine eigne preferanser og behov når det kjem til arbeidshygiene, slik at eg kan finne den beste balansen mellom jobb og fritid.

# Måndag 23.6

## Verifisering av brukar

Til no har eg satt opp endepunktet for å håndtere verifisering av brukar med eingongskode, men eg har endå ikkje ein måte å lage og sende ut denne koden eller eit brukargrensesnitt for dette. Det er det eg skal lage no.

### Oppdatert endepunkt

I endepunktet for å opprette ein brukar legg eg ved følgande kode etter brukaren blir oppretta. Den generer ein eingongskode, legg den inn i databasen og sender ut ein e-post til brukaren om dette. Eller vertfall i teorien. Grunna eg ikkje har endepunktet på ein server med e-post-funksjon vil ikkje `mail()` sende ut nokon e-post. Eg har allikevel tatt det med i koden då det er meininga at den skal bli brukt slik.

```php
// Oppretter eingongskode med eit tilfeldeg 6-sifra tal
$kode = rand(100000, 999999);

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
        "Hei, du har fått ein brukar. Bruk den vedlagte lenkja for å verifisere deg. https://localhost:8000/verifisering/?id=$brukar_id[id]&eingongskode=$kode"
    );
    echo json_encode(["message" => "Brukar oppretta.", "mail" => "http://localhost:8000/verifisering/?id=$brukar_id[id]&eingongskode=$kode"]);
}
```

`rand(100000, 999999)` genererer eit tilfeldeg heiltal på 6 siffer som skal fungere som eingongskoden. Skriptet hentar så ID-en til brukaren slik at den kan bli brukt som referanse for eingongskoden i databasen. Begge deler blir lagt inn i databasen. Viss det var vellukka blir ein mail sendt ut til e-postadressa til den nyoppretta brukaren. Sidan mail ikkje fungerer slik det skal legg eg og lenkja i meldinga som blir sendt tilbake slik at eg kan teste at det fungerer.

### Brukagrensesnitt

Lenkja som brukaren får i e-post skal føre til ei side som verifiserer dei. Denne sida treng ikkje særleg mykje element eller stil, sidan det berre er eit midlertidig punkt mens brukaren blir verifisert. Det er noko interessant JavaScript som eg skal forklare etter på.

```html
<!DOCTYPE html>
<html lang="nn">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Verifisering</title>
		<link rel="stylesheet" href="../style.css" />
	</head>
	<body>
		<h1>Verifisering</h1>
		<script src="verifisering.js"></script>
	</body>
</html>
```

JavaScriptet tar Query Stringen frå URL-en som er lagt med i lenkja og sender dei med fetch-kallet til endepunktet. Når brukaren er verifisert sender den brukaren vidare til hovudsida, som i dette tilfellet er skjema-sida.

```js
const queryString = new URLSearchParams(window.location.search);

fetch("../API/verifiser-brukar.php", {
	method: "PUT",
	headers: {
		"content-type": "application/json",
	},
	body: JSON.stringify(Object.fromEntries(queryString.entries())),
})
	.then((svar) => {
		return svar.json();
	})
	.then((svar) => {
		if (svar.message) {
			const p = document.createElement("p");
			p.innerText =
				svar.message + " Sida vil bli viderekopla om få sekund.";
			document.body.appendChild(p);
			setTimeout(() => window.location.replace("../"), 5000);
		}
		if (svar.error) {
			const p = document.createElement("p");
			p.innerText = svar.error;
			p.style.color = "red";
			document.body.appendChild(p);
		}
	});
```

`new URLSearchParams` returner eit objekt frå Query Stringen i URL-en som eg vil sende i fetch-kallet. Men før det må eg gjere det om med `Object.fromEntries(queryString.entries())` for å få eit vanleg objekt. Dette kan eg då sende som JSON med `JSON.stringify()`.

Etter å ha gjort svaret om til JSON med `svar.json()` kan skriptet vise kva melding som kom tilbake. Det legg og på ein beskjed om at sida blir viderekopla om få sekund. Med `setTimeout()` kan skriptet køyre ein funksjon etter ei gitt tid. Her køyrer den ein pilfunksjon som sender ein til hovudsida med `window.location.replace("../")` etter 5000 millisekund, eller 5 sekund. Den bytter ut den nåverande banen med `../` som tar ein opp eit hakk.

Om det er kommen ein eventuell feilmelding tilbake frå serveren vil den bli vist i raud tekst.

## Vise svar frå endepunkt

I brukargrensesnittet for verifisering av brukar blir meldinga frå serveren lagt til for å gi brukaren ein bekreftelse på at verifiseringen blei utført, eller kvifor den ikkje blei det. Det same kan ein gjer med dei andre endepunkta. Koden blir veldig lik, berre utan at ein blir viderekopla.

```js
const svarMelding = document.getElementById("svarMelding");

/* Kode for fetching... */

if (svar.message) {
	svarMelding.innerText = svar.message;
	svarMelding.style.color = "black";
}
if (svar.error) {
	svarMelding.innerText = svar.error;
	svarMelding.style.color = "red";
}
```

Eg har lagt til `<p id="svarMelding"></p>` i HTML-en, slik at Javascriptet kan finne den og endre teksten i den ut i frå kva melding som kjem frå serveren. I motsetning til å legge til ein ny melding kvar gong blir den same teksten endra, noko som hindrar at det blir mange meldingar på rad som fyller opp sida.

### Tabell med brukarar

Endepunktet for oversikt av brukarar returnerer litt meir enn ein melding: den returner og data frå databasen. Denne dataen skal bli vist i ein tabell slik at ein kan lett få ein oversikt av brukarar. Dette er ein litt meir avansert prosess i JavaScript, då ein dynamisk legg til kor mange rader og kolonner ut i frå dataen ein får frå endepunktet.

```js
// Fjerner eksisterande tabell
if (document.getElementById("tabell")) {
	document.body.removeChild(document.getElementById("tabell"));
}
```

Først sjekker skriptet etter eksisterande tabell og fjerner den slik at ein ikkje får fleire tabellar om ein klikker fleire gonger på innsending av skjemaet.

```js
// Lage element til tabellen
const tabell = document.createElement("table");
const thead = document.createElement("thead");
const tr = document.createElement("tr");

tabell.id = "tabell";
```

Skriptet lager dei ulike delene til tabellen med `document.createElement()`. `tabell` er sjølfe tabellen, `thead` er headeren til tabellen, og `tr` skal bli den første rada i tabellen med kolonnenamna. Tabellen får og ID-en `"tabell"` slik at skriptet kan finne den og slette den om det blir køyrt igjen.

```js
// Lage tabellheader med alle nøkklane
for (const [nøkkel, verdi] of Object.entries(svar.data[0])) {
	const th = document.createElement("th");
	th.innerText = nøkkel;
	tr.appendChild(th);
}
// Legge tabellheader inn i tabellen
thead.appendChild(tr);
tabell.appendChild(thead);
```

For å lage sjølve cellene i tabell-headeren kan skriptet bruke ein `for`-loop. Sidan `svar.data` er ein array med fleire objekt i seg kan eg legge `[0]` bak for å få det første objektet, og ut i frå det objektet kan vi få nøkklane og verdiane til dataa frå svaret. For-loopen går då gjennom kvart par av nøkkel og verdi og lager ein `th`, ei celle til tabell-headeren, for kvar nøkkel og legg den til rada. Etter å ha gjort det for alle cellene blir rada lagt til i headeren og headeren lagt til i tabellen.

```js
// Tabell body
const tbody = document.createElement("tbody");

// Lager ny rad for kvart element
svar.data.forEach((element) => {
	const tr = document.createElement("tr");

	// Lager celler for kvar verdi
	for (const [nøkkel, verdi] of Object.entries(element)) {
		const td = document.createElement("td");
		td.innerText = verdi;
		tr.appendChild(td);
	}

	tbody.appendChild(tr);
});

// Legge tabell body inn i tabellen
tabell.appendChild(tbody);

// Legge tabellen på sida
document.body.appendChild(tabell);
```

I tabellkroppen skal det vere fleire rader, ei for kvar brukar. Sidan `svar.data` er ein array kan skriptet loope gjennom det med ein `forEach()`-loop som går gjennom kvar oppføring i arrayen, der `element` representerer oppføringa. Kvar oppføring får si eiga rad, represntert av `tr`. Likt som med headeren går for-loopen gjennom kvart par med nøkklar og verdiar, lager ei celle `td` med verdien, og legg den til rada. Rada blir lagt inn i tabellkroppen og `forEach()`-loopen startar om igjen med neste. Når den er ferdig med alle blir tabell kroppen lagt inn i tabellen og tabellen til slutt lagt til på sida.

#### CSS

Utan CSS ser ikkje tabellen noko særleg fin ut og det er vanskeleg å lese av data frå den. Med CSS blir det straks enklare å sjå kva data høyrer til kor, og tabellen ser mykje betre ut.

```css
table {
	border: 2px solid rgb(140 140 140);
	border-collapse: collapse;
	font-family: sans-serif;
	letter-spacing: 1px;
}

thead {
	background-color: rgb(228 240 245);
}

th,
td {
	border: 1px solid rgb(160 160 160);
	padding: 8px 10px;
}

td:last-of-type,
td:first-of-type {
	text-align: center;
}

tbody > tr:nth-of-type(even) {
	background-color: rgb(237 238 242);
}
```

På sjølve tabellen sett eg ein kant, eller `border`, på 2 pikslar og ein grå farge med `rgb(140 140 140)`. `rgb()` blir brukt til å lage fargar ut i frå andelen raudt, blått og grønt det er i fargen på ein skala frå 0 til 255. Sidan alle verdiane er like og ca. midt mellom 0 og 255 blir fargen grå. Kanten er og satt som solid, i motsettning til stippla eller noko anna. `border-collapse: collapse` gjer at kantane slår seg saman. Hadde dei ikkje det ville kvar enkel celle ha kvar sin kant, noko som får det til å bli dobble kantar som ikkje ser så fint ut. Tekst-fonten blir satt til sans-serif for å passe betre inn med resten av sida, og for å gjer teksten enklare å lese får kvar bokstav eit mellomrom på 1 piksel.

Tabellheaderen får ein lys blå bakgrunnsfarge for å skille den frå resten av tabellen.

Cellene `th`og `td` får ein tynnare, litt lysare kant for at kanten rundt tabellen skal skille seg meir ut. Dei får og `padding`, der sidene er på 10 pikslar og topp og botn er 8 pikslar. Dette er for å gi teksten god plass å puste på.

Cellene i den første og den siste kolonna er tal og sjår betre ut når dei er plassert i midten. Dette kan gjerast med ein `text-align: center`. `first-` og `last-of-type` setter dette på den første og den siste i rada.

For å gjere det enkalre å skille mellom rader kan ein putte ulik bakgrunnsfarge på nokon av radene. Her er det satt ein lys grå farge på annan kvar rad. Med `nth-of-type(even)` får ein det på alle partalsrader. `tbody` satt først fordi det berre skal gjelde på radene i tabellkroppen.

Med alt dette får vi då ein tabell som ser slik ut:|

![Tabell](Bilder/tabell.png)

## Swagger-dokumentasjon

Swagger er eit open-source rammeverk og spesifikasjonar for å beskrive, bygge, dokumentere og bruke REST-API-er. Det gir utviklarar verktøya dei treng fro å enkelt lage og forstå API-er. Swagger spesifikajonen gir ein standarisert måte å beskrive API-er på. Den bruker OpenAPI Specification (OAS) format som er basert på JSON eller YAML, og inneheld all informasjon om API-et som endepunkt, HTTP-metodar, parameterbeskrivingar, forventa svar og feilkodar og meldingar.

Swagger gjør det enkelt å generere dokumentasjon for API-er. Når utviklarar skriver spesifikasjonen kan det automatisk genereras ein interaktiv dokumentasjon som brukarar kan navigere i og teste direkte gjennom eit web-grensesnitt. Dette kan være nyttig for både API-utviklarar og klientar som ønsker å forstå korleis API-et fungerer.

Swagger UI er et av dei mest kjente verktøyet i Swagger-økosystemet. Det gir eit visuellt og interaktivt grensesnitt der brukarar kan utforske API-et, sjå tilgjengelige metodar og teste forespørslane direkte. Dette gjør det enklare for utviklarar og andre interesserte å forstå API-et utan å måtte dukke inn i kildekoden.

Eg har lagt til Swagger på sida for å dokumentere og visualisere korleis API-et fungerer. Med å laste ned Swagger UI frå Swagger sin GitHub og legge den til får eg eit raskt og enkelt brukargrensesnitt med oversikt over alle endepunkta, korleis ein brukar dei og dei ulike svara ein kan få. For å få dette brukargrensesnittet må eg konfigurere ei

Eg har brukt ei YAML-fil for å generere Swagger-dokumentasjonen. Det er mykje informasjon i den og eg skal ikkje gå gjennom heile, men eg skal forklare kva koden gjer og korleis koden ser ut for eit av endepunkta.

```yaml
openapi: 3.0.0
info:
    title: Brukar API
    description: API for administrasjon av brukarkontoar
    version: 1.0.0
servers:
    - url: http://localhost:8000/

components:
    securitySchemes:
        XToken:
            type: apiKey
            name: X_TOKEN
            in: header

security:
    - XToken: []

paths: // Her kjem endepunkta
```

`openapi` angir kva versjon av OpenAPI-spesifikasjonen som blir brukt.

Under `info` blir metadata om API-et lagt til. Underkatergoriane her er tittel, beskrivelse og versjon av API-et. Denne informasjonen blir vist øvst på Swagger-sida.

`servers` er kva serverar API-et er tilgjengelig på. Her er det berre definert `localhost`, då eg køyrer API-et lokalt.

Under `components` er det lagt til eit sikkerheitsskjema. I dei fleste endepunkta treng ein å ha vedlagt ein token for å verifisere at ein har tilgang til endepunkta. Det blir lagt til her, slik at ein kan teste API-et om ein har tokenen. Skjemaet `XToken` har typen `apiKey` for å vise at det er ein API-nøkkel, namnet `X_TOKEN` då det er det som er definert i API-et og blir lagt til i headeren.

`security` spesifiserer at `XToken` er nødvendeg for endepunkta i foresørselen. Brukaren vil få opp eit felt i Swagger-dokumentasjonen for å legge dette til.

Under `paths` vil dei ulike endepunkta kome med sine beskrivelsar og parameter. Eg skal demonstrere med endepunktet for å opprette brukar.

```yaml
/API/opprett-brukar.php:
    post:
        summary: Opprett ein ny bruker
        description: Oppretter ein ny brukerkonto.
        requestBody:
            required: true
            content:
                application/json:
                    schema:
                        type: object
                        properties:
                            epost:
                                type: string
                                example: "brukar@eksempel.com"
                            passord:
                                type: string
                                example: "sikkertPassord"
                        required:
                            - epost
                            - passord
        responses:
            "201":
                description: Brukaren blei oppretta
            "400":
                description: Ugyldige inputdata
            "403":
                description: Ugyldig token
            "500":
                description: Serverfeil
```

`/API/opprett-brukar.php` er banen til endepunktet ut i frå serveren som er angitt tidligare i koden. Den komplette banen her vil bli `http://localhost:8000/API/oversikt-brukarar.php`.

`post` indikerer at denne banen er til `POST`-metoden. Som sagt tidlegare blir post brukt til å sende data til server og opprette nye ressursar. Ein kan ha fleire HTTP-metodar under ein bane så lenge dei er forskjellege, som `put` og `delete` under `/API/administrer-brukar.php`.

`summary` gir ein kort oppsummering av kva endepunktet gjer, mens `description` gir ein litt meir detaljert beskriving av funksjonen til endepunktet.

Å opprette brukar treng ein `requestBody` då ein skal legge til ein brukarkonto ut i frå innhaldet i kroppen. Den er satt `required` til sann då den er nødvendeg for å kunne sende forespørselen.

Inni `content` blir innhaldet definert. `application/json` spesifiserer at innhaldet skal være i JSON-format. `schema` definerer strukturen for JSON-en.

Innhaldet er eit `object` definert av typen. `properties` definerer kva eigenskaper, eller felt, som objektet kan ha. Her er det lagt til `epost` og ` passord` då det er dei felta som trengst for å opprette ein brukar. Eigenskapane er og gitt ein type og eit eksempel som kan hjelpe brukaren å forstå kva som er meininga å putt inn der.

`responses` angir kva svar klienten kan forvente å få frå serveren. Kvart svar har ein statuskode og ei beskriving om kva som har skjedd. `201`er responskoden for "Created", då det gir beskjed om at brukaren er blit oppretta.

For å legge til Swagger UI gjekk eg inn på [GitHub-sida for Swagger UI](https://github.com/swagger-api/swagger-ui), gjekk inn på siste versjon og lasta ned zip-fila. Etter å ha pakka den ut gjekk eg inn i dist-mappa og kopierte innhaldet der inn i mappe strukturen. I `swagger-initializer.js` måtte eg endre `url` til banen til YAML-fila mi.

Då får eg dette brukargrensesnittet her som fint visualiserer endepunktet:

![Swagger UI](Bilder/swagger.png)

# Tysdag

## Pass på at e-post er gyldig

Sidan e-postadressa blir brukt til å sende ut lenkje til validering er det viktig at e-postadressa som blir lagt inn faktisk er i gyldig format. Dette kan ein sjekke med `filter_var()` i PHP. Eg legg inn e-postadressa som er sendt inn og filteret `FILTER_VALIDATE_EMAIL` for å sjekke at det er rett i rett format. Om e-posten ikkje er gyldig blir det sendt ein feilmelding.

```php
// Sjekk om epost er i gyldig format
if (!filter_var($data["epost"], FILTER_VALIDATE_EMAIL)) {
    http_response_code(400); // Bad Request
    echo json_encode(["error" => "E-postadresse må være i gyldig e-post format."]);
    exit();
}
```

Denne koden blir lagt til i endepunktet for oppretting av brukar.

## Test av applikasjon

Eg skal utføre ein test av applikasjonen for å sjekke at den og API-et virker som den skal. Eg planlegg å køyre tre testar:

-   Ein som administrator der eg oppretter ein brukar, henter oversikt over alle brukarar, endrer passord på brukaren, og til slutt sletter brukaren.
-   Ein som ny brukar som har fått tilsendt ein verifiseringsmail, verifiserer seg, og endrer passordet sitt.
-   Ein som ein brukar utan tilgong, som prøver å få uautorisert tilgong.

Målet med desse testane er å demonstrere korleis applikasjonen fungerer for ulike brukarar og kva funksjonalitet den har. Den er og meint for å finne svakheiter i koden som evntuelle angriparar vil prøve å utnytte.

> Knappen "Bytt rolle" er tilstades på sida for testårsakar. Faktisk ute i produksjon ville jo ikkje den vert der.
>
> Som forklart tidligare er det ikkje noko innlogging på denne sida, og derfor inga måte å sette brukar på ut i frå det. Dette gjer jo at sida ikkje er sikker, men det er opp til dei som skal ta i bruk dette systemet å innføre sitt eige innloggingsystem. På HVL brukar vi Microsoft-innlogging, og viss vi sku tatt i bruk dette systemet ville det vært naturleg å innplementere det. Det blir då unaturleg å ha eige innlogging på denne sida.

### Utførelse

#### Administrator

Som administrator har ein tilgong til alle dei forskjellege endepunta i API-et. Ein administrator kan opprette og slette brukarar, samt endre passord om det sku være nødvendeg. Administrator kan og få ein oversikt over alle brukarane.

Når eg kjem inn i applikasjonen blir eg møtt av ein velkomstmelding og skjemaet som ber meg om å velge ei handling. Send-knappen er og framme, og eg byrja å lure på om eg kan sende inn utan å velge handling. Eg testar.

![Brukargrensesnitt](Bilder/Test_1.png)

Ingen respons. Etter å ha sjekka i både konsollen og nettverk tyder alt på at ingenting har skjedd. Ein kjapp kikk i kildekoden viser at ingen kall blir køyrt når handling er tom. Det kan være ein ide å legge til ei melding der.

Eg går vidare med å velge handling. Då får eg dei fire valga som korresponderer med dei fire endepunkta. Eg velg "Sjå alle brukarar" for å teste det. Den krev ingen input, så eg berre trykkar send.
Eg får då ein melding der det står "Oversikt henta." og ein fin tabell med alle brukarane.

![Oversikt brukarar](Bilder/Test_2.png)

Alt bra så langt. Eg vil no opprette ein ny brukar kalla "test@fagprøve.no". Eg velg "Opprett brukar" i lista over handlingar. Eg får då opp tre felt med namna "E-post", "Passord" og "Gjenta passord". Eg fyller dei ut, men "gløymer" å legge til rett e-post. Gjenta passord matcher heller ikkje med passord. Eg sender inn.

![Gløymd @](Bilder/Test_3.png)

Her får eg opp ein feilmelding med at "E-post" manglar @. Dette skjer fordi feltet er satt til typen `email`. Hadde den ikkje vert det ville skjemaet blitt sendt inn, men eg hadde fått ein feilmelding tilbake at eposten ikkje var gyldig, då eg har satt inn ein sjekk på det på serversida i tillegg.

Eg legg inn rett e-postadresse, men har fortsatt ikkje fiksa "Gjenta passord". Eg får sjå korleis det går. Eg sender inn igjen.

![Ikkje like passord](Bilder/Test_4.png)

Eg fekk ein tilbakemelding om at brukaren var blitt oppretta. Det er ikkje heilt bra. Det er ikkje lagt inn noko sjekk på om passorda er like. Det er ikkje veldig kritisk då det er mest for brukaren si eiga del slik at ein skal huske passordet betre, men det burde vert lagt inn. Det er noko eg må sjå på seinare. Brukaren blei jo oppretta, så det er jo bra. Eg hentar tabellen igjen og sjekkar at den ligg der.

![Uventa domene](Bilder/Test_5.png)

Der fekk eg ei lita øverrasking. Sjølv om eg skreiv `test@fagprøve.no` blei det satt `test@xn--fagprve-u1a.no`. Eg mistenkjer at det har noko med Ø-en å gjere, og etter litt feilsøking finn eg problemet: Felt med typen `email` tillat ikkje spesielle karakterer som Ø. Når typen er `text` går det heilt fint med spesialkarakterer. Den enklaste fiksen på dette er å endre typen til tekst. Eg har verifisering med at e-posten er ein gyldig e-postadresse på serveren, så det skal ikkje skape nokon problemer. Eg endrer feltet til typen tekst og fortsett med det framover i testen slik at ein skal sleppe slike feil.

Etter å ha slette brukaren med den spesielle e-epostadressa prøver eg å legge til `test@fagprøve.no` igjen. Eg får då feilmelding frå serveren om at "E-postadresse må være i gyldig e-post format." Tydelegvis er dette ein ting med `filter_var()` og.

![Ugyldig format](Bilder/Test_6.png)

Då må eg berre insjå realiteten og bruke `test@fagprove.no` i staden for. Det er jo ikkje vanleg at domener har spesialkarakterer i utgongspunktet så det er ein veldig logisk ting.

![Oppretta brukar](Bilder/Test_7.png)

Fortsatt så er ikkje "Passord" og "Gjenta passord" like, men det er eit vedvarande problem eg får fikse etterpå.

No vil eg endre passordet på `test@fagprove.no`. Det kan jo hende at brukaren har gløymd passordet sitt eller noko anna har skjedd som krev at administrator sett eit nytt eit. Eg legg då inn eit nytt passord og sender det inn.

![Endre passord](Bilder/Test_8.png)

Flott! Passord er endra og brukaren kan ta i bruk det nye passordet. Neste punkt på lista er å slette ein brukar. Eg vil prøve å slette `test@fagprove.com` (som ikkje finnst) og sjå kva som skjer då.

![Slette feil brukar](Bilder/Test_9.png)

Eg får beskjed om at denne ikkje-eksisterande brukaren er sletta. Det er litt uheldeg, då den ikkje kan ha blitt sletta. Eg trudde eg hadde lagt inn sjekk om brukarkontoen finnst først, men tydelegvis er det ikkje satt inn rett. Eg må sjå meir på dette seinare.

Eg vil fortsatt slette den faktiske brukaren `test@fagprove.no`, så eg skriv det inn i feltet og sender inn. Eg får beskjed om at brukaren er sletta, og eg sjeker tabellen igjen og sjår at det er den.

![Tabell](Bilder/Test_10.png)

Då var eg ferdig å teste som administrator. Eg er ikkje fornøyd med kor mange hòl eg fann i koden min. Eg var jo klar over at det ikkje var noko sjekk på "Gjenta passord", men at e-post ikkje kan ha spesiallkarakterar og at ein kan slette ikkje-eksisterande brukarar var eg ikkje klar over. Eg må sjå om eg får tid til å fikse desse feila.

#### Brukar

Ein administrator har oppretta ein brukar for `brukar@fagprøve.no` som har fått ein epost med denne lenkja: `http://localhost:8000/verifisering/?id=3&eingongskode=727273`. Eg skal no gå gjennom korleis det vil sjå ut for ein brukar å verifisere seg og endre passordet sitt.

Viss brukaren gløymer ein del av adressa, tildømes eingongskoden, vil den få denne skjermen når ein prøver å verifisere seg:

![Eingongskode påkrevd](Bilder/Test_11.png)

Sku brukaren legge inn feil eingongskode eller ID vil ein få beskjed om at ein har ugyldig eingongskode eller ID.

![Ugyldig](Bilder/Test_12.png)

Dette er jo ikkje ting som skal skje fordi det er meint at brukaren berre skal trykke på lenkja dei får i e-post og bli tatt direkte til sida der ein blir verifisert.

![Verifisert](Bilder/Test_13.png)

Då blir brukaren tatt med vidare til hovudsida og vil no dukke opp som verifisert i databasen.

Neste brukaren skal gjere er å endre passordet sitt. For å gjere dette sjølv må brukaren huske det gamle passordet sitt som ein verifisering på at dei er den dei seier dei er. Brukaren blir møtt av skjemaet for å endre passord og får ikkje moglegheita til å bytte handling. Brukaren fyller ut felta sine, men gløymer å legge inn det gamle passordet. Dei får då beskjed om å fylle ut det feltet sidan det er satt som `required` og må fyllast ut for å kunne sende inn skjemaet.

![Fyll ut](Bilder/Test_14.png)

Brukaren fyller så ut det gamle passordet sitt i tillegg til det nye passordet, og får då endra passordet sitt.

![Passord satt](Bilder/Test_15.png)

Dette er det vanlege brukarar kan gjere i denne applikasjonen. Sidan målet er administrering av brukarar er jo det realistisk at brukarar ikkje har så mykje handlingar utover å endre passord.

#### Uvedkomen

Ein uvedkomen brukar har jo ikkje noko rollem så då har den heller ingen token, og skal i utgangspunktet ikkje ha tilgong til sida, men i dette scenarioet har den fått det. For å simulere dette må eg fjerne ein del ting i koden som er der for test-årsakar, då dette ikkje er ein vanleg test.

Eg sett `rolle` til ingenting, då den uvedkommne ikkje har nokon rolle. Eg tar og vekk tokenane sidan dei ikkje har tilgong til det. Til slutt tar eg vekk `byttRolle()`-funksjonen sidan det heller ikkje skal gå an.

Då prøver eg å trenge meg inn på sida. Blant anna får eg endre handling, då den berre er skjult på klientsida. Eg får og vist alle felta sjølv om dei skal være skjult med å berre endre stilen i klienten

![Uvedkommen](Bilder/Test_16.png)

Eg prøver å hente ut oversikt over alle brukarane, men då eg trykker send inn blir sida berre lasta inn på nytt utan at noko har skjedd. Etter å snoke litt i kjeldekoden ser eg at det stoppar på grunn av `X_TOKEN` krever `adminToken` eller `brukarToken`, men sidan ingen av dei er satt så krasjer programmet.

![Mangler token](Bilder/Test_17.png)

Eg prøver å ta vekk kravet om `X_TOKEN` og sende inn, men får tilbake "Ugyldig førespurnad" når eg sender inn. Det ser ut som serveren blokkerer det sidan det mangler `X_TOKEN`. Då må eg prøve å lage min eigen token. Eg sett `X_TOKEN` til `"minFineToken"` og sjår om det fungerer. Eg får då feilmelding om "Ugyldig token." Det ser ut som serversida er for sikker for dette.

![Ugyldig token](Bilder/Test_18.png)

Eg prøvar ein annan vinkel: å gå rett til `/API/oversikt-brukarar.php`, men her og får eg berre ein feilmelding i JSON-format: `{"error":"Ugyldig f\u00f8re\u00adspurnad"}`. Utan token kjem eg ingen plass.

Med dette konkluderer eg testen min som ein uvedkomen. Etter mine beste hackar evner klarte eg ikkje å trenge gjennom. Sikkerheit med token var rett og slett for sikker for meg. Eg skal ikkje utelukke at andre med meir tid og meir erfaring kunne trengt seg inn, men konklusjonen med denne testen er at sida er sikker nok når ein tar vekk elementa for testing.

## Konklusjon

Eg vil sei testen var ein suksess. Sjølv om det var nokon "bugs" og hòl i koden har eg no fått betre oversikt over kva som må fiksast, og alle problema er ikkje-kritiske feil som koden kan overleve.

Angrepet mitt på applikasjonen var og mislukka, noko som eg sjår på som ein suksess. At angriparar ikkje får tilgong til API-et betyr at eg har sikra koden på ein god måte.

# Vedlegg

[Timelogg](Logg.md)

[Brukarveiledning](../readme.md)

GitHub repository for heile prosjektet: [https://github.com/TheVebis/Fagprove-IT-utvikling](https://github.com/TheVebis/Fagprove-IT-utvikling)
