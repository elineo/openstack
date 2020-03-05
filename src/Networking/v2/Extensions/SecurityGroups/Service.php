<?php

namespace OpenStack\Networking\v2\Extensions\SecurityGroups;

use OpenStack\Common\Service\AbstractService;
use OpenStack\Networking\v2\Extensions\SecurityGroups\Models\SecurityGroup;
use OpenStack\Networking\v2\Extensions\SecurityGroups\Models\SecurityGroupRule;

/**
 * @property Api $api
 */
class Service extends AbstractService
{
    private function securityGroup(array $info = [])
    {
        return $this->model(SecurityGroup::class, $info);
    }

    private function securityGroupRule(array $info = [])
    {
        return $this->model(SecurityGroupRule::class, $info);
    }

    public function listSecurityGroups(array $options = [])
    {
        return $this->securityGroup()->enumerate($this->api->getSecurityGroups(), $options);
    }

    public function createSecurityGroup(array $options)
    {
        return $this->securityGroup()->create($options);
    }

    public function getSecurityGroup($id)
    {
        return $this->securityGroup(['id' => $id]);
    }

    public function listSecurityGroupRules()
    {
        return $this->securityGroupRule()->enumerate($this->api->getSecurityRules());
    }

    public function createSecurityGroupRule(array $options)
    {
        return $this->securityGroupRule()->create($options);
    }

    public function getSecurityGroupRule($id)
    {
        return $this->securityGroupRule(['id' => $id]);
    }
}
