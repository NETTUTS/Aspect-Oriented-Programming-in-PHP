<?php

class Broker {

	private $name;
	private $id;

	function __construct($name, $id) {
		$this->name = $name;
		$this->id = $id;
	}

	function getId() {
		return $this->id;
	}

	function buy($symbol, $volume, $price) {
		$value = $volume * $price;
		if ($value > 1000)
			throw new SpentTooMuchException(sprintf('You are not allowed to spend that much (%s)', $value));
		return $value;
	}

	function sell($symbol, $volume, $price) {
		return $volume * $price;
	}

}