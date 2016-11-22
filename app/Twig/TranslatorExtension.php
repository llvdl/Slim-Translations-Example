<?php

namespace Llvdl\App\Twig;

use Illuminate\Translation\Translator;

/**
 * Registers the Illuminate Translator as a the trans and transChoice functions in Twig
 */
class TranslatorExtension extends \Twig_Extension
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
}
