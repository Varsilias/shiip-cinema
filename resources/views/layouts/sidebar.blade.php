<div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Sidebar') }}</div>

                <div class="card-body">
                <!-- <header class="card-header"><h6 class="title">Similar category </h6></header> -->
                        <div class="filter-content">
                            <div class="list-group list-group-flush">
                            <!-- <span class="float-right badge badge-light round">142</span> -->
                            <a href="{{route('show')}}" class="list-group-item">Shows</a>
                            <a href="{{route('movie')}}" class="list-group-item">Movies </a>
                            <a href="{{route('create.movie')}}" class="list-group-item">Add Movie </a>
                            <a href="{{route('cinema')}}" class="list-group-item">Cinemas</a>
                            <a href="{{route('cinema.create')}}" class="list-group-item">Add Cinema </a>
                            
                            <a href="{{route('cinema.show')}}" class="list-group-item">Add Showtime</a>
                            </div>  <!-- list-group .// -->
                        </div>
                </div>
            </div>
        </div>