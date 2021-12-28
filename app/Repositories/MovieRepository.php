<?php

namespace App\Repositories;
use App\Movie;
use Illuminate\Support\Facades\Auth;
class MovieRepository implements MovieRepositoryInterface
{
    public function all()
    {
        return Movie::all();
    }

    public function add($cinema)
    {
        $movie = new Movie;
        $movie->user_id = Auth::user()->id;
        $movie->name = $cinema->name;

        if($movie->save()) {
            return true;
        } else {
            return false;
        }
    }

    public function update($id, $data)
    {
        $movie = Movie::whereId($id)->firstorFail();
        $movie->user_id = Auth::user()->id;
        $movie->name = $data->name;

        if($movie->save()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $movie = Movie::whereId($id)->firstorFail();
        $movie->cinema()->detach($id);

        if($movie->delete()){
            return true;
        } else {
            return false;
        }
    }

    public function findById($id)
    {
        return Movie::whereId($id)->firstOrFail();
    }

    public function findByDate($date)
    {

    }

    public function findByCinema($name)
    {

    }
}
