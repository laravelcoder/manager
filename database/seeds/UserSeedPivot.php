<?php

declare(strict_types=1);

/*
 * updated code from styleci
 */

use Illuminate\Database\Seeder;

class UserSeedPivot extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $items = [

            1 => [
                'role' => [1],
            ],
            2 => [
                'role' => [1],
            ],
            3 => [
                'role' => [1],
            ],
            4 => [
                'role' => [1],
            ],
            5 => [
                'role' => [1],
            ],

        ];

        foreach ($items as $id => $item) {
            $user = \App\User::find($id);

            foreach ($item as $key => $ids) {
                $user->{$key}()->sync($ids);
            }
        }
    }
}
