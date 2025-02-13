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

namespace Laudis\Neo4j\Databags;

use Laudis\Neo4j\Contracts\AuthenticateInterface;
use Psr\Http\Message\UriInterface;

final class DriverSetup
{
    private UriInterface $uri;
    private AuthenticateInterface $auth;
    private float $socketTimeout;

    public function __construct(UriInterface $uri, AuthenticateInterface $auth, float $socketTimeout)
    {
        $this->uri = $uri;
        $this->auth = $auth;
        $this->socketTimeout = $socketTimeout;
    }

    public function getAuth(): AuthenticateInterface
    {
        return $this->auth;
    }

    public function getUri(): UriInterface
    {
        return $this->uri;
    }

    public function getSocketTimeout(): float
    {
        return $this->socketTimeout;
    }
}
