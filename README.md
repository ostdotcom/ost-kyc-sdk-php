# OST KYC SDK PHP
The official [OST KYC PHP SDK](https://dev.ost.com/docs/kyc/index.html).

[![Travis](https://travis-ci.org/OpenSTFoundation/ost-kyc-sdk-php.svg?branch=master)](https://travis-ci.org/OpenSTFoundation/ost-kyc-sdk-php)
[![Gitter: JOIN CHAT](https://img.shields.io/badge/gitter-JOIN%20CHAT-brightgreen.svg)](https://gitter.im/OpenSTFoundation/SimpleToken)

## Requirements

To use this module, developers will need to:
1. Login on [https://kyc.ost.com/admin/login](https://kyc.ost.com/admin/login).
2. Obtain an API Key and API Secret from [https://kyc.ost.com/admin/settings/developer-integrations](https://kyc.ost.com/admin/settings/developer-integrations).

## Documentation

[https://dev.ost.com/docs/kyc/index.html](https://dev.ost.com/docs/kyc/index.html)

## Installation

Install Composer:

```bash
> curl -sS https://getcomposer.org/installer | php
```

Install the latest stable version of the SDK:

```bash
> php composer.phar require ostdotcom/ost-kyc-sdk-php
```

## Example Usage

Require the Composer autoloader:

```php
require 'vendor/autoload.php';
```

Initialize the SDK object:

```php

$params = array();
$params['apiKey']=API_KEY;
$params['apiSecret']=API_SECRET;
$params['apiBaseUrl']='https://kyc.ost.com/';

// The config field is optional for $ostKycSdkObj Object
$nestedparams = new array();
// This is the timeout in seconds for which the socket connection will remain open
$nestedparams["timeout"] = 15);
$params["config"] = $nestedparams;

$ostKycSdkObj = new OSTKYCSDK($params);

```

### Users Module 

```php
$userService = $ostKycSdkObj->services->user;
```

Create a new user:

```php
$params = array();
$params['email'] = 'email@domain.com';
$response = $userService->create($params)->wait();
var_dump($response);
```

Get an existing user:

```php
$params = array();
$params['id'] = '11007';
$response = $userService->get($params)->wait();
var_dump($response);
```

Get a list of users and other data:

```php
$params = array();
$response = $userService->getList($params)->wait();
var_dump($response);
```

### Users Kyc Module

```php
$usersKycService = $ostKycSdkObj->services->usersKyc;
```

Create/update kyc:

```php
$params = array();
$params['user_id'] = "11035";
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
var_dump($response);
```

get an existing users kyc:

```php
$params = array();
$params['user_id'] = '11007';
$response = $usersKycService->get($params)->wait();
var_dump($response);
```

Get a list of existing users kyc and other data:

```php
$params = array();
$response = $usersKycService->getList($params)->wait();
var_dump($response);
```

### Users Kyc Detail Module

```php
$usersKycDetailService = $ostKycSdkObj->services->usersKycDetail;
```

get an existing users kyc detail:

```php
$params = array();
$params['user_id'] = '11007';
$response = $usersKycDetailService->get($params)->wait();
var_dump($response);
```

### Validators Module

```php
$validatorsService = $ostKycSdkObj->services->validators;
```

verify ethereum address:

```php
$params = array();
$params['ethereum_address'] = '0x7f2ED21D1702057C7d9f163cB7e5458FA2B6B7c4';
$response = $validatorsService->verify_ethereum_address($params)->wait();
var_dump($response);
```

