<?php


namespace App\Interfaces\Sections;


use Illuminate\Database\Eloquent\Model;

/**
 * Interface EloquentRepositoryInterface
 * @package App\Repositories
 */
interface SectionRepositoryInterface
{
    public function index();
    public function store($request);
    public function update($request);
    public function destroy($request);
}
