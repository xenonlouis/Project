<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clients;

class ClientsController extends Controller
{
    public function index()
    {
        return view('index');
    }



    public function save()
    {
        $client = new Clients();
        $client->Nom = request('nom');
        $client->Prénom = request('prenom');
        $client->Adresse = request('adresse');
        $client->Ville = request('ville');
        $client->Email = request('email');
        $client->Tel_fix = request('tel_fix');
        $client->Tel_Portable = request('tel_portable');
        $client->Position = request('position');
        $client->Fax = request('fax');
        $client->Tel_Portable2 = request('tel_portable2');
        $client->Tel_Fix2 = request('tel_fix2');
        $client->Intitulé = request('intitule');
        $client->Commentaire = request('commentaire');
        $client->save();
        return redirect('/admin')->with('msg', 'Client ajouté ! ');
    }


    public function show()
    {
        return view('/list_clients');
    }

    public function employe()
    {
        return view('/list_employe');
    }




    public function search(Request $request)
    {
        $query = $request->input('query');
        $radio = $request->input('searchOption');
        $request_type = $request->input('searchType');

        $queryBuilder = Clients::query();

        if ($radio !== "all") {
            if ($request_type === "partial") {
                $queryBuilder->where($radio, 'LIKE', '%' . $query . '%');
            } else { //$queryBuilder->where($radio, '=', $query);
                $queryBuilder->where($radio, 'Like', $query . '%');
            }


            $clients = $queryBuilder->get();

            $clients = $clients->map(function ($client) {
                foreach ($client->getAttributes() as $key => $value) {
                    if ($value === null) {
                        $client->$key = 'vide';
                    }
                }
                return $client;
            });
            return response()->json($clients);
        } else {

            $clients = Clients::where('Nom', 'LIKE', '%' . $query . '%')
                ->orWhere('Prénom', 'LIKE', '%' . $query . '%')
                ->orWhere('Adresse', 'LIKE', '%' . $query . '%')
                ->orWhere('Ville', 'LIKE', '%' . $query . '%')
                ->orWhere('Tel_fix', 'LIKE', '%' . $query . '%')
                ->orWhere('Tel_Portable', 'LIKE', '%' . $query . '%')
                ->orWhere('Email', 'LIKE', '%' . $query . '%')
                ->orWhere('Position', 'LIKE', '%' . $query . '%')
                ->get();
            $clients = $clients->map(function ($client) {
                foreach ($client->getAttributes() as $key => $value) {
                    if ($value === null) {
                        $client->$key = 'vide';
                    }
                }
                return $client;
            });
            return response()->json($clients);
        }
    }

    public function delete(Request $request)
    {
        $clientId = $request->input('id');

        // Find the client by ID and delete it
        $client = Clients::find($clientId);
        if ($client) {
            $client->delete();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Client not found']);
    }

    public function edit($id)
    {
        // Find the client by ID 
        $client = Clients::where('id', $id)->first();

        if ($client) {
            // Client found, return JSON response
            return response()->json($client);
        } else {
            // Client not found, return error response
            return response()->json(['error' => 'Client not found'], 404);
        }
    }













    public function update()

    {   //storing the new updated data and then saving again (not using update() as i had probs with it hehe)
        $id = request('clientId');
        $client = Clients::where('id', $id)->first();
        $client->Nom = request('editNom');
        $client->Prénom = request('editPrenom');
        $client->Adresse = request('editAdresse');
        $client->Ville = request('editVille');
        $client->Email = request('editEmail');
        $client->Tel_fix = request('editTelFixe');
        $client->Tel_Portable = request('editTelPortable');
        $client->Position = request('editPosition');
        $client->Fax = request('editFax');
        $client->Tel_Portable2 = request('editTelPortable2');
        $client->Tel_Fix2 = request('editTelFixe2');
        $client->Intitulé = request('editIntitule');
        $client->Commentaire = request('editCommentaire');
        $client->save();
        return redirect('/admin')->with('msg', 'Client mis a jour ! ');
    }
}
