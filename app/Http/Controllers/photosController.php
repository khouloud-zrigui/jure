<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class photosController extends Controller
{
    public function add(Request $request)
    {
        $photo = Photo::add(
            $request->input('vpath'),
            $request->input('alt'),
            $request->input('title'),
            $request->input('order')
        );

        return response()->json($photo, 201);
    }

    public function update(Request $request, $id)
    {
        $photo = Photo::updatePhoto(
            $id,
            $request->input('vpath'),
            $request->input('alt'),
            $request->input('title'),
            $request->input('order')
        );

        return response()->json($photo, 200);
    }

    public function delete($id)
    {
        $photo = Photo::deletePhoto($id);
        return response()->json(null, 204);
    }

    public function getById($id)
    {
        $photo = Photo::getById($id);
        return response()->json($photo, 200);
    }

    public function getAll()
    {
        $photos = Photo::getAll();
        return response()->json($photos, 200);
    }

    public function updateOrder(Request $request, $id)
    {
        $photo = Photo::updateOrder($id, $request->input('order'));
        return response()->json($photo, 200);
    }
}
