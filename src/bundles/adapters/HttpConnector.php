<?php

namespace Adapters;

/**
 * HttpConnector is an adapter interface
 * Adapters are usualy connectors to someone external service.
 * To better understand why to use adapters look at this site https://refactoring.guru/design-patterns/adapter
 */
interface HttpConnector
{
    public function getResponse(): \stdClass;
}