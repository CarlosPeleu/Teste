<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\Historic;
use App\User;


class Balance extends Model
{
    public $timestamps = false;

    public function deposit(float $value) : Array{

        DB::beginTransaction();
        $varAmount = $this->amout?$this->amout : 0;
        $this->amout += number_format($value,2, '.','');
        $deposit = $this->save();

        $arHistoric = auth()->user()->historic()->create([
            'type' => 'I',
            'amout' => $value,
            'total_before'=> $varAmount,
            'total_after'=> $this->amout,
            'date' => '2018/02/02',
        ]);

        if ($deposit && $arHistoric){
            DB::commit();
            return[
                'success' => true,
                'message' => 'Saque Realizado com sucesso!'
            ];
        }else{
            DB::rollback();
            return[
                    'success' => false,
                    'message' => 'Saque não foi realizado!'
            ];
        }
    }

    public function withdrawn(float $value): Array{
        if ($this->amout < $value){
            return[
                'success' => false,
                'message' => 'Saldo insulficiente',
            ];
        }

        DB::beginTransaction();

        $varAmount = $this->amout?$this->amout : 0;
        $this->amout -= number_format($value,2, '.','');
        $withdrawn = $this->save();

        $arHistoric = auth()->user()->historic()->create([
            'type' => 'O',
            'amout' => $value,
            'total_before'=> $varAmount,
            'total_after'=> $this->amout,
            'date' => '2018/02/02',
        ]);

        if ($withdrawn && $arHistoric){
            DB::commit();
            return[
                'success' => true,
                'message' => 'Deposito Realizado com sucesso!'
            ];
        }else{
            DB::rollback();
            return[
                    'success' => false,
                    'message' => 'Deposito não foi realizado!'
            ];
        }
    }

    public function transfer(float $value, User $sender){
        if ($this->amout < $value){
            return[
                'success' => false,
                'message' => 'Saldo insulficiente',
            ];
        }

        DB::beginTransaction();

    /*
     * Atualização do saldo de quem está fazendo a transferência
     * */
        $varAmount = $this->amout?$this->amout : 0;
        $this->amout -= number_format($value,2, '.','');
        $transfer = $this->save();

        $arHistoric = auth()->user()->historic()->create([
            'type' => 'T',
            'amout' => $value,
            'total_before'=> $varAmount,
            'total_after'=> $this->amout,
            'date' => '2018/02/02',
            'user_id_transaction' => $sender->id
        ]);

    /*
     * Atualização do saldo de quem recebe
     * */
        $senderBalance = $sender->balance()->firstOrCreate([]);
        $totalAmount = $senderBalance->amout?$senderBalance->amout : 0;
        $senderBalance->amout += number_format($value,2, '.','');
        $transferSender = $senderBalance->save();

        $historicSender = $sender->historic()->create([
            'type' => 'I',
            'amout' => $value,
            'total_before'=> $totalAmount,
            'total_after'=> $senderBalance->amout,
            'date' => '2018/02/02',
            'user_id_transaction' => auth()->user()->id
        ]);



        if ($transfer && $arHistoric && $transferSender && $historicSender){
            DB::commit();
            return[
                'success' => true,
                'message' => 'transferencia realizada com sucesso!'
            ];
        }

        DB::rollback();
        return[
                'success' => false,
                'message' => 'Falha ao Retirar'
        ];


    }
}
