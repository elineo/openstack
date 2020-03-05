<?php

namespace OpenStack\Compute\v2;

use OpenStack\Common\Api\AbstractApi;

/**
 * A representation of the Compute (Nova) v2 REST API.
 *
 * @internal
 */
class Api extends AbstractApi
{
    public function __construct()
    {
        $this->params = new Params();
    }

    public function getLimits()
    {
        return [
            'method' => 'GET',
            'path'   => 'limits',
            'params' => [],
        ];
    }

    public function getFlavors()
    {
        return [
            'method' => 'GET',
            'path'   => 'flavors',
            'params' => [
                'limit'   => $this->params->limit(),
                'marker'  => $this->params->marker(),
                'minDisk' => $this->params->minDisk(),
                'minRam'  => $this->params->minRam(),
            ],
        ];
    }

    public function getFlavorsDetail()
    {
        $op = $this->getFlavors();
        $op['path'] .= '/detail';

        return $op;
    }

    public function getFlavor()
    {
        return [
            'method' => 'GET',
            'path'   => 'flavors/{id}',
            'params' => ['id' => $this->params->urlId('flavor')],
        ];
    }

    public function postFlavors()
    {
        return [
            'method'  => 'POST',
            'path'    => 'flavors',
            'jsonKey' => 'flavor',
            'params'  => [
                'id'    => $this->notRequired($this->params->id('flavor')),
                'name'  => $this->isRequired($this->params->name('flavor')),
                'ram'   => $this->params->flavorRam(),
                'vcpus' => $this->params->flavorVcpus(),
                'swap'  => $this->params->flavorSwap(),
                'disk'  => $this->params->flavorDisk(),
            ],
        ];
    }

    public function deleteFlavor()
    {
        return [
            'method' => 'DELETE',
            'path'   => 'flavors/{id}',
            'params' => [
                'id' => $this->params->idPath(),
            ],
        ];
    }

    public function getImages()
    {
        return [
            'method' => 'GET',
            'path'   => 'images',
            'params' => [
                'limit'        => $this->params->limit(),
                'marker'       => $this->params->marker(),
                'name'         => $this->params->flavorName(),
                'changesSince' => $this->params->filterChangesSince('image'),
                'server'       => $this->params->flavorServer(),
                'status'       => $this->params->filterStatus('image'),
                'type'         => $this->params->flavorType(),
            ],
        ];
    }

    public function getImagesDetail()
    {
        $op = $this->getImages();
        $op['path'] .= '/detail';

        return $op;
    }

    public function getImage()
    {
        return [
            'method' => 'GET',
            'path'   => 'images/{id}',
            'params' => ['id' => $this->params->urlId('image')],
        ];
    }

    public function deleteImage()
    {
        return [
            'method' => 'DELETE',
            'path'   => 'images/{id}',
            'params' => ['id' => $this->params->urlId('image')],
        ];
    }

    public function getImageMetadata()
    {
        return [
            'method' => 'GET',
            'path'   => 'images/{id}/metadata',
            'params' => ['id' => $this->params->urlId('image')],
        ];
    }

    public function putImageMetadata()
    {
        return [
            'method' => 'PUT',
            'path'   => 'images/{id}/metadata',
            'params' => [
                'id'       => $this->params->urlId('image'),
                'metadata' => $this->params->metadata(),
            ],
        ];
    }

    public function postImageMetadata()
    {
        return [
            'method' => 'POST',
            'path'   => 'images/{id}/metadata',
            'params' => [
                'id'       => $this->params->urlId('image'),
                'metadata' => $this->params->metadata(),
            ],
        ];
    }

    public function getImageMetadataKey()
    {
        return [
            'method' => 'GET',
            'path'   => 'images/{id}/metadata/{key}',
            'params' => [
                'id'  => $this->params->urlId('image'),
                'key' => $this->params->key(),
            ],
        ];
    }

    public function deleteImageMetadataKey()
    {
        return [
            'method' => 'DELETE',
            'path'   => 'images/{id}/metadata/{key}',
            'params' => [
                'id'  => $this->params->urlId('image'),
                'key' => $this->params->key(),
            ],
        ];
    }

    public function postServer()
    {
        return [
            'path'    => 'servers',
            'method'  => 'POST',
            'jsonKey' => 'server',
            'params'  => [
                'imageId'            => $this->notRequired($this->params->imageId()),
                'flavorId'           => $this->params->flavorId(),
                'personality'        => $this->params->personality(),
                'metadata'           => $this->notRequired($this->params->metadata()),
                'name'               => $this->isRequired($this->params->name('server')),
                'securityGroups'     => $this->params->securityGroups(),
                'userData'           => $this->params->userData(),
                'availabilityZone'   => $this->params->availabilityZone(),
                'networks'           => $this->params->networks(),
                'blockDeviceMapping' => $this->params->blockDeviceMapping(),
                'keyName'            => $this->params->keyName(),
            ],
        ];
    }

    public function getServers()
    {
        return [
            'method' => 'GET',
            'path'   => 'servers',
            'params' => [
                'limit'        => $this->params->limit(),
                'marker'       => $this->params->marker(),
                'changesSince' => $this->params->filterChangesSince('server'),
                'imageId'      => $this->params->filterImage(),
                'flavorId'     => $this->params->filterFlavor(),
                'name'         => $this->params->filterName(),
                'status'       => $this->params->filterStatus('server'),
                'host'         => $this->params->filterHost(),
                'allTenants'   => $this->params->allTenants(),
            ],
        ];
    }

    public function getServersDetail()
    {
        $definition = $this->getServers();
        $definition['path'] .= '/detail';

        return $definition;
    }

    public function getServer()
    {
        return [
            'method' => 'GET',
            'path'   => 'servers/{id}',
            'params' => [
                'id' => $this->params->urlId('server'),
            ],
        ];
    }

    public function putServer()
    {
        return [
            'method'  => 'PUT',
            'path'    => 'servers/{id}',
            'jsonKey' => 'server',
            'params'  => [
                'id'   => $this->params->urlId('server'),
                'ipv4' => $this->params->ipv4(),
                'ipv6' => $this->params->ipv6(),
                'name' => $this->params->name('server'),
            ],
        ];
    }

    public function deleteServer()
    {
        return [
            'method' => 'DELETE',
            'path'   => 'servers/{id}',
            'params' => ['id' => $this->params->urlId('server')],
        ];
    }

    public function changeServerPassword()
    {
        return [
            'method'  => 'POST',
            'path'    => 'servers/{id}/action',
            'jsonKey' => 'changePassword',
            'params'  => [
                'id'       => $this->params->urlId('server'),
                'password' => $this->params->password(),
            ],
        ];
    }

    public function resetServerState()
    {
        return [
            'method' => 'POST',
            'path'   => 'servers/{id}/action',
            'params' => [
                'id'         => $this->params->urlId('server'),
                'resetState' => $this->params->resetState(),
            ],
        ];
    }

    public function rebootServer()
    {
        return [
            'method'  => 'POST',
            'path'    => 'servers/{id}/action',
            'jsonKey' => 'reboot',
            'params'  => [
                'id'   => $this->params->urlId('server'),
                'type' => $this->params->rebootType(),
            ],
        ];
    }

    public function startServer()
    {
        return [
            'method' => 'POST',
            'path'   => 'servers/{id}/action',
            'params' => [
                'id'       => $this->params->urlId('server'),
                'os-start' => $this->params->nullAction(),
            ],
        ];
    }

    public function stopServer()
    {
        return [
            'method' => 'POST',
            'path'   => 'servers/{id}/action',
            'params' => [
                'id'      => $this->params->urlId('server'),
                'os-stop' => $this->params->nullAction(),
            ],
        ];
    }

    public function rebuildServer()
    {
        return [
            'method'  => 'POST',
            'path'    => 'servers/{id}/action',
            'jsonKey' => 'rebuild',
            'params'  => [
                'id'          => $this->params->urlId('server'),
                'ipv4'        => $this->params->ipv4(),
                'ipv6'        => $this->params->ipv6(),
                'imageId'     => $this->params->imageId(),
                'personality' => $this->params->personality(),
                'name'        => $this->params->name('server'),
                'metadata'    => $this->notRequired($this->params->metadata()),
                'adminPass'   => $this->params->password(),
            ],
        ];
    }

    public function rescueServer()
    {
        return [
            'method'  => 'POST',
            'path'    => 'servers/{id}/action',
            'jsonKey' => 'rescue',
            'params'  => [
                'id'        => $this->params->urlId('server'),
                'imageId'   => $this->params->rescueImageId(),
                'adminPass' => $this->notRequired($this->params->password()),
            ],
        ];
    }

    public function unrescueServer()
    {
        return [
            'method' => 'POST',
            'path'   => 'servers/{id}/action',
            'params' => [
                'id'       => $this->params->urlId('server'),
                'unrescue' => $this->params->nullAction(),
            ],
        ];
    }

    public function resizeServer()
    {
        return [
            'method'  => 'POST',
            'path'    => 'servers/{id}/action',
            'jsonKey' => 'resize',
            'params'  => [
                'id'       => $this->params->urlId('server'),
                'flavorId' => $this->params->flavorId(),
            ],
        ];
    }

    public function confirmServerResize()
    {
        return [
            'method' => 'POST',
            'path'   => 'servers/{id}/action',
            'params' => [
                'id'            => $this->params->urlId('server'),
                'confirmResize' => $this->params->nullAction(),
            ],
        ];
    }

    public function revertServerResize()
    {
        return [
            'method' => 'POST',
            'path'   => 'servers/{id}/action',
            'params' => [
                'id'           => $this->params->urlId('server'),
                'revertResize' => $this->params->nullAction(),
            ],
        ];
    }

    public function getConsoleOutput()
    {
        return [
            'method'  => 'POST',
            'path'    => 'servers/{id}/action',
            'jsonKey' => 'os-getConsoleOutput',
            'params'  => [
                'id'     => $this->params->urlId('server'),
                'length' => $this->notRequired($this->params->consoleLogLength()),
            ],
        ];
    }

    public function getAllConsoleOutput()
    {
        return [
            'method' => 'POST',
            'path'   => 'servers/{id}/action',
            'params' => [
                'id'                  => $this->params->urlId('server'),
                'os-getConsoleOutput' => $this->params->emptyObject(),
            ],
        ];
    }

    public function createServerImage()
    {
        return [
            'method'  => 'POST',
            'path'    => 'servers/{id}/action',
            'jsonKey' => 'createImage',
            'params'  => [
                'id'       => $this->params->urlId('server'),
                'metadata' => $this->notRequired($this->params->metadata()),
                'name'     => $this->isRequired($this->params->name('server')),
            ],
        ];
    }

    public function getVncConsole()
    {
        return [
            'method'  => 'POST',
            'path'    => 'servers/{id}/action',
            'jsonKey' => 'os-getVNCConsole',
            'params'  => [
                'id'   => $this->params->urlId('server'),
                'type' => $this->params->consoleType(),
            ],
        ];
    }

    public function getSpiceConsole()
    {
        return [
            'method'  => 'POST',
            'path'    => 'servers/{id}/action',
            'jsonKey' => 'os-getSPICEConsole',
            'params'  => [
                'id'   => $this->params->urlId('server'),
                'type' => $this->params->consoleType(),
            ],
        ];
    }

    public function getSerialConsole()
    {
        return [
            'method'  => 'POST',
            'path'    => 'servers/{id}/action',
            'jsonKey' => 'os-getSerialConsole',
            'params'  => [
                'id'   => $this->params->urlId('server'),
                'type' => $this->params->consoleType(),
            ],
        ];
    }

    public function getRDPConsole()
    {
        return [
            'method'  => 'POST',
            'path'    => 'servers/{id}/action',
            'jsonKey' => 'os-getRDPConsole',
            'params'  => [
                'id'   => $this->params->urlId('server'),
                'type' => $this->params->consoleType(),
            ],
        ];
    }

    public function getAddresses()
    {
        return [
            'method' => 'GET',
            'path'   => 'servers/{id}/ips',
            'params' => ['id' => $this->params->urlId('server')],
        ];
    }

    public function getAddressesByNetwork()
    {
        return [
            'method' => 'GET',
            'path'   => 'servers/{id}/ips/{networkLabel}',
            'params' => [
                'id'           => $this->params->urlId('server'),
                'networkLabel' => $this->params->networkLabel(),
            ],
        ];
    }

    public function getInterfaceAttachments()
    {
        return [
            'method'  => 'GET',
            'path'    => 'servers/{id}/os-interface',
            'jsonKey' => 'interfaceAttachments',
            'params'  => [
                'id' => $this->params->urlId('server'),
            ],
        ];
    }

    public function getInterfaceAttachment()
    {
        return [
            'method' => 'GET',
            'path'   => 'servers/{id}/os-interface/{portId}',
            'params' => [
                'id'     => $this->params->urlId('server'),
                'portId' => $this->params->portId(),
            ],
        ];
    }

    public function postInterfaceAttachment()
    {
        return [
            'method'  => 'POST',
            'path'    => 'servers/{id}/os-interface',
            'jsonKey' => 'interfaceAttachment',
            'params'  => [
                'id'               => $this->params->urlId('server'),
                'portId'           => $this->notRequired($this->params->portId()),
                'networkId'        => $this->notRequired($this->params->networkId()),
                'fixedIpAddresses' => $this->notRequired($this->params->fixedIpAddresses()),
                'tag'              => $this->notRequired($this->params->tag()),
            ],
        ];
    }

    public function deleteInterfaceAttachment()
    {
        return [
            'method' => 'DELETE',
            'path'   => 'servers/{id}/os-interface/{portId}',
            'params' => [
                'id'     => $this->params->urlId('image'),
                'portId' => $this->params->portId(),
            ],
        ];
    }

    public function getServerMetadata()
    {
        return [
            'method' => 'GET',
            'path'   => 'servers/{id}/metadata',
            'params' => ['id' => $this->params->urlId('server')],
        ];
    }

    public function putServerMetadata()
    {
        return [
            'method' => 'PUT',
            'path'   => 'servers/{id}/metadata',
            'params' => [
                'id'       => $this->params->urlId('server'),
                'metadata' => $this->params->metadata(),
            ],
        ];
    }

    public function postServerMetadata()
    {
        return [
            'method' => 'POST',
            'path'   => 'servers/{id}/metadata',
            'params' => [
                'id'       => $this->params->urlId('server'),
                'metadata' => $this->params->metadata(),
            ],
        ];
    }

    public function getServerMetadataKey()
    {
        return [
            'method' => 'GET',
            'path'   => 'servers/{id}/metadata/{key}',
            'params' => [
                'id'  => $this->params->urlId('server'),
                'key' => $this->params->key(),
            ],
        ];
    }

    public function deleteServerMetadataKey()
    {
        return [
            'method' => 'DELETE',
            'path'   => 'servers/{id}/metadata/{key}',
            'params' => [
                'id'  => $this->params->urlId('server'),
                'key' => $this->params->key(),
            ],
        ];
    }

    public function getKeypair()
    {
        return [
            'method' => 'GET',
            'path'   => 'os-keypairs/{name}',
            'params' => [
                'name'   => $this->isRequired($this->params->keypairName()),
                'userId' => $this->params->userId(),
            ],
        ];
    }

    public function getKeypairs()
    {
        return [
            'method' => 'GET',
            'path'   => 'os-keypairs',
            'params' => [
                'userId' => $this->params->userId(),
            ],
        ];
    }

    public function postKeypair()
    {
        return [
            'method'  => 'POST',
            'path'    => 'os-keypairs',
            'jsonKey' => 'keypair',
            'params'  => [
                'name'      => $this->isRequired($this->params->name('keypair')),
                'publicKey' => $this->params->keypairPublicKey(),
                'type'      => $this->params->keypairType(),
                'userId'    => $this->params->keypairUserId(),
            ],
        ];
    }

    public function deleteKeypair()
    {
        return [
            'method' => 'DELETE',
            'path'   => 'os-keypairs/{name}',
            'params' => [
                'name' => $this->isRequired($this->params->keypairName()),
            ],
        ];
    }

    public function postSecurityGroup()
    {
        return [
            'method'  => 'POST',
            'path'    => 'servers/{id}/action',
            'jsonKey' => 'addSecurityGroup',
            'params'  => [
                'id'   => $this->params->urlId('server'),
                'name' => $this->isRequired($this->params->name('securityGroup')),
            ],
        ];
    }

    public function deleteSecurityGroup()
    {
        return [
            'method'  => 'POST',
            'path'    => 'servers/{id}/action',
            'jsonKey' => 'removeSecurityGroup',
            'params'  => [
                'id'   => $this->params->urlId('server'),
                'name' => $this->isRequired($this->params->name('securityGroup')),
            ],
        ];
    }

    public function getSecurityGroups()
    {
        return [
            'method'  => 'GET',
            'path'    => 'servers/{id}/os-security-groups',
            'jsonKey' => 'security_groups',
            'params'  => [
                'id' => $this->params->urlId('server'),
            ],
        ];
    }

    public function getVolumeAttachments()
    {
        return [
            'method'  => 'GET',
            'path'    => 'servers/{id}/os-volume_attachments',
            'jsonKey' => 'volumeAttachments',
            'params'  => [
                'id' => $this->params->urlId('server'),
            ],
        ];
    }

    public function postVolumeAttachments()
    {
        return [
            'method'  => 'POST',
            'path'    => 'servers/{id}/os-volume_attachments',
            'jsonKey' => 'volumeAttachment',
            'params'  => [
                'id'       => $this->params->urlId('server'),
                'volumeId' => $this->params->volumeId(),
            ],
        ];
    }

    public function deleteVolumeAttachments()
    {
        return [
            'method' => 'DELETE',
            'path'   => 'servers/{id}/os-volume_attachments/{attachmentId}',
            'params' => [
                'id'           => $this->params->urlId('server'),
                'attachmentId' => $this->params->attachmentId(),
            ],
        ];
    }

    public function getHypervisorStatistics()
    {
        return [
            'method' => 'GET',
            'path'   => 'os-hypervisors/statistics',
            'params' => [
            ],
        ];
    }

    public function getHypervisors()
    {
        return [
            'method'  => 'GET',
            'path'    => 'os-hypervisors',
            'jsonKey' => 'hypervisors',
            'params'  => [
                'limit'  => $this->params->limit(),
                'marker' => $this->params->marker(),
            ],
        ];
    }

    public function getHypervisorsDetail()
    {
        $definition = $this->getHypervisors();
        $definition['path'] .= '/detail';

        return $definition;
    }

    public function getHypervisor()
    {
        return [
            'method' => 'GET',
            'path'   => 'os-hypervisors/{id}',
            'params' => ['id' => $this->params->urlId('id')],
        ];
    }

    public function getAvailabilityZones()
    {
        return [
            'method' => 'GET',
            'path'   => 'os-availability-zone/detail',
            'params' => [
                'limit'  => $this->params->limit(),
                'marker' => $this->params->marker(),
            ],
        ];
    }

    public function getHosts()
    {
        return [
            'method' => 'GET',
            'path'   => 'os-hosts',
            'params' => [
                'limit'  => $this->params->limit(),
                'marker' => $this->params->marker(),
            ],
        ];
    }

    public function getHost()
    {
        return [
            'method' => 'GET',
            'path'   => 'os-hosts/{name}',
            'params' => ['name' => $this->params->urlId('name')],
        ];
    }

    public function getQuotaSet()
    {
        return [
            'method' => 'GET',
            'path'   => 'os-quota-sets/{tenantId}',
            'params' => [
                'tenantId' => $this->params->urlId('quota-sets'),
            ],
        ];
    }

    public function getQuotaSetDetail()
    {
        $data = $this->getQuotaSet();
        $data['path'] .= '/detail';

        return $data;
    }

    public function deleteQuotaSet()
    {
        return [
            'method'  => 'DELETE',
            'path'    => 'os-quota-sets/{tenantId}',
            'jsonKey' => 'quota_set',
            'params'  => [
                'tenantId' => $this->params->urlId('quota-sets'),
            ],
        ];
    }

    public function putQuotaSet()
    {
        return [
            'method'  => 'PUT',
            'path'    => 'os-quota-sets/{tenantId}',
            'jsonKey' => 'quota_set',
            'params'  => [
                'tenantId'                 => $this->params->idPath(),
                'force'                    => $this->notRequired($this->params->quotaSetLimitForce()),
                'instances'                => $this->notRequired($this->params->quotaSetLimitInstances()),
                'cores'                    => $this->notRequired($this->params->quotaSetLimitCores()),
                'fixedIps'                 => $this->notRequired($this->params->quotaSetLimitFixedIps()),
                'floatingIps'              => $this->notRequired($this->params->quotaSetLimitFloatingIps()),
                'injectedFileContentBytes' => $this->notRequired($this->params->quotaSetLimitInjectedFileContentBytes()),
                'injectedFilePathBytes'    => $this->notRequired($this->params->quotaSetLimitInjectedFilePathBytes()),
                'injectedFiles'            => $this->notRequired($this->params->quotaSetLimitInjectedFiles()),
                'keyPairs'                 => $this->notRequired($this->params->quotaSetLimitKeyPairs()),
                'metadataItems'            => $this->notRequired($this->params->quotaSetLimitMetadataItems()),
                'ram'                      => $this->notRequired($this->params->quotaSetLimitRam()),
                'securityGroupRules'       => $this->notRequired($this->params->quotaSetLimitSecurityGroupRules()),
                'securityGroups'           => $this->notRequired($this->params->quotaSetLimitSecurityGroups()),
                'serverGroups'             => $this->notRequired($this->params->quotaSetLimitServerGroups()),
                'serverGroupMembers'       => $this->notRequired($this->params->quotaSetLimitServerGroupMembers()),
            ],
        ];
    }
}
