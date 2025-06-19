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
$dsn = 'sqlite:' . dirname(__DIR__) . DIRECTORY_SEPARATOR . './database.sqlite3';
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

`$dsn = 'sqlite:' . dirname(__DIR__) . DIRECTORY_SEPARATOR . './database.sqlite3';`

Koden begynner med å definere ein variabel `$dsn`, som skal spesifisere banen til databasen.

`sqlite:` indikerer at det er ein SQLite-database.

`dirname(__DIR__)` hentar banen til mappa over den noverande mappa.
`DIRECTORY_SEPARATOR` gir den riktige mappa-separatoren for operativsystemet (til dømes / for Unix, \ for Windows).

Resultatet av denne koden blir ein fullstendig bane til SQLite-databasen `database.sqlite3` som ligg i ei overordna mappe. Dette er nødvendig då denne fila ligg i ei undermappe i prosjektet.

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

For å forsikre seg at ikkje kven som helst kan bruke APIet og byrje å opprette og slette brukarar sett eg inn sikkerheit med hjelp av ein token. I headers som blir sendt inn skal det være ein X_TOKEN som blir lest og sjekka opp mot gyldige tokens.

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

![Fetch-kall](Bilder\fetch_kall.png)

## Opprette brukar

Eit av endepunkta til APIet er at ein skal kunne opprette brukarar i databasen.

```php
// Kjør tokenautentisering
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'inkluderer/autentisering.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Hent data frå føre­spurnaden
    $json = file_get_contents("php://input");
    $data = json_decode($json, true);

    // Sjekk at data, brukarnamn og passord er satt
    if (!empty($data)) {
        if (!empty($data["epost"]) && !empty($data["passord"])) {
            // Lag databasen om den ikkje finst
            require_once 'lag-database.php';

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

`require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'inkluderer/autentisering.php';`
køyrer autentiseringscriptet eg satt opp tidligare. Det passer på at føre­spurnaden har eit gyldig token.

`$_SERVER["REQUEST_METHOD"] === "POST"`
sjekker om metoden til føre­spurnaden er satt til POST. Det betyr at skriptet skal legge til noko nytt i databasen

```php
$json = file_get_contents("php://input");
$data = json_decode($json, true);
```

Denne koden henter så ut innhaldet i føre­spurnaden og dekoder det frå JSON til object som PHP forstår.

#### JSON

> JSON (JavaScript Object Notation) er eit av dei mest brukte formata å strukturere og sende data mellom ulike programmeringsspråk og mellom klient og server. Det er lett for både menneske og maskinar å lese og skrive det, og har brei støtte blant programmeringspråka. Formatet er og veldig kompakt som hjelp med å redusere bandbredde og lastetid i applikasjoner og nettstader.
>
> Her bruker eg det for å sende data som APiet treng for å opprette brukarkonto: e-postadresse og passord.

`!empty($data)` og `!empty($data["epost"]) && !empty($data["passord"])` sjekkar om det faktisk er innhald i føre­spurnaden, og om det er innhaldet endepunktet treng.

`$hash = password_hash($data["passord"], PASSWORD_DEFAULT);` hashar passordet. Det andre parameteret i `password_hash`, er kva algoritme den skal bruke. Eg har brukt `PASSWORD_DEFAULT` som bruker bvcrypt algoritmen for hashing og er den PHP anbefaler.

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

> SQL-injeksjon går ut på at brukaren sender inn SQL-kode som har som mål å kjøre i databasen, som f.eks. å slette ein tabell. Den gjer det med å avslutte den gjeldane spørringa og starte ei ny som brukaren har laga.
>
> ![Exploits of a Mom](https://imgs.xkcd.com/comics/exploits_of_a_mom.png)
>
> -https://xkcd.com/327/

### Feilmeldingar

Eg innsåg det kunne være ein ide å legge til feilmeldingar i koden for ein betre brukaropplevelse og gjer det enklare å feilsøkje. Eg gjor dette med `http_response_code` og å sende ein feilmelding tilbake, ikkje ulikt det eg gjor med token-autentiseringa. Eg snudde og litt rundt på if-statements for at koden sku bli meir oversikteleg. Då fekk eg følgande kode:

```php
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
        echo json_encode(['error' => 'E-postadresse og passord er påkravd.']);
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
```

`try {...} catch {...}` er og satt inn då skriptet prøver å legge til ein brukar i databasen. Om det sku oppstå ein feil, som at ein brukar med same epost-adresse blir forsøkt å legges til, vil forsøket mislykkast og feilmeldinga fanga opp av `catch`

Når eg no prøvar å kjøre eit fetch-kall inn mot APIet får eg forventa resultat.

Fetch-kall brukt under testing:

```js
fetch("/API/opprett-brukar.php", {
	method: "POST",
	headers: {
		"content-type": "application/json",
		X_TOKEN: "87y90br8732gf97f2121hfdkl8i",
	},
	body: JSON.stringify({
		epost: "eksempel@fagprøve.no",
		passord: "Passord123",
	}),
});
```

-   Sendar eg eit kall utan `body` eller manglar epost eller passord, får eg ein 400 melding om at eg manglar data.

-   Sendar eg fullstendeg fetch-kall med alt som skal med får eg ein 201-melding tilbake med at brukaren er oppretta.

-   Sender eg same kallet på nytt får eg ein 500-melding (internal server error) med følgande feilmelding:

    > Databasefeil: SQLSTATE[23000]: Integrity constraint violation: 19 UNIQUE constraint failed: brukarkontoar.epost

    Dette skjer fordi det finst allereie ein brukar med epost `eksempel@fagprøve.no`

# Torsdag 19.6

## Laste opp på GitHub

Eg blei råda av Terje Rudi å ta backup av prosjektet mitt på GitHub, då det ville vere veldig kjipt om noko sku gå gale og alt arbeidet mitt blei sletta. Med GitHub har eg og ein versjonslogg, så om noko sku gå gale i programmet så kan eg gå tilbake til ein tidligare versjon.

### Kva er GitHub?

Som eg skreiv i planlegginga mi er GitHub ein plattform for utviklarar som brukast til å lagra, administrere og dele kodeprosjekt.

//TODO: Skrive meir om GitHub.

### Laste opp på GitHub med VS Code

I Visual Studio Code, som er verktøyet eg bruker for å skrive koden min, er det integrert GIT Source Control som gjer det enkelt å laste opp prosjekt-mappa i eit GitHub-repository. Vidare får eg oversikt over endringar sidan forige commit, moglegheita å commite dei endringane, og få ein oversikt over dei forskjellege versjonane.

Hadde eg hatt fleire utviklarar med meg kunne dei ha lagd branches og seinare sendt pull requests med den nye koden utan at eg blir forstyrra i arbeidet mitt av endringar.

Så med Source Control i VS Code var det berre å trykke på nokon knappar, logge meg inn på GitHub, og vipps så har eg koden min oppe på GitHub.

![GitHub](Bilder/GitHub.png)

## Administrasjon av brukar

Eit av endepunkta til REST-APIet er at ein skal kunne administrere brukarar. Då er planen min at ein skal kunne endre passord, sette nytt passord og slette brukaren.

Eg kopierer ein del av koden frå opprett brukar-endepunktet då mykje av prosessen er den same.

```php
// Kjør tokenautentisering
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'inkluderer/autentisering.php';

if ($_SERVER["REQUEST_METHOD"] === "PUT") {
    // Hent data frå forespørselen
    $json = file_get_contents("php://input");
    $data = json_decode($json, true);

    // Sjekk at data er satt
    if (empty($data)) {
        http_response_code(400); // Bad Request
        echo json_encode(['error' => 'Ingen data mottatt.']);
        exit();
    }

    // Lag databasen om den ikkje finst og få tilgang til den
    require_once 'lag-database.php';

    try {
        // Sett ny brukar inn i databasen med epost og hasha passord
        $sth = $dbh->prepare(

        );

        if($sth->execute()) {
            http_response_code(); //
            echo json_encode(['message' => '']);
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
```

//TODO Fikse litt kommentarar i eksempelkoden

Det første eg lagar er å prosessen for å endre passord. Det er to måtar å endre et passord på:

-   Brukar endrer passordet sjølv. Då må brukaren skrive inn det gamle passordet i tillegg for autentisering.

-   Administrator setter nytt passord på ein brukar. Då trengs bare e-postadressa og det nye passordet.

For å skille på desse må skriptet sjekke om brukaren er administrator eller ikkje. Det gjør den via tokens. Det er definert kva tokens som har administratorrettar og kva tokens som berre er vanlege brukarar.

```php
// Administrator
define("ADMIN_TOKENS", [
    "87y90br8732gf97f2121hfdkl8i"
]);

// Alle gyldige tokens
define("TOKENS", [
    ...ADMIN_TOKENS,
    "uav0por0s32kf90mao20c05jc43"
]);
```

`...ADMIN_TOKENS` legger alle administratortokens inn i arrayen med alle tokens slik at ein slepp å spesifisere det på nytt.

//TODO: Legg til kode for endre passord og sletting. Beskriv endringane som er gjort frå forige endepunkt.
