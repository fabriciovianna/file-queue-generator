<div wire:poll.5000ms>
    <h2 class="text-lg font-bold mb-4">Lista de Arquivos</h2>
    <table class="table-auto w-full">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2">Nome do Arquivo</th>
                <th class="px-4 py-2">Tipo</th>
                <th class="px-4 py-2">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($files as $file)
                <tr>
                    <td class="border px-4 py-2">{{ $file['name'] }}</td>
                    <td class="border px-4 py-2">{{ $file['type'] }}</td>
                    <td class="border px-4 py-2">
                        <!-- Opção de preview -->
                        <button wire:click="previewFile('{{ $file['path'] }}')" class="text-blue-500 hover:underline">
                            Preview
                        </button>

                        <!-- Opção de download -->
                        <a href="{{ $file['path'] }}" download class="ml-4 text-green-500 hover:underline">Download</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal de preview -->
    @if ($showPreview)
        <div class="fixed inset-0 bg-gray-600 bg-opacity-75 flex justify-center items-center z-50">
            <div class="bg-white rounded-lg p-4 max-w-4xl w-full">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold">Preview do Arquivo</h3>
                    <button wire:click="closePreview" class="text-red-500">Fechar</button>
                </div>
                <iframe src="{{ $fileToPreview }}" class="w-full h-96"></iframe>
            </div>
        </div>
    @endif
</div>
