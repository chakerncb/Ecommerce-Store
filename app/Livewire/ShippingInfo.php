<?php

namespace App\Livewire;

use Livewire\Component;

class ShippingInfo extends Component
{
    public $selectedWilaya;
    public $selectedMunicipality;
    public $municipalities = [];

    public $postalCode;

    public function render()
    {
        $wilayas = json_decode(file_get_contents(public_path('algeria_cities.json')));
        $uniqueWilayas = collect($wilayas)->unique('wilaya_name_ascii')->values()->all();        
        $wilayas = json_decode(json_encode($uniqueWilayas));

        $municipalities = $this->municipalities;
        $postalCode = $this->postalCode;
        return view('livewire.shipping-info', compact('wilayas', 'municipalities', 'postalCode'));
    }

    public function updateMunicipalities()
    {
        $wilayas = json_decode(file_get_contents(public_path('algeria_cities.json')));
        $this->municipalities = collect($wilayas)->where('wilaya_name_ascii', $this->selectedWilaya)->pluck('commune_name_ascii')->all();

        $selectedWilaya = collect($wilayas)->where('wilaya_name_ascii', $this->selectedWilaya)->first();
        $this->postalCode = isset($selectedWilaya->zip_code) ? $selectedWilaya->zip_code : null;
    }
}
