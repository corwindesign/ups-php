# TimeInTransit
The Time In Transit API provides estimated delivery times for various UPS shipping services, between specified locations.  Key Business Values: - **Enhanced Customer Experience**: Allows businesses provide accurate delivery estimates to their customers, enhancing customer service. - **Operational Efficiency**: Helps in logistics planning by providing transit times for different UPS services.

This PHP package is automatically generated by the [Swagger Codegen](https://github.com/swagger-api/swagger-codegen) project:

- API version: 
- Package version: 1.0.8
- Build package: io.swagger.codegen.v3.generators.php.PhpClientCodegen

## Requirements

PHP 5.5 and later

## Installation & Usage
### Composer

To install the bindings via [Composer](http://getcomposer.org/), add the following to `composer.json`:

```
{
  "repositories": [
    {
      "type": "git",
      "url": "https://github.com/abantecart/ups-time-in-transit.git"
    }
  ],
  "require": {
    "abantecart/ups-time-in-transit": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
    require_once('/path/to/TimeInTransit/vendor/autoload.php');
```

## Tests

To run the unit tests:

```
composer install
./vendor/bin/phpunit
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: oauth2
$config = UPS\TimeInTransit\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new UPS\TimeInTransit\Request\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \UPS\TimeInTransit\TimeInTransit\TimeInTransitRequest(); // \UPS\TimeInTransit\TimeInTransit\TimeInTransitRequest | Generate sample code for popular API requests by selecting an example below. To view a full sample request and response, first click "Authorize" and enter your application credentials, then populate the required parameters above and click "Try it out".
$trans_id = "trans_id_example"; // string | An identifier unique to the request. Length 32
$transaction_src = "testing"; // string | Identifies the clients/source application that is calling.  Length 512
$version = "version_example"; // string | API Version

try {
    $result = $apiInstance->timeInTransit($body, $trans_id, $transaction_src, $version);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->timeInTransit: ', $e->getMessage(), PHP_EOL;
}
?>
```

## Documentation for API Endpoints

All URIs are relative to *https://wwwcie.ups.com/api*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*DefaultApi* | [**timeInTransit**](docs/Api/DefaultApi.md#timeintransit) | **POST** /shipments/{version}/transittimes | TimeInTransit

## Documentation For Models

 - [CandidateAddress](docs/Model/CandidateAddress.md)
 - [DestinationPickList](docs/Model/DestinationPickList.md)
 - [EmsResponse](docs/Model/EmsResponse.md)
 - [ErrorResponse](docs/Model/ErrorResponse.md)
 - [Errors](docs/Model/Errors.md)
 - [OriginPickList](docs/Model/OriginPickList.md)
 - [Services](docs/Model/Services.md)
 - [TimeInTransitRequest](docs/Model/TimeInTransitRequest.md)
 - [TimeInTransitResponse](docs/Model/TimeInTransitResponse.md)
 - [ValidationList](docs/Model/ValidationList.md)

## Documentation For Authorization


## oauth2

- **Type**: OAuth
- **Flow**: application
- **Authorization URL**: 
- **Scopes**: 


## Author



