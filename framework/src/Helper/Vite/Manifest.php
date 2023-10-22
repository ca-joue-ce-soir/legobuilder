<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Helper\Vite;

use Exception;
use InvalidArgumentException;

final class Manifest
{
    const ALLOWED_ALGORITHMS = ['sha256', 'sha384', 'sha512'];

    /**
     * @var array
     */
    private $manifest;

    /**
     * @var string
     */
    private $baseUri;

    /**
     * @var string
     */
    private $algorithm;

    public function __construct(
        string $manifestFilePath,
        string $baseUri,
        string $algorithm = 'sha256'
    ) {
        if (!file_exists($manifestFilePath)) {
            throw new Exception(sprintf('Manifest file does not exist ', $manifestFilePath));
        }

        try {
            $this->manifest = json_decode(file_get_contents($manifestFilePath), true);
        } catch (\Throwable $errorMessage) {
            throw new Exception("Failed loading manifest: $errorMessage");
        }

        if (false === parse_url($baseUri)) {
            throw new Exception("Failed to parse URL: $baseUri");
        }

        $this->baseUri = $baseUri;

        if (!in_array($algorithm, self::ALLOWED_ALGORITHMS)) {
            throw new InvalidArgumentException(sprintf('Unsupported hashing algorithm: %s (%s)', $algorithm, self::ALLOWED_ALGORITHMS));
        }

        $this->algorithm = $algorithm;
    }

    /**
     * Retrieves the manifest content.
     *
     * @return array The manifest content.
     */
    public function getManifest(): array
    {
        return $this->manifest;
    }
}
