<?php

namespace App\Livewire;

use Illuminate\Support\Facades\File;
use Livewire\Component;

class FileList extends Component
{
    public $files = [];
    public $showPreview = false;
    public $fileToPreview = null;



    public function mount()
    {
        $this->loadFiles();
    }

    public function loadFiles()
    {
        $directory = storage_path('files'); // Exemplo de diretório
        $this->files = collect(File::files($directory))->map(function ($file) {
            return [
                'name' => $file->getFilename(),
                'type' => $file->getExtension(),
                'path' => asset('storage/' . $file->getFilename()) // caminho público para o arquivo
            ];
        });
    }

    public function previewFile($filePath)
    {
        $this->fileToPreview = $filePath;
        $this->showPreview = true;
    }

    public function closePreview()
    {
        $this->showPreview = false;
        $this->fileToPreview = null;
    }

    public function render()
    {
        $this->loadFiles();
        return view('livewire.file-list');
    }
}
