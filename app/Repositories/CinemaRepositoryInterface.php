<?php
namespace App\Repositories;

interface CinemaRepositoryInterface
{
    public function all();
    public function findById($id);
    public function findByDate($date);
    public function findByCinema($name);
    public function add($cinema);
    public function update($id, $data);
    public function delete($id);
    public function showTime();
    public function updateShowTime($id, $myid, $data);
    public function deleteShowTime($id, $myid);
    public function addShowTime($data);
    public function findByIdAndCinema($id, $my);
}
