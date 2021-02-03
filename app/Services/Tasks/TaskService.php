<?php


namespace App\Services\Tasks;

use App\Models\Task;
use App\Repositories\Eloquent\EloquentRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class TaskService implements EloquentRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function getAll($user_id)
    {
        // return Task::where('user_id',Auth::id());
        return Task::all()->where('user_id',$user_id);
    }

    /**
     * @inheritDoc
     */
    public function create(array $attributes)
    {
        echo Task::create($attributes);
    }

    /**
     * @inheritDoc
     */
    public function find($id)
    {
        echo Task::findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function update($id,array $attributes)
    {
        echo Task::findOrFail($id)->update($attributes);
    }

    /**
     * @inheritDoc
     */
    public function destroy($id)
    {
        echo Task::findOrFail($id)->delete();
    }
}
