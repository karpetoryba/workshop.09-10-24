<?php

class Order {


	private array $products;

	private string $customerName;


	private float $totalPrice;



	private int $id;
	private DateTime $createdAt;

	private string $status;

	private ?string $shippingMethod;

	private ?string $shippingAddress;


	public function __construct(string $customerName, array $products) {

		if (count($products) > 5) {
			throw new Exception('Vous ne pouvez pas commander plus de 5 produits');
		}

		if ($customerName === "David Robert") {
			throw new Exception('Vous êtes blacklisté');

		}

		$this->status = "CART";
		$this->createdAt = new DateTime();
		$this->id = rand();
		$this->products = $products;
		$this->customerName = $customerName;
		$this->totalPrice = count($products) * 5;

		echo "Commande {$this->id} créée, d'un montant de {$this->totalPrice} !";
	}

}

try {
	$order = new Order('David Robert', ['feuille', 'stylo', 'trousse', 'ak-47']);
} catch(Exception $error) {
	echo $error->getMessage();
}




