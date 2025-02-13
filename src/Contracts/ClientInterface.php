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

use Laudis\Neo4j\Databags\Statement;
use Laudis\Neo4j\Databags\TransactionConfiguration;
use Laudis\Neo4j\Exception\Neo4jException;
use Laudis\Neo4j\Types\CypherList;

/**
 * @template T
 */
interface ClientInterface
{
    /**
     * Runs a one off transaction with the provided query and parameters over the connection with the provided alias or the master alias otherwise.
     *
     * @param iterable<string, scalar|iterable|null> $parameters
     *
     * @throws Neo4jException
     *
     * @return T
     */
    public function run(string $query, iterable $parameters = [], ?string $alias = null);

    /**
     * Runs a one off transaction with the provided statement over the connection with the provided alias or the master alias othwerise.
     *
     * @throws Neo4jException
     *
     * @return T
     */
    public function runStatement(Statement $statement, ?string $alias = null);

    /**
     * Runs a one off transaction with the provided statements over the connection with the provided alias or the master alias othwerise.
     *
     * @param iterable<Statement> $statements
     *
     * @throws Neo4jException
     *
     * @return CypherList<T>
     */
    public function runStatements(iterable $statements, ?string $alias = null): CypherList;

    /**
     * Opens a transaction over the connection with the given alias if provided, the master alias otherwise.
     *
     * @param iterable<Statement>|null $statements
     *
     * @throws Neo4jException
     *
     * @return UnmanagedTransactionInterface<T>
     */
    public function beginTransaction(?iterable $statements = null, ?string $alias = null, ?TransactionConfiguration $config = null): UnmanagedTransactionInterface;

    /**
     * @return DriverInterface<T>
     */
    public function getDriver(?string $alias): DriverInterface;

    /**
     * @template U
     *
     * @param callable(TransactionInterface<T>):U $tsxHandler
     *
     * @return U
     */
    public function writeTransaction(callable $tsxHandler, ?string $alias = null, ?TransactionConfiguration $config = null);

    /**
     * @template U
     *
     * @param callable(TransactionInterface<T>):U $tsxHandler
     *
     * @return U
     */
    public function readTransaction(callable $tsxHandler, ?string $alias = null, ?TransactionConfiguration $config = null);

    /**
     * Alias for write transaction.
     *
     * @template U
     *
     * @param callable(TransactionInterface<T>):U $tsxHandler
     *
     * @return U
     */
    public function transaction(callable $tsxHandler, ?string $alias = null, ?TransactionConfiguration $config = null);
}
