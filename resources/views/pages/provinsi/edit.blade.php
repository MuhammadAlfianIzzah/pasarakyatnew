<x-admin-layout>
    @push('script')
        @if ($errors->any())
            <script>
                $('#createNegara').modal('show');
            </script>
        @endif
    @endpush
    <div class="row">
        <div class="col-6">
            <h4 class="text-dark">Edit Data Negara {{ $provinsi->nama }}</h4>
        </div>
        <div class="col-6">

        </div>
    </div>
    <div class="row mt-4 mb-2 bg-white py-4 px-4">
        <form class="col-12" action="{{ route('provinsi-update', [$provinsi->slug]) }}" method="POST"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" value="{{ old('nama') ?? ($provinsi->nama ?? '') }}" name="nama"
                    class="form-control" id="nama">
                @error('nama')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="negara_id">Negara</label>
                <select class="custom-select" name="negara_id">
                    @foreach ($negaras as $negara)
                        <option {{ $negara->id == $provinsi->negara_id || old('negara_id') ? 'selected' : '' }}
                            value="{{ $negara->id }}">
                            {{ $negara->nama }}</option>
                    @endforeach
                </select>
                @error('negara_id')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ old('deskripsi') ?? ($provinsi->deskripsi ?? '') }}</textarea>

                @error('deskripsi')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="custom-file  mb-3">
                <input type="file" class="custom-file-input" id="logo" name="logo">
                <label class="custom-file-label" for="logo">Choose file</label>
                @error('logo')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" value="{{ old('lat') ?? ($provinsi->lat ?? '') }}" class="form-control"
                        placeholder="lat ..." name="lat">
                    @error('lat')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col">
                    <input type="text" value="{{ old('lang') ?? ($provinsi->lang ?? '') }}" class="form-control"
                        placeholder="lang ..." name="lang">
                    @error('lang')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="d-flex justify-content-center mt-3">
                <a href="{{ route('negara-index') }}" class="btn btn-dark mr-2">
                    Back
                </a>
                <button type="submit" class="btn btn-warning">
                    Update Data
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
