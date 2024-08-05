@extends('dashboard.layout.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Menambahkan Data Kamar Baru</h1>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="col-lg-8">
        <form method="post" action="/dashboard/kamars/tambahKamarAdmin" class="mb-0" enctype="multipart/form-data">
            {{-- otomatis langsung ke method store --}}
            @method('post')
            @csrf

            <input type="hidden" id="statusPengajuanKamar" name="statusPengajuanKamar" value=1>
            <input type="hidden" id="statusUpdateKamar" name="statusUpdateKamar" value=1>
            {{-- <input type="hidden" id="status" name="status" value=1> --}}


            {{-- //kelurahan  --}}
            <div class="mb-3">
                <label for="kelurahan" class="form-label">Kelurahan</label>
                <select class="form-select" name="kelurahan">
                    <option value="Bidara Cina" <?php if (old('kelurahan') == 'Bidara Cina') {
                        echo 'selected';
                    } ?>>Bidara Cina</option>
                    <option value="Cipinang Cempedak" <?php if (old('kelurahan') == 'Cipinang Cempedak') {
                        echo 'selected';
                    } ?>>Cipinang Cempedak</option>
                </select>
            </div>


            {{-- //rt  --}}
            <div class="mb-3">
                <label for="rt" class="form-label">RT</label>
                <input type="text" class="form-control @error('rt') is-invalid @enderror" id="rt" name="rt"
                    required autofocus value="{{ old('rt') }}">
                @error('rt')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- //rw  --}}
            <div class="mb-3">
                <label for="rw" class="form-label">RW</label>
                <input type="text" class="form-control @error('rw') is-invalid @enderror" id="rw" name="rw"
                    required autofocus value="{{ old('rw') }}">
                @error('rw')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- //Nomor rumah  --}}
            <div class="mb-3">
                <label for="no" class="form-label">No.</label>
                <input type="text" class="form-control @error('no') is-invalid @enderror" id="no" name="no"
                    required autofocus value="{{ old('no') }}">
                @error('no')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- //harga  --}}
            <div class="mb-3">
                <label for="harga" class="form-label">Harga perbulan (isikan tanpa titik, misal: 800000)</label>
                <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga"
                    name="harga" disable required value="{{ old('harga') }}">
            </div>

            {{-- //Ukuran kamar  --}}
            <div class="mb-3">
                <label for="ukuran" class="form-label">Ukuran Kamar (misal 3x3)</label>
                <input type="text" class="form-control @error('ukuran') is-invalid @enderror" id="ukuran"
                    name="ukuran" required autofocus value="{{ old('ukuran') }}">
                @error('ukuran')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- //durasi Dewa  --}}
            <div class="mb-3">
                <label for="durSewa" class="form-label">Durasi Sewa (bulan)</label>
                <input type="text" class="form-control @error('durSewa') is-invalid @enderror" id="durSewa"
                    name="durSewa" required autofocus value="{{ old('durSewa') }}">
                @error('durSewa')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- //kamarMandi  --}}
            <div class="mb-3">
                <label for="kamarMandi" class="form-label">Kamar Mandi</label>
                <select class="form-select" name="kamarMandi">
                    <option value="Luar" <?php if (old('kamarMandi') == 'Luar') {
                        echo 'selected';
                    } ?>>Luar</option>
                    <option value="Dalam" <?php if (old('kamarMandi') == 'Dalam') {
                        echo 'selected';
                    } ?>>Dalam</option>
                </select>
            </div>

            {{-- //Fasilitas  --}}
            <div class="mb-3">
                <label for="fasilitasKamar" class="form-label">Fasilitas Kamar</label>
                <input type="textarea" class="form-control @error('fasilitasKamar') is-invalid @enderror"
                    id="fasilitasKamar" name="fasilitasKamar" required autofocus value="{{ old('fasilitasKamar') }}">
                @error('fasilitasKamar')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- //Jumlah Kamar  --}}
            <div class="mb-3">
                <label for="jumKam" class="form-label">Jumlah Kamar Sejenis</label>
                <input type="text" class="form-control @error('jumKam') is-invalid @enderror" id="jumKam"
                    name="jumKam" required autofocus value="{{ old('jumKam') }}">
                @error('jumKam')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- //Jumlah Kamar Kosong  --}}
            <div class="mb-3">
                <label for="jumKos" class="form-label">Jumlah Kamar Sejenis yang Kosong</label>
                <input type="text" class="form-control @error('jumKos') is-invalid @enderror" id="jumKos"
                    name="jumKos" required autofocus value="{{ old('jumKos') }}">
                @error('jumKos')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>



            {{-- //Gambar  --}}
            <div class="mb-3">
                <label for="imageKamar" class="form-label">Gambar Kamar (optional)</label>
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input class="form-control @error('imageKamar') is-invalid @enderror" type="file" id="imageKamar"
                    name="imageKamar" onchange="previewImage()">
                @error('imageKamar')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- //deskripsi --}}
            <div class="mb-3">
                <label for="deskripsiKamar" class="form-label">Deskripsi Kamar</label>
                @error('deskripsiKamar')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input id="deskripsiKamar" type="hidden" name="deskripsiKamar" value="{{ old('deskripsiKamar') }}">
                <trix-editor input="deskripsiKamar"></trix-editor>
            </div>

            <button type="submit" class="btn btn-primary mb-3">Tambahkan Data Kamar</button>
        </form>
    </div>


    <script>
        //UNTUK SLUG
        // const title = document.querySelector('#title');
        // const slug = document.querySelector('#slug');

        // title.addEventListener('change', function(){
        //   fetch('/dashboard/posts/checkSlug?title=' + title.value)
        //   .then((response) => response.json())
        //   .then((data) => slug.value = data.slug);
        // });


        // cara lain
        // title.addEventListener("keyup", function() {
        //     let preslug = title.value;
        //     preslug = preslug.replace(/ /g,"-");
        //     slug.value = preslug.toLowerCase();
        // });

        // hilangin fungsi fitur add attacment
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })


        function previewImage() {
            const image = document.querySelector('#imageKamar');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }

        }
    </script>
@endsection