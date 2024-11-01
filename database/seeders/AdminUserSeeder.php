<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
Use App\Models\User;
Use App\Models\products;
use App\Models\ProductInteraction;
Use App\Models\State;
Use App\Models\route;
Use App\Models\RouteInteraction;


class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'user']);
        $role3 = Role::create(['name' => 'artista']);
        $entrepreneurRole = Role::create(['name' => 'Emprendedor']);
        User::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('asd123')
        ]);
        User::create([
            'name' => 'Usuario',
            'email' => 'user@test.com',
            'password' => bcrypt('asd123')
        ]);
        User::create([
            'name' => 'Artista',
            'email' => 'artista@test.com',
            'password' => bcrypt('asd123')
        ]);
        $user1 = User::find(1);
        $user1->assignRole($role1);

        $user2 = User::find(2);
        $user2->assignRole($role2);

        $user3 = User::find(3);
        $user3->assignRole($role3);

        $entrepreneur = User::create([
            'name' => 'Emprendedor',
            'email' => 'emprendedor@test.com',
            'password' => bcrypt('asd123')
        ]);
        $entrepreneur2 = User::create([
            'name' => 'Emprendedor Veterano',
            'email' => 'emprendedor2@test.com',
            'password' => bcrypt('asd123')
        ]);
        $entrepreneur->assignRole($entrepreneurRole);
        $entrepreneur2->assignRole($entrepreneurRole);

        //add products and product interactions
        $prodCoffe = products::create([
            'name' => 'Café Colombiano',
            'description' => 'Café de las montañas colombianas.',
            'price' => 15000,
            'amount' => 15,
            'url' => 'img/tcIgIJRRjdwXdaJVoIM8f734qPFLLLlB89MlKFVH.jpg',
            'status_id' => 1,
            'category_id' => 1,
        ]);
        $prodCookie = products::create([
            'name' => 'Galleta Artesanal',
            'description' => 'Galleta elaborada por manos campesinas.',
            'price' => 5000,
            'amount' => 15,
            'url' => 'img/tcIgIJRRjdwXdaJVoIM8f734qPFLLLlB89MlKFVH2.jpg',
            'status_id' => 1,
            'category_id' => 1,
        ]); 

        $productInteraction = ProductInteraction::create([
            'product_id'  => $prodCoffe->id,
            'user_id' => $entrepreneur->id]);
        $productInteraction2 = ProductInteraction::create([
            'product_id'  => $prodCookie->id,
            'user_id' => $entrepreneur->id]);
        $productInteraction3 = ProductInteraction::create([
                'product_id'  => $prodCoffe->id,
                'user_id' => $entrepreneur2->id]);
        $productInteraction4 = ProductInteraction::create([
                'product_id'  => $prodCookie->id,
                'user_id' => $entrepreneur2->id]);      

        //Add routes and route interactions        
        //find state active
        $state = State::where('id', 1)
            ->orWhere('name', 'like', 'acti%') // Replace 'your_string' with the actual string you're searching for
            ->first();
        //create routes with previous state
        $route1 = route::create([
            'name' => "Ruta Azufral-Tuquerres",
            'description' => "1 día de caminata, paseo por la montaña, ingreso al volcan, y visita a la laguna verde",
            'contact' => "3024442222",
            'url' => "basicSeeds/azufral.jpg",
            'pdf_url' => "basicSeeds/azufral.pdf",
            'status_id' => $state->id,
        ]);
        $route2 = route::create([
            'name' => "Ruta Chimangual",
            'description' => "1 día de caminata, paseo por la montaña, a aguas termales, charla sobre cultura",
            'contact' => "3024442222",
            'url' => "basicSeeds/chimangual.jpg",
            'pdf_url' => "basicSeeds/chimangual.pdf",
            'status_id' => $state->id,
        ]);
        $routeInteraction1 = RouteInteraction::create([
            'route_id'  => $route1->id,
            'user_id' => $entrepreneur->id]);
        $routeInteraction1 = RouteInteraction::create([
            'route_id'  => $route2->id,
            'user_id' => $entrepreneur2->id]);
        
    }
}
