<?php

namespace NxsSpryker\Yves\VarDumperTwig\Plugin\ServiceProvider;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Spryker\Yves\Kernel\AbstractPlugin;
use Twig_Environment;

/**
 * @method \NxsSpryker\Yves\VarDumperTwig\VarDumperTwigFactory getFactory()
 */
class VarDumperTwigServiceProvider extends AbstractPlugin implements ServiceProviderInterface
{
    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    public function register(Application $app): void
    {
        if (!$app['debug']) {
            return;
        }

        $this->extendTwig($app);
    }

    /**
     * @param \Silex\Application $app
     *
     * @return $this
     */
    protected function extendTwig(Application $app)
    {
        $app['twig'] = $app->share(
            $app->extend('twig', function (Twig_Environment $twig) {
                $twig->addExtension(
                    $this->getFactory()->createDumpExtension()
                );

                return $twig;
            })
        );

        return $this;
    }

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    public function boot(Application $app): void
    {
    }
}
