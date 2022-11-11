<?php

use Linx\OmsNotificationClient\Notification\WhatsappService;
use PHPUnit\Framework\TestCase;

class WhatsappServiceTest extends TestCase
{
    private $input;

    public function setUp()
    {
        $this->input = [
            'clientId' => 'clientId',
            'referenceId' => 'ORDER-01216215-F1',
            'application' => 'ORDER',
            'provider' => [
                'type' => 'TWILIO',
                'sid' => 'ACXXXXXX',
                'token' => 'GVSWcOmXb74QMSqBlXS7sSPhiDsatFIaPwf27xPR',
            ],
            'to' => 8881231234,
            'from' => 9991231234,
            'body'=> '....',
        ];
    }

    public function testRequiredClientId()
    {
        $input = $this->input;
        unset($input['clientId']);

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('The given data was invalid.');

        $service = new WhatsappService();
        $service->create('clientId', 'token', $input);
    }

    public function testRequiredReferenceId()
    {
        $input = $this->input;
        unset($input['referenceId']);

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('The given data was invalid.');

        $service = new WhatsappService();
        $service->create('clientId', 'token', $input);
    }

    public function testRequiredApplication()
    {
        $input = $this->input;
        unset($input['application']);

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('The given data was invalid.');

        $service = new WhatsappService();
        $service->create('clientId', 'token', $input);
    }

    public function testRequiredProvider()
    {
        $input = $this->input;
        unset($input['provider']);

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('The given data was invalid.');

        $service = new WhatsappService();
        $service->create('clientId', 'token', $input);
    }

    public function testRequiredProviderType()
    {
        $input = $this->input;
        unset($input['provider']['type']);

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('The given data was invalid.');

        $service = new WhatsappService();
        $service->create('clientId', 'token', $input);
    }

    public function testRequiredProviderSid()
    {
        $input = $this->input;
        unset($input['provider']['sid']);

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('The given data was invalid.');

        $service = new WhatsappService();
        $service->create('clientId', 'token', $input);
    }

    public function testRequiredProviderToken()
    {
        $input = $this->input;
        unset($input['provider']['token']);

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('The given data was invalid.');

        $service = new WhatsappService();
        $service->create('clientId', 'token', $input);
    }

    public function testRequiredTo()
    {
        $input = $this->input;
        unset($input['to']);

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('The given data was invalid.');

        $service = new WhatsappService();
        $service->create('clientId', 'token', $input);
    }

    public function testRequiredFrom()
    {
        $input = $this->input;
        unset($input['from']);

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('The given data was invalid.');

        $service = new WhatsappService();
        $service->create('clientId', 'token', $input);
    }

    public function testRequiredBody()
    {
        $input = $this->input;
        unset($input['body']);

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('The given data was invalid.');

        $service = new WhatsappService();
        $service->create('clientId', 'token', $input);
    }
}
