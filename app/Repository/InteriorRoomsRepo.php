<?php

namespace App\Repository;

use App\Models\InteriorRooms;
use Illuminate\Http\Request;

class InteriorRoomsRepo
{
    private InteriorRooms $interiorRoomsModel;

    public function __construct()
    {
        $this->interiorRoomsModel = new InteriorRooms();
    }

    public function createInteriorRooms(Request $request, int $listingId): void
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
