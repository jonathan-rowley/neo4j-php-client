<?php

declare(strict_types=1);

/*
 * This file is part of the Laudis Neo4j package.
 *
 * (c) Laudis technologies <http://laudis.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Laudis\Neo4j\Contracts;

use BadMethodCallException;
use Laudis\Neo4j\Types\CypherMap;

interface HasPropertiesInterface
{
    /**
     * @return CypherMap<mixed>
     */
    public function getProperties(): CypherMap;

    /**
     * @param string $name
     *
     * @return mixed
     */
    public function __get($name);

    /**
     * Always throws an exception as cypher objects are immutable.
     *
     * @param string $name
     * @param mixed  $value
     *
     * @throws BadMethodCallException
     */
    public function __set($name, $value): void;

    /**
     * @param string $name
     */
    public function __isset($name): bool;
}
