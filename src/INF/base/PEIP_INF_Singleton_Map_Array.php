<?php

/*
 * This file is part of the PEIP package.
 * (c) 2010 Timo Michna <timomichna/yahoo.de>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * PEIP_INF_Singleton_Map_Array 
 *
 * @author Timo Michna <timomichna/yahoo.de>
 * @package PEIP 
 * @subpackage base 
 */



interface PEIP_INF_Singleton_Map_Array {

    public function getInstance($name, $arguments);

}