<div class="container" style="margin-top: 9rem;min-height: 40rem;">
    <div class="row mb-2">
        <div class="col">
            <div class="input-group"><span class="input-group-text"><i class="fas fa-school"></i></span><input
                    class="form-control" type="text" placeholder="Nama sekolah..." wire:model='namaSekolah' /></div>
            @error('namaSekolah')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col">
            <div class="input-group"><span class="input-group-text"><i class="far fa-address-card"></i></span><input
                    class="form-control" type="text" placeholder="Alamat..." wire:model='alamatSekolah' /></div>
            @error('alamatSekolah')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col">
            <div class="input-group"><span class="input-group-text"><i class="fas fa-phone"></i></span><input
                    class="form-control" type="text" placeholder="Contact person..."
                    wire:model='contactPersonSekolah' /></div>
            @error('contactPersonSekolah')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col">
            <div class="input-group"><span class="input-group-text"><i class="fas fa-bars"></i></span><select
                    class="form-select" wire:model='statusSekolah'>
                    <optgroup label="Pilih tipe sekolah Anda...">
                        <option value="swasta">swasta</option>
                        <option value="negeri">negeri</option>
                    </optgroup>
                </select></div>
            @error('statusSekolah')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col">
            <div class="input-group"><span class="input-group-text"><i class="fas fa-hashtag"></i></span><input
                    class="form-control" type="text" placeholder="Cari jurusan..." wire:model='searchJurusan' /></div>
            @if ($jurusan->count() > 0)
                <div class="border rounded mt-2">
                    @foreach ($jurusan as $item)
                        <div class="form-check d-inline-block m-1"><input
                                wire:model='selectedJurusan.{{ $item->id }}' id="formCheck-{{ $item->id }}"
                                class="form-check-input" name="values[]" value="{{ $item->id }}"
                                type="checkbox" /><label class="form-check-label"
                                for="formCheck-{{ $item->id }}">{{ $item->name }}</label>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="d-flex justify-content-center align-items-center border bg-dark text-light mt-2 rounded">
                    <h1 class="text-center">Jurusan <strong>{{ $searchJurusan }}</strong> tidak ditemukan.</strong>
                    </h1>
                </div>
            @endif
            @error('selectedJurusan')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="row mt-4">
        <div class="col"><button class="btn btn-primary" type="button" wire:click='save'><i
                    class="fas fa-save"></i> Save</button><a href="{{ route('sekolah.index') }}"
                class="btn btn-outline-warning ms-1" role="button"><i class="far fa-arrow-alt-circle-left"></i> Back</a>
        </div>
    </div>
</div>
