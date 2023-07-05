<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bond;
use App\Models\Post;
use App\Models\Bonus;
use App\Models\Contract;
use App\Models\Discount;
use App\Models\Employee;
use App\Models\Ticket;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::factory(10)->create();
        Post::factory(20)->create();
        Employee::factory(10)->create();
        Ticket::factory(20)->create();
        Bonus::factory(10)->create();
        Bond::factory(20)->create();
        Discount::factory(20)->create();
        Contract::factory(10)->create();
    }
}
