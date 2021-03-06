<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Beneficiary;
use App\Models\Payment;
use App\Models\Rate;
use Exception;
use Auth;

class RateController extends Controller
{
    // Funcionalidades CRUD Tasa del día Administrador

    public function update_rate(Request $request)
    {
    	try {
            if (Auth::user()->role == "Administrador") {
                Rate::where('id', 1)->update(['rate' => $request->rate]);
                Rate::where('id', 1)->update(['tax' => $request->tax]);
                Session::flash('message', 'Tasa del día y gastos por gestión actualizados exitosamente!');
                return redirect('tasa-del-dia');
            } else {
                return redirect('index');
            }
        } catch (Exception $ex) {
            Session::flash('error', 'Failed to create the new user. Check the data entered, your internet connection and try again. If the error persists contact support using the error code: #200');
            return view('welcome');
        }
    }
}
