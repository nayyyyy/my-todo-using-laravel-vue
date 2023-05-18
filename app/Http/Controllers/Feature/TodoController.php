<?php
declare(strict_types=1);

namespace App\Http\Controllers\Feature;

use App\Http\Controllers\Controller;
use App\Http\Requests\Feature\TodoRequest;
use App\Models\Feature\Todo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(): JsonResponse
    {
        return $this->sendSuccess(Todo::all(), __('todo.index'));
    }

    public function store(TodoRequest $request): JsonResponse
    {
        Todo::create($request->toArray());

        return $this->sendNoContent(__('todo.store'), 201);
    }

    public function show(Todo $todo): JsonResponse
    {
        return $this->sendSuccess($todo, __('todo.show'));
    }

    public function update(Todo $todo, TodoRequest $request): JsonResponse
    {
        $todo->update($request->toArray());

        return $this->sendNoContent(__('todo.update'));
    }

    public function destroy(Todo $todo): JsonResponse
    {
        $todo->delete();

        return $this->sendNoContent(__('todo.destroy'));
    }
}
