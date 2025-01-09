<?php

namespace Database\Seeders;

use App\Models\Permissions;
use App\Models\RolePermissions;
use App\Models\Roles;
use App\Models\UserRoles;
use App\Models\Users;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Permissions::factory()->create([
            'name' => 'All Permission',
            'description' => 'Allow all access',
            'pages' => json_encode(["user-management", "role-management", "permission-management", "user-activity-reports", "c-about-us", "c-people", "c-clients"]),
        ]);

        Roles::factory()->create([
            'name' => 'Developer',
            'description' => 'Developer Mode',
            'color' => 'warning',
        ]);

        Users::factory()->create([
            'id_number' => 'A10272',
            'name' => 'Daniel Logarta',
            'pfp' => 'pagss_default_user.jpg',
            'position' => 'IT Assistant/Developer',
            'email' => 'danielogarta09@gmail.com',
            'password' => bcrypt('danielogarta09'),
        ]);

        RolePermissions::factory()->create([
            'role_id' => 1,
            'permission_id' => 1,
        ]);

        UserRoles::factory()->create([
            'user_id' => 1,
            'role_id' => 1,
        ]);

        DB::table('lar_pagss_cms.clients')->insert([
            ['id' => '1','name' => 'Content Moderation','image' => 'Air_Asia-logo-5ACDC17858-seeklogo.com_.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2025-01-03 05:24:45'],
            ['id' => '2','name' => 'air china','image' => 'AIR-CHINAAIR-CHINA_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '3','name' => 'air hongkong','image' => 'Air-Hong-Kong-LogoAir-Hong-Kong-Logo_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '4','name' => 'air macau','image' => 'Air-Macau-LogoAir-Macau-Logo_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '5','name' => 'air new zeland','image' => 'Air-New-Zealand-LogoAir-New-Zealand-Logo_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '6','name' => 'air niugini','image' => 'AIR-NIUGINI-LOGOAIR-NIUGINI-LOGO_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '7','name' => 'ana','image' => 'All-Nippon-Airways-LogoAll-Nippon-Airways-Logo_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '8','name' => 'asiana airlines','image' => 'Asiana-Airlines-LogoAsiana-Airlines-Logo_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '9','name' => 'batik air','image' => 'Batik-AirBatik-Air_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '10','name' => 'bismillah airlines','image' => 'Bismillah-AirlinesBismillah-Airlines_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '11','name' => 'british airways','image' => 'British-Airways-LogoBritish-Airways-Logo_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '12','name' => 'cathay pacific','image' => 'CATHAY-PACIFIC-LOGOCATHAY-PACIFIC-LOGO_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '13','name' => 'cebu pacific','image' => 'Cebu-Pacific-LogoCebu-Pacific-Logo_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '14','name' => 'central airlines','image' => 'Central-airlinesCentral-airlines_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '15','name' => 'china airlines','image' => 'China-Airlines-Logo.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '16','name' => 'china eastern','image' => 'China-Eastern-Airlines-logoChina-Eastern-Airlines-logo_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '17','name' => 'china southern airlines','image' => 'china-southern-airlineschina-southern-airlines_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '18','name' => 'emirates','image' => 'Emirates-LogoEmirates-Logo_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '19','name' => 'etihad airways','image' => 'Ethihad-AirwaysEthihad-Airways_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '20','name' => 'ethiopian','image' => 'Ethopian-AirlinesEthopian-Airlines_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '21','name' => 'eva air','image' => 'Eva-AirEva-Air_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '22','name' => 'greater bay airlines','image' => 'Greater_Bay_Airlines_logoGreater_Bay_Airlines_logo_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '23','name' => 'gulf air','image' => 'Gulf-Air-logoGulf-Air-logo_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '24','name' => 'hunnu air','image' => 'HANNU-AIRHANNU-AIR_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '25','name' => 'hk express','image' => 'HONG-KONG-EXPRESSHONG-KONG-EXPRESS_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '26','name' => 'hongkong airlines','image' => 'Hong_Kong_Airlines_LogoHong_Kong_Airlines_Logo_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '27','name' => 'hongkong air cargo','image' => 'Hong_Kong_CargoHong_Kong_Cargo_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '28','name' => 'japan airlines','image' => 'JAPAN-AIRLINESJAPAN-AIRLINES_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '29','name' => 'jetstar','image' => 'JETSTARJETSTAR_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '30','name' => 'jdl','image' => 'Jiangsu-JingdonGJiangsu-JingdonG_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '31','name' => 'juneyao air','image' => 'juneyao-airlinesjuneyao-airlines_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '32','name' => 'klm','image' => 'KLM-logoKLM-logo_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '33','name' => 'korean air','image' => 'Korean-Air-LogoKorean-Air-Logo_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '34','name' => 'kuwait airways','image' => 'Kuwait_Airways_logoKuwait_Airways_logo_logospng1.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '35','name' => 'mongolian airways','image' => 'Mongolian-Airways-CargoMongolian-Airways-Cargo_logospng1.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '36','name' => 'okair','image' => 'OKAY-Air-LogoOKAY-Air-Logo_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '37','name' => 'oman air','image' => 'Oman-Air-logoOman-Air-logo_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '38','name' => 'peach','image' => 'PEACHPEACH_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '39','name' => 'philippine airlines','image' => 'Philippine_Airlines-LogoPhilippine_Airlines-Logo_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '40','name' => 'qantas','image' => 'Qantas-LogoQantas-Logo_logospng1.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '41','name' => 'qatar airways','image' => 'Qatar-Airways-LogoQatar-Airways-Logo_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '42','name' => 'rom cargo','image' => 'romcargologoromcargologo_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '43','name' => 'royal brunei airlines','image' => 'Royal-Brunei-AirlinesRoyal-Brunei-Airlines_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '44','name' => 'scoot','image' => 'scootscoot_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '45','name' => 'shanghai airlines','image' => 'Shanghai-Airlines-LogoShanghai-Airlines-Logo_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '46','name' => 'sichuan airlines','image' => 'Sichuan-Airlines-LogoSichuan-Airlines-Logo_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '47','name' => 'singapore airlines','image' => 'Singapore-Airlines-LogoSingapore-Airlines-Logo_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '48','name' => 'sky angkor airlines','image' => 'sky-angkor.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '49','name' => 'spring airlines','image' => 'Spring-Airlines-LogoSpring-Airlines-Logo_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '50','name' => 'starlux','image' => 'starlux.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '51','name' => 'thai','image' => 'Thai-Airways-LogoThai-Airways-Logo_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '52','name' => 'turkish airlines','image' => 'Turkish_Airlines_logoTurkish_Airlines_logo_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '53','name' => 'united','image' => 'United-Airlines-LogoUnited-Airlines-Logo_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '54','name' => 'ups','image' => 'UPS-logoUPS-logo_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '55','name' => 'vietnam airlines','image' => 'Vietnam-AirlinesVietnam-Airlines_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '56','name' => 'virgin atlantic','image' => 'Virgin-Atlantic-LogoVirgin-Atlantic-Logo_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '57','name' => 'xiamen air','image' => 'Xiamen-Airlines-LogoXiamen-Airlines-Logo_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34'],
            ['id' => '58','name' => 'ytok express','image' => 'ytoyto_logospng.png','created_at' => '2024-12-16 21:24:34','updated_at' => '2024-12-16 21:24:34']
        ]);

        DB::table('lar_pagss_cms.organizations')->insert([
            ['id' => '1','image' => 'CorderoJanette1.jpg','name' => 'janette cordero','title' => 'president and ceo','category' => 'executive','created_at' => '2024-12-16 20:51:54','updated_at' => '2024-12-16 20:51:54'],
            ['id' => '2','image' => 'Escolar-Dickson-1.jpg','name' => 'dickson escolar','title' => 'chief operating officer','category' => 'executive','created_at' => '2024-12-16 20:51:54','updated_at' => '2024-12-16 20:51:54'],
            ['id' => '3','image' => 'Chiong-Jennifer-1.jpg','name' => 'jennifer chiong','title' => 'vice president','category' => 'executive','created_at' => '2024-12-16 20:51:54','updated_at' => '2024-12-16 20:51:54'],
            ['id' => '5','image' => 'David-Johny-1.jpg','name' => 'johnny david','title' => 'vice president','category' => 'executive','created_at' => '2024-12-16 20:51:54','updated_at' => '2024-12-16 20:51:54'],
            ['id' => '6','image' => 'DyocoAngelo-1.jpg','name' => 'angelo dyoco','title' => 'senior assistant vice president','category' => 'executive','created_at' => '2024-12-16 20:51:54','updated_at' => '2024-12-16 20:51:54'],
            ['id' => '7','image' => 'Sapina-Aileen1.jpg','name' => 'aileen sapina','title' => 'assistant vice president','category' => 'executive','created_at' => '2024-12-16 20:51:54','updated_at' => '2024-12-16 20:51:54'],
            ['id' => '8','image' => 'Bayongan-Jesus-1.jpg','name' => 'jesus enrico bayongan','title' => 'senior manager','category' => 'manager','created_at' => '2024-12-16 20:51:54','updated_at' => '2024-12-16 20:51:54'],
            ['id' => '9','image' => 'CatilloVivian-1.jpg','name' => 'vivian castillo','title' => 'senior manager','category' => 'manager','created_at' => '2024-12-16 20:51:54','updated_at' => '2024-12-16 20:51:54'],
            ['id' => '10','image' => 'Clerigo-Claudio-1.jpg','name' => 'claudio clerigo','title' => 'senior manager','category' => 'manager','created_at' => '2024-12-16 20:51:54','updated_at' => '2024-12-16 20:51:54'],
            ['id' => '11','image' => 'Dy-Bruce-1.jpg','name' => 'bruce dy','title' => 'senior manager','category' => 'manager','created_at' => '2024-12-16 20:51:54','updated_at' => '2024-12-16 20:51:54'],
            ['id' => '12','image' => 'Llamas-Emerlita-1.jpg','name' => 'emerlita llamas','title' => 'senior manager','category' => 'manager','created_at' => '2024-12-16 20:51:54','updated_at' => '2024-12-26 08:01:11'],
            ['id' => '13','image' => 'Additional-last-a.jpg','name' => 'philip magsayo','title' => 'senior manager','category' => 'manager','created_at' => '2024-12-16 20:51:54','updated_at' => '2024-12-16 20:51:54'],
            ['id' => '14','image' => 'TampusDivina-1.jpg','name' => 'divina alexes tampus','title' => 'senior manager','category' => 'manager','created_at' => '2024-12-16 20:51:54','updated_at' => '2024-12-16 20:51:54'],
            ['id' => '15','image' => 'TansoCatherine.jpg','name' => 'catherine tanso','title' => 'senior manager','category' => 'manager','created_at' => '2024-12-16 20:51:54','updated_at' => '2024-12-16 20:51:54'],
            ['id' => '16','image' => 'Acedo-Katherine-1.jpg','name' => 'catherine acedo','title' => 'manager','category' => 'manager','created_at' => '2024-12-16 20:51:54','updated_at' => '2024-12-16 20:51:54'],
            ['id' => '17','image' => 'Ambe-Gerard-1.jpg','name' => 'gerard ambe','title' => 'executive assistant to the coo','category' => 'manager','created_at' => '2024-12-16 20:51:54','updated_at' => '2024-12-16 20:51:54'],
            ['id' => '18','image' => 'Additional-1-a.jpg','name' => 'rose andan','title' => 'station manager','category' => 'manager','created_at' => '2024-12-16 20:51:54','updated_at' => '2024-12-16 20:51:54'],
            ['id' => '19','image' => 'AnonuevoChito-1.jpg','name' => 'chito añonuevo','title' => 'manager','category' => 'manager','created_at' => '2024-12-16 20:51:54','updated_at' => '2024-12-16 20:51:54'],
            ['id' => '20','image' => 'Curabo-Romina-1.jpg','name' => 'romina curabo','title' => 'manager','category' => 'manager','created_at' => '2024-12-16 20:51:54','updated_at' => '2024-12-16 20:51:54'],
            ['id' => '21','image' => 'Gabalones-Fannie-1.jpg','name' => 'fannie gabalones','title' => 'station manager','category' => 'manager','created_at' => '2024-12-16 20:51:54','updated_at' => '2024-12-16 20:51:54'],
            ['id' => '22','image' => 'PincaLuis-1.jpg','name' => 'luis pinca','title' => 'gse operations manager','category' => 'manager','created_at' => '2024-12-16 20:51:54','updated_at' => '2024-12-16 20:51:54'],
            ['id' => '23','image' => 'Rios-Melchor-1.jpg','name' => 'melchor rios','title' => 'manager','category' => 'manager','created_at' => '2024-12-16 20:51:54','updated_at' => '2024-12-16 20:51:54']
        ]);
    }
}
