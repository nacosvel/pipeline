<?php

namespace Nacosvel\Pipeline\Contracts;

use Closure;
use Psr\Container\ContainerInterface;
use RuntimeException;

interface Hub
{
    /**
     * Define the default named pipeline.
     *
     * @param Closure $callback
     *
     * @return void
     */
    public function defaults(Closure $callback): void;

    /**
     * Define a new named pipeline.
     *
     * @param string  $name
     * @param Closure $callback
     *
     * @return void
     */
    public function pipeline(string $name, Closure $callback): void;

    /**
     * Define a new named pipeline using a list of pipes.
     *
     * This method allows you to register a pipeline by providing an array of
     * pipe classes or callables. The pipeline will automatically send the
     * given passable value through the defined pipes and return the final
     * processed result.
     *
     * @param string $name   The name under which the pipeline should be stored.
     * @param array  $pipes  An array of pipes (classes or callables) the
     *                       passable will travel through.
     *
     * @return void
     */
    public function pipelines(string $name, array $pipes = []): void;

    /**
     * Send an object through one of the available pipelines.
     *
     * @param mixed  $passable
     * @param string $pipeline
     *
     * @return mixed
     */
    public function pipe($passable, string $pipeline = 'default');

    /**
     * Get the container instance used by the hub.
     *
     * @return ContainerInterface
     *
     * @throws RuntimeException
     */
    public function getContainer(): ContainerInterface;

    /**
     * Set the container instance used by the hub.
     *
     * @param ContainerInterface $container
     *
     * @return static
     */
    public function setContainer(ContainerInterface $container): static;
}
