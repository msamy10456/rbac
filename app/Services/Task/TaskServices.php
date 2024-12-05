<?php

namespace App\Services\Task;

use App\Core\Enums\StatusEnum;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class TaskServices
{

    public function index()
    {
        return Task::query()
            ->when(auth('admin')->user()?->hasRole('manager'), function ($q) {
                $q->where('admin_id', auth('admin')->user()->id);
            })
            ->when(auth('employee')->user(), function ($q) {
                $q->whereHas('employees', function ($q) {
                    $q->where('employee_id', auth('employee')->user()->id);
                });
            })
            ->latest()
            ->get();
    }

    public function findOrFail($id)
    {
        return Task::query()->when(auth('employee')->user(), function ($q) {
            $q->whereHas('employees', function ($q) {
                $q->where('employee_id', auth('employee')->user()->id);
            });
        })
            ->findOrFail($id);
    }

    public function store($request): void
    {
        DB::transaction(function () use ($request) {
            $task =   Task::query()->create([
                "title" => $request->title,
                "description" => $request->description,
                "priority" => $request->priority,
                "status" => $request->status,
            ]);
            $task->employees()->sync($request->employees);
        });
    }

    public function update($id, $request)
    {
        DB::transaction(function () use ($id, $request) {

            $task = $this->findOrFail($id);
            $task->update([
                "title" => $request->title,
                "description" => $request->description,
                "priority" => $request->priority,
                "status" => $request->status,
                "completed_at" => ($request->status == StatusEnum::Completed->value) ? Carbon::now() : null,

            ]);
            $task->employees()->sync($request->employees);
        });
    }
    public function updateStatus($request)
    {
        DB::transaction(function () use ($request) {
            foreach ($request->status as $key => $value) {
                //check if assgin
                $this->findOrFail($key)->update(
                    [
                        'status' => $value,
                        "completed_at" => ($value == StatusEnum::Completed->value) ? Carbon::now() : null,
                    ]
                );
            }
        });
    }

    public function destroy($id): void
    {
        DB::transaction(function () use ($id) {

            $task = $this->findOrFail($id);

            $task->delete();
        });
    }
}
