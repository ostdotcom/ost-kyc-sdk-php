<?php
/**
 * Validators class
 */

namespace OST;

use OST;

/**
 * Class encapsulating methods to interact with API's for Validators module
 */
class Validators extends Base
{
  const PREFIX = '/api/v2';

  /**
   * Verify Ethereum Address
   *
   * @param array $params params for verify ethereum address
   *
   * @return object
   *
   */
  public function verify_ethereum_address(array $params = array())
  {
    return $this->requestObj->get($this->getPrefix() . '/ethereum-address-validation', $params);
  }
}
