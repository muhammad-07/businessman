<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $codes =
            "HMCL
            HCL
            MSL
            SAL
            MAL
            HEPL
            MAIL
            RIL
            HIAL
            HHFL
            HFSL
            MCPL
            MSCD
            SACL
            EBL
            HDSLL
            MES
            HGDL
            HML
            HMSL";

        $names =
            "Hero MotoCorp Ltd.
            Hero Cycles Limited
            Munjal Showa Limited
            Sunbeam Auto Limited
            Majestic Auto Limited
            Hero Exports
            Munjal Auto Industries Limited
            Rockman Industries Limited
            Highway Industries Limited
            Hero Honda Finlease Limited
            Hero Financial Services Limited
            Munjal  Castings
            Munjal Sales Corporation
            Satyam Auto Components Limited
            Easy Bill Limited
            Hero Corporate Service Limited
            Munjal  E-Systems
            Hero Global Design Limited
            Hero Motors Limited
            Hero Management Service Limited";

        $amounts =
            "113265
            598254
            123875
            898246
            1229874
            1988541
            3126647
            1458985
            689554
            3258798
            965778
            233589
            123688
            1987754
            985442
            132658
            924556
            249875
            165442
            365336";
        
        $codes = preg_split('/\r\n|\r|\n/', $codes);
        $names = preg_split('/\r\n|\r|\n/', $names);
        $amounts = preg_split('/\r\n|\r|\n/', $amounts);       

        foreach ($codes as $codes_key => $code) {
            Payment::create([
                'code' => trim($code),
                'name' => trim($names[$codes_key]),
                'amount' => trim((float)$amounts[$codes_key]),             
            ]);
        }
    }
}
