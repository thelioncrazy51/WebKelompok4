<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DeleteDataCommand extends Command
{
    protected $signature = 'delete:data {table} {--id=}';
    protected $description = 'Hapus data dari tabel';

    public function handle()
    {
        if ($this->option('id')) {
            DB::table($this->argument('table'))
                ->where('id', $this->option('id'))
                ->delete();
            $this->info("Data dengan ID ".$this->option('id')." telah dihapus!");
        } else {
            if ($this->confirm('Yakin hapus semua data?')) {
                DB::table($this->argument('table'))->truncate();
                $this->info("Semua data di tabel ".$this->argument('table')." telah dihapus!");
            }
        }
    }
}