<div class="row">
    <div class="col-lg-4">
        <div class="mb-4 mb-lg-0">
            <label class="form-label">State</label>
            <select name="wilaya" id="wilaya" wire:model="selectedWilaya" wire:change="updateMunicipalities">
                <option value="">Select a state</option>
                @foreach($wilayas as $wilaya)
                    <option value="{{ $wilaya->wilaya_name_ascii }}">{{ $wilaya->wilaya_name_ascii }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="mb-4 mb-lg-0">
            <label class="form-label">Municipality</label>
            <select name="municipality" id="municipality" wire:model="selectedMunicipality">
                <option value="">Select a municipality</option>
                @foreach($municipalities as $municipality)
                    <option value="{{ $municipality }}">{{ $municipality }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="mb-0">
            <label class="form-label" for="zip-code">Zip / Postal code</label>
            <input value="{{$postalCode}}" type="text" class="form-control" id="zip-code" placeholder="Enter Postal code" wire:model="postalCode">
        </div>
    </div>
</div>
