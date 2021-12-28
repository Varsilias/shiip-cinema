<?php

namespace App\Http\Controllers;
use App\Repositories\MovieRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\MovieRequest;

class MovieController extends Controller
{
    private $movieRepository;

    public function __construct(MovieRepositoryInterface $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    public function index()
    {
        $movies = $this->movieRepository->all();
        return view('show',compact('movies'));
    }

    public function showCreateMovie()
    {
        return view('movie_create');
    }

    public function showEditMovie($id)
    {
        $movie = $this->movieRepository->findById($id);
        return view('movie_update',compact('movie'));
    }

    public function createMovie(MovieRequest $request)
    {
        if ($this->movieRepository->add($request)) {
            return redirect()->route('movie');
        }
    }
    public function updateMovie(MovieRequest $request, $id)
    {
        if ($this->movieRepository->update($id, $request)) {
            return redirect()->route('movie');
        }
    }
    public function deleteMovie($id)
    {
        if ($this->movieRepository->delete($id)) {
            return redirect()->route('movie');
        }
    }
}
