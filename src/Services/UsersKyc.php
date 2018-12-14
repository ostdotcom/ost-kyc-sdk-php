<?php
/**
 * UsersKyc class
 */

namespace OST;

use OST;

/**
 * Class encapsulating methods to interact with API's for User module
 */
class UsersKyc extends Base
{
  const PREFIX = '/api/v2/users-kyc';

  /**
   * Create/Update a User Kyc
   *
   * @param array $params params for creating/updating a user kyc
   *
   * @return object
   *
   */
  public function submit_kyc(array $params = array())
  {
    return $this->requestObj->post($this->getPrefix(). '/' . $this->getUserId($params), $params);
  }

  /**
   * Get a User Kyc
   *
   * @param array $params params for get a user kyc
   *
   * @return object
   *
   */
  public function get(array $params = array())
  {
    return $this->requestObj->get($this->getPrefix() . '/' . $this->getUserId($params), $params);
  }

  /**
   * List Users Kyc
   *
   * @param array $params params for fetching users kyc list
   *
   * @return object
   *
   */
  public function getList(array $params = array())
  {
    return $this->requestObj->get($this->getPrefix(), $params);
  }

  /**
   * Get Presigned Urls For Post
   *
   * @param array $params params for get presigned url post
   *
   * @return object
   *
   */
  public function get_presigned_url_post(array $params = array())
  {
    return $this->requestObj->get($this->getPrefix() . '/pre-signed-urls/for-post', $params);
  }

  /**
   * Get Presigned Urls For Put
   *
   * @param array $params params for get presigned url post
   *
   * @return object
   *
   */
  public function get_presigned_url_put(array $params = array())
  {
    return $this->requestObj->get($this->getPrefix() . '/pre-signed-urls/for-put', $params);
  }
}
