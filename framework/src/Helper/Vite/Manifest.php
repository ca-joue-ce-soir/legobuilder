<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Helper\Vite;

final class Manifest
{
    /**
     * @var array
     */
    private $assets;

    public function __construct(string $manifestFilePath)
    {
        if (!file_exists($manifestFilePath)) {
            return;
        }

        $manifest = file_get_contents($manifestFilePath);
        $this->assets = json_decode($manifest);
    }

    public function getAssets(): array
    {
        return $this->assets;
    }
}
