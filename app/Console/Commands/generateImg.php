<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\GenerateVocabImg;

class generateImg extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-img';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $path_ori = public_path('storage/img/');
        $files_ori = scandir($path_ori);
        $files_ori = array_diff($files_ori, array('.', '..'));
        foreach ($files_ori as $key => $value) {
            $path_parent = public_path('storage/img/' . $value);
            $files_parent = scandir($path_parent);
            $files_parent = array_diff($files_parent, array('.', '..'));
            foreach ($files_parent as $key => $v) {
                $url = url('/storage/img/' . $value . '/' . $v);
                GenerateVocabImg::dispatch($url)->delay(now()->addMinutes(1));
            }
        }
    }
}
