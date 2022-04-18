<?php

namespace Landfill\Gw2Api;

use GuzzleHttp\Client;

class Api
{
    protected const API_URL          = 'https://api.guildwars2.com/';
    protected const SCHEMA_VERSION   = '2022-04-15T00:00:00';
    protected const DEFAULT_LANGUAGE = 'en';

    /**
     * @var string|null
     */
    protected ?string $authenticationKey = null;

    /**
     * @var \GuzzleHttp\Client
     */
    protected Client $httpClient;

    public function __construct(array $options = [])
    {
        $this->httpClient = $this->createClient();
    }

    protected function createClient(array $options = [])
    : Client {
        return new Client([
            ...$options,
            'base_uri' => self::API_URL,
        ]);
    }

}