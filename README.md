# OMS-Notification-Client

## Installation

To install OMS-Notification-Client, run the command below and you will get the latest
version

``` sh
composer require linx/oms-notifications-client-php
```

## Configuration

Add variable to enviroment file (.env).

``` sh
OMS_NOTIFICATION_HOST = http://oms-notification.com.br
```

## Documentaion

OMS Notification client is a library used to access OMS Notification, with a pre-established class of service in order to facilitate integration.

### Webhook

Webhook is a type of notification used for integration between applications.

#### With Laravel

``` php
use Linx\OmsNotificationClient\Facades\WebhookFacade;

$result = WebhookFacade::create(string 'clientId', string 'token', array 'inputData');
```

#### Without Laravel

``` php
use Linx\OmsNotificationClient\Notification\WebhookService;

$webhookService = new WebhookService();
$result = $webhookService->create(string 'clientId', string 'token', array 'inputData');
```

#### Example of inputData

``` php
$input = [
    'clientId' => 'clientid',
    'referenceId' => 'ORDER-01216215-F1',
    'application' => 'ORDER',
    'url' => 'http://xpto.com',
    'method' => 'POST',
    'body'=> '....',
    'headers' => [],
    'retry' => 2,
    'auth' => [
        'type' => 'Bearer',
        'token' => 'GVSWcOmXb74QMSqBlXS7sSPhiDsatFIaPwf27xPR',
    ]
];
```

=======


### Whatsapp

Create notification to whatsapp number.

#### With Laravel

``` php
use Linx\OmsNotificationClient\Facades\WhatsappFacade;

$result = WhatsappFacade::create(string 'clientId', string 'token', array 'inputData');
```

#### Without Laravel

``` php
use Linx\OmsNotificationClient\Notification\WhatsappService;

$whatsappService = new WhatsappService();
$result = $whatsappService->create(string 'clientId', string 'token', array 'inputData');
```

#### Example of inputData

``` php
$input = [
    'clientId' => $client->clientId,
    'referenceId' => 'ORDER-01216215-F1',
    'application' => 89665,
    'provider' => [
        'type' => 'TWILIO',
        'sid' => 'ACXXXXXX',
        'token' => 'GVSWcOmXb74QMSqBlXS7sSPhiDsatFIaPwf27xPR',
    ],
    'to' => 8881231234,
    'from' => 9991231234,
    'body'=> '....',
];
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