<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientsFormRequest;
use App\Model\Client;
use App\Newsletter;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClientsNewsletterFormRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Auth;

class BardClientsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::orderBy('updated_at', 'desc')->get();
        return view('bard_clients/index')->with('clients', 'active')->with('clients', $clients);
    }
    public function admin_clients()
    {
        $clients = Client::orderBy('updated_at', 'desc')->get();
        return view('bard_clients/admin_clients')->with('clients', 'active')->with('clients', $clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        if($user->is('admin')){
            return view('bard_clients/create');
        }
        return 'You can not access this page';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientsFormRequest $request)
    {
        $client = new Client(array(
            'client_name' => $request->get('client_name'),
            'client_email' => $request->get('client_email'),
            'client_phone_number' => $request->get('client_phone_number'),
            'client_address' => $request->get('client_address')
        ));
        $client->save();
        return redirect('/clients/create')->with('status', 'Clients '. $request->get('client_name').' Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::whereId($id)->firstOrFail();
        return view('bard_clients/client')->withClient($client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::whereId($id)->firstOrFail();
        return view('bard_clients/edit')->with('client', $client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientsFormRequest $request, $id)
    {
        $client = Client::whereId($id)->firstOrFail();
        $client->client_name = $request->get('client_name');
        $client->client_email = $request->get('client_email');
        $client->client_phone_number = $request->get('client_phone_number');
        $client->client_address = $request->get('client_address');
        $client->save();
        return redirect('clients');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Client::whereId($id)->delete();
        return redirect('/clients');
    }
}
