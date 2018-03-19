<?php

namespace Dse\ZipSearchBundle\ContaoManager;

use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;

class Plugin implements BundlePluginInterface
{
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create('Dse\ZipSearchBundle\DseZipSearchBundle')
                ->setLoadAfter(['Contao\CoreBundle\ContaoCoreBundle'])
//                ->setLoadAfter([ContaoCoreBundle::class])
                ->setReplace(['dse_zipsearch']),
        ];
    }
}