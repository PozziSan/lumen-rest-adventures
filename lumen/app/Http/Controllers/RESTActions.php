<?php


namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use function PHPUnit\Framework\isNull;

trait RESTActions
{
    protected function respond($status, $data = []): JsonResponse
    {
        return response()->json($data, $status);
    }

    public function index(): JsonResponse
    {
        $entities = $this->_model::all();

        return $this->respond(Response::HTTP_OK, $entities);
    }

    public function show($id): JsonResponse
    {
        $entity = $this->_model::find($id);

        if (isnull($entity)) {
            return $this->respond(Response::HTTP_NOT_FOUND);
        }

        return $this->respond(Response::HTTP_OK, $entity);
    }

    public function store(Request $request): JsonResponse
    {
        $this->validate($request, $this->_model::$rules);
        $created_entity = $this->_model::create($request->all());

        return $this->respond(Response::HTTP_CREATED, $created_entity);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $this->validate($request, $this->_model::$rules);
        $entity = $this->_model::find($id);

        if (isnull($entity)) {
            return $this->respond(Response::HTTP_NOT_FOUND);
        }

        $entity->update($request->all());

        return $this->respond(Response::HTTP_OK, $entity);
    }

    public function destroy($id): JsonResponse
    {
        $entity = $this->_model::find($id);

        if (isNull($entity)) {
            return $this->respond(Response::HTTP_NOT_FOUND);
        }

        $this->_model::destroy($id);

        return $this->respond(Response::HTTP_NO_CONTENT);

    }
}
