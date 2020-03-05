<?php

namespace OpenStack\BlockStorage\v2;

use OpenStack\Common\Api\AbstractApi;

class Api extends AbstractApi
{
    public function __construct()
    {
        $this->params = new Params();
    }

    public function postVolumes()
    {
        return [
            'method'  => 'POST',
            'path'    => 'volumes',
            'jsonKey' => 'volume',
            'params'  => [
                'availabilityZone' => $this->params->availabilityZone(),
                'sourceVolumeId'   => $this->params->sourceVolId(),
                'description'      => $this->params->desc(),
                'snapshotId'       => $this->params->snapshotId(),
                'size'             => $this->params->size(),
                'name'             => $this->params->name('volume'),
                'imageId'          => $this->params->imageRef(),
                'volumeType'       => $this->params->volumeType(),
                'metadata'         => $this->params->metadata(),
                'projectId'        => $this->params->projectId(),
            ],
        ];
    }

    public function getVolumes()
    {
        return [
            'method' => 'GET',
            'path'   => 'volumes',
            'params' => [
                'limit'      => $this->params->limit(),
                'marker'     => $this->params->marker(),
                'sort'       => $this->params->sort(),
                'allTenants' => $this->params->allTenants(),
            ],
        ];
    }

    public function getVolumesDetail()
    {
        return [
            'method' => 'GET',
            'path'   => 'volumes/detail',
            'params' => [
                'limit'      => $this->params->limit(),
                'marker'     => $this->params->marker(),
                'sort'       => $this->params->sort(),
                'allTenants' => $this->params->allTenants(),
            ],
        ];
    }

    public function getVolume()
    {
        return [
            'method' => 'GET',
            'path'   => 'volumes/{id}',
            'params' => [
                'id' => $this->params->idPath(),
            ],
        ];
    }

    public function putVolume()
    {
        return [
            'method'  => 'PUT',
            'path'    => 'volumes/{id}',
            'jsonKey' => 'volume',
            'params'  => [
                'id'          => $this->params->idPath(),
                'name'        => $this->params->name('volume'),
                'description' => $this->params->desc(),
            ],
        ];
    }

    public function deleteVolume()
    {
        return [
            'method' => 'DELETE',
            'path'   => 'volumes/{id}',
            'params' => ['id' => $this->params->idPath()],
        ];
    }

    public function getVolumeMetadata()
    {
        return [
            'method' => 'GET',
            'path'   => 'volumes/{id}/metadata',
            'params' => ['id' => $this->params->idPath()],
        ];
    }

    public function putVolumeMetadata()
    {
        return [
            'method' => 'PUT',
            'path'   => 'volumes/{id}/metadata',
            'params' => [
                'id'       => $this->params->idPath(),
                'metadata' => $this->params->metadata(),
            ],
        ];
    }

    public function getTypes()
    {
        return [
            'method' => 'GET',
            'path'   => 'types',
            'params' => [],
        ];
    }

    public function postTypes()
    {
        return [
            'method'  => 'POST',
            'path'    => 'types',
            'jsonKey' => 'volume_type',
            'params'  => [
                'name'  => $this->params->name('volume type'),
                'specs' => $this->params->typeSpecs(),
            ],
        ];
    }

    public function putType()
    {
        return [
            'method'  => 'PUT',
            'path'    => 'types/{id}',
            'jsonKey' => 'volume_type',
            'params'  => [
                'id'    => $this->params->idPath(),
                'name'  => $this->params->name('volume type'),
                'specs' => $this->params->typeSpecs(),
            ],
        ];
    }

    public function getType()
    {
        return [
            'method' => 'GET',
            'path'   => 'types/{id}',
            'params' => ['id' => $this->params->idPath()],
        ];
    }

    public function deleteType()
    {
        return [
            'method' => 'DELETE',
            'path'   => 'types/{id}',
            'params' => ['id' => $this->params->idPath()],
        ];
    }

    public function postSnapshots()
    {
        return [
            'method'  => 'POST',
            'path'    => 'snapshots',
            'jsonKey' => 'snapshot',
            'params'  => [
                'volumeId'    => $this->params->volId(),
                'force'       => $this->params->force(),
                'name'        => $this->params->snapshotName(),
                'description' => $this->params->desc(),
            ],
        ];
    }

    public function getSnapshots()
    {
        return [
            'method' => 'GET',
            'path'   => 'snapshots',
            'params' => [
                'marker'     => $this->params->marker(),
                'limit'      => $this->params->limit(),
                'sortDir'    => $this->params->sortDir(),
                'sortKey'    => $this->params->sortKey(),
                'allTenants' => $this->params->allTenants(),
            ],
        ];
    }

    public function getSnapshotsDetail()
    {
        $api = $this->getSnapshots();
        $api['path'] .= '/detail';

        return $api;
    }

    public function getSnapshot()
    {
        return [
            'method' => 'GET',
            'path'   => 'snapshots/{id}',
            'params' => ['id' => $this->params->idPath()],
        ];
    }

    public function putSnapshot()
    {
        return [
            'method'  => 'PUT',
            'path'    => 'snapshots/{id}',
            'jsonKey' => 'snapshot',
            'params'  => [
                'id'          => $this->params->idPath(),
                'name'        => $this->params->snapshotName(),
                'description' => $this->params->desc(),
            ],
        ];
    }

    public function deleteSnapshot()
    {
        return [
            'method' => 'DELETE',
            'path'   => 'snapshots/{id}',
            'params' => ['id' => $this->params->idPath()],
        ];
    }

    public function getSnapshotMetadata()
    {
        return [
            'method' => 'GET',
            'path'   => 'snapshots/{id}/metadata',
            'params' => ['id' => $this->params->idPath()],
        ];
    }

    public function putSnapshotMetadata()
    {
        return [
            'method' => 'PUT',
            'path'   => 'snapshots/{id}/metadata',
            'params' => [
                'id'       => $this->params->idPath(),
                'metadata' => $this->params->metadata(),
            ],
        ];
    }

    public function getQuotaSet()
    {
        return [
            'method' => 'GET',
            'path'   => 'os-quota-sets/{tenantId}',
            'params' => [
                'tenantId' => $this->params->idPath('quota-sets'),
            ],
        ];
    }

    public function deleteQuotaSet()
    {
        return [
            'method'  => 'DELETE',
            'path'    => 'os-quota-sets/{tenantId}',
            'jsonKey' => 'quota_set',
            'params'  => [
                'tenantId' => $this->params->idPath('quota-sets'),
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
                'tenantId'           => $this->params->idPath(),
                'backupGigabytes'    => $this->params->quotaSetBackupGigabytes(),
                'backups'            => $this->params->quotaSetBackups(),
                'gigabytes'          => $this->params->quotaSetGigabytes(),
                'gigabytesIscsi'     => $this->params->quotaSetGigabytesIscsi(),
                'perVolumeGigabytes' => $this->params->quotaSetPerVolumeGigabytes(),
                'snapshots'          => $this->params->quotaSetSnapshots(),
                'snapshotsIscsi'     => $this->params->quotaSetSnapshotsIscsi(),
                'volumes'            => $this->params->quotaSetVolumes(),
                'volumesIscsi'       => $this->params->quotaSetVolumesIscsi(),
            ],
        ];
    }

    public function postVolumeBootable()
    {
        return [
            'method'  => 'POST',
            'path'    => 'volumes/{id}/action',
            'jsonKey' => 'os-set_bootable',
            'params'  => [
                'id'       => $this->params->idPath(),
                'bootable' => $this->params->bootable(),
            ],
        ];
    }

    public function postImageMetadata()
    {
        return [
            'method'  => 'POST',
            'path'    => 'volumes/{id}/action',
            'jsonKey' => 'os-set_image_metadata',
            'params'  => [
                'id'       => $this->params->idPath(),
                'metadata' => $this->params->metadata(),
            ],
        ];
    }

    public function postResetStatus()
    {
        return [
            'method'  => 'POST',
            'path'    => 'volumes/{id}/action',
            'jsonKey' => 'os-reset_status',
            'params'  => [
                'id'              => $this->params->idPath(),
                'status'          => $this->params->volumeStatus(),
                'migrationStatus' => $this->params->volumeMigrationStatus(),
                'attachStatus'    => $this->params->volumeAttachStatus(),
            ],
        ];
    }
}
