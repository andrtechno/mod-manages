<?php

namespace panix\mod\mananges;


class Composer extends \Pixelion\Composer\Installers\Installer
{
    public static function postAutoloadDump(Event $event)
    {
        $vendorDir = $event->getComposer()->getConfig()->get('vendor-dir');
        require $vendorDir . '/autoload.php';


    }

    public static function postPackageInstall(PackageEvent $event)
    {
        $installedPackage = $event->getOperation()->getPackage();
        echo 'install pack!!!!!!';
        // do stuff
    }

    public static function warmCache(Event $event)
    {
        // make cache toasty
    }
}