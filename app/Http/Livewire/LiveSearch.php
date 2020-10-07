<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Service\PhoneBook;

class LiveSearch extends Component
{
    public $name;
    public $contacts = [];
/*
    public function updatedName($value)
    {
       $this->contacts =  PhoneBook::searchByName($value);
    }
*/
    public function searchByName()
    {
        if (!empty($this->name)) {                
            sleep(3);

            $results =  PhoneBook::searchByName($this->name);

            if (empty($results)) {
                session()->flash("message", 'No contact matching "'. $this->name .'"');
            }

            $this->contacts = $results;
        }

    }

    public function render()
    {
        return view('livewire.live-search');
    }
}
