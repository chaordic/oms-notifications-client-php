# OMS-Notification-Client

## Installation

To install OMS-Notification-Client, run the command below and you will get the latest
version

```sh
composer require linx/oms-notifications-client-php
```

## Documentaion

OMS Notification client is a library used to access OMS Notification, with a pre-established class of service in order to facilitate integration.

### Webhook

Webhook is a type of notification used for integration between applications.

#### With Laravel

``` php
use Linx\OmsNotificationClient\Facades\WebhookFacade;

$result = WebhookFacade::create(string 'clientId', string 'token', array 'inputData', string 'env');
```

#### Without Laravel

``` php
use Linx\OmsNotificationClient\Notification\WebhookService;

$service = new WebhookService();
$result = $service->create(string 'clientId', string 'token', array 'inputData', string 'env');
```

## Maintainers!

Steps to publish release in packagist.org.
1. Create realese, atention with [Semantic Versioning](http://semver.org/);
2. Access https://packagist.org/packages/linx/oms-notifications-client-php
3. Authenticate with your account;
4. Click in "Update" button;

If you have no permission to manage the package, contact you manager.

License
=======

This library is released under the [MIT license](LICENSE).