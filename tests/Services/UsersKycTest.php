<?php

$filepath = realpath (dirname(__FILE__));
require_once($filepath."/ServiceTestBase.php");

final class UsersKycTest extends ServiceTestBase
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
   * Check Users Kyc List Api
   *
   * @test
   *
   * @throws Exception
   */
  public function usersKycList()
  {
    $ostObj = $this->instantiateOSTKYCSDKForV2Api();
    $usersKycService = $ostObj->services->usersKyc;
    $response = $usersKycService->getList()->wait();
    $this->isSuccessResponse($response);
  }

  /**
   *
   * Check Users Kyc Get Api
   *
   * @test
   *
   * @throws Exception
   */
  public function usersKycGet()
  {
    $ostObj = $this->instantiateOSTKYCSDKForV2Api();
    $usersKycService = $ostObj->services->usersKyc;
    $params = array();
    $params['user_id'] =  getenv('USER_ID');
    $response = $usersKycService->get($params)->wait();
    $this->isSuccessResponse($response);
  }

  /**
   *
   * Check Users Kyc Create/Update Api
   *
   * @test
   *
   * @throws Exception
   */
  public function usersKycSubmit()
  {
    $ostObj = $this->instantiateOSTKYCSDKForV2Api();
    $usersKycService = $ostObj->services->usersKyc;
    $params = array();
    $params['user_id'] = getenv('USER_ID');
    $params['first_name'] = "aniket";
    $params['last_name'] = "ayachit";
    $params['birthdate'] = "21/12/1991";
    $params['country'] = "india";
    $params['nationality'] = "indian";
    $params['document_id_number'] = "arqpa7659a";
    $params['document_id_file_path'] = "2/i/016be96da275031de2787b57c99f1471";
    $params['selfie_file_path'] = "2/i/9e8d3a5a7a58f0f1be50b7876521aebc";
    $params['residence_proof_file_path'] = "2/i/4ed790b2d525f4c7b30fbff5cb7bbbdb";
    $params['ethereum_address'] = "0xdfbc84ccac430f2c0455c437adf417095d7ad68e";
    $params['postal_code'] = "afawfveav";
    $params['investor_proof_files_path'] = array("2/i/9ff6374909897ca507ba3077ee8587da", "2/i/4872730399670c6d554ab3821d63ebce");
    $response = $usersKycService->submit_kyc($params)->wait();
    $this->isFaliureResponse($response);
  }

  /**
   *
   * Check Users Kyc Get Presigned Url For Put Api
   *
   * @test
   *
   * @throws Exception
   */
  public function usersKycGetPresignedUrlForPut()
  {
    $ostObj = $this->instantiateOSTKYCSDKForV2Api();
    $usersKycService = $ostObj->services->usersKyc;
    $params = array();
    $nestedparams = array();
    $nestedparams['selfie'] = 'image/jpeg';
    $nestedparams['document_id'] = 'image/jpeg';
    $params['files'] = $nestedparams;
    $response = $usersKycService->get_presigned_url_put($params)->wait();
    $this->isSuccessResponse($response);
  }

  /**
   *
   * Check Users Kyc Get Presigned Url For Post Api
   *
   * @test
   *
   * @throws Exception
   */
  public function usersKycGetPresignedUrlForPost()
  {
    $ostObj = $this->instantiateOSTKYCSDKForV2Api();
    $usersKycService = $ostObj->services->usersKyc;
    $params = array();
    $nestedparams = array();
    $nestedparams['selfie'] = 'image/jpeg';
    $nestedparams['document_id'] = 'image/jpeg';
    $params['files'] = $nestedparams;
    $response = $usersKycService->get_presigned_url_post($params)->wait();
    $this->isSuccessResponse($response);
  }

}
