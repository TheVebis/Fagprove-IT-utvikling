# API for administrasjon av brukerkontoar

Denne applikasjonen og det tilhøyrande API-et er laga for å kunne opprette og administrere brukarkontoar. Administratorar kan opprette, få oversikt over, endre passord til, og slette brukarkontoar. Vanlege brukarar kan verifisere seg via ei lenkje på e-post og endre passordet sitt.

Systemet er bygd opp med tanke på bedriftskontoar som ofte er under total kontroll av administratorar der brukar sjølv har lita moglegheit til å gjere eigne endringar. Det er ikkje meint for nettsider der brukaren sjølv administrerer brukaren sin og kan opprette og slette brukarar etter behov. Databasen er satt opp rundt e-postar i staden for brukarnamn, men det skal ikkje være mykje arbeid å endre dette om det er ynskeleg.

Endepunkta blir sikra med tokens. Det er lagt ved nokon standard-token for administrator og vanleg brukar, men desse bør endrast og bli kopla opp mot innlogga brukarar.

> ### MERK:
>
> Det er inga innloggingsystem på sida og den er ikkje sikra. Fleire funksjonar er til for testårsakar og før applikasjonen blir tatt i produksjon må eit eige innloggingsystem bli implementert og desse testfunksjonane fjernast.

Eit brukargrensesnitt blir brukt for å få kontakt med endepunkta i API-et, og skjemaet i brukargrensesnittet endrast dynamisk etter kva handling som er valgt. Ein nedtrekksmeny gir ein alternativ mellom dei forskjellege handlingane som korresponderer med dei ulike endepunkta. Ein må så fylle ut dei rette felta som kjem opp i skjemaet og trykke send for å sende inn skjemaet. Då vil dataa bli sendt til endepunktet, som returnerer ein melding om det er vellukka eller ein feilmelding om noko sku være feil.

For meir informasjon om endepunkta og kva dei gjer kan ein sjekke [Swagger-dokumentasjonen](Dokumentering\Swagger\index.html) for API-et.
