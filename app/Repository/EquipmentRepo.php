<?php

namespace App\Repository;

use App\Models\Equipment;

class EquipmentRepo
{
    private $equipmentModel;

    public function __construct()
    {
        $this->equipmentModel = new Equipment();
    }

    public function createEquipment($request, $listingId)
    {
        $equipment_name = $request->get('equipment_name');
        if (!is_null($equipment_name)) {
            foreach ($equipment_name as $item) {
                $this->equipmentModel->create([
                    'listing_id' => $listingId,
                    'equipment_name' => $item,
                ]);
            }
        }
    }
}
