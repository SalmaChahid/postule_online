<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
<title>Web Agency</title>
</head>
<body>
    <div class="h-screen">
        <!-- Sidebar -->
        <div class="flex h-screen">
            @livewire('side')
    
            <main id="main-content" class="flex-1 ml-64 bg-white overflow-hidden my-6">
                <div class="w-[94%] m-auto rounded-sm bg-[#003366]">        
                    <h1 class="text-2xl font-semibold mb-1 text-white p-2">les demandes de {{ucfirst(strtolower($selectedFonction))}}</h1>
                    <hr class="text-gray-200" >
                </div>
               <div class="container mx-auto w-[94%] pt-12 pb-4">                    
                    <!-- User Table -->
                    <div class="bg-white rounded-lg shadow relative overflow-x-auto scrollable">
                        <div class="scrollable overflow-y-auto max-h-[400px]"> <!-- Apply the class here -->
                            <table class="w-full table-auto">
                                <thead class="sticky top-0 bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <tr>
                                        <th class="py-3 px-4 w-1/6 text-center whitespace-nowrap">Nom et Prénom</th>
                                        <th class="py-3 px-4 w-1/6 text-center whitespace-nowrap">Téléphone</th>
                                        <th class="py-3 px-4 w-1/6 text-center whitespace-nowrap">Ville</th>
                                        <th class="py-3 px-4 w-1/12 text-center whitespace-nowrap">E-mail</th>
                                        <th class="py-3 px-4 w-1/6 text-center whitespace-nowrap">Date</th>
                                        <th class="py-3 px-4 w-1/12 text-center whitespace-nowrap">Offre d'emploi</th>
                                        <th class="py-3 px-4 w-1/12 text-center whitespace-nowrap">Fonction</th>
                                        <th class="py-3 px-4 w-1/12 text-center whitespace-nowrap">Type Fonction</th>
                                        <th class="py-3 px-4 w-1/12 text-center whitespace-nowrap">Niveau</th>
                                        <th class="py-3 px-4 w-1/12 text-center whitespace-nowrap">Type de Pièce</th>
                                        <th class="py-3 px-4 w-1/12 text-center whitespace-nowrap">Numéro de Pièce</th>
                                        <th class="py-3 px-4 w-1/12 text-center whitespace-nowrap">CV</th>
                                        <th class="py-3 px-4 w-1/12 text-center whitespace-nowrap">Message</th>
                                        <th class="py-3 px-4 w-1/12 text-center whitespace-nowrap">Actions</th>
                                    </tr>
                                </thead>
    
                                <tbody class="text-gray-600 text-sm">
                                    @if($candidates->count() > 0)
                                    @foreach($candidates as $candidate)
                                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                                            <td class="py-3 px-4 text-center whitespace-nowrap">{{ $candidate->nom }} {{ $candidate->prenom  }}</td>
                                            <td class="py-3 px-4 text-center whitespace-nowrap">{{ $candidate->tel }}</td>
                                            <td class="py-3 px-4 text-center whitespace-nowrap">{{ $candidate->ville }}</td>
                                            <td class="py-3 px-4 text-center whitespace-nowrap">{{ $candidate->email }}</td>
                                            <td class="py-3 px-4 text-center whitespace-nowrap">{{ $candidate->created_at }}</td>
                                            <td class="py-3 px-4 text-center whitespace-nowrap">{{ $candidate->offre_d_emploi }}</td>
                                            <td class="py-3 px-4 text-center whitespace-nowrap">{{ $candidate->fonction }}</td>
                                            <td class="py-3 px-4 text-center whitespace-nowrap">{{ $candidate->type_de_fonction}}</td>
                                            <td class="py-3 px-4 text-center whitespace-nowrap">{{ $candidate->niveau_d_étude}}</td>
                                            <td class="py-3 px-4 text-center whitespace-nowrap">{{ $candidate->type_piece }}</td>
                                            <td class="py-3 px-4 text-center whitespace-nowrap">{{ $candidate->num_piece }}</td>
                                            <td class="py-3 px-4 text-center whitespace-nowrap">
                                                <a href="{{ asset('storage/' . $candidate->cv) }}" class="text-blue-500 hover:underline" target="_blank">Voir CV</a>
                                            </td>
                                            <td class="py-3 px-4 text-center whitespace-nowrap">
                                                <div id="message-{{ $candidate->id }}" class="truncate">
                                                    {{ Str::limit($candidate->message, 30) }}
                                                    @if (strlen($candidate->message) > 30)
                                                        <a href="javascript:void(0);" onclick="toggleMessage({{ $candidate->id }})" class="text-green-500 hover:underline"> Plus</a>
                                                    @endif
                                                </div>
                                                <div id="full-message-{{ $candidate->id }}" style="display:none;">
                                                    <div class="message-overlay">
                                                        <div class="message-box">
                                                            <h2 class="message-title">Message de motivation</h2>
                                                            <p class="message-text">{{ $candidate->message }}</p>
                                                            <button onclick="toggleMessage({{ $candidate->id }})" class="close-button">Fermer</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="py-3 px-4 text-center whitespace-nowrap">
                                                <div class="flex items-center justify-center space-x-2">
                                                    @can('isAdmin')

                                                    <!-- نموذج قبول أو رفض -->
                                                    <form action="{{ route('update.candidat', $candidate->id) }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="action" value="accept">
                                                        <button type="submit" class="px-2 py-1 cursor-pointer bg-green-500 text-white rounded hover:bg-green-600 focus:outline-none">
                                                            Accepter
                                                        </button>
                                                    </form>
                                                
                                                    <form action="{{ route('update.candidat', $candidate->id) }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="action" value="reject">
                                                        <button type="submit" class="px-2 py-1 cursor-pointer bg-gray-500 text-white rounded hover:bg-gray-600 focus:outline-none">
                                                            Refuser
                                                        </button>
                                                    </form>
                                                
                                                    <!-- نموذج حذف -->
                                                    <form action="{{ route('delete.candidat', $candidate->id) }}" id="delete-form-{{ $candidate->id }}" class="delete-form" method="POST">
                                                        @csrf
                                                        @method('DELETE') <!-- تستخدم لتحديد أن هذه عملية حذف -->
                                                        <button data-id="{{ $candidate->id }}" type="submit" class=" delete px-2 py-1 cursor-pointer bg-red-600 text-white rounded hover:bg-red-700 focus:outline-none">
                                                            Supprimer
                                                        </button>
                                                    </form>
                                                    @else
                                                    <form action="" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="action" value="accept">
                                                        <button type="submit" class="pointer-events-none opacity-50 cursor-not-allowed disabled px-2 py-1  bg-green-500 text-white rounded hover:bg-green-600 focus:outline-none">
                                                            Accepter
                                                        </button>
                                                    </form>
                                                
                                                    <form action="" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="action" value="reject">
                                                        <button  class="pointer-events-none opacity-50 cursor-not-allowed disabled px-2 py-1  bg-gray-500 text-white rounded hover:bg-gray-600 focus:outline-none">
                                                            Refuser
                                                        </button>
                                                    </form>
                                                
                                                    <!-- نموذج حذف -->
                                                    <form action="" id="delete-form-{{ $candidate->id }}" class="delete-form" method="POST">
                                                        @csrf
                                                        <button data-id="{{ $candidate->id }}"  class="pointer-events-none opacity-50 cursor-not-allowed disabled delete px-2 py-1 bg-red-600 text-white rounded hover:bg-red-700 focus:outline-none">
                                                            Supprimer
                                                        </button>
                                                    </form>
                                                    @endcan
                                                </div>
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="10" class="text-center py-4 text-gray-500">
                                            Aucun candidat
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div>
    
                        <!-- Pagination -->
                        <div class="py-1 px-4">
                            <nav class="flex items-center justify-center space-x-1">
                                {{-- Previous Button --}}
                                @if ($candidates->onFirstPage())
                                    <button type="button" class="p-2.5 inline-flex items-center gap-x-2 text-sm rounded-full text-gray-800 cursor-not-allowed opacity-50">
                                        <span aria-hidden="true">«</span>
                                        <span class="sr-only">Previous</span>
                                    </button>
                                @else
                                    <a href="{{ $candidates->previousPageUrl() }}">
                                        <button type="button" class="cursor-pointer p-2.5 inline-flex items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-100">
                                            <span aria-hidden="true">«</span>
                                            <span class="sr-only">Previous</span>
                                        </button>
                                    </a>
                                @endif
                        
                                {{-- Page Numbers --}}
                                @foreach (range(1, $candidates->lastPage()) as $page)
                                    @if ($page == $candidates->currentPage())
                                        <button type="button" class="min-w-[40px] flex justify-center items-center text-gray-800 py-2.5 text-sm rounded-full bg-gray-100">
                                            {{ $page }}
                                        </button>
                                    @else
                                        <a href="{{$candidates->url($page) }}">
                                            <button type="button" class="cursor-pointer min-w-[40px] flex justify-center items-center text-gray-800 hover:bg-gray-100 py-2.5 text-sm rounded-full">
                                                {{ $page }}
                                            </button>
                                        </a>
                                    @endif
                                @endforeach
                        
                                {{-- Next Button --}}
                                @if ($candidates->hasMorePages())
                                    <a href="{{ $candidates->nextPageUrl() }}">
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



    <script>
        function toggleMessage(candidateId) {
            var fullMessage = document.getElementById('full-message-' + candidateId);
            var messageDiv = document.getElementById('message-' + candidateId);
            
            if (fullMessage.style.display === 'none') {
                fullMessage.style.display = 'block';
                messageDiv.style.display = 'none';
                document.body.style.overflow = 'hidden'; // منع التمرير
            } else {
                fullMessage.style.display = 'none';
                messageDiv.style.display = 'block';
                document.body.style.overflow = 'auto'; // إعادة التمرير
            }
        }
    </script>
</body>
</html>
