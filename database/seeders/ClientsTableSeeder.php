<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('clients')->insert([
            ['id' => 1, 'name' => 'Content Moderation', 'image' => 'Air_Asia-logo-5ACDC17858-seeklogo.com_.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2025-01-02 21:24:45'],
            ['id' => 2, 'name' => 'air china', 'image' => 'AIR-CHINAAIR-CHINA_logospng.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 3, 'name' => 'air hongkong', 'image' => 'Air-Hong-Kong-LogoAir-Hong-Kong-Logo_logospng.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 4, 'name' => 'air macau', 'image' => 'Air-Macau-LogoAir-Macau-Logo_logospng.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 5, 'name' => 'air new zeland', 'image' => 'Air-New-Zealand-LogoAir-New-Zealand-Logo_logospng.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 6, 'name' => 'air niugini', 'image' => 'AIR-NIUGINI-LOGOAIR-NIUGINI-LOGO_logospng.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 7, 'name' => 'ana', 'image' => 'All-Nippon-Airways-LogoAll-Nippon-Airways-Logo_logospng.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 8, 'name' => 'asiana airlines', 'image' => 'Asiana-Airlines-LogoAsiana-Airlines-Logo_logospng.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 9, 'name' => 'batik air', 'image' => 'Batik-AirBatik-Air_logospng.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 10, 'name' => 'bismillah airlines', 'image' => 'Bismillah-AirlinesBismillah-Airlines_logospng.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 11, 'name' => 'british airways', 'image' => 'British-Airways-LogoBritish-Airways-Logo_logospng.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 12, 'name' => 'cathay pacific', 'image' => 'CATHAY-PACIFIC-LOGOCATHAY-PACIFIC-LOGO_logospng.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 13, 'name' => 'cebu pacific', 'image' => 'Cebu-Pacific-LogoCebu-Pacific-Logo_logospng.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 14, 'name' => 'central airlines', 'image' => 'Central-airlinesCentral-airlines_logospng.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 15, 'name' => 'china airlines', 'image' => 'China-Airlines-Logo.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 16, 'name' => 'china eastern', 'image' => 'China-Eastern-Airlines-logoChina-Eastern-Airlines-logo_logospng.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 17, 'name' => 'china southern airlines', 'image' => 'china-southern-airlineschina-southern-airlines_logospng.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 18, 'name' => 'emirates', 'image' => 'Emirates-LogoEmirates-Logo_logospng.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 19, 'name' => 'etihad airways', 'image' => 'Ethihad-AirwaysEthihad-Airways_logospng.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 20, 'name' => 'ethiopian', 'image' => 'Ethopian-AirlinesEthopian-Airlines_logospng.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 21, 'name' => 'eva air', 'image' => 'Eva-AirEva-Air_logospng.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 22, 'name' => 'greater bay airlines', 'image' => 'Greater_Bay_Airlines_logoGreater_Bay_Airlines_logo_logospng.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 23, 'name' => 'gulf air', 'image' => 'Gulf-Air-logoGulf-Air-logo_logospng.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 24, 'name' => 'hunnu air', 'image' => 'HANNU-AIRHANNU-AIR_logospng.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 25, 'name' => 'hk express', 'image' => 'HONG-KONG-EXPRESSHONG-KONG-EXPRESS_logospng.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 26, 'name' => 'hongkong airlines', 'image' => 'Hong_Kong_Airlines_LogoHong_Kong_Airlines_Logo_logospng.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 27, 'name' => 'hongkong air cargo', 'image' => 'Hong_Kong_CargoHong_Kong_Cargo_logospng.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 28, 'name' => 'indigo', 'image' => 'Indigo-Airlines-LogoIndigo-Airlines-Logo_logospng.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 29, 'name' => 'japan airlines', 'image' => 'Japan-Airlines-Logo.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 30, 'name' => 'jet airways', 'image' => 'Jet-Airways-LogoJet-Airways-Logo_logospng.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 31, 'name' => 'kenya airways', 'image' => 'Kenya-Airways-LogoKenya-Airways-Logo_logospng.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 32, 'name' => 'kipper airlines', 'image' => 'Kipper-AirlinesKipper-Airlines_logospng.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 33, 'name' => 'korean air', 'image' => 'Korean-Air-LogoKorean-Air-Logo_logospng.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 34, 'name' => 'kuwait airways', 'image' => 'Kuwait-Airways-LogoKuwait-Airways-Logo_logospng.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 35, 'name' => 'latam', 'image' => 'Latam-Airlines-LogoLatam-Airlines-Logo_logospng.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 36, 'name' => 'lion air', 'image' => 'Lion-Air-LogoLion-Air-Logo_logospng.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 37, 'name' => 'lufthansa', 'image' => 'Lufthansa-LogoLufthansa-Logo_logospng.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 38, 'name' => 'malaysia airlines', 'image' => 'Malaysia-Airlines-LogoMalaysia-Airlines-Logo_logospng.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 39, 'name' => 'mandarin airlines', 'image' => 'Mandarin-AirlinesMandarin-Airlines_logospng.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 40, 'name' => 'miat', 'image' => 'MIAT-Airlines-Mongolia-LogoMIAT-Airlines-Mongolia-Logo_logospng.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 41, 'name' => 'myanmar national airlines', 'image' => 'Myanmar-National-AirlinesMyanmar-National-Airlines_logospng.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 42, 'name' => 'nepal airlines', 'image' => 'Nepal-Airlines-LogoNepal-Airlines-Logo_logospng.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 43, 'name' => 'nordic regional airlines', 'image' => 'Nordic-Regional-AirlinesNordic-Regional-Airlines_logospng.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 44, 'name' => 'oman air', 'image' => 'Oman-Air-Oman-Air_logospng.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 45, 'name' => 'peach aviation', 'image' => 'Peach-Aviation-LogoPeach-Aviation-Logo_logospng.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 46, 'name' => 'philippine airlines', 'image' => 'Philippine-Airlines-LogoPhilippine-Airlines-Logo_logospng.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 47, 'name' => 'qatar airways', 'image' => 'Qatar-Airways-LogoQatar-Airways-Logo_logospng.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 48, 'name' => 'saudi arabian airlines', 'image' => 'Saudia-Airlines-Saudi-Arabian-Airlines-Logo-Saudi-Arabian-Airlines_logospng.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 49, 'name' => 'shenzhen airlines', 'image' => 'Shenzhen-Airlines-LogoShenzhen-Airlines-Logo_logospng.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 50, 'name' => 'starlux', 'image' => 'starlux.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
            ['id' => 51, 'name' => 'thai', 'image' => 'Thai-Airways-LogoThai-Airways-Logo_logospng.png', 'created_at' => '2024-12-16 13:24:34', 'updated_at' => '2024-12-16 13:24:34'],
        ]);
    }
}

