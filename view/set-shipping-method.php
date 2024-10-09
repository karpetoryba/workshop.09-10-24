<?php require_once('../view/partials/header.php'); ?>
	
	<main>
		<p>Choisissez la méthode livraison : </p>


		<form method="POST" action="../controller/process-shipping-method.php">

		<label for="shippingMethod">Méthode de livraison</label>

			<select id="shippingMethod" name="shippingMethod">
				<option value="Chronopost Express">Chronopost Express</option>
				<option value="Point relais">Point relais</option>
				<option value="Domicile">Domicile</option>

			</select>

			<button type="submit">Envoyer</button>

		</form>
	</main>

<?php require_once('../view/partials/footer.php'); ?>