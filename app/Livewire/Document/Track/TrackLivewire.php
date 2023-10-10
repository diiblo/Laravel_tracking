<?php

namespace App\Livewire\Document\Track;

use Livewire\Component;
use App\Models\Document;

class TrackLivewire extends Component
{
    public $documents;

    /**
     * Affiche les documents en cours
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    { 
        $this->documents = Document::where('etat', 0)
        ->when($this->search, function ($query) {
            $query->where('nameDoc', 'like', '%' . $this->search . '%');
        })
        ->get();
        return view('livewire.document.track.track-livewire');
    }
}
