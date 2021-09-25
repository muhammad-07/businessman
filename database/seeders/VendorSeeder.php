<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
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

        $first_bank =
            "ICAB
            HDCB
            KMZP
            ICAB
            KMZP
            KMZP
            HDCB
            HDCB
            IDFC
            SBIT
            HDCB
            SBIT
            HDCB
            SBIT
            HDCB
            IDFC
            SBIT
            IDFC
            HDCB
            ICAB";

        $second_bank =
            "HDCB
            KMZP
            SBIT
            HDCB
            SBIT
            SBIT
            KMZP
            IDFC
            SBIT
            ICAB
            IDFC
            ICAB
            IDFC
            ICAB
            IDFC
            SBIT
            HDCB
            SBIT
            IDFC
            HDCB";

        $third_bank =
            "KMZP
            SBIT
            IDFC
            SBIT
            ICAB
            IDFC
            SBIT
            SBIT
            ICAB
            KMZP
            ICAB
            KMZP
            SBIT
            KMZP
            KMZP
            HDCB
            KMZP
            ICAB
            SBIT
            IDFC";

        $codes = preg_split('/\r\n|\r|\n/', $codes);
        $names = preg_split('/\r\n|\r|\n/', $names);
        $first_bank = preg_split('/\r\n|\r|\n/', $first_bank);
        $second_bank = preg_split('/\r\n|\r|\n/', $second_bank);
        $third_bank = preg_split('/\r\n|\r|\n/', $third_bank);
        

        foreach ($codes as $codes_key => $code) {
            Vendor::create([
                'code' => trim($code),
                'name' => trim($names[$codes_key]),
                'first_bank' => trim($first_bank[$codes_key]),
                'second_bank' => trim($second_bank[$codes_key]),
                'third_bank' => trim($third_bank[$codes_key])                
            ]);
        }
    }
}
