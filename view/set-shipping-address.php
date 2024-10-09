<?php require_once('../view/partials/header.php'); ?>
	
	<main>
		<p>Remplissez l'adresse de livraison : </p>


		<form method="POST" action="../controller/process-shipping-address.php">

			<label for="shippingCountry">Pays de livraison</label>
			<input type="text" id="shippingCountry" name="shippingCountry" required pattern="^[a-zA-Z0-9\s.-]{5,50}$" title="Le pays doit contenir entre 5 et 50 caractères et des espaces.">

			<br>
			<label for="shippingCity">Ville de livraison</label>
			<input type="text" id="shippingCity" name="shippingCity" required pattern="^[a-zA-Z0-9\s.-]{5,50}$" title="La Ville doit contenir entre 5 et 50 caractères.">

			<br>
			<label for="shippingAddress">Adresse de livraison</label>
			<input type="text" id="shippingAddress" name="shippingAddress" required pattern="^[a-zA-Z0-9\s.-]{5,50}$" title="L'adresse doit contenir entre 5 et 50 caractères et des espaces.">
				
			<button type="submit">Ajouter</button>

		</form>
	</main>

<?php require_once('../view/partials/footer.php'); ?>