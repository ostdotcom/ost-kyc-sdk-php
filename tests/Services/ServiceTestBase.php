<?php
/**
 * Created by PhpStorm.
 * User: tejassangani
 * Date: 2018-12-07
 * Time: 00:02
 */

use PHPUnit\Framework\TestCase;

class ServiceTestBase extends TestCase
{
  /**
   *
   * Check if SDK object created to interact with V2 API's is valid
   *
   * @test
   *
   * @throws Exception
   */
  public function canCreateInstanceOfOSTKYCSDKForV2Api()
  {
    $this->assertInstanceOf(
        OSTKYCSDK::class,
        $this->instantiateOSTKYCSDKForV2Api()
    );
  }

  /**
   *
   * Instantiate OSTKYCSDK to interact with V2 API's
   *
   * @throws Exception
   */
  public function instantiateOSTKYCSDKForV2Api()
  {
    $sdkInitParams = array();
    $sdkInitParams['apiKey'] = getenv('OST_KYC_API_KEY');
    $sdkInitParams['apiSecret'] = getenv('OST_KYC_API_SECRET');
    $sdkInitParams['apiBaseUrl'] = getenv('OST_KYC_API_ENDPOINT');
    return new OSTKYCSDK($sdkInitParams);
  }

  /**
   *
   * Is Valid Success Response
   *
   * @param $response
   *
   */
  public function isSuccessResponse($response)
  {
    $this->assertArrayHasKey('success', $response);
    $this->assertTrue($response['success'] == true);
  }

  /**
   *
   * Is Valid Success Response
   *
   * @param $response
   *
   */
  public function isFaliureResponse($response)
  {
    $this->assertArrayHasKey('success', $response);
    $this->assertTrue($response['success'] == false);
  }
}