<?php

namespace PEIP\INF\Channel;

/*
 * This file is part of the PEIP package.
 * (c) 2009-2016 Timo Michna <timomichna/yahoo.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * \PEIP\INF\Channel\Channel.
 *
 * @author Timo Michna <timomichna/yahoo.de>
 */
interface Channel
{
    /**
     * Return the name of this channel.
     */
    public function getName();

    /**
     * Send a message, blocking until either the message is accepted or the
     * specified timeout period elapses.
     *
     * @param message \PEIP\INF\Message\Message {@link Message} to send
     * @param timeout integer timeout in milliseconds
     *
     * @return null|bool if the message is sent successfully,
     *                   <code>false</false> if the specified timeout period elapses or
     *                   the send is interrupted
     */
    public function send(\PEIP\INF\Message\Message $message, $timeout = -1);
}
