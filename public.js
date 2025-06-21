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
				if (svar.error) console.log(svar);
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
	const handling = document.getElementById("handling").value;
	const epost = document.getElementById("epost");
	const passord = document.getElementById("passord");
	const nyttPassord = document.getElementById("nyttPassord");
	const gjentaPassord = document.getElementById("gjentaPassord");

	epost.style.display = "none";
	passord.style.display = "none";
	nyttPassord.style.display = "none";
	gjentaPassord.style.display = "none";

	// Sjå alle brukarar
	if (handling === "oversikt-brukarar") {
		// Treng ikkje gjer noko
	}

	// Opprett brukar
	if (handling === "opprett-brukar") {
		epost.style.display = "flex";
		passord.style.display = "flex";
		gjentaPassord.style.display = "flex";
	}

	// Endre passord
	if (handling === "endre-passord") {
		epost.style.display = "flex";
		if (rolle !== "administrator") {
			passord.style.display = "flex";
		}
		nyttPassord.style.display = "flex";
		gjentaPassord.style.display = "flex";
	}

	// Slett brukar
	if (handling === "slett-brukar") {
		epost.style.display = "flex";
	}
}

function byttRolle() {
	rolle = rolle === "administrator" ? "brukar" : "administrator";
	document.getElementById("tittel").innerText = "Hei, " + rolle + "!";

	if (rolle !== "administrator") {
		document.getElementById("handling").value = "endre-passord";
	}
	byttHandling();
}
