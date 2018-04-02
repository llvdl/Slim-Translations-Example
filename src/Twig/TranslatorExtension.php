<?php

namespace App\Twig;

use Illuminate\Translation\Translator;

/**
 * Registers the Illuminate Translator as a the trans and transChoice functions in Twig.
 * The variable app.locale is registered as a global twig variables.
 */
class TranslatorExtension extends \Twig_Extension implements \Twig_Extension_GlobalsInterface
{
    /**
     * @var Translator
     */
    private $translator;

    public function __construct(Translator $translator)
    {
        $this->translator = $translator;
    }

    public function getName()
    {
        return 'slim_translator';
    }

    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('trans', array($this->translator, 'trans')),
            new \Twig_SimpleFunction('transChoice', array($this->translator, 'transChoice')),
        ];
    }

    public function getGlobals()
    {
        return [
            'app' => ['locale' => $this->translator->getLocale()]
        ];
    }
}
