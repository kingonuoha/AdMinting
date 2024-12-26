<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Deals;
use GuzzleHttp\Client;
use App\Models\Listing;
use App\Models\Payroll;
use App\Models\BrandInfo;
use App\Models\Categories;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Models\AdvertiserInfo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Database\Factories\UserFactory;
use App\Models\NigerianUniversities;
use App\Http\Controllers\Help\ADM_Helper;
use Database\Factories\AdvertiserInfoFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        // Role::create(['name' => 'admin']);
        // Role::create(['name' => 'creator']);
        // Role::create(['name' => 'brand']);

        //  states and lga list
        // foreach (ADM_Helper::$states_list as $val) {
        //     DB::table('states')->insert([
        //         'state' => $val['state']
        //     ]);
        // }



        foreach (ADM_Helper::$categories as $category) {
            Categories::create([
                'category_name' => $category,
                'category_slug' => Str::slug($category)
            ]);
        }

        // $users = \App\Models\User::factory(12)->create()->each(function($user) use($categories){
        //     $brands = BrandInfo::factory(12)->create();
        //     // $user->categories()->attach($categories->pluck("id")->toArray());
        //     $user->brandInfos()->attach($brands->pluck("id")->toArray());

        //     Listing::factory(rand(1, 4))->create([
        //         'user_id' => $user->id
        //     ])->each(function ($listing) use($categories, $user){
        //         $listing->categories()->attach($categories->random(2));
        //         Payroll::factory()->create([
        //             'user_id' => $user->id,
        //             'listing_id' => $listing->id,
        //         ]);

        //     });



        //     if($user->role == 'creator'){
        //         AdvertiserInfo::factory()->create()->each(function ($advertiserInfo) use($categories){
        //             $advertiserInfo->user()->attach($categories->random(1));
        //         });
        //     }
        // });

        // ===========================================================
        // ===========================when users already exists================
        // ===========================================================

        // $users = User::all();
        // $client = new Client();


        // foreach ($users as $user) {
        //         // adding profile photo using api
        //     $response = $client->get('https://randomuser.me/api/');
        //     $usersRes = json_decode($response->getBody()->getContents(), true)['results'];
        //         $user->update([
        //             'name' => $usersRes[0]['name']['first'] . ' ' . $usersRes[0]['name']['last'],
        //             'profile_photo_path' => saveAvatar($usersRes[0]['picture']['large'])
        //         ]);
        // // Create and associate AdvertiserInfo records for each user
        // AdvertiserInfo::factory()->create([
        //     'user_id' => $user->id,
        //     // Add other attributes based on your factory definition
        // ]);

        // seeding Deals
        // Deals::factory(rand(1, 5))->create([
        //     "user_id" => $user->id
        // ]);

        // correcting seeded phone number instance
        // $user->advertiserInfos->update([
        //     'phone_number' => ["0809 077 5994"]
        // ]);
        // Updating social followeers
        // $user->update([
        //     'social_youtube_followers' => rand(rand(50, 100), rand(1000, 900000)),
        //     'social_facebook_followers' => rand(rand(50, 100), rand(1000, 900000)),
        //     'social_twitter_followers' => rand(rand(50, 100), rand(1000, 900000)),
        //     'social_linkedin_followers' => rand(rand(50, 100), rand(1000, 900000)),
        //     'social_instagram_followers' => rand(rand(50, 100), rand(1000, 900000)),
        // ]);

        // update default social account
        // $socials = (new User)->social;
        // $user->update([
        //     'primary_handle' => Arr::random($socials),
        // ]);
        // }

        // ===========================================================
        // =========================== End when users already exists================
        // ===========================================================

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
