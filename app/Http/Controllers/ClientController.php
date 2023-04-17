<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $clients = Client::all();
        $array = [];
        foreach ($clients as $client){
            $array[] = [
                'id' => $client->id,
                'name' =>$client->name,
                'email' =>$client->email,
                'phone' =>$client->phone,
                'address' =>$client->address,
                'services' =>$client->services
            ];
        }
        return response()->json($clients);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $client = new Client;
        $client->name = $request->name;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->address = $request->address;
        $client->save();
        $data = [
            'message' =>'Client created successfully',
            'client' => $client
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
        $data = [
            'message' => 'Client details',
            'client' => $client,
            'services' => $client->services
        ];
        return response()->json($client);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
        $client->name = $request->name;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->address = $request->address;
        $client->save();
        $data = [
            'message' =>'Client created successfully',
            'client' => $client
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
        $client->delete();
        $data = [
            'message' => 'Client deleted successfully',
            'client' =>$client
        ];
        return response()->json($data);
    }

    public function attach(Request $request){

        $client = Client::find($request->client_id);
        $client->services()->attach($request->service_id);
        $data = [
            'message' => 'Service attached successfelly',
            'client' => $client
        ];
        return response()->json($data);
    }
    
    public function detach(Request $request){
        $client = Client::find($request->client_id);
        $client->services()->detach($request->service_id);
        $data = [
            'message' => 'Service attached successfelly',
            'client' => $client
        ];
        return response()->json($data);
    }

/*
Este es un método en un controlador de Laravel que se llama attach() y está diseñado para adjuntar un servicio a un cliente específico. La idea general de este método es encontrar el cliente por su ID, adjuntar un servicio al cliente usando el método attach() de la relación de servicios del modelo Client, y devolver una respuesta JSON con un mensaje de éxito y el cliente actualizado.

Aquí hay una explicación línea por línea de lo que hace este método:

$client = Client::find($request->client_id); encuentra un objeto de modelo Client en la base de datos por su ID proporcionado en la solicitud HTTP y lo asigna a la variable $client.
$client->services()->attach($request->service_id); utiliza el método attach() de la relación de servicios del modelo Client para adjuntar un servicio al cliente. El ID del servicio se obtiene de la solicitud HTTP con el nombre de campo service_id.
$data = [...] crea un arreglo asociativo $data que contiene un mensaje de éxito y el cliente actualizado. Este arreglo se utilizará para enviar una respuesta JSON.
return response()->json($data); devuelve una respuesta JSON con el arreglo $data como cuerpo de la respuesta.
En resumen, este método encuentra un cliente por su ID, adjunta un servicio al cliente y devuelve una respuesta JSON con un mensaje de éxito y el cliente actualizado.
*/

}