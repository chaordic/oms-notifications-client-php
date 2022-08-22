<?php

use Linx\OmsNotificationClient\Notification\WebhookService;
use PHPUnit\Framework\TestCase;

class WebhookServiceTest extends TestCase
{
    private $input;
    
    public function setUp()
    {
        $this->input = [
            'clientId' => 'clientId',
            'referenceId' => 'ORDER-01216215-F1',
            'application' => 'ORDER',
            'url' => 'http://google.com',
            'method' => 'POST',
            'body'=> '....',
            'headers' => [],
            'retry' => 2,
            'auth' => [
                'type' => 'Bearer',
                'token' => 'GVSWcOmXb74QMSqBlXS7sSPhiDsatFIaPwf27xPR',
            ]
        ];
    }

    public function testRequiredClientId()
    {
        $input = $this->input;
        unset($input['clientId']);

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('The given data was invalid.');

        $service = new WebhookService();
        $result = $service->create('clientId', 'token', $input, 'development');
    }

    public function testRequiredReferenceId()
    {
        $input = $this->input;
        unset($input['referenceId']);

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('The given data was invalid.');

        $service = new WebhookService();
        $result = $service->create('clientId', 'token', $input, 'development');
    }

    public function testRequiredApplication()
    {
        $input = $this->input;
        unset($input['application']);

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('The given data was invalid.');

        $service = new WebhookService();
        $result = $service->create('clientId', 'token', $input, 'development');
    }

    public function testRequiredUrl()
    {
        $input = $this->input;
        unset($input['url']);

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('The given data was invalid.');

        $service = new WebhookService();
        $result = $service->create('clientId', 'token', $input, 'development');
    }

    public function testRequiredMethod()
    {
        $input = $this->input;
        unset($input['method']);

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('The given data was invalid.');

        $service = new WebhookService();
        $result = $service->create('clientId', 'token', $input, 'development');
    }

    public function testRequiredAuthType()
    {
        $input = $this->input;
        unset($input['auth']['type']);

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('The given data was invalid.');

        $service = new WebhookService();
        $result = $service->create('clientId', 'token', $input, 'development');
    }

    public function testRequiredAuthToken()
    {
        $input = $this->input;
        unset($input['auth']['token']);

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('The given data was invalid.');

        $service = new WebhookService();
        $result = $service->create('clientId', 'token', $input, 'development');
    }
}
