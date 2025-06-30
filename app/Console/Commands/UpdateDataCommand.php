<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User; // Sesuaikan dengan model Anda

class UpdateDataCommand extends Command
{
    protected $signature = 'data:update {id} {field} {value}';
    protected $description = 'Update specific data in database';

    public function handle()
    {
        $id = $this->argument('id');
        $field = $this->argument('field');
        $value = $this->argument('value');

        $user = User::find($id);
        
        if (!$user) {
            $this->error('Data not found!');
            return;
        }

        $user->$field = $value;
        $user->save();

        $this->info("Data with ID {$id} has been updated successfully!");
    }
}
