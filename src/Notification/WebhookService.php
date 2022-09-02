<?php

namespace Linx\OmsNotificationClient\Notification;

use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class WebhookService extends Base
{
    private const ENDPOINT_CREATE = '/api/v1/clients/{clientId}/webhook';

    private const ACCEPTED_METHODS = [
        'POST',
        'PUT',
        'DELETE',
        'PATCH',
    ];

    private const ACCEPTED_AUTH_TYPES = [
        'Bearer',
        'Basic',
        'AWS',
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
        /** @var ValidationValidator $validator */
        $validator = Validator::make($input, [
            'clientId' => [
                'required',
                'string',
                Rule::in([$clientId]),
            ],
            'referenceId' => [
                'required',
                'string'
            ],
            'application' => [
                'required',
                'string'
            ],
            'url' => [
                'required',
                'string',
                'url'
            ],
            'method' => [
                'required',
                Rule::in(self::ACCEPTED_METHODS),
            ],
            'headers' => [
                'array',
            ],
            'retry' => [
                'integer',
            ],
            'auth.type' => [
                'string',
                Rule::in(self::ACCEPTED_AUTH_TYPES),
                Rule::requiredIf(array_key_exists('auth', $input)),
            ],
            'auth.token' => [
                'string',
                Rule::requiredIf(array_key_exists('auth', $input)),
            ],
        ], [
            'clientId.in' => 'The defined clientId must be equal to ' . $clientId . ', otherwise change the parameter clientId.',
            'method.in' => 'The selected method is invalid. Options: ' . implode(', ', self::ACCEPTED_METHODS) . '.',
            'auth.type.in' => 'The selected auth.type is invalid. Options: ' . implode(', ', self::ACCEPTED_AUTH_TYPES) . '.',
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
