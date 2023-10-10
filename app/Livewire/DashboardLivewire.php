<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Document;

class DashboardLivewire extends Component
{
    public $myDocuments, $actifDocuments, $archiveDocuments;
    public function render()
    {
        
        $user = auth()->user();
        
        $this->myDocuments = Document::where('sender', $user->name)
                                        ->Where('receiver', $user->name)
                                        ->get();
        
        $this->actifDocuments = Document::where('etat', 0)->get();
        
        $this->archiveDocuments = Document::where('etat', 1)->get();
        
        return view('livewire.dashboard-livewire');
    }
}
