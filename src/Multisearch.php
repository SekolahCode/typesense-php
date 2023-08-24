<?php

namespace Devloops\Typesence;

use Devloops\Typesence\Lib\Configuration;

/**
 * Class MultiSearch
 *
 * @package \Typesense
 */
class MultiSearch
{
    public const RESOURCE_PATH = '/multi_search';

    /**
     * @var \Devloops\Typesence\Lib\Configuration
     */
    private $config;

    /**
     * @var ApiCall
     */
    private ApiCall $apiCall;

    /**
     * Alias constructor.
     *
     * @param ApiCall $apiCall
     */
    public function __construct(Configuration $config)
    {
        $this->config = $config;
        $this->apiCall = new ApiCall($config);
    }

    /**
     * @param string $searches
     * @param array $queryParameters
     *
     * @return array
     * @throws TypesenseClientError|HttpClientException
     */
    public function perform(array $searches, array $queryParameters = []): array
    {
        return $this->apiCall->post(
            sprintf('%s', static::RESOURCE_PATH),
            $searches,
            true,
            $queryParameters
        );
    }
}