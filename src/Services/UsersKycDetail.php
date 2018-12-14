<?php
/**
 * UsersKycDetail class
 */

namespace OST;

use OST;

/**
 * Class encapsulating methods to interact with API's for UserKycDetail module
 */
class UsersKycDetail extends Base
{
  const PREFIX = '/api/v2/users-kyc-detail';

  /**
   * Get a User Kyc Detail
   *
   * @param array $params params for get a user kyc detail
   *
   * @return object
   *
   */
  public function get(array $params = array())
  {
    return $this->requestObj->get($this->getPrefix() . '/' . $this->getUserId($params), $params);
  }
}
