<?php

namespace OpenStack\Networking\v2;

use OpenStack\Common\Api\AbstractParams;

class Params extends AbstractParams
{
    /**
     * Returns information about description parameter.
     */
    public function descriptionJson()
    {
        return [
            'type'     => self::STRING_TYPE,
            'location' => self::JSON,
        ];
    }

    /**
     * Returns information about name parameter.
     */
    public function nameJson()
    {
        return [
            'type'     => self::STRING_TYPE,
            'location' => self::JSON,
        ];
    }

    public function urlId($type)
    {
        return array_merge(parent::id($type), [
            'required' => true,
            'location' => self::URL,
        ]);
    }

    public function shared()
    {
        return [
            'type'        => self::BOOL_TYPE,
            'location'    => self::JSON,
            'description' => 'Indicates whether this network is shared across all tenants',
        ];
    }

    public function adminStateUp()
    {
        return [
            'type'        => self::BOOL_TYPE,
            'location'    => self::JSON,
            'sentAs'      => 'admin_state_up',
            'description' => 'The administrative state of the network',
        ];
    }

    public function portSecurityEnabled()
    {
        return [
            'type'        => self::BOOL_TYPE,
            'location'    => self::JSON,
            'sentAs'      => 'port_security_enabled',
            'description' => 'The port security status. A valid value is enabled (true) or disabled (false). If port security is enabled for the port, security 
                              group rules and anti-spoofing rules are applied to the traffic on the port. If disabled, no such rules are applied.',
        ];
    }

    public function networkId()
    {
        return [
            'type'        => self::STRING_TYPE,
            'required'    => true,
            'sentAs'      => 'network_id',
            'description' => 'The ID of the attached network',
        ];
    }

    public function ipVersion()
    {
        return [
            'type'        => self::INT_TYPE,
            'required'    => true,
            'sentAs'      => 'ip_version',
            'description' => 'The IP version, which is 4 or 6',
        ];
    }

    public function cidr()
    {
        return [
            'type'        => self::STRING_TYPE,
            'required'    => true,
            'sentAs'      => 'cidr',
            'description' => 'The CIDR',
        ];
    }

    public function tenantId()
    {
        return [
            'type'        => self::STRING_TYPE,
            'sentAs'      => 'tenant_id',
            'description' => 'The ID of the tenant who owns the network. Only administrative users can specify a tenant ID other than their own. You cannot change this value through authorization policies',
        ];
    }

    public function projectId()
    {
        return [
            'type'        => self::STRING_TYPE,
            'sentAs'      => 'project_id',
            'location'    => self::QUERY,
            'description' => 'The ID of the tenant who owns the network. Only administrative users can specify a tenant ID other than their own. You cannot change this value through authorization policies',
        ];
    }

    public function gatewayIp()
    {
        return [
            'type'        => self::STRING_TYPE,
            'sentAs'      => 'gateway_ip',
            'description' => 'The gateway IP address',
        ];
    }

    public function enableDhcp()
    {
        return [
            'type'        => self::BOOL_TYPE,
            'sentAs'      => 'enable_dhcp',
            'description' => 'Set to true if DHCP is enabled and false if DHCP is disabled.',
        ];
    }

    public function dnsNameservers()
    {
        return [
            'type'        => self::ARRAY_TYPE,
            'sentAs'      => 'dns_nameservers',
            'description' => 'A list of DNS name servers for the subnet.',
            'items'       => [
                'type'        => self::STRING_TYPE,
                'description' => 'The nameserver',
            ],
        ];
    }

    public function allocationPools()
    {
        return [
            'type'   => self::ARRAY_TYPE,
            'sentAs' => 'allocation_pools',
            'items'  => [
                'type'       => self::OBJECT_TYPE,
                'properties' => [
                    'start' => [
                        'type'        => self::STRING_TYPE,
                        'description' => 'The start address for the allocation pools',
                    ],
                    'end' => [
                        'type'        => self::STRING_TYPE,
                        'description' => 'The end address for the allocation pools',
                    ],
                ],
            ],
            'description' => 'The start and end addresses for the allocation pools',
        ];
    }

    public function hostRoutes()
    {
        return [
            'type'   => self::ARRAY_TYPE,
            'sentAs' => 'host_routes',
            'items'  => [
                'type'       => self::OBJECT_TYPE,
                'properties' => [
                    'destination' => [
                        'type'        => self::STRING_TYPE,
                        'description' => 'Destination for static route',
                    ],
                    'nexthop' => [
                        'type'        => self::STRING_TYPE,
                        'description' => 'Nexthop for the destination',
                    ],
                ],
            ],
            'description' => 'A list of host route dictionaries for the subnet',
        ];
    }

    public function statusQuery()
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::QUERY,
            'description' => 'Allows filtering by port status.',
            'enum'        => ['ACTIVE', 'DOWN'],
        ];
    }

    public function displayNameQuery()
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::QUERY,
            'sentAs'      => 'display_name',
            'description' => 'Allows filtering by port name.',
        ];
    }

    public function adminStateQuery()
    {
        return [
            'type'        => self::BOOL_TYPE,
            'location'    => self::QUERY,
            'sentAs'      => 'admin_state',
            'description' => 'Allows filtering by admin state.',
        ];
    }

    public function networkIdQuery()
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::QUERY,
            'sentAs'      => 'network_id',
            'description' => 'Allows filtering by network ID.',
        ];
    }

    public function tenantIdQuery()
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::QUERY,
            'sentAs'      => 'tenant_id',
            'description' => 'Allows filtering by tenant ID.',
        ];
    }

    public function deviceOwnerQuery()
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::QUERY,
            'sentAs'      => 'device_owner',
            'description' => 'Allows filtering by device owner.',
        ];
    }

    public function macAddrQuery()
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::QUERY,
            'sentAs'      => 'mac_address',
            'description' => 'Allows filtering by MAC address.',
        ];
    }

    public function portIdQuery()
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::QUERY,
            'sentAs'      => 'port_id',
            'description' => 'Allows filtering by port UUID.',
        ];
    }

    public function secGroupsQuery()
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::QUERY,
            'sentAs'      => 'security_groups',
            'description' => 'Allows filtering by device owner. Format should be a comma-delimeted list.',
        ];
    }

    public function deviceIdQuery()
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::QUERY,
            'sentAs'      => 'device_id',
            'description' => 'The UUID of the device that uses this port. For example, a virtual server.',
        ];
    }

    public function macAddr()
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::JSON,
            'sentAs'      => 'mac_address',
            'description' => 'The MAC address. If you specify an address that is not valid, a Bad Request (400) status code is returned. If you do not specify a MAC address, OpenStack Networking tries to allocate one. If a failure occurs, a Service Unavailable (503) response code is returned.',
        ];
    }

    public function fixedIps()
    {
        return [
            'type'        => self::ARRAY_TYPE,
            'location'    => self::JSON,
            'sentAs'      => 'fixed_ips',
            'description' => 'The IP addresses for the port. If you would like to assign multiple IP addresses for the
                              port, specify multiple entries in this field. Each entry consists of IP address (ipAddress)
                              and the subnet ID from which the IP address is assigned (subnetId)',
            'items' => [
                'type'       => self::OBJECT_TYPE,
                'properties' => [
                    'ipAddress' => [
                        'type'        => self::STRING_TYPE,
                        'sentAs'      => 'ip_address',
                        'description' => 'If you specify only an IP address, OpenStack Networking tries to allocate the IP address if the address is a valid IP for any of the subnets on the specified network.',
                    ],
                    'subnetId' => [
                        'type'        => self::STRING_TYPE,
                        'sentAs'      => 'subnet_id',
                        'description' => 'Subnet id. If you specify only a subnet ID, OpenStack Networking allocates an available IP from that subnet to the port.',
                    ],
                ],
            ],
        ];
    }

    public function subnetId()
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::JSON,
            'sentAs'      => 'subnet_id',
            'description' => 'If you specify only a subnet UUID, OpenStack Networking allocates an available IP from that subnet to the port. If you specify both a subnet UUID and an IP address, OpenStack Networking tries to allocate the address to the port.',
        ];
    }

    public function ipAddress()
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::JSON,
            'sentAs'      => 'ip_address',
            'description' => 'If you specify both a subnet UUID and an IP address, OpenStack Networking tries to allocate the address to the port.',
        ];
    }

    public function secGroupIds()
    {
        return [
            'type'     => self::ARRAY_TYPE,
            'location' => self::JSON,
            'sentAs'   => 'security_groups',
            'items'    => [
                'type'        => self::STRING_TYPE,
                'description' => 'The UUID of the security group',
            ],
        ];
    }

    public function allowedAddrPairs()
    {
        return [
            'type'        => self::ARRAY_TYPE,
            'location'    => self::JSON,
            'sentAs'      => 'allowed_address_pairs',
            'description' => 'Address pairs extend the port attribute to enable you to specify arbitrary mac_address/ip_address(cidr) pairs that are allowed to pass through a port regardless of the subnet associated with the network.',
            'items'       => [
                'type'        => self::OBJECT_TYPE,
                'description' => 'A MAC addr/IP addr pair',
                'properties'  => [
                    'ipAddress' => [
                        'sentAs'   => 'ip_address',
                        'type'     => self::STRING_TYPE,
                        'location' => self::JSON,
                    ],
                    'macAddress' => [
                        'sentAs'   => 'mac_address',
                        'type'     => self::STRING_TYPE,
                        'location' => self::JSON,
                    ],
                ],
            ],
        ];
    }

    public function deviceOwner()
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::JSON,
            'sentAs'      => 'device_owner',
            'description' => 'The UUID of the entity that uses this port. For example, a DHCP agent.',
        ];
    }

    public function deviceId()
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::JSON,
            'sentAs'      => 'device_id',
            'description' => 'The UUID of the device that uses this port. For example, a virtual server.',
        ];
    }

    public function queryName()
    {
        return $this->queryFilter('name');
    }

    public function queryTenantId()
    {
        return $this->queryFilter('tenant_id');
    }

    public function queryStatus()
    {
        return $this->queryFilter('status');
    }

    private function queryFilter($field)
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::QUERY,
            'sentAs'      => $field,
            'description' => 'The Neutron API supports filtering based on all top level attributes of a resource.
            Filters are applicable to all list requests.',
        ];
    }

    public function routerAccessibleJson()
    {
        return [
            'type'        => self::BOOL_TYPE,
            'location'    => self::JSON,
            'sentAs'      => 'router:external',
            'description' => 'Indicates whether this network is externally accessible.',
        ];
    }

    public function queryRouterExternal()
    {
        return [
            'type'     => self::BOOL_TYPE,
            'location' => self::QUERY,
            'sentAs'   => 'router:external',
        ];
    }

    protected function quotaLimit($sentAs, $description)
    {
        return [
            'type'        => self::INT_TYPE,
            'location'    => self::JSON,
            'sentAs'      => $sentAs,
            'description' => $description,
        ];
    }

    public function quotaLimitFloatingIp()
    {
        return $this->quotaLimit('floatingip', 'The number of floating IP addresses allowed for each project. A value of -1 means no limit.');
    }

    public function quotaLimitNetwork()
    {
        return $this->quotaLimit('network', 'The number of networks allowed for each project. A value of -1 means no limit.');
    }

    public function quotaLimitPort()
    {
        return $this->quotaLimit('port', 'The number of ports allowed for each project. A value of -1 means no limit.');
    }

    public function quotaLimitRbacPolicy()
    {
        return $this->quotaLimit('rbac_policy', 'The number of role-based access control (RBAC) policies for each project. A value of -1 means no limit.');
    }

    public function quotaLimitRouter()
    {
        return $this->quotaLimit('router', 'The number of routers allowed for each project. A value of -1 means no limit.');
    }

    public function quotaLimitSecurityGroup()
    {
        return $this->quotaLimit('security_group', 'The number of security groups allowed for each project. A value of -1 means no limit.');
    }

    public function quotaLimitSecurityGroupRule()
    {
        return $this->quotaLimit('security_group_rule', 'The number of security group rules allowed for each project. A value of -1 means no limit.');
    }

    public function quotaLimitSubnet()
    {
        return $this->quotaLimit('subnet', 'The number of subnets allowed for each project. A value of -1 means no limit.');
    }

    public function quotaLimitSubnetPool()
    {
        return $this->quotaLimit('subnetpool', 'The number of subnet pools allowed for each project. A value of -1 means no limit.');
    }

    public function vipSubnetId()
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::JSON,
            'sentAs'      => 'vip_subnet_id',
            'description' => 'The network on which to allocate the load balancer\'s vip address.',
        ];
    }

    public function vipAddress()
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::JSON,
            'sentAs'      => 'vip_address',
            'description' => 'The address to assign the load balancer\'s vip address to.',
        ];
    }

    public function provider()
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::JSON,
            'description' => 'The name of a valid provider to provision the load balancer.',
        ];
    }

    public function connectionLimit()
    {
        return [
            'type'        => self::INT_TYPE,
            'location'    => self::JSON,
            'sentAs'      => 'connection_limit',
            'description' => 'The number of connections allowed by this listener.',
        ];
    }

    public function loadbalancerId()
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::JSON,
            'sentAs'      => 'loadbalancer_id',
            'description' => 'The ID of a load balancer.',
        ];
    }

    public function loadbalancerIdUrl()
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::URL,
            'description' => 'The ID of a load balancer.',
        ];
    }

    public function protocol()
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::JSON,
            'description' => 'The protocol the frontend will be listening for. (TCP, HTTP, HTTPS)',
        ];
    }

    public function protocolPort()
    {
        return [
            'type'        => self::INT_TYPE,
            'location'    => self::JSON,
            'sentAs'      => 'protocol_port',
            'description' => 'The port in which the frontend will be listening. (1-65535)',
        ];
    }

    public function lbAlgorithm()
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::JSON,
            'sentAs'      => 'lb_algorithm',
            'description' => 'The load balancing algorithm to distribute traffic to the pool\'s members. (ROUND_ROBIN|LEAST_CONNECTIONS|SOURCE_IP)',
        ];
    }

    public function listenerId()
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::JSON,
            'sentAs'      => 'listener_id',
            'description' => 'The listener in which this pool will become the default pool. There can only be one default pool for a listener.',
        ];
    }

    public function sessionPersistence()
    {
        return [
            'type'        => self::OBJECT_TYPE,
            'location'    => self::JSON,
            'sentAs'      => 'session_persistence',
            'description' => 'The default value for this is an empty dictionary.',
        ];
    }

    public function address()
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::JSON,
            'sentAs'      => 'address',
            'description' => 'The IP Address of the member to receive traffic from the load balancer.',
        ];
    }

    public function poolId()
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::URL,
            'description' => 'The ID of the load balancer pool.',
        ];
    }

    public function poolIdJson()
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::JSON,
            'sentAs'      => 'pool_id',
            'description' => 'The ID of the load balancer pool.',
        ];
    }

    public function weight()
    {
        return [
            'type'        => self::INT_TYPE,
            'location'    => self::JSON,
            'description' => 'The default value for this attribute will be 1.',
        ];
    }

    public function delay()
    {
        return [
            'type'        => self::INT_TYPE,
            'location'    => self::JSON,
            'description' => 'The interval in seconds between health checks.',
        ];
    }

    public function timeout()
    {
        return [
            'type'        => self::INT_TYPE,
            'location'    => self::JSON,
            'description' => 'The time in seconds that a health check times out.',
        ];
    }

    public function maxRetries()
    {
        return [
            'type'        => self::INT_TYPE,
            'location'    => self::JSON,
            'sentAs'      => 'max_retries',
            'description' => 'Number of failed health checks before marked as OFFLINE.',
        ];
    }

    public function httpMethod()
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::JSON,
            'sentAs'      => 'http_method',
            'description' => 'The default value for this attribute is GET.',
        ];
    }

    public function urlPath()
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::JSON,
            'sentAs'      => 'url_path',
            'description' => 'The default value is "/"',
        ];
    }

    public function expectedCodes()
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::JSON,
            'sentAs'      => 'expected_codes',
            'description' => 'The expected http status codes to get from a successful health check. Defaults to 200. (comma separated)',
        ];
    }

    public function type()
    {
        return [
            'type'        => self::STRING_TYPE,
            'location'    => self::JSON,
            'description' => 'The type of health monitor. Must be one of TCP, HTTP, HTTPS',
        ];
    }
}
