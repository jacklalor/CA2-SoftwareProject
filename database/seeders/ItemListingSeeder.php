<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Model;
use App\Models\User;

use Illuminate\Database\Seeder;

class ItemListingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Retrieve seller IDs from the users table
        $sellerIds = User::pluck('id')->toArray();
        
        //tents

        Item::create(['name' => 'Quencha 2-man Tent, Red',
         'category_id' => 1,
         'condition' => 'New',
         'price' => 100.00,
         'description' => 'High-quality 2-man tent in red color.',
         'is_sold' => false,
         'seller_id' => $sellerIds[array_rand($sellerIds)]  
        ]);

        Item::create([
            'name' => 'Quencha 4-man Tent, Black',
            'category_id' => 1,
            'condition' => 'Used',
            'price' => 150.00,
            'description' => 'Spacious 4-man tent in black color.',
            'is_sold' => false,
            'seller_id' => $sellerIds[array_rand($sellerIds)]
        ]);

        Item::create([
            'name' => 'North Face 6-man Tent, Green',
            'category_id' => 1,
            'condition' => 'New',
            'price' => 200.00,
            'description' => 'Durable 6-man tent in green color.',
            'is_sold' => false,
            'seller_id' => $sellerIds[array_rand($sellerIds)]
        ]);

        //sleeping

        Item::create([
            'name' => 'Quencha Sleeping Bag, Black',
            'category_id' => 2,
            'condition' => 'New',
            'price' => 200.00,
            'description' => 'Comfortable sleeping bag in black color.',
            'is_sold' => false,
            'seller_id' => $sellerIds[array_rand($sellerIds)]
        ]);


        Item::create([
            'name' => 'Patagonia Regular Sleeping Bag, Black',
            'category_id' => 2,
            'condition' => 'Used',
            'price' => 75.00,
            'description' => 'Regular-sized sleeping bag in black color.',
            'is_sold' => false,
            'seller_id' => $sellerIds[array_rand($sellerIds)]
        ]);

        Item::create([
            'name' => 'Marmot Camp Sleeping Bag, Orange',
            'category_id' => 2,
            'condition' => 'New',
            'price' => 100.00,
            'description' => 'Camp-style sleeping bag in orange color.',
            'is_sold' => false,
            'seller_id' => $sellerIds[array_rand($sellerIds)]
        ]);

        //Lighting
        Item::create([
            'name' => 'Quencha Camping Lantern',
            'category_id' => 3,
            'condition' => 'New',
            'price' => 20.00,
            'description' => 'Portable camping lantern for outdoor use.',
            'is_sold' => false,
            'seller_id' => $sellerIds[array_rand($sellerIds)]
        ]);

        Item::create([
            'name' => 'Dynamo Lamp',
            'category_id' => 3,
            'condition' => 'Used',
            'price' => 15.00,
            'description' => 'Hand-cranked lamp for camping.',
            'is_sold' => false,
            'seller_id' => $sellerIds[array_rand($sellerIds)]
        ]);

        Item::create([
            'name' => 'Camping Headtorch',
            'category_id' => 3,
            'condition' => 'New',
            'price' => 10.00,
            'description' => 'Lightweight headtorch for camping and hiking.',
            'is_sold' => false,
            'seller_id' => $sellerIds[array_rand($sellerIds)]
        ]);

        // Cooking Equipment
        Item::create([
            'name' => 'Ultralight Cook Set',
            'category_id' => 4,
            'condition' => 'New',
            'price' => 30.00,
            'description' => 'Compact cooking set for camping.',
            'is_sold' => false,
            'seller_id' => $sellerIds[array_rand($sellerIds)]
        ]);

        Item::create([
            'name' => 'Camping Cutlery',
            'category_id' => 4,
            'condition' => 'New',
            'price' => 10.00,
            'description' => 'Durable cutlery set for outdoor dining.',
            'is_sold' => false,
            'seller_id' => $sellerIds[array_rand($sellerIds)]
        ]);

        Item::create([
            'name' => 'Camping Plates and Bowls Set',
            'category_id' => 4,
            'condition' => 'New',
            'price' => 20.00,
            'description' => 'Set of plates and bowls designed for camping.',
            'is_sold' => false,
            'seller_id' => $sellerIds[array_rand($sellerIds)]
        ]);

        // Miscellaneous Accessories
        Item::create([
            'name' => 'Swiss Army Knife',
            'category_id' => 5,
            'condition' => 'New',
            'price' => 50.00,
            'description' => 'Versatile tool with various functions for camping.',
            'is_sold' => false,
            'seller_id' => $sellerIds[array_rand($sellerIds)]
        ]);

        Item::create([
            'name' => 'Drink Cooling Bag',
            'category_id' => 5,
            'condition' => 'New',
            'price' => 15.00,
            'description' => 'Insulated bag for keeping drinks cool during outdoor activities.',
            'is_sold' => false,
            'seller_id' => $sellerIds[array_rand($sellerIds)]
        ]);

        Item::create([
            'name' => 'Toolbag',
            'category_id' => 5,
            'condition' => 'Used',
            'price' => 25.00,
            'description' => 'Durable bag for storing camping tools and accessories.',
            'is_sold' => false,
            'seller_id' => $sellerIds[array_rand($sellerIds)]
        ]);

        // Add more items as needed
    }
}
