<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use App\Models\User;
use App\Models\ProductCategories;
use App\Models\ProductSubcategories;

class SeederController extends Controller
{
    public function dbseed(){
         // Check if the tables are empty
        $UserEmpty = User::count() === 0;
        $CatEmpty = ProductCategories::count() === 0;
        $SubcatEmpty = ProductSubcategories::count() === 0;

        if($UserEmpty && $CatEmpty && $SubcatEmpty){
            try {
                // Seed the database if all tables are empty
                Artisan::call('db:seed', ['--class' => 'Database\\Seeders\\Seedall']);
                Artisan::call('db:seed', ['--class' => 'Database\\Seeders\\UsersTableSeeder']);
                return redirect()->route('welcome')->with('message', 'Seeded successfully');
            } catch (\Exception $e) {
                //If database issues rises
                return redirect()->back()->with('message', 'Failed to seed the database. Please check your database credentials.');
            }
        } else {
            return redirect()->back()->with('message','Already Seeded');
        }
    }
}
