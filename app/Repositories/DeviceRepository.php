<?php
/**
 * Created by PhpStorm.
 * User: islam
 * Date: 20/12/17
 * Time: 11:13 ص
 */

namespace App\Repositories;


use App\Models\Device;


class DeviceRepository implements RepositoryInterface
{

    private $model;

    public function __construct(Device $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function findById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function delete($id)
    {
        return $this->model->where('id',$id)->delete();
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        return $this->model->where('id',$id)->update($data);
    }
}