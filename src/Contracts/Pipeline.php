<?php

namespace Nacosvel\Pipeline\Contracts;

use Closure;

interface Pipeline
{
    /**
     * Set the object being sent through the pipeline.
     *
     * @param mixed $passable
     *
     * @return $this
     */
    public function send($passable): static;

    /**
     * Set the array of pipes.
     *
     * @param mixed $pipes
     *
     * @return $this
     */
    public function through($pipes): static;

    /**
     * Set the method to call on the pipes.
     *
     * @param string $method
     *
     * @return $this
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
}
