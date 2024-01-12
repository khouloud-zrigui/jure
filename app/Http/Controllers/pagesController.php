<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagesController extends Controller
{
    
    // Méthode pour ajouter une nouvelle page
    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $page = Page::add($request->input('name'));

        return response()->json($page, 201);
    }

    // Méthode pour mettre à jour une page par son ID
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $page = Page::updatePage($id, $request->input('name'));

        return response()->json($page, 200);
    }

    // Méthode pour supprimer une page par son ID
    public function delete($id)
    {
        $page = Page::deletePage($id);

        return response()->json(null, 204);
    }

    // Méthode pour récupérer une page par son ID
    public function getById($id)
    {
        $page = Page::getById($id);

        return response()->json($page, 200);
    }

    // Méthode pour récupérer toutes les pages
    public function getAll()
    {
        $pages = Page::getAll();

        return response()->json($pages, 200);
    }
}
