@extends('layout')

@section('content')

    <div class="card">
        <div class="card-header">Create Profile</div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('profile.store') }}">
                <div class="form-group">
                    <label for="name">Prénom</label>
                    <input id="name" type="text" class="form-control" name="first_name"/>
                </div>
                <div class="form-group">
                    <label for="last_name">Nom</label>
                    <input id="last_name" type="text" class="form-control" name="last_name"/>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input id="image" type="file" name="image"/>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea rows="10" id="description" class="form-control" name="description">

                    </textarea>
                </div>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>
    </div>
@endsection