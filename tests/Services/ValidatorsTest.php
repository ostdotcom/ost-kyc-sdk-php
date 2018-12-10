<?php

$filepath = realpath (dirname(__FILE__));
require_once($filepath."/ServiceTestBase.php");

final class ValidatorsTest extends ServiceTestBase
{

  protected function setUp()
  {
    $this->canCreateInstanceOfOSTKYCSDKForV2Api();
  }

  /**
   *
   * Check Users Kyc Detail Get Api
   *
   * @test
   *
   * @throws Exception
   */
  public function verifyEthereumAddressTest()
  {
    $ostObj = parent::instantiateOSTKYCSDKForV2Api();
    $ValidatorsService = $ostObj->services->validators;
    $params = array();
    $params['ethereum_address'] =  '0x7f2ED21D1702057C7d9f163cB7e5458FA2B6B7c4';
    $response = $ValidatorsService->verify_ethereum_address($params)->wait();
    $this->isSuccessResponse($response);
  }

}
