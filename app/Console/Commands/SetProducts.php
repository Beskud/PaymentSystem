<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class SetProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:set-products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $products = [

            'basic' => [
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio rem, voluptas laborum nostrum earum tempora ut vel repellendus cupiditate id rerum veritatis expedita repellat voluptatem odit quia, iste recusandae fugiat.',
                'price' => '10',
                'title' => 'Basic',
                'image' => '1'
            ],
            'standart' => [
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio rem, voluptas laborum nostrum earum tempora ut vel repellendus cupiditate id rerum veritatis expedita repellat voluptatem odit quia, iste recusandae fugiat.',
                'price' => '15',
                'title' => 'Standart',
                'image' => '2'
            ],
            'premium' => [
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio rem, voluptas laborum nostrum earum tempora ut vel repellendus cupiditate id rerum veritatis expedita repellat voluptatem odit quia, iste recusandae fugiat.',
                'price' => '25',
                'title' => 'Premium',
                'image' => '3'
            ],
        ];
        
        foreach($products as $value){
            Product::create($value);
        }
    }
}
