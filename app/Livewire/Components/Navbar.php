<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\Document;

class Navbar extends Component
{
    public $documents;
    public $user;

    public function render()
    {
        
        $this->user = auth()->user();
        $this->documents = Document::where('receiver', $this->user->name)
                                    ->whereNot('sender', $this->user->name)
                                    ->get();

        return view('livewire.components.nav-bar');
    }
}
