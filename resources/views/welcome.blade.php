@section('title', $title)
<x-layout>
    <div class="container my-3">
        <div class="row justify-content-center">
            <div class="col-md-6 d-flex justify-content-center text-center">
                <h1 class="titolo-custom">Benvenuto in MÀCRÌ</h1>
            </div>
        </div>
    </div>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Chiudi"></button>
        </div>
    @endif
</x-layout>