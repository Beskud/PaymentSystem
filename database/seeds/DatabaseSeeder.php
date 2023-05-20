<?php

use Illuminate\Database\Seeder;
use App\Models\Product;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio rem, voluptas laborum nostrum earum tempora ut vel repellendus cupiditate id rerum veritatis expedita repellat voluptatem odit quia, iste recusandae fugiat.',
            'price' => '10',
            'title' => 'Basic',
            'image' => '1'
            
        ]);
    }
}
