<?php


namespace App\Interfaces\Doctors;


use Illuminate\Database\Eloquent\Model;

/**
 * Interface EloquentRepositoryInterface
 * @package App\Repositories
 */
interface DoctorRepositoryInterface
{
    public function index();
    public function store($request);
    public function update($request);
    public function destroy($request);
}
