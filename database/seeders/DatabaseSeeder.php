<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Combo;
use App\Models\Group;
use App\Models\Screen;
use App\Models\Seat;
use App\Models\Transaction;
use App\Models\TransactionType;
use App\Models\User;
use App\Models\Weekday;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Groups
        Group::create([
            'name' => 'user'
        ]);
        Group::create([
            'name' => 'admin'
        ]);

        // Weekdays
        for($i = 2; $i <= 7; $i++){
            Weekday::create([
                'name' => 'Thứ '.$i
            ]);
        }
        Weekday::create([
            'name' => 'CN'
        ]);

        // Screens and seats
        for($i = 1; $i <= 10; $i++){
            Screen::create([
                'name' => 'Phòng '.$i
            ]);

            for($j = 1; $j <= 50; $j++){
                Seat::create([
                    'name' => chr(64 + $i) . $j,
                    'screen_id' => $i,
                    'status' => json_encode([])
                ]);
            }
        }

        // Transactions_type
        TransactionType::create([
            'name' => 'VN Pay'
        ]);
        
        TransactionType::create([
            'name' => 'Momo'
        ]);
        TransactionType::create([
            'name' => 'Zalo Pay'
        ]);

        // Combos
        Combo::create([
            'name' => 'Sweet Combo 69oz',
            'description' => 'TIẾT KIỆM 46K!!! Gồm: 1 Bắp (69oz) + 2 Nước có gaz (22oz)',
            'price' => 45,
            'image_path' => 'https://files.betacorp.vn/files/media/images/2023/06/15/sweet-combo-154545-150623-48.png',
        ]);

        Combo::create([
            'name' => 'Cineaura Combo 69oz',
            'description' => 'TIẾT KIỆM 28K!!! Gồm: 1 Bắp (69oz) + 1 Nước có gaz (22oz)',
            'price' => 45,
            'image_path' => 'https://files.betacorp.vn/files/media/images/2023/06/15/beta-combo-154428-150623-83.png',
        ]);

        Combo::create([
            'name' => 'Combo See Mê - Gấu Qee',
            'description' => 'TIẾT KIỆM 38K!!! Sỡ hữu ngay: 1 Ly Gấu Qee kèm nước + 1 Bắp (69oz)',
            'price' => 45,
            'image_path' => 'https://files.betacorp.vn/files/media/combopackage/2024/01/17/combo-online-13-092610-170124-16.png',
        ]);

        Combo::create([
            'name' => 'Combo See Mê - Pastel',
            'description' => 'TIẾT KIỆM 56K!!! Sỡ hữu ngay: 1 Cup Pastel 700ml kèm nước + 1 Bắp (69oz)',
            'price' => 45,
            'image_path' => 'https://files.betacorp.vn/files/media/combopackage/2024/02/15/combo-online-17-093717-150224-13.png',
        ]);

        Combo::create([
            'name' => 'Combo See Mê - Cầu Vồng',
            'description' => 'TIẾT KIỆM 56K!!! Sở hữu ngay: 1 Bắp (69oz) + 1 Cốc Cầu vồng kèm nước có gaz',
            'price' => 45,
            'image_path' => 'https://files.betacorp.vn/files/media/combopackage/2023/07/27/combo-see-me-08-083746-270723-92.png',
        ]);

        Combo::create([
            'name' => 'Combo See Mê - Cầu Vồng',
            'description' => 'TIẾT KIỆM 56K!!! Sỡ hữu ngay: 1 ly Cầu Vồng kèm nước + 1 Bắp (69oz)',
            'price' => 45,
            'image_path' => 'https://files.betacorp.vn/files/media/combopackage/2023/07/27/combo-see-me-08-083746-270723-92.png',
        ]);

        Combo::create([
            'name' => 'Family Combo 69oz',
            'description' => 'TIẾT KIỆM 95K!!! Gồm: 2 Bắp (69oz) + 4 Nước có gaz (22oz) + 2 Snack Oishi (80g)',
            'price' => 45,
            'image_path' => 'https://files.betacorp.vn/files/media/images/2023/06/15/family-combo-154315-150623-37.png',
        ]);

        Combo::create([
            'name' => 'Combo See Mê - Phi Hành Gia',
            'description' => 'TIẾT KIỆM 56K!!! Sỡ hữu ngay: 1 Ly Phi Hành Gia kèm nước + 1 Bắp (69oz)',
            'price' => 45,
            'image_path' => 'https://files.betacorp.vn/files/media/images/2023/06/15/combo-see-me-130x130px-12-151911-150623-82.png',
            
        ]);

        // Admin
        User::create([
            'name' => 'Admin',
            'email' => '2154810051@vaa.edu.vn',
            'password' => Hash::make('admin'),
            'avatar' => 'https://i.pinimg.com/736x/c6/e5/65/c6e56503cfdd87da299f72dc416023d4.jpg',
            'group_id' => 2
        ]);
    }
}
