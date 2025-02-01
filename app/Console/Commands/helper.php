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
        $gramatiks = Gramatik::get();
        $redemittels = Redemittel::get();
        $vocabs = Vocab::get();
        foreach ($gramatiks as $gramatik) {
            $gramatik->update([
                'kapital' => $gramatik->kapital . '-'
            ]);
        }
        foreach ($redemittels as $redemittel) {
            $redemittel->update([
                'kapital' => $redemittel->kapital . '-'
            ]);
        }
        foreach ($vocabs as $vocab) {
            $vocab->update([
                'kapital' => $vocab->kapital . '-'
            ]);
        }



        //ordering
        // $gramatiks = Gramatik::get();
        // $order = [];
        // foreach ($gramatiks as $gramatik) {
        //     $kapital = $gramatik->kapital;
        //     $parts = explode('-', $kapital);
        //     $lastPart = end($parts);
        //     $startValue = reset($parts);

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
        //     }
        //     $add1 = $add1 + ((int)$lastPart * 10);

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
        //
    }
}
