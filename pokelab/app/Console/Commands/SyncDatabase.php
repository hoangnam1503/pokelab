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

//            /**
//             * pokemon
//             */
//            $file = fopen(public_path() . '/files/pokemon.csv', 'r');
//
//            while (($data = fgetcsv($file)) !== false) {
//                $pokemon = new \Pokemon;
//                $pokemon->id = $data[0];
//                $pokemon->name = $data[1];
//                $pokemon->height = $data[3];
//                $pokemon->weight = $data[4];
//                $pokemon->base_experience = $data[5];
//                $pokemon->is_default = $data[7];
//                $pokemon->save();
//            }
//
//            fclose($file);
//
//            /**
//             * regions
//             */
//            $file = fopen(public_path() . '/files/regions.csv', 'r');
//
//            while (($data = fgetcsv($file)) !== false) {
//                $region = new \Region;
//                $region->id = $data[0];
//                $region->name = $data[1];
//                $region->save();
//            }
//
//            fclose($file);
//
//            /**
//             * generations
//             */
//            $file = fopen(public_path() . '/files/generations.csv', 'r');
//
//            while (($data = fgetcsv($file)) !== false) {
//                $generation = new \Generation;
//                $generation->id = $data[0];
//                $generation->main_region_id = $data[1];
//                $generation->name = $data[2];
//                $generation->save();
//            }
//
//            fclose($file);
//
//            /**
//             * damage classes
//             */
//            $file = fopen(public_path() . '/files/damage_classes.csv', 'r');
//
//            while (($data = fgetcsv($file)) !== false) {
//                $damage_class = new \DamageClass;
//                $damage_class->id = $data[0];
//                $damage_class->name = $data[1];
//                $damage_class->save();
//            }
//
//            fclose($file);
//
//            /**
//             * version groups
//             */
//            $file = fopen(public_path() . '/files/version_groups.csv', 'r');
//
//            while (($data = fgetcsv($file)) !== false) {
//                $version_group = new \VersionGroup;
//                $version_group->id = $data[0];
//                $version_group->generation_id = $data[2];
//                $version_group->name = $data[1];
//                $version_group->order = $data[3];
//                $version_group->save();
//            }
//
//            fclose($file);
//
//            /**
//             * version
//             */
//            $file = fopen(public_path() . '/files/versions.csv', 'r');
//
//            while (($data = fgetcsv($file)) !== false) {
//                $version = new \Version;
//                $version->id = $data[0];
//                $version->version_group_id = $data[1];
//                $version->name = $data[2];
//                $version->save();
//            }
//
//            fclose($file);
//
//            /**
//             * types
//             */
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
//
//            /**
//             * moves
//             */
//            $file = fopen(public_path() . '/files/moves.csv', 'r');
//
//            while (($data = fgetcsv($file)) !== false) {
//                $move = new \Move;
//                $move->id = $data[0];
//                $move->type_id = $data[3];
//                $move->generation_id = $data[2];
//                $move->damage_class_id = $data[9];
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
            /**
             * pokemon move methods
             */
            $file = fopen(public_path() . '/files/pokemon_move_methods.csv', 'r');

            while (($data = fgetcsv($file)) !== false) {
                $pokemon_move_method = new \PokemonMoveMethod;
                $pokemon_move_method->id = $data[0];
                $pokemon_move_method->name = $data[1];
                $pokemon_move_method->save();
            }

            fclose($file);
//
//            /**
//             * abilities
//             */
//            $file = fopen(public_path() . '/files/abilities.csv', 'r');
//
//            while (($data = fgetcsv($file)) !== false) {
//                $ability = new \Ability;
//                $ability->id = $data[0];
//                $ability->name = $data[1];
//                $ability->generation_id = $data[2];
//                $ability->is_default = $data[3];
//                $ability->save();
//            }
//
//            fclose($file);
//
//            /**
//             * pokemon_types
//             */
//            $file = fopen(public_path() . '/files/pokemon_types.csv', 'r');
//
//            while (($data = fgetcsv($file)) !== false) {
//                $type = new \PokemonType;
//                $type->pokemon_id = $data[0];
//                $type->type_id = $data[1];
//                $type->slot_id = $data[2];
//                $type->save();
//            }
//
//            fclose($file);
//
//            /**
//             * pokemon abilities
//             */
//            $file = fopen(public_path() . '/files/pokemon_abilities.csv', 'r');
//
//            while (($data = fgetcsv($file)) !== false) {
//                $pokemon_ability = new \PokemonAbility;
//                $pokemon_ability->pokemon_id = $data[0];
//                $pokemon_ability->ability_id = $data[1];
//                $pokemon_ability->is_hidden = $data[2];
//                $pokemon_ability->slot_id = $data[3];
//                $pokemon_ability->save();
//            }
//
//            fclose($file);
//
//            /**
//             * type efficacy
//             */
//            $file = fopen(public_path() . '/files/type_efficacy.csv', 'r');
//
//            while (($data = fgetcsv($file)) !== false) {
//                $type = new \TypeEfficacy;
//                $type->move_type_id = $data[0];
//                $type->pokemon_type_id = $data[1];
//                $type->damage_factor = round($data[2] / 100, 2);
//                $type->save();
//            }
//
//            fclose($file);

            /**
             * pokemon_moves
             */
            $file = fopen(public_path() . '/files/pokemon_moves.csv', 'r');

            while (($data = fgetcsv($file)) !== false) {
                $pokemon_move = new \PokemonMove;
                $pokemon_move->pokemon_id = $data[0];
                $pokemon_move->move_id = $data[2];
                $pokemon_move->version_group_id = $data[1];
                $pokemon_move->pokemon_move_method_id = $data[3];
                $pokemon_move->level = $data[4];
                $pokemon_move->order = $data[5];
                $pokemon_move->save();
            }

            fclose($file);

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
