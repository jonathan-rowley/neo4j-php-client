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

namespace Laudis\Neo4j\Exception;

use function implode;
use RuntimeException;

final class UnsupportedScheme extends RuntimeException
{
    /**
     * @param list<string> $supportedSchemas
     */
    public static function make(string $schema, array $supportedSchemas): self
    {
        return new self('Unsupported schema: '.$schema.', available schema\'s are: '.implode(',', $supportedSchemas));
    }
}
