<?php

namespace App\Http\Controllers;

use App\Action;
use Illuminate\Http\Request;
use App\Http\Requests\ActionRequest;
use App\Http\Resources\ActionResource;
use Symfony\Component\HttpFoundation\Response;

class ActionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ActionResource::collection(Action::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActionRequest $request)
    {
        $validated = $request->validated();
        $action = auth()->user()->actions()->create([
            'action' => $request->action,
            'customer_id' => $request->customer_id
        ]);
        return response(["Created" ,Response::HTTP_ACCEPTED]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Action  $action
     * @return \Illuminate\Http\Response
     */
    public function show(Action $action)
    {
        return new ActionResource($action);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Action  $action
     * @return \Illuminate\Http\Response
     */
    public function edit(Action $action)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Action  $action
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Action $action)
    {
        $validated = $request->validated();
        $action->update([
            'user_id' => \Auth::id(),
            'action' => $request->action,
            'customer_id' => $request->customer_id
        ]);
        return response(["Updated" ,Response::HTTP_ACCEPTED]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Action  $action
     * @return \Illuminate\Http\Response
     */
    public function destroy(Action $action)
    {
        $customer->delete();
        return response('Deleted',Response::HTTP_ACCEPTED);
    }
}
