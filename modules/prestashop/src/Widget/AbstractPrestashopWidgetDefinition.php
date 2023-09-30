<?php

namespace Legobuilder\Widget;

use Exception;
use Legobuilder\Framework\Widget\Definition\AbstractWidgetDefinition;
use Symfony\Contracts\Translation\TranslatorInterface;
use Smarty_Data;

abstract class AbstractPrestashopWidgetDefinition extends AbstractWidgetDefinition
{
    /**
     * @var TranslatorInterface
     */
    private $translator;

    /**
     * @var Smarty_Data
     */
    private $smarty;

    public function __construct(TranslatorInterface $translator, Smarty_Data $smarty)
    {
        $this->translator = $translator;
        $this->smarty = $smarty;
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
     * Render a template with smarty
     * 
     * @return string Rendered template
     */
    protected function view(string $templatePath, array $parameters = []): string
    {
        try {
            $this->smarty->assign($parameters);
            return $this->smarty->fetch($templatePath);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}