<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\MoneyValidation;
use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\User;

class BalanceController extends Controller{

    public function index(){
        $balance = auth()->user()->balance;
        $amount = $balance ? $balance->amout : 0;
        return view('admin.balance.index', compact('amount'));
    }

    public function deposit(){
        return view('admin.balance.deposit');
    }

    public function depositStore(MoneyValidation $request){
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $arResult = $balance->deposit($request->vl_recarga);

        if ($arResult['success'])
            return redirect()->route('admin.balance')->with('success',$arResult['message']);

        return redirect()->back()->with('error',$arResult['message']);
    }

    public function withdrawn(){
        return view('admin.balance.withdrawn');
    }

    public function withdrawnStore(MoneyValidation $request){
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $arResult = $balance->withdrawn($request->vl_recarga);

        if ($arResult['success'])
            return redirect()->route('admin.balance')->with('success',$arResult['message']);

        return redirect()->back()->with('error',$arResult['message']);

    }

    public function transfer(){
        return view('admin.balance.transfer');
    }
    public function transferStore(Request $request, User $user){
        if (!$sender = $user->getSender($request->sender))
            return redirect()
                        ->back()
                        ->with('error', 'Usuário informado não foi encontrado!');

        if (!$sender == auth()->user()->id)
            return redirect()
                        ->back()
                        ->with('error', 'Usuário não transferir para você mesmo!');

        return view('admin.balance.transfer-confirm', compact('sender'));
    }

    public function transferConfirm(){
        dd('teste');
        return view('admin.balance.transfer-confirm');

    }
}
