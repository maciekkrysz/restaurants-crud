<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Http\Resources\ClientResource;

/**
 * 
 * @OA\Get(
 * path="/clients",
 * summary="",
 * description="Get all clients",
 * operationId="clientsGet",
 * tags={"clients"},
 * @OA\RequestBody(
 *    description="",
 * ),
 * @OA\Response(
 *    response=200,
 *    description="Correct",
 *    @OA\JsonContent(
 *       @OA\Property(
 *           property="data",
 *           description="Client objects",
 *           type="array",
 *           collectionFormat="multi",
 *           @OA\Items(
 *               @OA\Property(property="first_name", type="string", example="Adam"),
 *               @OA\Property(property="last_name", type="string", example="Kowalski"),
 *               @OA\Property(property="postal_code", type="string", example="01-200"),
 *               @OA\Property(property="city", type="string", example="Warszawa"),
 *               @OA\Property(property="address1", type="string", example="ul. Zielona 1"),
 *           ),
 *         ),
 *        )
 *     )
 * )
 * @OA\Get(
 * path="/clients/{$id}",
 * summary="",
 * description="Get one client",
 * operationId="clientGet",
 * tags={"clients"},
 * @OA\RequestBody(
 *    description="",
 * ),
 * @OA\Response(
 *    response=200,
 *    description="Correct",
 *    @OA\JsonContent(
 *       @OA\Property(property="first_name", type="string", example="Adam"),
 *       @OA\Property(property="last_name", type="string", example="Kowalski"),
 *       @OA\Property(property="postal_code", type="string", example="01-200"),
 *       @OA\Property(property="city", type="string", example="Warszawa"),
 *       @OA\Property(property="address1", type="string", example="ul. Zielona 1"),
 *        )
 *     )
 * )
 * @OA\Post(
 * path="/clients",
 * summary="",
 * description="Add new client",
 * operationId="clientPost",
 * tags={"clients"},
 * @OA\RequestBody(
 *    required=true,
 *    description="",
 *    @OA\JsonContent(
 *       required={"first_name","last_name","postal_code","city","address1"},
 *       @OA\Property(property="first_name", type="string", example="Adam"),
 *       @OA\Property(property="last_name", type="string", example="Kowalski"),
 *       @OA\Property(property="postal_code", type="string", example="01-200"),
 *       @OA\Property(property="city", type="string", example="Warszawa"),
 *       @OA\Property(property="address1", type="string", example="ul. Zielona 1"),
 *    ),
 * ),
 * @OA\Response(
 *    response=200,
 *    description="Correct",
 *    @OA\JsonContent(
 *       @OA\Property(property="first_name", type="string", example="Adam"),
 *       @OA\Property(property="last_name", type="string", example="Kowalski"),
 *       @OA\Property(property="postal_code", type="string", example="01-200"),
 *       @OA\Property(property="city", type="string", example="Warszawa"),
 *       @OA\Property(property="address1", type="string", example="ul. Zielona 1"),
 *        )
 *     )
 * )
 * @OA\Patch(
 * path="/clients/{$id}",
 * summary="",
 * description="Update client",
 * operationId="clientPatch",
 * tags={"clients"},
 * @OA\RequestBody(
 *    required=true,
 *    description="",
 *    @OA\JsonContent(
 *       @OA\Property(property="first_name", type="string", example="Adam"),
 *       @OA\Property(property="last_name", type="string", example="Kowalski"),
 *    ),
 * ),
 * @OA\Response(
 *    response=200,
 *    description="Correct",
 *    @OA\JsonContent(
 *       @OA\Property(property="first_name", type="string", example="Adam"),
 *       @OA\Property(property="last_name", type="string", example="Kowalski"),
 *       @OA\Property(property="postal_code", type="string", example="01-200"),
 *       @OA\Property(property="city", type="string", example="Warszawa"),
 *       @OA\Property(property="address1", type="string", example="ul. Zielona 1"),
 *        )
 *     )
 * )
 * @OA\Delete(
 * path="/clients",
 * summary="",
 * description="Delete client",
 * operationId="clientDelete",
 * tags={"clients"},
 * @OA\RequestBody(
 *    required=true,
 *    description="",
 *    @OA\JsonContent(
 *       required={"first_name","last_name","postal_code","city","address1"},
 *       @OA\Property(property="first_name", type="string", example="Adam"),
 *       @OA\Property(property="last_name", type="string", example="Kowalski"),
 *       @OA\Property(property="postal_code", type="string", example="01-200"),
 *       @OA\Property(property="city", type="string", example="Warszawa"),
 *       @OA\Property(property="address1", type="string", example="ul. Zielona 1"),
 *    ),
 * ),
 * @OA\Response(
 *    response=200,
 *    description="Correct",
 *    @OA\JsonContent(
 *       @OA\Property(property="first_name", type="string", example="Adam"),
 *       @OA\Property(property="last_name", type="string", example="Kowalski"),
 *       @OA\Property(property="postal_code", type="string", example="01-200"),
 *       @OA\Property(property="city", type="string", example="Warszawa"),
 *       @OA\Property(property="address1", type="string", example="ul. Zielona 1"),
 *        )
 *     )
 * )
 */
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ClientResource::collection(Client::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request)
    {
        return Client::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::find($id);
        return (new ClientResource($client))->response();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClientRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientRequest $request, $id)
    {
        $client = Client::find($id);
        $client->update($request->all());
        return $client;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Client::destroy($id);
    }
}
