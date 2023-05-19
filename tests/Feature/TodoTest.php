<?php
declare(strict_types=1);

use App\Models\Feature\Todo;
use App\Models\User\User;

beforeEach(function () {
    /** @noinspection PhpDynamicFieldDeclarationInspection */
    $this->user = User::factory()->create();

    $this->withoutExceptionHandling();
});

it('can get todo', function () {
    $todo = Todo::factory(2)->create();

    $this->actingAs($this->user)
        ->getJson(route('todos.index'))
        ->assertOk()
        ->assertJsonFragment([
            'message' => __('todo.index'),
            'data' => $todo->toArray(),
        ]);
});

it('can store todo', function () {
    $request = Todo::factory()->make();

    $this->actingAs($this->user)
        ->postJson(route('todos.store'), $request->toArray())
        ->assertStatus(201)
        ->assertJsonFragment([
            'message' => __('todo.store')
        ]);

    $this->assertDatabaseHas('todos', $request->toArray());
});

it('can show todo', function () {
    $todo = Todo::factory()->create();

    $this->actingAs($this->user)
        ->getJson(route('todos.show', $todo))
        ->assertOk()
        ->assertJsonFragment([
            'message' => __('todo.show'),
            'data' => $todo->toArray(),
        ]);
});

it('can update todo', function () {
    /** @var Todo $todo */
    $todo = Todo::factory()->create();

    /** @var Todo $request */
    $request = Todo::factory()->make();

    $this->actingAs($this->user)
        ->putJson(route('todos.update', $todo), $request->toArray())
        ->assertOk()
        ->assertJsonFragment([
            'message' => __('todo.update'),
        ]);

    $todo = $todo->refresh();

    expect($todo->title)->toBe(ucwords($request->title))
        ->and($todo->desc)->toBe(ucfirst($request->desc))
        ->and($todo->priority)->toBe($request->priority);
});

it('can delete todo', function () {
    $todo = Todo::factory()->create();

    $this->actingAs($this->user)
        ->deleteJson(route('todos.destroy', $todo))
        ->assertOk()
        ->assertJsonFragment([
            'message' => __('todo.destroy')
        ]);

    $this->assertSoftDeleted('todos', $todo->toArray());
});
