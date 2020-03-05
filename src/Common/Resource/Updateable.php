<?php

namespace OpenStack\Common\Resource;

/**
 * Represents a resource that can be updated.
 */
interface Updateable
{
    /**
     * Update the current resource with the configuration set out in the user options.
     */
    public function update();
}
