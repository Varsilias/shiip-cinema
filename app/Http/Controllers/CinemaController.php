<?php

namespace App\Http\Controllers;

use App\Cinema;
use Illuminate\Http\Request;
use App\Repositories\CinemaRepositoryInterface;
use App\Repositories\MovieRepositoryInterface;
use App\Http\Requests\CinemaRequest;
use App\Http\Requests\CinemaMovieRequest;
class CinemaController extends Controller
{


     private $cinemaRepository;
     private $movieRepository;

    public function __construct(CinemaRepositoryInterface $cinemaRepository, MovieRepositoryInterface $movieRepository)
    {
        $this->cinemaRepository = $cinemaRepository;
        $this->movieRepository = $movieRepository;
    }

    public function index()
    {
        $cinemas = $this->cinemaRepository->all();
        return view('cinema',compact('cinemas'));
    }

    public function showCreateCinema()
    {
        return view('cinema_create');
    }

    public function showIndex()
    {
        $shows = $this->cinemaRepository->showTime();
        return view('home',compact('shows'));
    }

    public function showEditCinema($id)
    {
        $cinema = $this->cinemaRepository->findById($id);
        return view('cinema_update',compact('cinema'));
    }

    public function createCinema(CinemaRequest $request)
    {
        if ($this->cinemaRepository->add($request)) {
            return redirect()->route('cinema');
        }
    }

    public function updateCinema(CinemaRequest $request, $id)
    {
        if ($this->cinemaRepository->update($id, $request)) {
            return redirect()->route('cinema');
        }
    }

    public function deleteCinema($id)
    {
        if ($this->cinemaRepository->delete($id)) {
            return redirect()->route('cinema');
        }
    }

    public function showAddShow()
    {
        $movie = $this->movieRepository->all();
        $cinema = $this->cinemaRepository->all();

        return view('show_create',compact('movie','cinema'));
    }

    public function addShow(CinemaMovieRequest $request)
    {
        if ($this->cinemaRepository->addShowTime($request)) {
            return redirect()->route('show');
        }
    }

    public function showEditShow($id, $my)
    {
        $movie = $this->movieRepository->all();
        $cinema = $this->cinemaRepository->all();
        $show = $this->cinemaRepository->findByIdAndCinema($id, $my)['movies'];
        $single_cinema = $this->cinemaRepository->findByIdAndCinema($id, $my)['cinema'];

        return view('show_update',compact('show','movie','cinema','single_cinema'));
    }

    public function updateShow(CinemaMovieRequest $request, $id, $myid)
    {
        if($this->cinemaRepository->updateShowTime($id,$myid,$request)) {
            return redirect()->route('show');
        }
    }

    public function deleteShow(CinemaMovieRequest $request, $id, $myid)
    {
        dd($id);
        // if($this->cinemaRepository->deleteShowTime($id,$myid))
        // {
        //     return redirect('/');
        // }
    }
}
