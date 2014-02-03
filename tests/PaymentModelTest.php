<?php

class PaymentModelTest extends PaymentTest {
	
	function testParameterSetup(){

		$payment = Payment::create()
					->init("Manual",23.56,"NZD");

		$this->assertEquals("Created", $payment->Status);
		$this->assertEquals(23.56, $payment->Amount);
		$this->assertEquals("NZD", $payment->Currency);
		$this->assertEquals("Manual", $payment->Gateway);

	}

	function testSupportedGateways() {
		$expected = array(
			'PayPal_Express' => 'PayPal Express',
			'PaymentExpress_PxPay' => 'PaymentExpress PxPay',
			'Manual' => 'Manual',
			'Dummy' => 'Dummy'
		);
		$actual = GatewayInfo::get_supported_gateways();
		$this->assertEquals($expected, $actual, "supported gateways array is created correctly");
	}

}
