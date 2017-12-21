<?php
/**
 * Created by PhpStorm.
 * User: islam
 * Date: 20/12/17
 * Time: 12:35 م
 */

namespace App\Repositories;


interface RepositoryInterface
{
    public function all();
    public function delete($id);
    public function create($data);
    public function update($id, $data);
}