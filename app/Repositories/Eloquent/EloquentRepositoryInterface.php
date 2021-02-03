<?php

namespace App\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;

interface EloquentRepositoryInterface
{
    /**
     * @param $user_id
     */
    public function getAll($user_id);

    /**
     * @param array $attributes
     */
    public function create(array $attributes);

    /**
     * @param $id
     */
    public function find($id);

    /**
     * @param $id
     * @param array $attributes
     */
    public function update($id,array $attributes);

    /**
     * @param $id
     */
    public function destroy($id);
}
