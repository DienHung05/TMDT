<?php
/**
<<<<<<< HEAD
 * Copyright 2013 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\TestFramework\Integrity\Library\PhpParser;

/**
 * Class know how create any parser
 *
 */
class ParserFactory
{
    /**
     * @var ParserInterface[]
     */
    protected $parsers = [];

    /**
     * @var Uses
     */
    protected $uses;

    /**
     * @var StaticCalls
     */
    protected $staticCalls;

    /**
     * @var Throws
     */
    protected $throws;

    /**
     * @var Tokens
     */
    protected $tokens;

    /**
     * Return all parsers
     *
     * @param Tokens $tokens
     * @return ParserInterface[]
     */
    public function createParsers(Tokens $tokens)
    {
        if (empty($this->parsers)) {
            $this->parsers = [
                $this->uses = new Uses(),
                $this->staticCalls = new StaticCalls($tokens),
                $this->throws = new Throws($tokens),
            ];
        }
        return $this->parsers;
    }

    /**
     * Get uses
     *
     * @return Uses
     */
    public function getUses()
    {
        return $this->uses;
    }

    /**
     * Get static calls
     *
     * @return StaticCalls
     */
    public function getStaticCalls()
    {
        return $this->staticCalls;
    }

    /**
     * Get throws
     *
     * @return Throws
     */
    public function getThrows()
    {
        return $this->throws;
    }
}
