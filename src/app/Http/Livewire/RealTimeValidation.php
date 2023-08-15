<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RealTimeValidation extends Component
{   
    public $lastname = '';
    public $firstname = '';
    public $email = '';
    public $postcode = '';
    public $address = '';
    public $opinion = '';

    protected $rules = [
        'lastname' => 'required|min:1',
        'firstname' => 'required|min:1',
        'email' => 'required|email',
        'postcode' => 'required|regex:/^[0-9]{3}-[0-9]{4}$/',
        'address' => 'required|min:5',
        'opinion' => 'required|min:5',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.real-time-validation');
    }
}
