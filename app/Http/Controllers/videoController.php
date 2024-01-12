<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class videoController extends Controller
{
    public function add(Request $request)
    {
        $video = Video::add($request->input('vpath'), $request->input('title'), $request->input('order'));
        return response()->json($video, 201);
    }

    public function update(Request $request, $id)
    {
        $video = Video::updateVideo($id, $request->input('vpath'), $request->input('title'), $request->input('order'));
        return response()->json($video, 200);
    }

    public function delete($id)
    {
        $video = Video::deleteVideo($id);
        return response()->json(null, 204);
    }

    public function getById($id)
    {
        $video = Video::getById($id);
        return response()->json($video, 200);
    }

    public function getAll()
    {
        $videos = Video::getAll();
        return response()->json($videos, 200);
    }
}
