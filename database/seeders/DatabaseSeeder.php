<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Categories;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Factories\UserFactory;
use App\Models\NigerianUniversities;
use App\Http\Controllers\Help\ADM_Helper;
use App\Models\AdvertiserInfo;
use App\Models\BrandInfo;
use App\Models\Listing;
use App\Models\Payroll;
use Database\Factories\AdvertiserInfoFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        //  //  states and lga list
        //  foreach (ADM_Helper::$states_list as $val) {
        //     DB::table('states')->insert([
        //      'state' => $val['state']
        //     ]);
        //   }



        $categories = Categories::factory(10)->create();
        $users = \App\Models\User::factory(12)->create()->each(function($user) use($categories){
            Listing::factory(rand(1, 4))->create([
                'user_id' => $user->id
            ])->each(function ($listing) use($categories, $user){
                $listing->categories()->attach($categories->random(2));
                Payroll::factory()->create([
                    'user_id' => $user->id,
                    'listing_id' => $listing->id,
                ]);
                    
            });

            BrandInfo::factory()->create([
                'user_id' => $user->id,
                // 'category' => ''
            ]);

            // if($user->role == 'creator'){
            //     AdvertiserInfo::factory()->create()->each(function ($advertiserInfo) use($categories){
            //         $advertiserInfo->user()->attach($categories->random(1));
            //     });
            // }
        });

        
        
        // \App\Models\Listing::factory(10)->create();

       
        // $csvData = file_get_contents(asset('nigeria-universities-CSV.csv'), true);
        // $lines = explode(PHP_EOL, $csvData);
        // $array =[];
        // $int = 0;
        // foreach ($lines as $line) {
        //     if($int != 0){

        //         // array_push($array, str_getcsv($line));
        //         $lineArr =  str_getcsv($line);
        //         NigerianUniversities::factory()->create([
        //                     'name' => $lineArr[0],
        //                     'type' => $lineArr[1],
        //                     'acronym' => $lineArr[2],
        //                     'ownership' => $lineArr[3],
        //                     'url' => $lineArr[4],
        //                     'year' => $lineArr[5],
        //                ]);
        //         // $array[] = str_getcsv($line);
        //     }
        //     $int++;
        // }

        // //category Seeder 
        // $default_category = [
        //     "Digital Marketing",
        //     "Graphics & Design",
        //     "Writing & Translation",
        //     "Business",
        //     "Programming & Tech",
        //     "Music & Audio",
        //     "Video & Animation",
        //     "Data",
        //     "Photography",
        //     "Lifestyle",
        // ];

        // foreach ($default_category as $val) {
        //    Categories::create([
        //     'category_name' => $val
        //    ]);
        // }
            
       
        // foreach (ADM_Helper::$lga_NG as $val) {
        //    DB::table('lga_ng')->insert([
        //     'lga' => $val['lga'],
        //     'state_id' => $val['state_id']
        //    ]);
        //  }
    }

}
