let rolle = "administrator";

// Tilgjengeleg for testing
const adminToken = "87y90br8732gf97f2121hfdkl8i";
const brukarToken = "uav0por0s32kf90mao20c05jc43";

function performSubmit() {
	// Henter data frå formen og legg i ein array
	const formData = new FormData(document.getElementById("form"));
	const entries = [...formData.entries()];

	console.log(entries);
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
		/*if (
			hending.target.dataset.response !== undefined &&
			responser[hending.target.dataset.response] !== undefined
		) {
			lovnad
				.then((response) => {
					return response.json();
				})
				.then((response) => {
					responser[hending.target.dataset.response](response);
				});
		}*/
	} else if (entries.handling === "opprett-brukar") {
		fetch("/API/opprett-brukar.php", {
			method: "POST",
			headers: {
				"content-type": "application/json",
				X_TOKEN: rolle === "administrator" ? adminToken : brukarToken,
			},
			body: JSON.stringify(Object.fromEntries(entries)),
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
			body: JSON.stringify(Object.fromEntries(entries)),
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
			body: JSON.stringify(Object.fromEntries(entries)),
		})
			.then((svar) => {
				return svar.json();
			})
			.then((svar) => {
				console.log(svar);
			});
	}
}

function byttRolle() {
	rolle = rolle === "administrator" ? "brukar" : "administrator";
	document.getElementById("tittel").innerText = "Hei, " + rolle + "!";
}
