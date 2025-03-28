<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web Agency</title>
</head>
<body>
    <div class="h-screen">
        <!-- Sidebar -->
        <div class="flex h-screen">
            @livewire('side')
            <main id="main-content" class="flex-1 ml-64 bg-white my-6">
                <div class="w-[94%] m-auto rounded-sm bg-[#003366]">        
                    <h1 class="text-2xl font-semibold mb-1 text-white p-2">L'historique de connexion</h1>
                    <hr class="text-gray-200" >
</div>               
         <!-- Add overflow-hidden here -->
         <div class="container mx-auto w-[70%] py-12">                    
            <!-- User Table -->
            <div class="bg-white rounded-lg shadow relative overflow-x-auto scrollable">
                <div class="scrollable overflow-y-auto max-h-[400px]"> <!-- Apply the class here -->             
                    <table class="w-full table-auto">
                        <thead class="sticky top-0 bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <tr>
                                <th class="py-3 px-4 text-left whitespace-nowrap">Nom</th>
                                <th class="py-3 px-4 text-left whitespace-nowrap">Prénom</th>
                                <th class="py-3 px-4 text-center whitespace-nowrap">Role</th>
                                <th class="py-3 px-4 text-center whitespace-nowrap">Historique</th>
                            </tr>
                        </thead>

                        <tbody class="text-gray-600 text-sm">
                            @if($admins->count() > 0)
                            @foreach ($admins as $admin)
                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        <td class="py-3 px-4 text-left whitespace-nowrap">{{ $admin->nom }}</td>
                                        <td class="py-3 px-4 text-left whitespace-nowrap">{{ $admin->prenom }}</td>
                                        <td class="py-3 px-4 text-center whitespace-nowrap">{{ $admin->role }}</td>
                                        <td class="py-3 px-4 text-center whitespace-nowrap">{{ $admin->last_login_at }}</td>
                                    </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="3" class="text-center py-4 text-gray-500">
                                        Aucun historique
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="py-1 px-4">
            <nav class="flex items-center justify-center space-x-1">
                {{-- Previous Button --}}
                @if ($admins->onFirstPage())
                    <button type="button" class="p-2.5 inline-flex items-center gap-x-2 text-sm rounded-full text-gray-800 cursor-not-allowed opacity-50">
                        <span aria-hidden="true">«</span>
                        <span class="sr-only">Previous</span>
                    </button>
                @else
                    <a href="{{ $admins->previousPageUrl() }}">
                        <button type="button" class="cursor-pointer p-2.5 inline-flex items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-100">
                            <span aria-hidden="true">«</span>
                            <span class="sr-only">Previous</span>
                        </button>
                    </a>
                @endif
        
                {{-- Page Numbers --}}
                @foreach (range(1, $admins->lastPage()) as $page)
                    @if ($page == $admins->currentPage())
                        <button type="button" class="min-w-[40px] flex justify-center items-center text-gray-800 py-2.5 text-sm rounded-full bg-gray-100">
                            {{ $page }}
                        </button>
                    @else
                        <a href="{{$admins->url($page) }}">
                            <button type="button" class="cursor-pointer min-w-[40px] flex justify-center items-center text-gray-800 hover:bg-gray-100 py-2.5 text-sm rounded-full">
                                {{ $page }}
                            </button>
                        </a>
                    @endif
                @endforeach
        
                {{-- Next Button --}}
                @if ($admins->hasMorePages())
                    <a href="{{ $admins->nextPageUrl() }}">
                        <button type="button" class="cursor-pointer p-2.5 inline-flex items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-100">
                            <span aria-hidden="true">»</span>
                            <span class="sr-only">Next</span>
                        </button>
                    </a>
                @else
                    <button type="button" class="p-2.5 inline-flex items-center gap-x-2 text-sm rounded-full text-gray-800 cursor-not-allowed opacity-50">
                        <span aria-hidden="true">»</span>
                        <span class="sr-only">Next</span>
                    </button>
                @endif
            </nav>
        </div>
    </main>
</div>
</div>


                        