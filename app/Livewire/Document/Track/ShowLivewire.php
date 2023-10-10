<?php

namespace App\Livewire\Document\Track;

use Livewire\Component;
use App\Models\Document;

class ShowLivewire extends Component
{
    public Document $document;

    public function mount(Document $document) 
    {
        $this->document = $document::where('etat', 0);
    }

    public function render()
    {
        return view('livewire.document.track.show-livewire');
    }
}
