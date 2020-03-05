<?php

namespace OpenStack\ObjectStore\v1\Models;

use Psr\Http\Message\ResponseInterface;

trait MetadataTrait
{
    public function parseMetadata(ResponseInterface $response)
    {
        $metadata = [];

        foreach ($response->getHeaders() as $header => $value) {
            if (0 === strpos($header, static::METADATA_PREFIX)) {
                $name            = substr($header, strlen(static::METADATA_PREFIX));
                $metadata[$name] = $response->getHeader($header)[0];
            }
        }

        return $metadata;
    }
}
