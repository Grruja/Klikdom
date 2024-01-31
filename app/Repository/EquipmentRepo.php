<?php

namespace App\Repository;

use App\Models\Equipment;

class EquipmentRepo
{
    private Equipment $equipmentModel;

    public function __construct()
    {
        $this->equipmentModel = new Equipment();
    }

    public function createEquipment(?array $equipments, int $listingId): void
    {
        if (!is_null($equipments)) {
            foreach ($equipments as $item) {
                $this->equipmentModel->create([
                    'listing_id' => $listingId,
                    'equipment_name' => $item,
                ]);
            }
        }
    }
}
