<?php

class Order {

	public static $CART_STATUS = "CART";
	public static $SHIPPING_ADDRESS_SET_STATUS = "SHIPPING_ADDRESS_SET";
	public static $SHIPPING_METHOD_SET_STATUS = "SHIPPING_METHOD_SET";
	public static $PAID_STATUS = "PAID";


	private array $products;

	private string $customerName;

	private float $totalPrice;

	private int $id;
	private DateTime $createdAt;

	private string $status;

	private ?string $shippingMethod;

	private ?string $shippingCity;

	private ?string $shippingAddress;

	private ?string $shippingCountry;

	public function __construct(string $customerName, array $products) {

		if (count($products) > 5) {
			throw new Exception('Vous ne pouvez pas commander plus de 5 produits');
		}

		if ($customerName === "David Robert") {
			throw new Exception('Vous êtes blacklisté');
		}

		$this->status = Order::$CART_STATUS;
		$this->createdAt = new DateTime();
		$this->id = rand();
		$this->products = $products;
		$this->customerName = $customerName;
		$this->totalPrice = count($products) * 5;

		echo "Commande {$this->id} créée, d'un montant de {$this->totalPrice} !</br></br>";
	}


	public function removeProduct(string $product) {

		if (($key = array_search($product, $this->products)) !== false) {
			unset($this->products[$key]);
		}

		$productsAsString = implode(',', $this->products);

		echo "Liste des produits : {$productsAsString}</br></br>";

	}

	public function addProduct(string $product): void {

		if (in_array($product, $this->products)) {
			throw new Exception('Le produit existe déjà dans le panier');
		}

		if ($this->status === Order::$CART_STATUS) {
			throw new Exception('Vous ne pouvez plus ajouter de produits');
		}

		if (count($this->products) >= 5) {
			throw new Exception('Vous ne pouvez pas commander plus de 5 produits');
		}

		$this->products[] = $product;
		$this->totalPrice = count($this->products) * 5;
	}

	public function setShippingAddress(string $shippingCity, string $shippingAddress, string $shippingCountry): void {
		if ($this->status !== Order::$CART_STATUS) {
			throw new Exception(message: 'Vous ne pouvez plus modifier l\'adresse de livraison');
		}

		if (!in_array($shippingCountry, ['France', 'Belgique', "Luxembourg"])) {
			throw new Exception(message: 'Vous ne pouvez pas commander dans ce pays');
		}

		$this->shippingAddress = $shippingAddress;
		$this->shippingCity = $shippingCity;
		$this->shippingCountry = $shippingCountry;
		$this->status = Order::$SHIPPING_ADDRESS_SET_STATUS;
	}

	public function setShippingMethod(string $shippingMethod): void {
		if ($this->status !== Order::$SHIPPING_ADDRESS_SET_STATUS) {
			throw new Exception(message: 'Vous ne pouvez pas choisir de méthode avant d\'avoir renseigné votre adresse');
		}

		if (!in_array($shippingMethod, ['Chronopost Express', 'Point relais', 'Domicile'])) {
			throw new Exception(message: 'Méthode non valide');
		}

		if ($shippingMethod === 'Chronopost Express') {
			$this->totalPrice = $this->totalPrice + 5;
		}
		$this->shippingMethod = $shippingMethod;
		$this->status = Order::$SHIPPING_METHOD_SET_STATUS;

	}


	public function pay(): void {
		if ($this->status !== Order::$SHIPPING_METHOD_SET_STATUS) {
			throw new Exception(message: 'Vous ne pouvez pas payer avant d\'avoir renseigné la méthode de livraison');
		}

		$this->status = Order::$PAID_STATUS;
	}
}

try {
	$order = new Order('Nagui', ['g', 'stylo', 'trousse', 'ak-47']);
} catch(Exception $error) {
	echo $error->getMessage();
}


$order->removeProduct('g');




