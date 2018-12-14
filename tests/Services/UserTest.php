<?php

$filepath = realpath (dirname(__FILE__));
require_once($filepath."/ServiceTestBase.php");

final class UserTest extends ServiceTestBase
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
   * Check User List Api
   *
   * @test
   *
   * @throws Exception
   */
  public function userList()
  {
    $ostObj = $this->instantiateOSTKYCSDKForV2Api();
    $userService = $ostObj->services->user;
    $response = $userService->getList()->wait();
    $this->isSuccessResponse($response);
  }

  /**
   *
   * Check User List Api
   *
   * @test
   *
   * @throws Exception
   */
  public function userListWithLimitInMeta()
  {
    $ostObj = $this->instantiateOSTKYCSDKForV2Api();
    $userService = $ostObj->services->user;
    $params = array();
    $nestedparams = array();
    $params['limit'] = '1';
    $nestedparams["is_kyc_submitted"] = "false";
    $params['filters'] = $nestedparams;
    $response = $userService->getList($params)->wait();
    $this->assertEquals($response['data']["meta"]["next_page_payload"]["limit"], 1);
    $this->assertEquals($response['data']["meta"]["next_page_payload"]["filters"]["is_kyc_submitted"], "false");
  }

  /**
   *
   * Check User Get Api
   *
   * @test
   *
   * @throws Exception
   */
  public function userGet()
  {
    $ostObj = $this->instantiateOSTKYCSDKForV2Api();
    $userService = $ostObj->services->user;
    $params = array();
    $params['id'] =  getenv('USER_ID');
    $response = $userService->get($params)->wait();
    $this->isSuccessResponse($response);
  }

  /**
   *
   * Check User Get With Id 0 Api
   *
   * @test
   *
   * @throws Exception
   */
  public function userWithIdAs0Get()
  {
    $ostObj = $this->instantiateOSTKYCSDKForV2Api();
    $userService = $ostObj->services->user;
    $params = array();
    $params['id'] =  '0';
    $response = $userService->get($params)->wait();
    $this->isFaliureResponse($response);
  }

  /**
   *
   * Check User Get With Id 0 Api
   *
   * @test
   *
   * @throws Exception
   */
  public function getUserWithComplexParameterForSignature()
  {
    $ostObj = $this->instantiateOSTKYCSDKForV2Api();
    $userService = $ostObj->services->user;
    $arrayWithValues1 = array();
    $arrayWithValues1["a"] = "L21A";
    $arrayWithValues1["b"] = "L21B";
    $arrayWithValues2 = array();
    $arrayWithValues2["a"] = "L22A";
    $arrayWithValues2["b"] = "L22B";
    $arrayWithValues3 = array();
    $arrayWithValues3["a"] = "L23A";
    $arrayWithValues3["b"] = "L23B";
    $nestedArray = array($arrayWithValues1, $arrayWithValues2, $arrayWithValues3);

    $emptyArray = array();
    $params = array();
    $params['k1'] = "Rachin";
    $params['k2'] = "Tejas";
    $params["list2"] = $nestedArray;
    $params['empty_array'] = $emptyArray;
    $params['empty_str'] = "";
    $params['garbage_str'] = "~^[]%$#@!&*~,./?~()-_'this is garbage";
    $params['id'] = getenv('USER_ID');
    $response = $userService->get($params)->wait();
    $this->isSuccessResponse($response);
  }

  /**
   *
   * Check User Get With Id Null Api
   *
   * @test
   *
   * @throws Exception
   */
  public function userWithIdAsNullGet()
  {
    $ostObj = $this->instantiateOSTKYCSDKForV2Api();
    $userService = $ostObj->services->user;
    $params = array();
    $params['id'] =  '';
    try{
      $response = $userService->get($params)->wait();
    }catch (BadMethodCallException $I){
      $this->assertEquals($I->getMessage(), "id is missing in request params");
    }
  }

  /**
   *
   * Check User Create Api
   *
   * @test
   *
   * @throws Exception
   */
  public function userCreate()
  {
    $ostObj = $this->instantiateOSTKYCSDKForV2Api();
    $userService = $ostObj->services->user;
    $params = array();
    $email = "kyctest".time()."_".phpVersion()."@ost.com";
    $params['email'] = $email;
    $response = $userService->create($params)->wait();
    $this->isSuccessResponse($response);
  }

}
