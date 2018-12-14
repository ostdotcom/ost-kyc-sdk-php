<?php
/**
 * contains Base class
 */

namespace OST;

use BadMethodCallException;
use InvalidArgumentException;
use Lib\Request;
use Lib\Validate;
use RuntimeException;

ini_set('log_errors', 1);
ini_set('display_errors', 0);

/**
 * Base Class
 */
abstract class Base
{
  const MISSING_ID = 'id missing in request params';
  const MISSING_USER_ID = 'user_id missing in request params';
  const INVALID_ID = 'id invalid in request params';
  const INVALID_USER_ID = 'user_id invalid in request params';
  const PREFIX = '';

  /** @var Request request object which would fire API calls */
  protected $requestObj;

  /**
   * Constructor
   *
   * @param Request $requestObj request object which would fire API calls
   */
  public function __construct(Request $requestObj)
  {
    $this->requestObj = $requestObj;
  }

  /**
   * @return string
   * @throws RuntimeException
   */
  protected function getPrefix()
  {
    if (empty(static::PREFIX)) {
      throw new RuntimeException('Prefix must be defined in class: ' . get_class($this));
    }

    return static::PREFIX;
  }

  /**
   * getId from params array
   *
   * @param array $params request object which would fire API calls
   *
   * @throws InvalidArgumentException, BadMethodCallException
   *
   * @return string
   */
  protected function getId(array &$params)
  {
    return $this->getValueForKey($params, "id");
  }

  /**
   * getId from params array
   *
   * @param array $params request object which would fire API calls
   *x
   * @throws InvalidArgumentException, BadMethodCallException
   *
   * @return string
   */
  protected function getUserId(array &$params)
  {
    return $this->getValueForKey($params, "user_id");
  }

  private function getValueForKey(&$params, $key)
  {
    $value = '';
    if (array_key_exists($key, $params)) {
      $value = $params[$key];
      unset($params[$key]);
    }
    if ($value === '') {
      throw new BadMethodCallException("$key is missing in request params");
    }
    if (!(Validate::isValidParams($value))) {
      throw new InvalidArgumentException("$key is invalid in request params");
    }
    return urlencode($value);
  }

}
