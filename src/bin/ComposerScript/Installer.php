<?php
declare(strict_types=1);

namespace Pentagonal\ModularCLI\Bin\ComposerScript;

use Composer\Script\Event;

/**
 * Class Installer
 * @package Pentagonal\ModularCLI\Bin\ComposerScript
 */
class Installer
{
    /**
     * @param Event $event
     */
    public static function postUpdate(Event $event)
    {
        // @todo completion
    }

    /**
     * @param Event $event
     */
    public static function postInstall(Event $event)
    {
        // @todo completion
    }

    /**
     * @param Event $event
     */
    public static function build(Event $event)
    {
        // todo completion
    }
}
