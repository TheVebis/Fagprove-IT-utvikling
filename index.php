<!DOCTYPE html>
<html lang="nn">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Brukarsystem</title>
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<h1 id="tittel">Hei, administrator</h1>
		<button onclick="byttRolle()">Bytt rolle</button>

		<form
			id="form"
			method="post"
			onsubmit="performSubmit(); event.preventDefault"
		>
			<select name="handling">
				<option value="">Velg handling</option>
				<option value="oversikt-brukarar">Sjå alle brukarar</option>
				<option value="opprett-brukar">Opprett brukar</option>
				<option value="endre-passord">Endre passord</option>
				<option value="slett-brukar">Slett brukar</option>
			</select>
			<div class="flex-column">
				<label for="epost">E-post</label>
				<input id="epost" name="epost" />
			</div>
			<button type="submit">Send</button>
		</form>
		<script src="public.js"></script>
	</body>
</html>
