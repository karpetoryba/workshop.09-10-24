<?php require_once('../view/partials/header.php'); ?>
	
	<main>
		<p>Payer la commande (c'est même pas débité sur votre compte. Ou peut être que si. Mais faites confiance) </p>


		<form method="POST" action="../controller/process-payment.php">

			<label for="payment"></label>

			<button type="submit">Payer</button>

		</form>
	</main>

<?php require_once('../view/partials/footer.php'); ?>