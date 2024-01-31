<?php

namespace App\Repository;

use App\Models\Infrastructure;
use Illuminate\Http\Request;

class InfrastructureRepo
{
    private Infrastructure $infrastructureModel;

    public function __construct()
    {
        $this->infrastructureModel = new Infrastructure();
    }

    public function createInfrastructure(?array $infrastructures, int $listingId): void
    {
        if (!is_null($infrastructures)) {
            foreach ($infrastructures as $infrastructure) {
                $this->infrastructureModel->create([
                    'listing_id' => $listingId,
                    'infrastructure_name' => $infrastructure,
                ]);
            }
        }
    }
}
