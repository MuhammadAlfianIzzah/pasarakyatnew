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
            <h4 class="text-dark">Kelola Data Negara</h4>
        </div>
        <div class="col-6">

        </div>
    </div>
    <div class="row mt-4 mb-2">
        <div class="col-12">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createNegara">
                <i class="fa-solid fa-plus"></i> Tambah Data
            </button>

            <!-- Modal -->
            <div class="modal fade" id="createNegara" tabindex="-1" aria-labelledby="createNegaraLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('negara-store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="modal-header">
                                <h5 class="modal-title" id="createNegaraLabel">Tambah Data Negara</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" value="{{ old('nama') }}" name="nama"
                                        class="form-control" id="nama">
                                    @error('nama')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ old('deskripsi') }}</textarea>

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
                                        <input type="text" value="{{ old('lat') }}" class="form-control"
                                            placeholder="lat ..." name="lat">
                                        @error('lat')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <input type="text" value="{{ old('lang') }}" class="form-control"
                                            placeholder="lang ..." name="lang">
                                        @error('lang')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">batalkan</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
