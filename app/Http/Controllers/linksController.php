<?php
namespace App\Http\Controllers;
use App\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    //ajouter 
    public function add(Request $request)
    {
        $link = Link::create($request->all());
        return response()->json($link, 201);
    }
// modifier 
    public function update(Request $request, $id)
    {
        $link = Link::findOrFail($id);
        $link->update($request->all());
        return response()->json($link, 200);
    }
//supprimer
    public function delete($id)
    {
        Link::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
//recherch par id
    public function getById($id)
    {
        $link = Link::findOrFail($id);
        return response()->json($link, 200);
    }
//rechercher all
    public function getAll()
    {
        $links = Link::all();
        return response()->json($links, 200);
    }
//rechercher par nom
    public function getByName(Request $request)
    {
        $name = $request->input('name');
        $links = Link::where('name', 'like', "%$name%")->get();
        return response()->json($links, 200);
    }
}

