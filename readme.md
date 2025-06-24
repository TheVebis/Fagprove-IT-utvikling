# API for administrasjon av brukerkontoar

## Introduksjon

Denne applikasjonen og det tilhøyrande API-et er laga for å kunne opprette og administrere brukarkontoar. Administratorar kan opprette, få oversikt over, endre passord for og slette brukarkontoar. Vanlege brukarar kan verifisere seg via ei lenkje på e-post og endre passordet sitt.

## Systemoversikt

Systemet er bygd opp med tanke på bedriftskontoar som ofte er under total kontroll av administratorar der brukar sjølv har lita moglegheit til å gjere eigne endringar. Det er ikkje meint for nettsider der brukaren sjølv administrerer brukaren sin og kan opprette og slette brukarar etter behov. Databasen er satt opp rundt e-postar i staden for brukarnamn, men det skal ikkje være mykje arbeid å endre dette om det er ynskeleg.

## Sikkerheit

Endepunkta blir sikra med tokens. Det finnes standard-token for administrator og vanleg brukar, men desse bør endrast og bli kopla opp mot innlogga brukarar for betre sikkerheit.

> ### MERK:
>
> Det er inga innloggingsystem på sida og den er ikkje sikra. Fleire funksjonar er til for testårsakar og før applikasjonen blir tatt i produksjon må eit eige innloggingsystem bli implementert og desse testfunksjonane fjernast.

## Brukargrensesnitt

Eit brukargrensesnitt blir brukt for å få kontakt med endepunkta i API-et, og skjemaet i brukargrensesnittet endrast dynamisk etter kva handling som er valgt. Ein nedtrekksmeny gir ein alternativ mellom dei forskjellege handlingane som korresponderer med dei ulike endepunkta. Ein må så fylle ut dei rette felta som kjem opp i skjemaet og trykke send for å sende inn skjemaet. Då vil dataa bli sendt til endepunktet, som returnerer ein melding om det er vellukka eller ein feilmelding om noko sku være feil.

Vanlege brukarar har berre moglegheita til å verifisere seg og endre passordet sitt. Prosessen for å endre passord er den same som for administratorar, men dei har ikkje valg mellom handlingane som administrator har og kan berre endre passordet sitt. Vanlege brukarar må og oppgi det gamle passordet for å å bekrefte identiteten sin

## Handlingar

| Handling               | Felt som må fyllast ut                          | Returnerer                              |
| ---------------------- | ----------------------------------------------- | --------------------------------------- |
| Sjå alle brukarar      |                                                 | Oversikt henta, tabell med oversikt     |
| Opprett brukar         | E-post, passord                                 | Oppretta brukar, sender mail til brukar |
| Endre passord          | E-post, nytt passord                            | Nytt passord satt                       |
| Slett brukar           | E-post                                          | Brukar sletta                           |
| Endre passord (brukar) | E-post, passord, nytt passord                   | Nytt passord satt                       |
| Verifisering (brukar)  | ID, eingongskode (felta er fylt ut på førehand) | Brukar verifisert                       |

Verifisering skjer via ei lenkje på mail som har vedlagt brukar-id og eingongskode. Lenkja tar dei til ei side som automatisk sjekker for verifisering og tar dei tilbake til hovudsida ved velluka verifisering.

## Swagger

For meir informasjon om endepunkta og kva dei gjer kan ein sjekke [Swagger-dokumentasjonen](Dokumentering\Swagger\index.html) for API-et.
