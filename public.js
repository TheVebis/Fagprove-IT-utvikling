let rolle = "administrator";

// Tilgjengeleg for testing
const adminToken = "87y90br8732gf97f2121hfdkl8i";
const brukarToken = "uav0por0s32kf90mao20c05jc43";

byttHandling();

function sendInn() {
	// Henter data frå skjemaet
	const formData = new FormData(document.getElementById("form"));

	// Lager eit objekt med innhaldet i skjemaet
	const entries = Object.fromEntries(formData.entries());

	// Tekst for svar
	const svarMelding = document.getElementById("svarMelding");

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
				if (svar.message) {
					svarMelding.innerText = svar.message;
					svarMelding.style.color = "black";

					// Tabell med brukarar

					// Fjerner eksisterande tabell
					if (document.getElementById("tabell")) {
						document.body.removeChild(
							document.getElementById("tabell")
						);
					}

					// Lage element til tabellen
					const tabell = document.createElement("table");
					const thead = document.createElement("thead");
					const tr = document.createElement("tr");

					tabell.id = "tabell";

					// Lage tabellheader med alle nøkklane
					for (const [nøkkel, verdi] of Object.entries(
						svar.data[0]
					)) {
						const th = document.createElement("th");
						th.innerText = nøkkel;
						tr.appendChild(th);
					}
					// Legge tabellheader inn i tabellen
					thead.appendChild(tr);
					tabell.appendChild(thead);

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
				}

				// Feilmelding
				if (svar.error) {
					svarMelding.innerText = svar.error;
					svarMelding.style.color = "red";
				}
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
				if (svar.message) {
					svarMelding.innerText = svar.message;
					svarMelding.style.color = "black";
				}
				if (svar.error) {
					svarMelding.innerText = svar.error;
					svarMelding.style.color = "red";
				}
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
				if (svar.message) {
					svarMelding.innerText = svar.message;
					svarMelding.style.color = "black";
				}
				if (svar.error) {
					svarMelding.innerText = svar.error;
					svarMelding.style.color = "red";
				}
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
				if (svar.message) {
					svarMelding.innerText = svar.message;
					svarMelding.style.color = "black";
				}
				if (svar.error) {
					svarMelding.innerText = svar.error;
					svarMelding.style.color = "red";
				}
			});
	}
}

function byttHandling() {
	const handling = document.getElementById("handling").value;
	const epost = document.getElementById("epost");
	const passord = document.getElementById("passord");
	const nyttPassord = document.getElementById("nyttPassord");
	const gjentaPassord = document.getElementById("gjentaPassord");

	// Gøymer alle felta
	epost.style.display = "none";
	passord.style.display = "none";
	nyttPassord.style.display = "none";
	gjentaPassord.style.display = "none";

	// Tar vekk at felta er nødvendige
	epost.querySelector("input").required = false;
	passord.querySelector("input").required = false;
	nyttPassord.querySelector("input").required = false;
	gjentaPassord.querySelector("input").required = false;

	// Sjå alle brukarar
	if (handling === "oversikt-brukarar") {
		// Treng ikkje gjer noko
	}

	// Opprett brukar
	if (handling === "opprett-brukar") {
		epost.style.display = "flex";
		passord.style.display = "flex";
		gjentaPassord.style.display = "flex";

		epost.querySelector("input").required = true;
		passord.querySelector("input").required = true;
		gjentaPassord.querySelector("input").required = true;
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
}

// Bytt rolle for testing
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
