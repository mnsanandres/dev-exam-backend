<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Response;
use App\Http\Resources\Response as ResponseResource;
use App\Http\Resources\ResponseCollection;

class ResponseController extends Controller
{
    public function index()
    {
        return new ResponseCollection(Response::all());
    }

    public function show($id)
    {
        return new ResponseResource(Player::findOrFail($id));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date_time' => 'required|date_format:Y-m-d H:i:s',
            'content' => 'required',
        ]);

        $response = Response::create($request->all());

        return (new ResponseResource($response))
                ->response()
                ->setStatusCode(201);
    }

    public function delete($id)
    {
        $response = Response::findOrFail($id);
        $response->delete();

        return response()->json(null, 204);
    }
}
