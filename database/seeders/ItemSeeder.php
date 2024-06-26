<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('items')->insert([
            [
                'category_id' => 5,
                'owner_id' => 1,
                'is_variable' => true,
                'item_name' => 'サクサクバタクロワッサン',
                'price' => rand(100, 500),
                'content' => 'バターたっぷりでサクサクとした食感が楽しめるクロワッサンです。',
                'created_at' => now()->subDays(rand(0, 365)),
            ],
            [
                'category_id' => 1,
                'owner_id' => 1,
                'is_variable' => true,
                'item_name' => 'バター香るふんわり食パン',
                'price' => rand(100, 500),
                'content' => 'バターの香りが食欲をそそる、ふんわりとした食感が特徴の食パン。朝食にぴったりです。',
                'created_at' => now()->subDays(rand(0, 365)),
            ],
            [
                'category_id' => 6,
                'owner_id' => 1,
                'is_variable' => true,
                'item_name' => 'つぶあんパン',
                'price' => rand(100, 500),
                'content' => 'つぶあんがぎっしり詰まった、しっとりとしたあんパン。',
                'created_at' => now()->subDays(rand(0, 365)),
            ],
            [
                'category_id' => 2,
                'owner_id' => 1,
                'is_variable' => true,
                'item_name' => 'メープルメロンパン',
                'price' => rand(100, 500),
                'content' => 'メープルシロップがたっぷり染み込んだメロンパン。外はカリッと、中はふんわり。',
                'created_at' => now()->subDays(rand(0, 365)),
            ],
            [
                'category_id' => 4,
                'owner_id' => 1,
                'is_variable' => true,
                'item_name' => 'スパイシーカレーパン',
                'price' => rand(100, 500),
                'content' => 'スパイシーなカレーがたっぷり入った、カリッと揚げたカレーパン。',
                'created_at' => now()->subDays(rand(0, 365)),
            ],
            [
                'category_id' => 3,
                'owner_id' => 1,
                'is_variable' => true,
                'item_name' => '抹茶ホワイトチョコクッキー',
                'price' => rand(100, 500),
                'content' => '抹茶の風味が豊かなホワイトチョコチップ入りクッキー。',
                'created_at' => now()->subDays(rand(0, 365)),
            ],
            [
                'category_id' => 5,
                'owner_id' => 1,
                'is_variable' => true,
                'item_name' => 'アーモンドクロワッサン',
                'price' => rand(100, 500),
                'content' => 'アーモンドスライスがたっぷりトッピングされたクロワッサン。',
                'created_at' => now()->subDays(rand(0, 365)),
            ],
            [
                'category_id' => 6,
                'owner_id' => 1,
                'is_variable' => true,
                'item_name' => 'こしあんパン',
                'price' => rand(100, 500),
                'content' => '滑らかなこしあんが詰まった、しっとりとしたあんパン。',
                'created_at' => now()->subDays(rand(0, 365)),
            ],
            [
                'category_id' => 1,
                'owner_id' => 1,
                'is_variable' => true,
                'item_name' => '全粒粉の健康食パン',
                'price' => rand(100, 500),
                'content' => '全粒粉を使用し、栄養価が高いヘルシーな食パン。',
                'created_at' => now()->subDays(rand(0, 365)),
            ],
            [
                'category_id' => 2,
                'owner_id' => 1,
                'is_variable' => true,
                'item_name' => 'チョコチップメロンパン',
                'price' => rand(100, 500),
                'content' => 'チョコチップがたっぷり入った、甘くて美味しいメロンパン。',
                'created_at' => now()->subDays(rand(0, 365)),
            ],
            [
                'category_id' => 3,
                'owner_id' => 1,
                'is_variable' => true,
                'item_name' => '抹茶ホワイトチョコクッキー',
                'price' => rand(100, 500),
                'content' => '抹茶の風味が豊かなホワイトチョコチップ入りクッキー。',
                'created_at' => now()->subDays(rand(0, 365)),
            ],
            [
                'category_id' => 5,
                'owner_id' => 1,
                'is_variable' => true,
                'item_name' => 'アーモンドクロワッサン',
                'price' => rand(100, 500),
                'content' => 'アーモンドスライスがたっぷりトッピングされたクロワッサン。',
                'created_at' => now()->subDays(rand(0, 365)),
            ],
            [
                'category_id' => 6,
                'owner_id' => 1,
                'is_variable' => true,
                'item_name' => 'こしあんパン',
                'price' => rand(100, 500),
                'content' => '滑らかなこしあんが詰まった、しっとりとしたあんパン。',
                'created_at' => now()->subDays(rand(0, 365)),
            ],
            [
                'category_id' => 1,
                'owner_id' => 1,
                'is_variable' => true,
                'item_name' => '全粒粉の健康食パン',
                'price' => rand(100, 500),
                'content' => '全粒粉を使用し、栄養価が高いヘルシーな食パン。',
                'created_at' => now()->subDays(rand(0, 365)),
            ],
            [
                'category_id' => 6,
                'owner_id' => 1,
                'is_variable' => true,
                'item_name' => 'こしあんパン',
                'price' => rand(100, 500),
                'content' => '滑らかなこしあんが詰まった、しっとりとしたあんパン。',
                'created_at' => now()->subDays(rand(0, 365)),
            ],
            [
                'category_id' => 1,
                'owner_id' => 1,
                'is_variable' => true,
                'item_name' => 'もっちりミルク食パン',
                'price' => rand(100, 500),
                'content' => 'ミルクの風味が豊かで、もっちりとした食感の食パン。',
                'created_at' => now()->subDays(rand(0, 365)),
            ],
            [
                'category_id' => 3,
                'owner_id' => 1,
                'is_variable' => true,
                'item_name' => 'バター香るサクサククッキー',
                'price' => rand(100, 500),
                'content' => 'バターの香りが楽しめる、サクサク食感のクッキー。',
                'created_at' => now()->subDays(rand(0, 365)),
            ],
            [
                'category_id' => 2,
                'owner_id' => 1,
                'is_variable' => true,
                'item_name' => 'ココアメロンパン',
                'price' => rand(100, 500),
                'content' => 'ココア味のメロンパン。サクサクの生地が特徴。',
                'created_at' => now()->subDays(rand(0, 365)),
            ],
            [
                'category_id' => 4,
                'owner_id' => 1,
                'is_variable' => true,
                'item_name' => 'チーズカレーパン',
                'price' => rand(100, 500),
                'content' => '濃厚なチーズがとろけるカレーパン。',
                'created_at' => now()->subDays(rand(0, 365)),
            ],
            [
                'category_id' => 6,
                'owner_id' => 1,
                'is_variable' => true,
                'item_name' => 'クリームあんパン',
                'price' => rand(100, 500),
                'content' => 'クリームとあんこが絶妙にマッチしたあんパン。',
                'created_at' => now()->subDays(rand(0, 365)),
            ],
            [
                'category_id' => 5,
                'owner_id' => 1,
                'is_variable' => true,
                'item_name' => 'チョコクロワッサン',
                'price' => rand(100, 500),
                'content' => 'チョコレートがたっぷり入ったサクサクのクロワッサン。',
                'created_at' => now()->subDays(rand(0, 365)),
            ],
            [
                'category_id' => 3,
                'owner_id' => 1,
                'is_variable' => true,
                'item_name' => 'アーモンドクッキー',
                'price' => rand(100, 500),
                'content' => 'アーモンドがたっぷり入ったサクサクのクッキー。',
                'created_at' => now()->subDays(rand(0, 365)),
            ],
            [
                'category_id' => 2,
                'owner_id' => 1,
                'is_variable' => true,
                'item_name' => '苺メロンパン',
                'price' => rand(100, 500),
                'content' => '苺の風味が楽しめる甘いメロンパン。',
                'created_at' => now()->subDays(rand(0, 365)),
            ],
        ]);
    }
}
