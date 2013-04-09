<?php

require_once '../AspectKernelLoader.php';

class BrokerTest extends PHPUnit_Framework_TestCase {

	function testBrokerCanBuyShares() {
		$broker = new Broker('John', '1');
		$this->assertEquals(500, $broker->buy('GOOGL', 100, 5));
	}

	function testBrokerCanSellShares() {
		$broker = new Broker('John', '1');
		$this->assertEquals(500, $broker->sell('YAHOO', 50, 10));
	}

	function testBrokerWithId2WillHaveADiscountOnBuyingShares() {
		$broker = new Broker('Finch', '2');
		$this->assertEquals(80, $broker->buy('MS', 10, 10));
	}

	/**
     * @expectedException SpentTooMuchException
     */
	function testBuyTooMuch() {
		$broker = new Broker('Finch', '2');
		$broker->buy('MS', 10000, 8);
	}

}

?>
