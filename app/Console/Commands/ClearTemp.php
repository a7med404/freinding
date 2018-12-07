<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class ClearTemp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear:temp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear old files in temp';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $time =Carbon::now()->timestamp;
        $minut=1*60;
        $oneago=$time-$minut;
        $files = Storage::allFiles('temp');
        foreach ( $files as $file){
            if(Storage::lastModified($file)<$oneago){
               print(Storage::delete($file));
            }
        }
    }
}
