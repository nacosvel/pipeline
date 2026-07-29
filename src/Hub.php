<?php

namespace Nacosvel\Pipeline;

use Closure;
use Psr\Container\ContainerInterface;
use RuntimeException;

class Hub implements Contracts\Hub
{
    /**
     * All the available pipelines.
     *
     * @var array
     */
    protected array $pipelines = [];

    /**
     * Create a new Hub instance.
     *
     * @param ContainerInterface|null $container
     */
    public function __construct(protected ?ContainerInterface $container = null)
    {
        //
    }

    /**
     * Define the default named pipeline.
     *
     * @param Closure $callback
     *
     * @return void
     */
    public function defaults(Closure $callback): void
    {
        $this->pipeline('default', $callback);
    }

    /**
     * Define a new named pipeline.
     *
     * @param string  $name
     * @param Closure $callback
     *
     * @return void
     */
    public function pipeline(string $name, Closure $callback): void
    {
        $this->pipelines[$name] = $callback;
    }

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
    public function pipelines(string $name, array $pipes = []): void
    {
        $this->pipelines[$name] = function (Pipeline $pipeline, $passable) use ($name, $pipes) {
            return $pipeline->send($passable)->through($this->pipe($pipes, "{$name}.pipe"))->thenReturn();
        };
    }

    /**
     * Send an object through one of the available pipelines.
     *
     * @param mixed  $passable
     * @param string $pipeline
     *
     * @return mixed
     */
    public function pipe($passable, string $pipeline = 'default')
    {
        if (array_key_exists($pipeline, $this->pipelines) === false) {
            return $passable;
        }

        return call_user_func(
            $this->pipelines[$pipeline], new Pipeline($this->container), $passable
        );
    }

    /**
     * Get the container instance used by the hub.
     *
     * @return ContainerInterface
     *
     * @throws RuntimeException
     */
    public function getContainer(): ContainerInterface
    {
        if (!$this->container) {
            throw new RuntimeException('A container instance has not been passed to the Pipeline.');
        }

        return $this->container;
    }

    /**
     * Set the container instance used by the hub.
     *
     * @param ContainerInterface $container
     *
     * @return static
     */
    public function setContainer(ContainerInterface $container): static
    {
        $this->container = $container;

        return $this;
    }
}
