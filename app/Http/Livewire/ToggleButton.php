<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class ToggleButton extends Component

{
    public User $user;

    public $field;

    public  $is_admin;

    public function mount()
    {
        $this->is_admin = $this->user->getAttribute($this->field);
    }

    public function updating($field, $value)
    {
        $this->user->setAttribute($this->field,$value)->save();

    }

    public function render()
    {
        return view('livewire.toggle-button');
    }
}
