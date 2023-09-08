<?php

namespace Legobuilder\Widget;

use Legobuilder\Framework\Widget\Definition\AbstractWidgetDefinition;
use Symfony\Contracts\Translation\TranslatorInterface;

abstract class AbstractTranslatorWidgetDefinition extends AbstractWidgetDefinition
{
    /**
     * @var TranslatorInterface
     */
    private $translator;

    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    /**
     * Get the translated chain from key.
     *
     * @param string $key the key to be translated
     * @param string $domain the domain to be selected
     * @param array $parameters Optional, pass parameters if needed (uncommon)
     *
     * @returns string
     */
    protected function trans($key, $domain, $parameters = [])
    {
        return $this->translator->trans($key, $parameters, $domain);
    }

    /**
     * Get the translator.
     * 
     * @return TranslatorInterface
     */
    protected function getTranslator(): TranslatorInterface
    {
        return $this->translator;
    }
}