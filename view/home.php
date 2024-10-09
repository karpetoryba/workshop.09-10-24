<?php require_once('./view/partials/header.php'); ?>
<main>

		<form method="POST" action="../controller/create-order.php">

			<label for="customerName">Nom du client</label>
			<input type="text" id="customerName" name="customerName" required>
			<br>

			<label for="product">Produit</label>

			<select id="product" name="products[]" multiple>
				<option value="tshirt">T-shirt</option>
				<option value="jeans">Jeans</option>
				<option value="shoes">Chaussures</option>
				<option value="short">Short</option>
				<option value="cap">Casquette</option>
				<option value="pull">Pull</option>
			</select>
			<br>

			<button type="submit">Ajouter</button>

		</form>

	</main>

<?php require_once('./view/partials/footer.php'); ?>