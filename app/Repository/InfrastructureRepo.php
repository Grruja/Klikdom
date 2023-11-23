<?php

namespace App\Repository;

use App\Models\Infrastructure;

class InfrastructureRepo
{
    private $infrastructureModel;

    public function __construct()
    {
        $this->infrastructureModel = new Infrastructure();
    }

    public function createInfrastructure($request, $listingId)
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
