<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console;

use Symfony\Component\Console\Event\ConsoleCommandEvent;
use Symfony\Component\Console\Event\ConsoleErrorEvent;
use Symfony\Component\Console\Event\ConsoleSignalEvent;
use Symfony\Component\Console\Event\ConsoleTerminateEvent;

/**
 * Contains all events dispatched by an Application.
 *
 * @author Francesco Levorato <git@flevour.net>
 */
final class ConsoleEvents
{
    /**
     * The COMMAND event allows you to attach listeners before any command is
     * executed by the console. It also allows you to modify the command, input and output
     * before they are handed to the command.
     *
     * @Observer("Symfony\Component\Console\Observer\ConsoleCommandEvent")
     */
    public const COMMAND = 'console.command';

    /**
     * The SIGNAL event allows you to perform some actions
     * after the command execution was interrupted.
     *
     * @Observer("Symfony\Component\Console\Observer\ConsoleSignalEvent")
     */
    public const SIGNAL = 'console.signal';

    /**
     * The TERMINATE event allows you to attach listeners after a command is
     * executed by the console.
     *
     * @Observer("Symfony\Component\Console\Observer\ConsoleTerminateEvent")
     */
    public const TERMINATE = 'console.terminate';

    /**
     * The ERROR event occurs when an uncaught exception or error appears.
     *
     * This event allows you to deal with the exception/error or
     * to modify the thrown exception.
     *
     * @Observer("Symfony\Component\Console\Observer\ConsoleErrorEvent")
     */
    public const ERROR = 'console.error';

    /**
     * Observer aliases.
     *
     * These aliases can be consumed by RegisterListenersPass.
     */
    public const ALIASES = [
        ConsoleCommandEvent::class => self::COMMAND,
        ConsoleErrorEvent::class => self::ERROR,
        ConsoleSignalEvent::class => self::SIGNAL,
        ConsoleTerminateEvent::class => self::TERMINATE,
    ];
}
