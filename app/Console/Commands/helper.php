<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Gramatik;
use App\Models\Vocab;
use App\Models\Redemittel;


class helper extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:helper';

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
        // // add - di kapital
        // $gramatiks = Gramatik::get();
        // $redemittels = Redemittel::get();
        // $vocabs = Vocab::get();
        // foreach ($gramatiks as $gramatik) {
        //     $gramatik->update([
        //         'kapital' => str_replace('-.', '.', $gramatik->kapital)
        //     ]);
        // }
        // foreach ($redemittels as $redemittel) {
        //     $redemittel->update([
        //         'kapital' =>  str_replace('-.', '.', $redemittel->kapital)
        //     ]);
        // }
        // foreach ($vocabs as $vocab) {
        //     $vocab->update([
        //         'kapital' =>  str_replace('-.', '.', $vocab->kapital)
        //     ]);
        // }



        //ordering
        // $gramatiks = Gramatik::get();
        // $order = [];
        // foreach ($gramatiks as $gramatik) {
        //     $kapital = rtrim($gramatik->kapital, '.');
        //     $parts = explode('-', $kapital);
        //     $lastPart = end($parts);
        //     $startValue = reset($parts);
        //     // dd($startValue, $lastPart);

        //     if (!in_array($startValue, $order)) {
        //         $order[$startValue] = [];
        //     }

        //     if (!in_array($lastPart, $order[$startValue])) {
        //         $order[$startValue][$lastPart] = 1;
        //     } else {
        //         $order[$startValue][$lastPart]++;
        //     }

        //     switch ($startValue) {
        //         case 'A1':
        //             $add1 = 1000;
        //             break;
        //         case 'A2':
        //             $add1 = 2000;
        //             break;
        //         case 'B1':
        //             $add1 = 3000;
        //             break;
        //         case 'B2':
        //             $add1 = 4000;
        //             break;
        //         case 'C1':
        //             $add1 = 5000;
        //             break;
        //         case 'C2':
        //             $add1 = 6000;
        //             break;
        //         default:
        //             $add1 = 0;
        //             break;
        //     }
        //     if ($add1 != 0) {
        //         $add1 = $add1 + ((int)$lastPart * 10);
        //     }

        //     $order[] = $kapital;
        //     $gramatik->update([
        //         'order' =>  $add1 + $order[$startValue][$lastPart]
        //     ]);
        // }
        // $gramatiks = Gramatik::orderBy('order')->get();

        // $c = 0;
        // foreach ($gramatiks as $gramatik) {
        //     $c++;
        //     $gramatik->update([
        //         'order' =>  $c
        //     ]);
        // }


         // add - di kapital
        $vocabs = Vocab::where('word_type','Adj')->get();
      
        foreach ($vocabs as $vocab) {
            $vocab->update([
                'word_type' =>  'Adjektiv'
            ]);
        }
        $vocabs = Vocab::where('word_type','Null')->get();
      
        foreach ($vocabs as $vocab) {
            $vocab->update([
                'word_type' =>  null
            ]);
        }
    }
}
