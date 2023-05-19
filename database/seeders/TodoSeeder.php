<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Feature\Todo;
use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Todo::factory(5)->create();
    }
}
