<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function profile(){
        return view('sites.profile.profile');
    }

    public function profileUpdate(Request $request){
       $data = $request->all();
       $user = auth()->user();

       if ($data['password'] != null)
           $data['password'] = bcrypt($data('password'));
       else
           unset($data['password']);

       $data['image'] = $user->image;

       if ($request->hasFile('image') && $request->file('image')->isValid()){
           if ($user->image)
               $name = $$user->image;
           else
               $name = $user->id.kebab_case($user->name);

           $extenstion = $request->image->extension();
           $nameFile = "{$name}.{$extenstion}";
           $data['image'] = $nameFile;

           $upload = $request->image->storeAs('users', $nameFile);

           if (!$upload)
               return redirect()->back()
                                ->with('error','Falha no upload');
       }

       $update = $user->update($data);

       if ($update)
           return redirect()->route('profile')
                            ->with('success', 'Sucesso ao atualizar!');

       return redirect()->back()
                        ->with('error', 'falha ao atualizar!');
    }
}
