<?php
/**
 * contains Manifest class
 */

namespace OST;

use Lib\Request;

/**
 * Class providing public vars to interact with API's for different modules
 */
class Manifest
{
    /** @var User object which has methods to fire API's belonging to User module */
    public $user;

    /** @var UserKyc object which has methods to fire API's belonging to UserKyc module */
    public $usersKyc;

    /** @var UsersKycDetail object which has methods to fire API's belonging to UsersKycDetail module */
    public $usersKycDetail;

    /** @var Validators object which has methods to fire API's belonging to Validators module */
    public $validators;


    /**
     * Constructor
     *
     * @param array $params Array containing the necessary params {
     * @type string $apiKey API Key.
     * @type string $apiSecret API Secret.
     * @type string $baseUrl Base API URL.
     * }
     *
     * @throws \Exception
     *
     */
    public function __construct(array $params)
    {
        $requestObj = new Request($params);
        // Define services available
        $this->user = new User($requestObj);
        $this->usersKyc = new UsersKyc($requestObj);
        $this->usersKycDetail = new UsersKycDetail($requestObj);
        $this->validators = new Validators($requestObj);
    }
}
