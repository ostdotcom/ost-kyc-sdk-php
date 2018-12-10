<?php
/**
 * User class
 */

namespace OST;

use OST;

/**
 * Class encapsulating methods to interact with API's for User module
 */
class User extends Base
{
    const PREFIX = '/api/v2/users';

    /**
     * Create a User
     *
     * @param array $params params for creating a user
     *
     * @return object
     *
     */
    public function create(array $params = array())
    {
        return $this->requestObj->post($this->getPrefix(), $params);
    }

    /**
     * Get a User
     *
     * @param array $params params for editing a user
     *
     * @return object
     *
     */
    public function get(array &$params = array())
    {
        return $this->requestObj->get($this->getPrefix() . '/' . $this->getId($params),$params);
    }

    /**
     * List Users
     *
     * @param array $params params for fetching users list
     *
     * @return object
     *
     */
    public function getList(array $params = array())
    {
        return $this->requestObj->get($this->getPrefix(), $params);
    }
}
