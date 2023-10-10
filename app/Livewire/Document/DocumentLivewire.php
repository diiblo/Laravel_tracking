<?php

namespace App\Livewire\Document;

use App\Models\Suivi;
use Livewire\Component;
use App\Models\Document;

class DocumentLivewire extends Component
{
    public $documents;

    /**
     * Listes des variables pour la gestion des Popups
     */
    public $showDoc = false, $updateDoc = false, $createDoc = false, $sendDoc = false, $archiveDoc = false;

    /**
     * List des variables des inputs
     */
    public $nameDoc, $comment, $image, $receiver, $statut, $etat, $documentId;

    /**
     * Liste des variables users
     */
    public $user_name, $user_id;


    /**
     * List of add/edit form rules 
     */
    protected $rules = [
        'nameDoc' => 'required',
        'comment' => 'required',
        'file' => 'image|max:1024'
    ];

    /**
     * Réinitialise tout les inputs
     * @return void
     */
    public function resetFields(){
        $this->nameDoc = '';
        $this->comment = '';
        $this->image = '';
    }

    /**
     * Ouvrir formulaire d'ajout d'un document
     * @return void
     */
    public function addDocument()
    {
        $this->resetFields();
        $this->createDoc = true;
        $this->updateDoc = false;
        $this->showDoc = false;
        $this->sendDoc = false;
        $this->archiveDoc = false;
    }
    /**
     * store the user inputted post data in the posts table
     * @return void
     */
      public function storeDocument()
      {
          $this->validate(); 
          try {
            $user = auth()->user();
            $this->image->store('img/document');

              Document::create([
                  'user_id' => $this->user_id,
                  'nameDoc' => $this->nameDoc,
                  'image' => $this->image->getClientOriginalName(),
                  'comment' => $this->comment,
                  'sender' => $user->name,
                  'receiver' => $user->name,
                  'image' => $this->image
              ]);

              session()->flash('success','Document créé avec succès!!');
              $this->resetFields();
              $this->createDoc = false;
          } catch (\Exception $ex) {
              session()->flash('error','Quelque chose c\' mal déroulé !');
          }
      }



    /**
     * Montre le document existant dans un formulaire
     * @param mixed $document
     * @return void
     */
    public function editDocument(Document $document)
    {
        try {
            $user = auth()->user();

            if ($user->id == $document->user_id) {
                $this->nameDoc = $document->nameDoc;
                $this->comment = $document->comment;
                $this->image = $document->image;
                $this->documentId = $document->id;
                $this->updateDoc = true;
                $this->createDoc = false;
                $this->showDoc = false;
                $this->sendDoc = false;
                $this->archiveDoc = false;
            }else {
                session()->flash('message', "Désolé mais vous n'êtes pas autorisé à faire celà");
            }

        } catch (\Exception $ex) {
            session()->flash('error','Quelque chose c\' mal déroulé !');
        }
    }
    /**
     * Mise à jour du document
     * @return void
     */
    public function updateDocument()
    {
        $this->validate();
        $this->image->store('img/document');
        try {
            Document::whereId($this->documentId)->update([
                'nameDoc' => $this->nameDoc,
                'comment' => $this->comment,
                'image' => $this->image->getClientOriginalName()
            ]);
            session()->flash('success','Document mise à jour avec succès!!');
            $this->resetFields();
            $this->updateDoc = false;
        } catch (\Exception $ex) {
            session()->flash('success','Quelque chose c\' mal déroulé !');
        }
    }



    /**
     * Ouvre le formulaire d'envoi d'un document
     * @param mixed $document
     * @return void
     */
    public function modalSendDocument(Document $document)
    {
        try {
            $user = auth()->user();

            if ($user->id == $document->user_id || $user->name == $document->sender) {
                $this->documentId = $document->id;
                $this->updateDoc = false;
                $this->createDoc = false;
                $this->showDoc = false;
                $this->sendDoc = true;
                $this->archiveDoc = false;
            }else {
                session()->flash('message', "Désolé mais vous n'êtes pas autorisé à faire celà");
            }

        } catch (\Exception $ex) {
            session()->flash('error','Quelque chose c\' mal déroulé !');
        }
    }
    /**
     * Envoi du document || initialisation du suivi
     * @return void
     */
    public function sendDocument()
    {
        $this->validate([
            'receiver' => 'required'
        ]);
        try {
            Document::whereId($this->documentId)->update([
                'receiver' => $this->receiver,
                'statut' => 1
            ]);

            $document =  Document::whereId($this->documentId)->get();
            Suivi::create([
                'document_id' => $this->documentId,
                'sender' => $document->sender,
                'receiver' => $document->receiver,
                'statut' => $document->statut,
                'etat' => $document->etat
            ]);

            session()->flash('success','Document envoyé avec succès!!');
            $this->resetFields();
            $this->sendDoc = false;
        } catch (\Exception $ex) {
            session()->flash('success','Quelque chose c\' mal déroulé !');
        }
    }



    /**
     * Ouvre le formulaire d'archivage d'un document
     * @param mixed $document
     * @return void
     */
    public function modalArchiveDocument(Document $document)
    {
        try {
            $user = auth()->user();

            if ($user->name == $document->receiver || $user->name == $document->sender) {
                $this->documentId = $document->id;
                $this->updateDoc = false;
                $this->createDoc = false;
                $this->showDoc = false;
                $this->sendDoc = false;
                $this->archiveDoc = true;
            }else {
                session()->flash('message', "Désolé mais vous n'êtes pas autorisé à faire celà");
            }

        } catch (\Exception $ex) {
            session()->flash('error','Quelque chose c\' mal déroulé !');
        }
    }
    /**
     * Archivage du document
     * @return void
     */
    public function archiveDocument()
    {
        $this->validate();
        try {
            Document::whereId($this->documentId)->update([
                'etat' => 1
            ]);

            $document =  Document::whereId($this->documentId)->get();
            Suivi::create([
                'document_id' => $this->documentId,
                'sender' => $document->sender,
                'receiver' => $document->receiver,
                'statut' => $document->statut,
                'etat' => $document->etat
            ]);

            session()->flash('success','Document archivé avec succès!!');
            $this->sendDoc = false;
        } catch (\Exception $ex) {
            session()->flash('success','Quelque chose c\' mal déroulé !');
        }
    }



    /**
     * Reception du document
     * @return void
     */
    public function receiveDocument(Document $document)
    {
        //$this->validate();
        try {
            $user = auth()->user();
            $document->update([
                'sender' => $user->name,
                'receiver' => $user->name,
                'statut' => 2
            ]);

            $document =  Document::whereId($this->documentId)->get();
            Suivi::create([
                'document_id' => $this->documentId,
                'sender' => $document->sender,
                'receiver' => $document->receiver,
                'statut' => $document->statut,
                'etat' => $document->etat
            ]);

            session()->flash('success','Document archivé avec succès!!');
        } catch (\Exception $ex) {
            session()->flash('success','Quelque chose c\' mal déroulé !');
        }
    }


    /**
     * Affiche les documents de l'utilisateur
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        $this->user_name = auth()->user()->name;
        $this->documents = Document::where('etat', 0)
                            ->where('sender', $this->user_name)
                            ->orWhere('receiver', $this->user_name)
                            ->when($this->search, function ($query) {
                                $query->where('nameDoc', 'like', '%' . $this->search . '%');
                            })
                            ->get();
        return view('livewire.document.document-livewire');
    }
}
