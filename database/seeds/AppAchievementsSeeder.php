<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppAchievementsSeeder extends Seeder
{
    public function run()
    {
        $this->truncateTables();
        $this->createAchievements(
            json_decode(file_get_contents(storage_path('/achievements.json')), true)['achievements']
        );
    }

    protected function truncateTables()
    {
        $tables = [
            'achievement_criteriables', 'achievement_criterias',
            'achievementables', 'achievements',
        ];

        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }
    }

    protected function createAchievements(array $achievements)
    {
        $now = Carbon::now();

        foreach ($achievements as $achievement) {
            $this->createAchievement($achievement, $now);
        }
    }

    protected function createAchievement(array $data, Carbon $now)
    {
        DB::table('achievements')->insert(
            array_merge(
                array_except($data, ['criterias']),
                ['created_at' => $now, 'updated_at' => $now]
            )
        );

        foreach ($data['criterias'] as $criteria) {
            DB::table('achievement_criterias')->insert(
                array_merge($criteria, [
                    'achievement_id' => $data['id'],
                    'requirements' => isset($criteria['requirements']) ? json_encode($criteria['requirements']) : '',
                ])
            );
        }
    }
}
