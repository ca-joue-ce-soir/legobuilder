<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Helper\Vite;

use Exception;

final class Manifest
{
    /**
     * @var array
     */
    private $assets;

    public function __construct(string $manifestFilePath)
    {
        if (!file_exists($manifestFilePath)) {
            throw new Exception(sprintf('Manifest file (path: %s) does not exist.', $manifestFilePath));
        }

        $manifest = file_get_contents($manifestFilePath);
        $this->assets = json_decode($manifest);
    }

    public function getAssets(): array
    {
        return $this->assets;
    }
}
