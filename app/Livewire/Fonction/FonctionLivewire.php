<?php

namespace App\Livewire\Fonction;

use Livewire\Component;
use App\Models\Fonction;

class FonctionLivewire extends Component
{
    public Fonction $fonction;

    /**
     * Liste des variables des inputs
     */
    public $nameFon;

    /**
     * Listes des variables pour la gestion des Popups
     */
    public $deleteFon = false, $updateFon = false, $createFon = false;

    /**
     * List of add/edit form rules 
     */
    protected $rules = [
        'nameFon' => 'required'
    ];

    /**
     * Réinitialise tout les inputs
     * @return void
     */
    public function resetFields(){
        $this->nameFon = '';
    }


    /**
     * Ouvrir formulaire d'ajout d'un document
     * @return void
     */
    public function addFonction()
    {
        $this->resetFields();
        $this->createFon = true;
        $this->updateFon = false;
        $this->deleteFon = false;
    }
    /**
     * Enregistrer la fonction dans la table fonctions
     * @return void
     */
    public function storeFonction()
    {
        $this->validate();
        try {

            Fonction::create([
                    'nameFon' => $this->nameFon
            ]);
            session()->flash('success','Fonction créé avec succès !!');
            $this->resetFields();
            $this->createFon = true;

        } catch (\Exception $ex) {

            session()->flash('error','Quelque chose c\' mal déroulé !');
        }
    }



    /**
     * Montre la fonction existante dans un formulaire
     * @param mixed $fonction
     * @return void
     */
    public function editFonction(Fonction $fonction)
    {
        try {
            $this->nameFon = $fonction->nameFon;
            $this->fonction = $fonction;
            $this->createFon = false;
            $this->updateFon = true;
            $this->deleteFon = false;
        } catch (\Exception $ex) {
            session()->flash('error','Quelque chose c\' mal déroulé !');
        }
    }
    /**
     * Mise à jour de la fonction
     * @return void
     */
    public function updateFonction()
    {
        $this->validate();
        try {
            Fonction::whereId($this->fonction->id)->update([
                'nameFon' => $this->nameFon
            ]);
            session()->flash('success','Fonction mise à jour avec succès!!');
            $this->resetFields();
            $this->updateFon = false;
        } catch (\Exception $ex) {
            session()->flash('error','Quelque chose c\' mal déroulé !');
        }
    }


    /**
     * Ouvre un popup d'avertissement de désactivation
     * @param mixed $user
     * @return void
     */
    public function disable(Fonction $fonction)
    {
        try {
            $this->fonction = $fonction;
            $this->createFon = false;
            $this->updateFon = false;
            $this->deleteFon = true;
        } catch (\Exception $ex) {
            session()->flash('error','Quelque chose c\' mal déroulé !');
        }
    }
    /**
     * Suppression de la fonction
     * @param mixed $fonction
     * @return void
     */
    public function deleteFonction()
    {
        try {
            $this->fonction->etat = 0;
            $this->fonction->update();
            $this->deleteFon = false;
            session()->flash('success','Fonction désactivé avec succès !!');
        } catch (\Exception $ex) {
            session()->flash('error','Quelque chose c\' mal déroulé !');
        }
    }



    /**
     * Affiche les fonctions
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        $user = auth()->user();
        if ($user->fonction->nameFon != 'ADMINISTRATEUR') {
            abort(401);
        }
        $this->fonction = Fonction::where('etat', 1)->get();
        return view('livewire.fonction.fonction-livewire');
    }
}
