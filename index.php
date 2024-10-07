<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


class VendorMachine {

	private bool $isOn;
	private int $snackQty;
	private int $money;


	public function __construct() {
		$this->isOn = false;
		$this->snackQty = 50;
		$this->money = 0;
	}

	public function buySnack(): void {
		$this->isOn = true;

		if ($this->snackQty === 0) {
			throw new Exception("Plus de snacks");
		}

		$this->snackQty = $this->snackQty -1;
		$this->money = $this->money +2;
	}


	public function reset(): void {
		$this->isOn = false;
		$this->snackQty = $this->calculateLeftSnacksQty();
		$this->money = 0;
		$this->isOn = true;
	  }
	
	  private function calculateLeftSnacksQty() {
		return $this->snackQty + (50 - $this->snackQty);
	  }
	
	  public function shootWithFoot(): string {
		$this->isOn = false;
	
		$this->dropMoney();
		$this->dropSnacks();
	
		return "Snacks tombés : {$this->snackQty} et monnaie : {$this->money}";
	  }
	
	  private function dropMoney() {
		$moneyToDrop = 20;
		if ($this->money < 20) {
		  $moneyToDrop = $this->money;
		}
		$this->money = $this->money - $moneyToDrop;
	  }
	
	  private function dropSnacks() {
		$snackQtyToDrop = 5;
	
		if ($this->snackQty < 5) {
		  $snackQtyToDrop = $this->snackQty;
		}
	
		$this->snackQty = $this->snackQty - $snackQtyToDrop;
	}
}


$vendorMachine = new VendorMachine();
echo $vendorMachine->shootWithFoot();