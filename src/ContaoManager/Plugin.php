<?php

declare(strict_types=1);

namespace Hofff\Contao\Shariff\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Contao\ManagerPlugin\Routing\RoutingPluginInterface;
use Hofff\Contao\Shariff\HofffContaoShariffBundle;
use Symfony\Component\Config\Loader\LoaderResolverInterface;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Routing\RouteCollection;

class Plugin implements BundlePluginInterface, RoutingPluginInterface
{
    public function getBundles(ParserInterface $parser): array
    {
        $bundle = new BundleConfig(HofffContaoShariffBundle::class);
        $bundle->setReplace(['hofff_shariff']);
        $bundle->setLoadAfter([ContaoCoreBundle::class]);

        return [$bundle];
    }

    public function getRouteCollection(LoaderResolverInterface $resolver, KernelInterface $kernel): ?RouteCollection
    {
        $file = __DIR__.'/../Resources/config/routing.xml';

        return $resolver->resolve($file)->load($file);
    }
}
