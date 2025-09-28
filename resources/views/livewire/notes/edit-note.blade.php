<?php

use App\Models\Note;
use Livewire\Volt\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.app')] class extends Component {
    //sort of setting state
    public Note $note;

    public function mount(Note $note)
    {
        $this->authorize('update', $note);
        $this->fill($note);    //autofill relevant feilds for edit
    }
}; ?>

<div class="space-y-2">
    <p>{{ $note->title }}</p>
    <p>{{ $note->id }}</p>
</div>