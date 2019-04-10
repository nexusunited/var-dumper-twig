<?php

namespace NxsSpryker\Yves\VarDumperTwig;

use Spryker\Yves\Kernel\AbstractFactory;
use Symfony\Bridge\Twig\Extension\DumpExtension;
use Symfony\Component\VarDumper\Cloner\ClonerInterface;
use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\HtmlDumper;
use Twig\Extension\ExtensionInterface;

class VarDumperTwigFactory extends AbstractFactory
{
    /**
     * @return \Twig\Extension\ExtensionInterface
     */
    public function createDumpExtension(): ExtensionInterface
    {
        return new DumpExtension(
            $this->createVarCloner(),
            $this->createHtmlDumper()
        );
    }

    /**
     * @return \Symfony\Component\VarDumper\Cloner\ClonerInterface
     */
    public function createVarCloner(): ClonerInterface
    {
        return new VarCloner();
    }

    /**
     * @return \Symfony\Component\VarDumper\Dumper\HtmlDumper
     */
    public function createHtmlDumper(): HtmlDumper
    {
        return new HtmlDumper();
    }
}
