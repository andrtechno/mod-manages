<?php

namespace panix\mod\mananges;

use Composer\Script\Event;


class Composer
{
    public static function postAutoloadDump(Event $event)
    {
        $vendorDir = $event->getComposer()->getConfig()->get('vendor-dir');
        require $vendorDir . '/autoload.php';


    }

    public static function postPackageInstall(Event $event)
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