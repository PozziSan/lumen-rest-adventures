<?php


namespace App\Http\Controllers;

use App\Models\Messages;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class MessagesController extends Controller
{
    private string $_model = Messages::class;

    use RESTActions;

    public function index(): JsonResponse
    {
        $messages = $this->_model::with('user')->get();

        return $this->respond(Response::HTTP_OK, $messages);
    }

    public function show_users_messages($id): JsonResponse
    {
        $messages = $this->_model::where('user_id', $id)->get();

        if (is_null($messages)) {
            return $this->respond(Response::HTTP_NOT_FOUND);
        }

        return $this->respond(Response::HTTP_OK, $messages);
    }
}
