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

    public function createInfrastructure(Request $request, int $listingId): void
    {
        $infrastructure_name = $request->get('infrastructure_name');
        if (!is_null($infrastructure_name)) {
            foreach ($infrastructure_name as $item) {
                $this->infrastructureModel->create([
                    'listing_id' => $listingId,
                    'infrastructure_name' => $item,
                ]);
            }
        }
    }
}
