<?php

namespace OpenStack\Networking\v2;

use OpenStack\Common\Service\AbstractService;
use OpenStack\Networking\v2\Models\LoadBalancer;
use OpenStack\Networking\v2\Models\LoadBalancerHealthMonitor;
use OpenStack\Networking\v2\Models\LoadBalancerListener;
use OpenStack\Networking\v2\Models\LoadBalancerMember;
use OpenStack\Networking\v2\Models\LoadBalancerPool;
use OpenStack\Networking\v2\Models\Network;
use OpenStack\Networking\v2\Models\Pool;
use OpenStack\Networking\v2\Models\Port;
use OpenStack\Networking\v2\Models\Quota;
use OpenStack\Networking\v2\Models\Subnet;

/**
 * Network v2 service for OpenStack.
 *
 * @property \OpenStack\Networking\v2\Api $api
 */
class Service extends AbstractService
{
    /**
     * Create a new network resource.
     *
     * @param array $options {@see \OpenStack\Networking\v2\Api::postNetwork}
     */
    public function createNetwork(array $options)
    {
        return $this->model(Network::class)->create($options);
    }

    /**
     * Create a new network resources.
     *
     * @param array $options {@see \OpenStack\Networking\v2\Api::postNetworks}
     */
    public function createNetworks(array $options)
    {
        return $this->model(Network::class)->bulkCreate($options);
    }

    /**
     * Retrieve a network object without calling the remote API. Any values provided in the array will populate the
     * empty object, allowing you greater control without the expense of network transactions. To call the remote API
     * and have the response populate the object, call {@see Network::retrieve}.
     */
    public function getNetwork($id)
    {
        return $this->model(Network::class, ['id' => $id]);
    }

    /**
     * List networks.
     *
     * @param array $options {@see \OpenStack\Networking\v2\Api::getNetworks}
     */
    public function listNetworks(array $options = [])
    {
        return $this->model(Network::class)->enumerate($this->api->getNetworks(), $options);
    }

    /**
     * Create a new subnet resource.
     *
     * @param array $options {@see \OpenStack\Networking\v2\Api::postSubnet}
     */
    public function createSubnet(array $options)
    {
        return $this->model(Subnet::class)->create($options);
    }

    /**
     * Create a new subnet resources.
     *
     * @param array $options {@see \OpenStack\Networking\v2\Api::postSubnets}
     *
     * @return []Subnet
     */
    public function createSubnets(array $options)
    {
        return $this->model(Subnet::class)->bulkCreate($options);
    }

    /**
     * Retrieve a subnet object without calling the remote API. Any values provided in the array will populate the
     * empty object, allowing you greater control without the expense of network transactions. To call the remote API
     * and have the response populate the object, call {@see Subnet::retrieve}.
     */
    public function getSubnet($id)
    {
        return $this->model(Subnet::class, ['id' => $id]);
    }

    /**
     * List subnets.
     *
     * @param array $options {@see \OpenStack\Networking\v2\Api::getSubnets}
     */
    public function listSubnets(array $options = [])
    {
        return $this->model(Subnet::class)->enumerate($this->api->getSubnets(), $options);
    }

    /**
     * Create a new port resource.
     *
     * @param array $options {@see \OpenStack\Networking\v2\Api::postSinglePort}
     */
    public function createPort(array $options)
    {
        return $this->model(Port::class)->create($options);
    }

    /**
     * Create new port resources.
     *
     * @param array $options {@see \OpenStack\Networking\v2\Api::postMultiplePorts}
     *
     * @return []Port
     */
    public function createPorts(array $options)
    {
        return $this->model(Port::class)->bulkCreate($options);
    }

    /**
     * Retrieve a subnet object without calling the remote API. Any values provided in the array will populate the
     * empty object, allowing you greater control without the expense of network transactions. To call the remote API
     * and have the response populate the object, call {@see Port::retrieve}.
     */
    public function getPort($id)
    {
        return $this->model(Port::class, ['id' => $id]);
    }

    /**
     * List ports.
     *
     * @param array $options {@see \OpenStack\Networking\v2\Api::getPorts}
     */
    public function listPorts(array $options = [])
    {
        return $this->model(Port::class)->enumerate($this->api->getPorts(), $options);
    }

    /**
     * Lists quotas for projects with non-default quota values.
     */
    public function listQuotas()
    {
        return $this->model(Quota::class)->enumerate($this->api->getQuotas(), []);
    }

    /**
     * Lists quotas for a project.
     *
     * Retrieve a quota object without calling the remote API. Any values provided in the array will populate the
     * empty object, allowing you greater control without the expense of network transactions. To call the remote API
     * and have the response populate the object, call {@see Quota::retrieve}.
     */
    public function getQuota($tenantId)
    {
        return $this->model(Quota::class, ['tenantId' => $tenantId]);
    }

    /**
     * Lists default quotas for a project.
     */
    public function getDefaultQuota($tenantId)
    {
        $quota = $this->model(Quota::class, ['tenantId' => $tenantId]);
        $quota->populateFromResponse($this->execute($this->api->getQuotaDefault(), ['tenantId' => $tenantId]));

        return $quota;
    }

    /**
     * Lists loadbalancers for projects.
     */
    public function listLoadBalancers()
    {
        return $this->model(LoadBalancer::class)->enumerate($this->api->getLoadBalancers());
    }

    /**
     * Retrieve an instance of a LoadBalancer object.
     */
    public function getLoadBalancer($id)
    {
        return $this->model(LoadBalancer::class, ['id' => $id]);
    }

    /**
     * Create a new loadbalancer resource.
     *
     * @param array $options {@see \OpenStack\Networking\v2\Api::postLoadBalancer}
     */
    public function createLoadBalancer(array $options)
    {
        return $this->model(LoadBalancer::class)->create($options);
    }

    /**
     * Lists loadbalancer listeners.
     */
    public function listLoadBalancerListeners()
    {
        return $this->model(LoadBalancerListener::class)->enumerate($this->api->getLoadBalancerListeners());
    }

    /**
     * Retrieve an instance of a loadbalancer listener object.
     */
    public function getLoadBalancerListener($id)
    {
        return $this->model(LoadBalancerListener::class, ['id' => $id]);
    }

    /**
     * Create a new loadbalancer Listener resource.
     *
     * @param array $options {@see \OpenStack\Networking\v2\Api::postLoadBalancerListener}
     */
    public function createLoadBalancerListener(array $options)
    {
        return $this->model(LoadBalancerListener::class)->create($options);
    }

    /**
     * Lists loadbalancer pools.
     */
    public function listLoadBalancerPools()
    {
        return $this->model(LoadBalancerPool::class)->enumerate($this->api->getLoadBalancerPools());
    }

    /**
     * Retrieve an instance of a loadbalancer Pool object.
     */
    public function getLoadBalancerPool($id)
    {
        return $this->model(LoadBalancerPool::class, ['id' => $id]);
    }

    /**
     * Create a new loadbalancer Pool resource.
     *
     * @param array $options {@see \OpenStack\Networking\v2\Api::postLoadBalancerPool}
     */
    public function createLoadBalancerPool(array $options)
    {
        return $this->model(LoadBalancerPool::class)->create($options);
    }

    /**
     * Lists loadbalancer members.
     */
    public function listLoadBalancerMembers($poolId)
    {
        return $this->model(LoadBalancerPool::class, ['poolId' => $poolId])->enumerate($this->api->getLoadBalancerMembers());
    }

    /**
     * Retrieve an instance of a loadbalancer Member object.
     */
    public function getLoadBalancerMember($poolId, $memberId)
    {
        return $this->model(LoadBalancerMember::class, ['poolId' => $poolId, 'id' => $memberId]);
    }

    /**
     * Create a new loadbalancer member resource.
     *
     * @param array $options {@see \OpenStack\Networking\v2\Api::postLoadBalancerMember}
     */
    public function createLoadBalancerMember(array $options)
    {
        return $this->model(LoadBalancerMember::class)->create($options);
    }

    /**
     * Lists loadbalancer healthmonitors.
     */
    public function listLoadBalancerHealthMonitors()
    {
        return $this->model(LoadBalancerHealthMonitor::class)->enumerate($this->api->getLoadBalancerHealthMonitors());
    }

    /**
     * Retrieve an instance of a loadbalancer healthmonitor object.
     */
    public function getLoadBalancerHealthMonitor($id)
    {
        return $this->model(LoadBalancerHealthMonitor::class, ['id' => $id]);
    }

    /**
     * Create a new loadbalancer healthmonitor resource.
     *
     * @param array $options {@see \OpenStack\Networking\v2\Api::postLoadBalancerHealthMonitor}
     */
    public function createLoadBalancerHealthMonitor(array $options)
    {
        return $this->model(LoadBalancerHealthMonitor::class)->create($options);
    }
}
