<?php

$filepath = realpath (dirname(__FILE__));
require_once($filepath."/ServiceTestBase.php");

final class UsersKycDetailTest extends ServiceTestBase
{
  /**
   *
   * override setUp() to load environment variables from .env.example file for non TRAVIS environment
   *
   * @throws Exception
   */
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
  public function usersKycDetailGet()
  {
    $ostObj = $this->instantiateOSTKYCSDKForV2Api();
    $usersKycDetailService = $ostObj->services->usersKycDetail;
    $params = array();
    $params['user_id'] =  getenv('USER_ID');
    $response = $usersKycDetailService->get($params)->wait();
    $this->isSuccessResponse($response);
  }

}
