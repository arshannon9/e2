<?php

namespace App\Commands;

use Faker\Factory;

class AppCommand extends Command
{
    public function fresh() 
    {
        $this->migrate();
        $this->seed();
    }
    
    public function migrate() 
    {
        $this->app->db()->createTable('rounds', [
            'player_choice' => 'varchar(8)',
            'opp_choice' => 'varchar(8)',
            'won' => 'tinyint(1)', # boolean
            'outcome' => 'varchar(30)',
            'timestamp' => 'timestamp',
        ]);

        dump('Migrations complete');
    }

    public function seed() 
    {
         # Instantiate a new instance of the Faker\Factory class
        $faker = Factory::create();

        for($i = 10; $i > 0; $i--) {

            $this->app->db()->insert('rounds', [
                'player_choice' => ['rock', 'paper', 'scissors', 'lizard', 'spock'][rand(0, 4)],
                'opp_choice' => ['rock', 'paper', 'scissors', 'lizard', 'spock'][rand(0, 4)],
                'won' => rand(0, 2),
                'outcome' => $faker->text(30),
                'timestamp' => $faker->dateTimeBetween('-'.$i.' days', '-'.$i.' days')->format('Y-m-d H:i:s'), # DateTime
            ]);
        }

        dump('Seeding complete');
    }
}
