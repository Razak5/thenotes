<?php

use Illuminate\Foundation\Auth\User;
use Livewire\Volt\Component;



new class extends Component {
    public $noteTitle;
    public $noteBody;
    public $noteRecipient;
    public $noteSendDate;

    public function submit()
    {

        $this->validate([
            'noteTitle' => ['required', 'string', 'min:5'],
            'noteBody' => ['required', 'string', 'min:20'],
            'noteRecipient' => ['required', 'email'],
            'noteSendDate' => ['required', 'date'],
        ]);
        auth()->user()->notes()->create([
            'title' => $this->noteTitle,
            'body' => $this->noteBody,
            'recipient' => $this->noteRecipient,
            'send_date' => $this->noteSendDate,
            'is_published' => false,
        ]);

        $this->redirect(route('notes.index'));
        // dd($this->noteTitle, $this->noteBody, $this->noteRecipient, $this->noteSendDate);
    }
}; ?>

<div>
    <form wire:submit.prevent="submit" class="space-y-4">
        <x-input wire:model="noteTitle" label="NoteTitle" placeholder="heres a note to me." />
        <x-textarea wire:model="noteBody" label="NoteBody" placeholder="type your note here" />
        <x-input icon="user" wire:model="noteRecipient" label="Recipient" placeholder="you@mail.com" type="email" />
        <x-input icon="calendar" wire:model="noteSendDate" type="date" label="send Date" />
        <div class="pt-4">
            <x-button type="submit" primary right-icon="calendar" spinner>schedule Note</x-button>

        </div>

        <x-errors />
    </form>

</div>