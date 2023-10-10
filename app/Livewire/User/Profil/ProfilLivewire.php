<?php

namespace App\Livewire\User\Profil;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Illuminate\Validation\Rule;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ProfilLivewire extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    #[Rule('image|max:1024')] // 1MB Max
    public $image;
    public User $user;

    /**
     * List des variables des inputs
     */
    public $email, $name, $surname;

    /**
     * Réinitialise tout les inputs
     * @return void
     */
    public function resetFields(){
        $this->email = '';
        $this->name = '';
        $this->surname = '';
    }

    /**
     * Mise à jour des informations de l'utilisateur
     * @return void
     */
    public function updateUser()
    {
        $this->validate([
            'email' => ['required', 'string', 'email', 'max:255',
            Rule::unique('users')->ignore($this->user->id)],
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255']
        ]); 
        try {
            $this->user->email = $this->email;
            $this->user->name = $this->name;
            $this->user->surname = $this->surname;
            $this->user->update();
            $this->alert('success','Informations mise à jour avec succès!!');
        } catch (\Throwable $th) {
             $this->alert('warning','Quelque chose c\'est mal déroulé !');
        }
    }


    /**
     * Upload de l'image
     * @return void
     */
    public function save()
    {  

        try {
            // Récupérer l'extension de l'image
            $extension = $this->image->getClientOriginalExtension();
            
            // Générer un nom de fichier unique
            $newFileName = uniqid() . '.' . $extension;
            // Déplacer l'image vers le dossier "photo" avec le nouveau nom
            $this->image->storeAs('img/user', $newFileName);
            $this->user->image = $newFileName;
            $this->user->update();
            $this->alert('success', 'image changé avec succès!!');
        } catch (\Throwable $th) {
            $this->alert('warning','Quelque chose c\'est mal déroulé !');
        }
    }


    /**
     * Affiche les données de l'utilisateur
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    #[Title('Profil')]
    public function render()
    {
        $this->user = auth()->user();
        $this->email = $this->user->email;
        $this->name = $this->user->name;
        $this->surname = $this->user->surname;
        return view('livewire.user.profil.profil-livewire');
    }
}
