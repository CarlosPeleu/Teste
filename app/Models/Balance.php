<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    public $timestamps = false;

    public function deposit(float $value) : Array{
        $this->amout += number_format($value,2, '.','');
        $deposit = $this->save();

        if ($deposit)
            return[
                'success' => true,
                'message' => 'Deposito Realizado com sucesso!'
            ];
        return[
                'success' => false,
                'message' => 'Deposito não foi realizado!'
              ];
    }
}
