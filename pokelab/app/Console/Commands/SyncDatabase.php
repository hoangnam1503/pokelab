<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class SyncDatabase extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'batch:sync_data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync Pokemon Database from CSV data files';

    /**
     * Create a new command instance.
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire() {
        try {
            $start_time = microtime(true);

            $file = fopen(public_path() . '/files/pokemon_moves.csv', 'r');

            while (($data = fgetcsv($file)) !== false) {
                $pokemon_move = new \PokemonMove;
                $pokemon_move->pokemon_id = $data[0];
                $pokemon_move->move_id = $data[2];
                $pokemon_move->level = $data[4];
                $pokemon_move->save();
            }

            fclose($file);

//            $file = fopen(public_path() . '/files/pokemon.csv', 'r');
//
//            while (($data = fgetcsv($file)) !== false) {
//                $pokemon = new \Pokemon;
//                $pokemon->id = $data[0];
//                $pokemon->name = $data[1];
//                $pokemon->height = $data[2];
//                $pokemon->weight = $data[3];
//                $pokemon->base_experience = $data[4];
//                $pokemon->save();
//            }
//
//            fclose($file);
//
//            $file = fopen(public_path() . '/files/abilities.csv', 'r');
//
//            while (($data = fgetcsv($file)) !== false) {
//                $ability = new \Ability;
//                $ability->id = $data[0];
//                $ability->name = $data[1];
//                $ability->save();
//            }
//
//            fclose($file);
//
//            $file = fopen(public_path() . '/files/moves.csv', 'r');
//
//            while (($data = fgetcsv($file)) !== false) {
//                $move = new \Move;
//                $move->id = $data[0];
//                $move->type_id = $data[3];
//                $move->name = $data[1];
//                $move->power = $data[4];
//                $move->pp = $data[5];
//                $move->accuracy = $data[6];
//                $move->priority = $data[7];
//                $move->save();
//            }
//
//            fclose($file);
//
//            $file = fopen(public_path() . '/files/types.csv', 'r');
//
//            while (($data = fgetcsv($file)) !== false) {
//                $type = new \Type;
//                $type->id = $data[0];
//                $type->name = $data[1];
//                $type->save();
//            }
//
//            fclose($file);

            $elapsed_time = microtime(true) - $start_time;
            $this->info('Database sync finish in ' . $elapsed_time . 's');
        } catch (Exception $e) {
            $this->error('Unhandled exception');
            $this->error($e);
        }
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments() {
        return [];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions() {
        return [];
    }

}
