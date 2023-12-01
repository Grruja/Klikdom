<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\District;
use App\Models\Place;
use App\Models\Settlement;
use App\Models\Area;
use App\Models\Location;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = config('cities');

        foreach ($cities as $city) {
            Artisan::call('location:get', ['location' => $city]);
            $results = json_decode(Artisan::output(), true);

            foreach ($results as $result) {
                $location = array_reverse($result['allParentTitles']);
                $location[] = $result['title'];

                $models = [City::class, District::class, Settlement::class, Area::class, Place::class];
                $ids = [];

                foreach ($location as $key => $value) {
                    $model = $models[$key]::firstOrNew(['name' => $value]);

                    if (!$model->exists) {
                        $model->save();
                    }

                    $ids[$key] = $model->id;
                }

                Location::create([
                    'city_id' => $ids[0],
                    'district_id' => $ids[1] ?? null,
                    'settlement_id' => $ids[2] ?? null,
                    'area_id' => $ids[3] ?? null,
                    'place_id' => $ids[4] ?? null,
                ]);
            }
        }
    }
}
