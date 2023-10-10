<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;

class UserLivewire extends Component
{
    public User $user;

    /**
     * Listes des variables pour la gestion des Popups
     */
    public $disableUser = false;


    /**
     * Ouvre un popup d'avertissement de désactivation
     * @param mixed $user
     * @return void
     */
    public function disable(User $user)
    {
        try {
            $this->user = $user;
            $this->disableUser = true;
        } catch (\Exception $ex) {
            session()->flash('error','Quelque chose c\' mal déroulé !');
        }
    }
    /**
     * Désactivation d'un utilisateur
     * @return void
     */
    public function modelDeleteUser()
    {
        try {
            $this->user->etat = 0;
            $this->user->update();
            $this->disableUser = false;
            session()->flash('success','Utilisateur désactivé avec succès !!');
        } catch (\Exception $ex) {
            session()->flash('error','Quelque chose c\' mal déroulé !');
        }
    }



    /**
     * Activation d'un utilisateur
     * @param mixed $user
     * @return void
     */
    public function activate(User $user)
    {
        try {
            if ($user->etat == 1) {
                session()->flash('success','Déjà activé !!');
            }else {
                $user->etat = 1;
                $user->update();
                session()->flash('success','Utilisateur activé avec succès !!');
            }
        } catch (\Exception $ex) {
            session()->flash('error','Quelque chose c\' mal déroulé !');
        }
    }



    /**
     * Affiche les utilisateurs
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        $user = auth()->user();
        if ($user->fonction->nameFon != 'ADMINISTRATEUR') {
            abort(401);
        }
        $this->user = User::all();
        return view('livewire.user.user-livewire');
    }
}
