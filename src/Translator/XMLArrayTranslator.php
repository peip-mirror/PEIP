<?php
/*
 * This file is part of the PEIP package.
 * (c) 2009-2011 Timo Michna <timomichna/yahoo.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * XMLArrayTranslator
 * Abstract base class for transformers.
 *
 * @author Timo Michna <timomichna/yahoo.de>
 * @package PEIP
 * @subpackage translator
 * @extends PEIP\Pipe\Pipe
 * @implements \PEIP\INF\Transformer\Transformer, \PEIP\INF\Event\Connectable, \PEIP\INF\Channel\SubscribableChannel, \PEIP\INF\Channel\Channel, \PEIP\INF\Handler\Handler, \PEIP\INF\Message\MessageBuilder
 */

namespace PEIP\Translator;

class XMLArrayTranslator {

    public static function translate($content){
        $array = array();
        try {
            $node = simplexml_load_string($content);
        }
        catch(Exception $e){
            return false;
        }     
        
        return self::doTranslate($node);
    }

    protected static function doTranslate(SimpleXMLElement $node){
        
        $array = array();
        $array['type'] = $node['type']
            ? (string)$node['type']
            : (string)$node->getName();
        $value = (string)$node;
        if($value != ''){
            $array['value'] = $value;
        }

        foreach($node->attributes() as $name=>$value){
            $array[$name] = (string)$value;
        }
        foreach($node->children() as $nr=>$child){
            $name = $child->getName();
            $res = self::doTranslate($child);

            if(isset($array[$name])){
                if(is_string($array[$name])){
                    $array[$name] = array(
                        array(
                            'type'=>$name,
                            'value'=>$array[$name]
                        )
                    );
                }
            }else{
                $array[$name] = array();
            }
            $array[$name][] = $res;
        }
    
        return $array;
    }

}
