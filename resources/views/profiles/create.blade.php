@extends('layout')

@section('content')

    <div class="card">
        <div class="card-header">Créer un Profile</div>
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
            <form enctype="multipart/form-data" method="post" action="{{ route('profile.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Prénom</label>
                    <input id="name" type="text" class="form-control" name="first_name" required/>
                </div>
                <div class="form-group">
                    <label for="last_name">Nom</label>
                    <input id="last_name" type="text" class="form-control" name="last_name" required/>
                </div>

                <div class="form-group">
                    <label>Charger une image depuis :</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="fromurl" name="imagesource" value="true" class="custom-control-input">
                        <label class="custom-control-label" for="fromurl">Une url</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="fromfolder" name="imagesource"  value="false" class="custom-control-input">
                        <label class="custom-control-label" for="fromfolder">mes fichiers</label>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="image">Image</label>
                    <input id="image" type="file" accept="image/*" name="image" required disabled/>
                </div>
                
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea rows="10" id="description" class="form-control" name="description" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>
    </div>
@endsection

@section('script')
<script type="text/javascript">
    let checkboxFolder = document.querySelector('#fromfolder');
    let checkboxUrl = document.querySelector('#fromurl');
    let inputImage = document.querySelector('#image');

    checkboxFolder.addEventListener('change',function (e) {
        if (inputImage.classList.contains('form-control')) inputImage.classList.remove('form-control')
        inputImage.type = 'file';
        inputImage.disabled = false;
    });

    checkboxUrl.addEventListener('change',function (e) {
        inputImage.type = "text";
        inputImage.classList.add('form-control');
        inputImage.disabled = false;
    })
    
</script>
@endsection
