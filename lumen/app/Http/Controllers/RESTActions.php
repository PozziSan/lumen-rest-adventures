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
        $model = self::MODEL;

        return $this->respond(Response::HTTP_OK, $model::all());
    }

    public function show($id): JsonResponse
    {
        $model = self::MODEL;
        $entity = $model::find($id);

        if (isnull($entity)) {
            return $this->respond(Response::HTTP_NOT_FOUND);
        }

        return $this->respond(Response::HTTP_OK, $entity);
    }

    public function store(Request $request): JsonResponse
    {
        $model = self::MODEL;

        $this->validate($request, $model::$rules);
        $created_entity = $model::create($request->all());

        return $this->respond(Response::HTTP_CREATED, $created_entity);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $model = self::MODEL;

        $this->validate($request, $model::$rules);
        $entity = $model::find($id);

        if (isnull($entity)) {
            return $this->respond(Response::HTTP_NOT_FOUND);
        }

        $entity->update($request->all());

        return $this->respond(Response::HTTP_OK, $entity);
    }

    public function destroy($id): JsonResponse
    {
        $model = self::MODEL;
        $entity = $model::find($id);

        if (isNull($entity)) {
            return $this->respond(Response::HTTP_NOT_FOUND);
        }

        $model::destroy($id);

        return $this->respond(Response::HTTP_NO_CONTENT);

    }
}
