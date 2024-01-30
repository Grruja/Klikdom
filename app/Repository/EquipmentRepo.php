<?php

namespace App\Repository;

use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentRepo
{
    private Equipment $equipmentModel;

    public function __construct()
    {
        $this->equipmentModel = new Equipment();
    }

    public function createEquipment(Request $request, int $listingId): void
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
