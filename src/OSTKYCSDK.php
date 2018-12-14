<?php
/**
 * OSTKYCSDK class
 */

/**
 * Class which provides access to OST KYC services
 */
class OSTKYCSDK
{

  /** @var object object to access methods */
  public $services;

  /**
   * Class constructor.
   *
   * @param array $params Array containing the necessary params {
   * @type string $apiKey API Key.
   * @type string $apiSecret API Secret.
   * @type string $baseUrl Base API URL.
   * }
   *
   * @throws \Exception
   */
  public function __construct(array $params)
  {
    if (isset($params) && isset($params['apiBaseUrl'])) {
      // Extract API version
      $this->services = new \OST\Manifest($params);
    } else {
        throw new \Exception('API base URL is missing. Did you forget to include it in the OSTKYCSDK params?');
    }

  }

}
