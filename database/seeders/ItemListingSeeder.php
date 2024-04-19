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

        Item::create(['name' => 'Quencha 2-man Tent',
         'category_id' => 1,
         'condition' => 'New',
         'price' => 100.00,
         'description' => 'High-quality 2-man tent.',
         'sub_description' => 'High-quality 2-man tent',
         'seller_id' => $sellerIds[array_rand($sellerIds)] , 
         'image_url' => 'item_images/red2man.jpg'
        ]);

        Item::create([
            'name' => 'Quencha 4-man Tent',
            'category_id' => 1,
            'condition' => 'Used',
            'price' => 150.00,
            'description' => 'Spacious 4-man tent in black color.',
            'sub_description' => 'High-quality 4-man tent',
            'seller_id' => $sellerIds[array_rand($sellerIds)],
            'image_url' => 'item_images/tent4.jpg'

        ]);

        Item::create([
            'name' => 'North Face 6-man Tent',
            'category_id' => 1,
            'condition' => 'New',
            'price' => 200.00,
            'description' => 'Durable 6-man tent in green color.',
            'sub_description' => 'High-quality 6-man tent',
            'seller_id' => $sellerIds[array_rand($sellerIds)],
            'image_url' => 'item_images/6tent.jpg'

        ]);

        Item::create(['name' => '3-man Tent',
         'category_id' => 1,
         'condition' => 'New',
         'price' => 80.00,
         'description' => 'High-quality 3-man tent in red color.',
         'sub_description' => 'High-quality 3-man tent',
         'seller_id' => $sellerIds[array_rand($sellerIds)] , 
         'image_url' => 'item_images/red3man.jpg'
        ]);
        //
        Item::create(['name' => 'Marmot 4-man Tent',
         'category_id' => 1,
         'condition' => 'New',
         'price' => 90.00,
         'description' => 'High-quality 2-man tent in red color.',
         'sub_description' => 'High-quality 4-man tent',
         'seller_id' => $sellerIds[array_rand($sellerIds)] , 
         'image_url' => 'item_images/6tent.jpg'
        ]);

        Item::create([
            'name' => 'Patagonia 3-man tent',
            'category_id' => 1,
            'condition' => 'Used',
            'price' => 80.00,
            'description' => 'Spacious 4-man tent in black color.',
            'sub_description' => 'High-quality 3-man tent',
            'seller_id' => $sellerIds[array_rand($sellerIds)],
            'image_url' => 'item_images/red3man.jpg'

        ]);

        Item::create([
            'name' => 'North Face 6-man Tent',
            'category_id' => 1,
            'condition' => 'New',
            'price' => 190.00,
            'description' => 'Durable 6-man tent in green color.',
            'sub_description' => 'High-quality 6-man tent',
            'seller_id' => $sellerIds[array_rand($sellerIds)],
            'image_url' => 'item_images/6tent.jpg'

        ]);

        Item::create(['name' => 'Columbia 3-man Tent',
         'category_id' => 1,
         'condition' => 'New',
         'price' => 110.00,
         'description' => 'High-quality 3-man tent in red color.',
         'sub_description' => 'High-quality 3-man tent',
         'seller_id' => $sellerIds[array_rand($sellerIds)] , 
         'image_url' => 'item_images/red2man.jpg'
        ]);


        //sleeping

        Item::create([
            'name' => 'Quencha Sleeping Bag',
            'category_id' => 2,
            'condition' => 'New',
            'price' => 200.00,
            'description' => 'Comfortable sleeping bag in black color.',
            'sub_description' => 'good-quality sleeping bag',
            'seller_id' => $sellerIds[array_rand($sellerIds)],
            'image_url' => 'item_images/sleepb.jpg'

        ]);


        Item::create([
            'name' => 'Patagonia Regular Sleeping Bag',
            'category_id' => 2,
            'condition' => 'Used',
            'price' => 75.00,
            'description' => 'Regular-sized sleeping bag in black color.',
            'sub_description' => 'High-quality sleeping bag',
            'seller_id' => $sellerIds[array_rand($sellerIds)],
            'image_url' => 'item_images/sb3.jpg'

        ]);

        Item::create([
            'name' => 'Marmot Camp Sleeping Bag',
            'category_id' => 2,
            'condition' => 'New',
            'price' => 100.00,
            'description' => 'Camp-style sleeping bag in orange colour.',
            'sub_description' => 'Good-quality sleeping bag',
            'seller_id' => $sellerIds[array_rand($sellerIds)],
            'image_url' => 'item_images/sleepo.jpg'

        ]);

        Item::create([
            'name' => 'Columbia Camp Sleeping Bag',
            'category_id' => 2,
            'condition' => 'New',
            'price' => 80.00,
            'description' => 'Cosy sleeping bag made for the cold.',
            'sub_description' => 'Cosy sleeping bag made for the cold.',
            'seller_id' => $sellerIds[array_rand($sellerIds)],
            'image_url' => 'item_images/sb3.jpg'

        ]);

        Item::create([
            'name' => 'NorthFace festival sleeping bag',
            'category_id' => 2,
            'condition' => 'used',
            'price' => 70.00,
            'description' => 'Used for festivals, sleeping bag in orange color.',
            'sub_description' => 'Great festival quality sleeping bag',
            'seller_id' => $sellerIds[array_rand($sellerIds)],
            'image_url' => 'item_images/sleepo.jpg'

        ]);

        Item::create([
            'name' => 'Camping Sleeping Bag',
            'category_id' => 2,
            'condition' => 'New',
            'price' => 100.00,
            'description' => 'Camp-style sleeping bag in orange color.',
            'sub_description' => 'Barely used sleeping bag, nice and warm',
            'seller_id' => $sellerIds[array_rand($sellerIds)],
            'image_url' => 'item_images/sleepb.jpg'

        ]);

        Item::create([
            'name' => 'Light Camp Sleeping Bag',
            'category_id' => 2,
            'condition' => 'New',
            'price' => 100.00,
            'description' => 'Light sleeping bag',
            'sub_description' => 'Nice and light for warm nights',
            'seller_id' => $sellerIds[array_rand($sellerIds)],
            'image_url' => 'item_images/sb3.jpg'

        ]);

        Item::create([
            'name' => 'Outdoors Sleeping Bag',
            'category_id' => 2,
            'condition' => 'New',
            'price' => 60.00,
            'description' => 'Camp-style sleeping bag in orange color.',
            'sub_description' => 'Great for outdoor sleeping',
            'seller_id' => $sellerIds[array_rand($sellerIds)],
            'image_url' => 'item_images/sleepo.jpg'

        ]);

        //Lighting
        Item::create([
            'name' => 'Quencha Camping Lantern',
            'category_id' => 3,
            'condition' => 'New',
            'price' => 20.00,
            'description' => 'Portable camping lantern for outdoor use.',
            'sub_description' => 'Well made, durable lantern',
            'seller_id' => $sellerIds[array_rand($sellerIds)],
            'image_url' => 'item_images/ql.jpg'

        ]);

        Item::create([
            'name' => 'Dynamo Torch',
            'category_id' => 3,
            'condition' => 'Used',
            'price' => 15.00,
            'description' => 'Hand-cranked lamp for camping.',
            'sub_description' => 'Bright Lamp for tents and outdoors',
            'seller_id' => $sellerIds[array_rand($sellerIds)],
            'image_url' => 'item_images/dt.jpg'

        ]);

        Item::create([
            'name' => 'Camping Headtorch',
            'category_id' => 3,
            'condition' => 'New',
            'price' => 10.00,
            'description' => 'Lightweight headtorch for camping and hiking.',
            'sub_description' => 'Useful headtorch for night',
            'seller_id' => $sellerIds[array_rand($sellerIds)],
            'image_url' => 'item_images/ht.jpg'

        ]);

        Item::create([
            'name' => 'Camping Light',
            'category_id' => 3,
            'condition' => 'New',
            'price' => 20.00,
            'description' => 'Lightweight headtorch for camping and hiking.',
            'sub_description' => 'Great camping light',
            'seller_id' => $sellerIds[array_rand($sellerIds)],
            'image_url' => 'item_images/ql.jpg'

        ]);

        Item::create([
            'name' => 'Camping Torch',
            'category_id' => 3,
            'condition' => 'New',
            'price' => 10.00,
            'description' => 'Lightweight headtorch for camping and hiking.',
            'sub_description' => 'Useful torch for the dark',
            'seller_id' => $sellerIds[array_rand($sellerIds)],
            'image_url' => 'item_images/dt.jpg'

        ]);

        Item::create([
            'name' => 'Outdoor Headtorch',
            'category_id' => 3,
            'condition' => 'New',
            'price' => 15.00,
            'description' => 'Lightweight headtorch for camping and hiking.',
            'sub_description' => 'Handy headtorch for night time',
            'seller_id' => $sellerIds[array_rand($sellerIds)],
            'image_url' => 'item_images/ht.jpg'

        ]);

        Item::create([
            'name' => 'Festval lamp',
            'category_id' => 3,
            'condition' => 'New',
            'price' => 10.00,
            'description' => 'Lightweight headtorch for camping and hiking.',
            'sub_description' => 'Great for your campsite at the festival',
            'seller_id' => $sellerIds[array_rand($sellerIds)],
            'image_url' => 'item_images/ql.jpg'

        ]);

        Item::create([
            'name' => 'Outdoor Torch',
            'category_id' => 3,
            'condition' => 'used',
            'price' => 7.00,
            'description' => 'Lightweight headtorch for camping and hiking.',
            'sub_description' => 'Good for darkness, may need new batteries',
            'seller_id' => $sellerIds[array_rand($sellerIds)],
            'image_url' => 'item_images/dt.jpg'

        ]);

        // Cooking Equipment
        Item::create([
            'name' => 'Ultralight Cook Set',
            'category_id' => 4,
            'condition' => 'New',
            'price' => 30.00,
            'description' => 'Compact cooking set for camping.',
            'sub_description' => 'Simple portable cooking set',
            'seller_id' => $sellerIds[array_rand($sellerIds)],
            'image_url' => 'item_images/cs.jpg'

        ]);

        Item::create([
            'name' => 'Camping Cutlery',
            'category_id' => 4,
            'condition' => 'New',
            'price' => 10.00,
            'description' => 'Durable cutlery set for outdoor dining.',
            'sub_description' => 'All cutlery needed for camping',
            'seller_id' => $sellerIds[array_rand($sellerIds)],
            'image_url' => 'item_images/cut.jpg'

        ]);

        Item::create([
            'name' => 'Camping Plates and Bowls Set',
            'category_id' => 4,
            'condition' => 'New',
            'price' => 20.00,
            'description' => 'Set of plates and bowls designed for camping.',
            'sub_description' => 'Easy to transport bowl and plate set',
            'seller_id' => $sellerIds[array_rand($sellerIds)],
            'image_url' => 'item_images/pb.jpg'

        ]);

        Item::create([
            'name' => 'Festival cook set',
            'category_id' => 4,
            'condition' => 'New',
            'price' => 25.00,
            'description' => 'Set of plates and bowls designed for camping.',
            'sub_description' => 'Perfect cooking set for festivals',
            'seller_id' => $sellerIds[array_rand($sellerIds)],
            'image_url' => 'item_images/ccs.jpg'

        ]);

        Item::create([
            'name' => 'Chef set',
            'category_id' => 4,
            'condition' => 'New',
            'price' => 25.00,
            'description' => 'Set of plates and bowls designed for camping.',
            'sub_description' => 'Great for cheffing up outdoor meals',
            'seller_id' => $sellerIds[array_rand($sellerIds)],
            'image_url' => 'item_images/chef.jpg'

        ]);

        // Miscellaneous Accessories
        Item::create([
            'name' => 'Swiss Army Knife',
            'category_id' => 5,
            'condition' => 'New',
            'price' => 50.00,
            'description' => 'Versatile tool with various functions for camping.',
            'sub_description' => 'Multi-use pocket knife',
            'seller_id' => $sellerIds[array_rand($sellerIds)],
            'image_url' => 'item_images/sk.jpg'

        ]);

        Item::create([
            'name' => 'Drink Cooling Bag',
            'category_id' => 5,
            'condition' => 'New',
            'price' => 15.00,
            'description' => 'Insulated bag for keeping drinks cool during outdoor activities.',
            'sub_description' => 'Stores any liquids or even foods',
            'seller_id' => $sellerIds[array_rand($sellerIds)],
            'image_url' => 'item_images/dc.jpg'

        ]);

        Item::create([
            'name' => 'Toolbag',
            'category_id' => 5,
            'condition' => 'Used',
            'price' => 25.00,
            'description' => 'Durable bag for storing camping tools and accessories.',
            'sub_description' => 'Essential tool set for fixing or building',
            'seller_id' => $sellerIds[array_rand($sellerIds)],
            'image_url' => 'item_images/tb.jpg'

        ]);

        // Add more items as needed
    }
}
