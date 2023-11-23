<?php

namespace App\Repository;

use App\Models\InteriorRooms;

class InteriorRoomsRepo
{
    private $interiorRoomsModel;

    public function __construct()
    {
        $this->interiorRoomsModel = new InteriorRooms();
    }

    public function createInteriorRooms($request, $listingId)
    {
        $room_name = $request->get('room_name');
        if (!is_null($room_name)) {
            foreach ($room_name as $item) {
                $this->interiorRoomsModel->create([
                    'listing_id' => $listingId,
                    'room_name' => $item,
                ]);
            }
        }
    }
}
