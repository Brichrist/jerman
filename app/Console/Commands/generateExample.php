<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\GenerateVocabExample;
use App\Models\Vocab;



class generateExample extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-example';

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
        $vocabs = Vocab::whereNull('example')->get();

        $chunks = $vocabs->chunk(20);

        foreach ($chunks as $chunk) {
            $value = $chunk->pluck('german_word', 'id')->toArray();
            $value = json_encode($value);
            GenerateVocabExample::dispatch($value)->delay(now()->addMinutes(1));
        }
    }
}
