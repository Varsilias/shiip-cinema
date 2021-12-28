<?php

namespace App\Repositories;

interface MovieRepositoryInterface

{
    
    public function all();
    public function findById($id);
    public function findByDate($date);
    public function findByCinema($name);
    public function add($cinema);
    public function update($id,$data);
    public function delete($id);
}