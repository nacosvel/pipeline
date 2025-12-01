<?php

namespace Nacosvel\Pipeline\Contracts;

interface Hub
{
    /**
     * Send an object through one of the available pipelines.
     *
     * @param mixed       $passable
     * @param string|null $pipeline
     *
     * @return mixed
     */
    public function pipe($passable, string $pipeline = null);
}
