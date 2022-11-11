<?php

namespace Linx\OmsNotificationClient\Notification;

use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class WhatsappService extends Base
{
    private const ENDPOINT_CREATE = '/api/v1/clients/{clientId}/whatsapp';

    public const ACCEPTED_PROVIDERS_TYPE = [
        'TWILIO',
    ];

    /**
     * @throws Exception
     */
    public function create(string $clientId, string $token, array $input): array
    {
        $this->validateInput($clientId, $input);

        return $this->send($this->getUrl($clientId), $token, $input);
    }

    private function validateInput(string $clientId, array $input): void
    {
        Validator::make($input, [
            'clientId' => [
                'required',
                'string',
            ],
            'referenceId' => [
                'required',
                'string'
            ],
            'application' => [
                'required',
                'string'
            ],
            'provider.type' => [
                'required',
                Rule::in(self::ACCEPTED_PROVIDERS_TYPE),
            ],
            'provider.sid' => [
                'required',
                'string',
            ],
            'provider.token' => [
                'required',
                'string',
            ],
            'to' => [
                'required',
                'integer',
            ],
            'from' => [
                'required',
                'integer',
            ],
            'body' => [
                'required',
                'string',
            ],
        ], [
            'provider.type.in' => 'The selected provider.type is invalid. Options: ' . implode(', ', self::ACCEPTED_PROVIDERS_TYPE) . '.',
        ])->validate();
    }

    /**
     * @throws Exception
     */
    public function getUrl(string $clientId): string
    {
        $host = env('OMS_NOTIFICATION_HOST');

        if (null === $host || false === filter_var($host, FILTER_VALIDATE_URL)) {
            throw new Exception("Invalid env config.");
        }

        $path = str_replace('{clientId}', $clientId, self::ENDPOINT_CREATE);

        return $host.$path;
    }
}
