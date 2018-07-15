<?php

namespace App\Http\Controllers;
use App\Company;
use App\Address;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function company()
    {
        return view('FormCompany');
    }

        public function address()
    {
        return view('FormAddress');
    }


    public function registerCompany(Request $request)
    {   
        $this->validate( $request, [
            'social-name'   =>  'required|string|min:1',
            'fantasy-name'  =>  'required|string|min:1',
            'cnpj'          =>  'required|string|max:14',
           
        ]);
            
            $user   = $request->user();
            $fields = $request->all();
            

            $companies                = new Company();
            $companies->user_id       = $user->id;
            $companies->social_name   = $fields['social-name'];
            $companies->fantasy_name  = $fields['fantasy-name'];
            $companies->cnpj          = $fields['cnpj'];

            $companies->save();

            return redirect()->route('address');
    }

    public function registerAddress(Request $request)
    {
        $this->validate($request, [
            'zip-code'     =>   'required|string|max:9',
            'address'      =>   'required|string|min:1',
            'number'       =>   'required|int|min:1',
            'neighborhood' =>   'required|string|min:1',
            'city'         =>   'required|string|min:1',
            'state'        =>   'required|string|max:2',

        ]);

        $user = $request->user();
        $fields = $request->all();

        $address               = new Address();
        $address->user_id      = $user->id;
        $address->zip_code     = $fields['zip-code'];
        $address->address      = $fields['address'];
        $address->number       = $fields['number'];
        $address->complement   = $fields['complement'];
        $address->neighborhood = $fields['neighborhood'];
        $address->city         = $fields['city'];
        $address->state        = $fields['state'];

        $address->save();

        return redirect()->route('address')->with('status', 'Cadastro realizado com sucesso !');

    }   
}
