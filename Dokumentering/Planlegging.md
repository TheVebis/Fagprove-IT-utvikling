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
