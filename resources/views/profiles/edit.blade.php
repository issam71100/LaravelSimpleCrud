@extends('layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Modifier un profile
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br/>
            @endif
            <form method="post" action="{{ route('profile.update', $profile->id)}}">
                @method('PATCH')
                @csrf

                <div class="form-group">
                    <label for="name">Prénom</label>
                    <input id="name" type="text" class="form-control"
                           name="first_name" value="{{$profile->first_name}}" required/>
                </div>
                <div class="form-group">
                    <label for="last_name">Nom</label>
                    <input id="last_name" type="text" class="form-control"
                           name="last_name" value="{{$profile->last_name}}" required/>
                </div>


                <div class="row">
                    <div class="col-md-3">
                        <img class="img-fluid" src="{{ $profile->image }}">
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input id="image" class="form-control" type="text" accept="image/*"
                                   value="{{ $profile->image }}" name="image" required/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Charger une image depuis :</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="fromurl" name="imagesource" value="true"
                               class="custom-control-input" checked>
                        <label class="custom-control-label" for="fromurl">Une url</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="fromfolder" name="imagesource" value="false"
                               class="custom-control-input">
                        <label class="custom-control-label" for="fromfolder">mes fichiers</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea rows="10" id="description" class="form-control" name="description" required>{{$profile->description}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Mettre à jour</button>
            </form>
        </div>
    </div>
@endsection

<script type="text/javascript">
    window.onload = function(){
        let checkboxFolder = document.querySelector('#fromfolder');
        let checkboxUrl = document.querySelector('#fromurl');
        let inputImage = document.getElementsByName('image').item(0);
        console.log(inputImage);

        checkboxFolder.addEventListener('change', function (e) {
            if (inputImage.classList.contains('form-control'))
                inputImage.classList.remove('form-control');
            inputImageValue = inputImage.value;
            inputImage.type = 'file';
        });

        checkboxUrl.addEventListener('change', function (e) {
            inputImage.type = "text";
            inputImage.value = inputImageValue;

            if (!inputImage.classList.contains('form-control'))
                inputImage.classList.add('form-control');
        })
    }

</script>