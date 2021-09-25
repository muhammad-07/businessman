<?php

namespace Database\Seeders;

use App\Models\BankAccount;
use Illuminate\Database\Seeder;

class BankAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bank_codes =
            "ICAB
        HDCB
        KMZP
        SBIT
        IDFC";

        $bank_names =
            "ICICI BANK LTD
        HDFC BANK LTD
        KOTAK MAHINDRA
        STATE BANK OF INDIA
        IDFC FIRST";

        $account_numbers =
            "325682568
        3658998565
        986552365
        357899853
        300659876";

        $opening_balances =
            "325685
        9856855
        332212
        124875
        13386654";

        $bank_codes = preg_split('/\r\n|\r|\n/', $bank_codes);
        $bank_names = preg_split('/\r\n|\r|\n/', $bank_names);
        $account_numbers = preg_split('/\r\n|\r|\n/', $account_numbers);
        $opening_balances = preg_split('/\r\n|\r|\n/', $opening_balances);

        foreach ($bank_codes as $bank_codes_key => $bank_code) {
            BankAccount::create([
                'code' => trim($bank_code),
                'name' => trim($bank_names[$bank_codes_key]),
                'ac_no' => trim($account_numbers[$bank_codes_key]),
                'opening_balance' => trim((float)$opening_balances[$bank_codes_key])
            ]);
        }
    }
}
