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
