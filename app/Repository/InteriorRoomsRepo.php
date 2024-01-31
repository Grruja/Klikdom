<?php

namespace App\Repository;

use App\Models\InteriorRooms;

class InteriorRoomsRepo
{
    private InteriorRooms $interiorRoomsModel;

    public function __construct()
    {
        $this->interiorRoomsModel = new InteriorRooms();
    }

    public function createInteriorRooms(?array $rooms, int $listingId): void
    {
        if (!is_null($rooms)) {
            foreach ($rooms as $room) {
                $this->interiorRoomsModel->create([
                    'listing_id' => $listingId,
                    'room_name' => $room,
                ]);
            }
        }
    }
}
