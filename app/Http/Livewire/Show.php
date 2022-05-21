<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Show extends Component
{
    use WithFileUploads;

    public $users;
    public $messages = '';
    public $bennar;
    public $message;
    public $file;
    public $not_seen;

    public function render()
    {
        return view('livewire.show', [
            'users' => $this->users,
            'messages' => $this->messages,
            'bennar' => $this->bennar
        ]);
    }

    public function mountComponent() {

            $this->messages = \App\Models\Message::where('bennar_id', $this->bennar)
                                                    ->orderBy('id', 'ASC')
                                                    ->get();

        $not_seen = \App\Models\Message::where('bennar_id', $this->bennar);
        $not_seen->update(['is_seen' => true]);
    }

    public function mount()
    {
        return $this->mountComponent();
    }

    public function SendMessage() {
        $new_message = new \App\Models\Message();
        $new_message->message = $this->message;
        $new_message->user_id = auth()->id();
        $new_message->bennar_id = $this->bennar;

        // Deal with the file if uploaded
        if ($this->file) {
            $uploaded = $this->uploadFile();
            $new_message->file = $uploaded[0];
            $new_message->file_name = $uploaded[1];
        }
        
        $new_message->save();
        // Clear the message after it's sent
        $this->reset('message');
        $this->file = '';
    }

    public function resetFile() 
    {
        $this->reset('file');
    }

    public function uploadFile() {
        $file = $this->file->store('public/files');
        $path = url(Storage::url($file));
        $file_name = $this->file->getClientOriginalName();
        return [$path, $file_name];
    }

}
