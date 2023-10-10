<?php

namespace App\Livewire\Document\Archive;

use Livewire\Component;
use App\Models\Document;

class ArchiveLivewire extends Component
{
    public $documents;

    public function render()
    {
        $this->documents = Document::where('etat', 1)
                            ->when($this->search, function ($query) {
                                $query->where('nameDoc', 'like', '%' . $this->search . '%');
                            })
                            ->get();
        return view('livewire.document.archive.archive-livewire');
    }
}
