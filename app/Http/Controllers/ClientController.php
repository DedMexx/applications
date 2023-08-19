<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Http\Requests\CommentRequest;
use App\Models\Client;
use App\Models\Comment;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $isEvenManagerId = auth()->user()->id % 2 === 0;
        if ($isEvenManagerId) {
            $clients = Client::whereRaw('id % 2 = 1')
                ->orderByDesc('created_at')
                ->get();
        } else {
            $clients = Client::whereRaw('id % 2 = 0')
                ->orderByDesc('created_at')
                ->get();
        }
        return view('client.index', compact('clients'))->with('title', 'Кабинет менеджера');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client.create')->with('title', 'Оставить заявку');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientRequest $request)
    {
        Client::storeOrUpdate($request);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        $isEvenManagerId = auth()->user()->id % 2 === 0;
        if (auth()->user()->id % 2 != $client->id % 2) {
            $comments = $client->commets()
                ->select('comment', 'created_at')
                ->orderBy('created_at')
                ->get();
            return view('client.edit', compact('comments', 'client'));
        }
        abort(403);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommentRequest $request, Client $client)
    {
        if ($request->isMethod('put')) {
            $isEvenManagerId = auth()->user()->id % 2 === 0;
            if (auth()->user()->id % 2 != $client->id % 2) {
                Comment::store($request, $client->id);
                return back();
            }
        } else {
            return redirect()->route('client.index');
        }
        abort(403);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
