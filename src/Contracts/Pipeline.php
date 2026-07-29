<?php

namespace Nacosvel\Pipeline\Contracts;

use Closure;
use Psr\Container\ContainerInterface;
use RuntimeException;

interface Pipeline
{
    /**
     * Set the object being sent through the pipeline.
     *
     * @param mixed $passable
     *
     * @return static
     */
    public function send($passable): static;

    /**
     * Set the array of pipes.
     *
     * @param mixed $pipes
     *
     * @return static
     */
    public function through($pipes): static;

    /**
     * Set the method to call on the pipes.
     *
     * @param string $method
     *
     * @return static
     */
    public function via($method): static;

    /**
     * Run the pipeline with a final destination callback.
     *
     * @param Closure $destination
     *
     * @return mixed
     */
    public function then(Closure $destination);

    /**
     * Run the pipeline and return the result.
     *
     * @return mixed
     */
    public function thenReturn();

    /**
     * Set a final callback to be executed after the pipeline ends regardless of the outcome.
     *
     * @param Closure $callback
     *
     * @return static
     */
    public function finally(Closure $callback): static;


    /**
     * Get the container instance.
     *
     * @return ContainerInterface
     *
     * @throws RuntimeException
     */
    public function getContainer(): ContainerInterface;

    /**
     * Set the container instance.
     *
     * @param ContainerInterface $container
     *
     * @return static
     */
    public function setContainer(ContainerInterface $container): static;
}
