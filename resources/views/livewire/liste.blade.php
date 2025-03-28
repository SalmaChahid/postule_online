<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Web Agency</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class=" h-screen">
        <!-- Sidebar -->
        <div class="flex h-screen ">
            @livewire('side')
            <main id="main-content" class=" flex-1 ml-64 bg-white my-6">
                <div class="w-[94%] m-auto rounded-sm bg-[#003366]">        
                    <h1 class="text-2xl font-semibold mb-1 text-white p-2">Les utilisateurs</h1>
                    <hr class="text-gray-200" >
                </div>
                <div class="container mx-auto w-[94%]  py-3 ">
                    <!-- Search and Add User (Static) -->
                    <div class="relative h-13">
                        @can('isAdmin')
                        <a href="{{ route('ajouter') }}">
                            <button class="absolute right-0 top-0 bg-[#003366] active:hover:bg-blue-700 text-white font-semibold cursor-pointer px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300">
                                Ajouter membre
                            </button>
                        </a>
                        @else
                        <a href="#">
                            <button class="absolute right-0 top-0 bg-[#003366] active:hover:bg-blue-700 text-white font-semibold pointer-events-none opacity-50 cursor-not-allowed disabled px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300">
                                Ajouter membre
                            </button>
                        </a>
                        @endcan
                    </div>

                    <!-- User Table -->
                    <div class="overflow-x-auto bg-white rounded-lg shadow">
                        <table class="w-full table-auto">
                            <thead>
                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Nom</th>
                                    <th class="py-3 px-6 text-left">Prénom</th>
                                    <th class="py-3 px-6 text-left">E-mail</th>
                                    <th class="py-3 px-6 text-left">Role</th>
                                    <th class="py-3 px-6 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm">
                                @if($admins->count() > 0)

                                @foreach($admins as $admin)
                                    <tr class="border-b border-gray-200 hover:bg-gray-100" data-id="{{ $admin->id }}">
                                        <td class="py-3 px-6">
                                            <span class="text-data">{{ $admin->nom }}</span>
                                            <input type="text" class="edit-input hidden w-full border p-1" data-field="nom" value="{{ $admin->nom }}">
                                        </td>
                                        <td class="py-3 px-6">
                                            <span class="text-data">{{ $admin->prenom }}</span>
                                            <input type="text" class="edit-input hidden w-full border p-1" data-field="prenom" value="{{ $admin->prenom }}">
                                        </td>
                                        <td class="py-3 px-6">
                                            <span class="text-data">{{ $admin->email }}</span>
                                            <input type="email" class="edit-input hidden w-full border p-1" data-field="email" value="{{ $admin->email }}">
                                        </td>
                                        <td class="py-3 px-6">
                                            <span class="text-data">{{ $admin->role }}</span>
                                            <select class="edit-input hidden w-full border p-1" data-field="role">
                                                <option value="admin" {{ $admin->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                                <option value="user" {{ $admin->role == 'user' ? 'selected' : '' }}>User</option>
                                            </select>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <div class="flex items-center justify-center">
                                                @can('isAdmin')
                                                <button class="edit-btn w-4.5 mr-2  text-green-500 transform hover:scale-110 cursor-pointer">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                    </svg>
                                                </button>
                                                <form action="{{ route('admin.update', $admin->id) }}" method="POST" class="save-form hidden">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="save-btn w-5 mr-2 transform text-green-500 hover:scale-110 cursor-pointer">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </button>
                                                </form>

                                                <button class="cancel-btn w-4.5 mr-2 hidden transform text-red-500 hover:scale-110 cursor-pointer">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>

                                                <form id="delete-form-{{ $admin->id }}" action="{{ route('admin.delete', $admin->id) }}" method="POST" class="delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button data-id="{{ $admin->id }}" type="submit" class="delete-btn w-4.5 mr-2 transform text-red-500 hover:scale-110 cursor-pointer">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                </form>
                                                @else
                                                <button class="edit-btn w-4.5 mr-2 transform text-green-500 hover:scale-110 pointer-events-none opacity-50 cursor-not-allowed disabled">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                    </svg>
                                                </button>
                                                    <button  class="delete-btn w-4.5 mr-2 transform text-red-500 hover:scale-110 pointer-events-none opacity-50 cursor-not-allowed disabled">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="10" class="text-center py-4 text-gray-500">
                                        Aucun utilisateur
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination -->
                    <div class="py-1 px-4">
                        <nav class="flex items-center justify-center mt-2 space-x-1">
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
                                    <a href="{{ $admins->url($page) }}">
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
    <script>
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function() {
                let row = this.closest('tr');
                row.querySelectorAll('.text-data').forEach(span => span.classList.add('hidden'));
                row.querySelectorAll('.edit-input').forEach(input => input.classList.remove('hidden'));
    
                row.querySelector('.edit-btn').classList.add('hidden');
                row.querySelector('.save-form').classList.remove('hidden');
                row.querySelector('.cancel-btn').classList.remove('hidden');
                row.querySelector('.delete-btn').classList.add('hidden');
            });
        });
    
        document.querySelectorAll('.cancel-btn').forEach(button => {
            button.addEventListener('click', function() {
                let row = this.closest('tr');
                row.querySelectorAll('.text-data').forEach(span => span.classList.remove('hidden'));
                row.querySelectorAll('.edit-input').forEach(input => input.classList.add('hidden'));
    
                row.querySelector('.edit-btn').classList.remove('hidden');
                row.querySelector('.save-form').classList.add('hidden');
                row.querySelector('.cancel-btn').classList.add('hidden');
                row.querySelector('.delete-btn').classList.remove('hidden');
            });
        });
    
        document.querySelectorAll('.save-form').forEach(form => {
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                let row = this.closest('tr');
                let id = row.getAttribute('data-id');
                let data = {};
    
                row.querySelectorAll('.edit-input').forEach(input => {
                    data[input.getAttribute('data-field')] = input.value;
                });
    
                // إرسال التحديثات إلى الخادم باستخدام PUT
                fetch(`/admin/update/${id}`, {
                    method: 'POST', // نستخدم POST مع _method=PUT
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify(data)
                }).then(response => response.json())
                  .then(result => {
                      if (result.success) {
                          // تحديث الجدول بالبيانات الجديدة
                          row.querySelectorAll('.text-data').forEach(span => {
                              const field = span.getAttribute('data-field');
                              span.textContent = data[field];
                          });
    
                          // إخفاء المدخلات وإظهار البيانات الجديدة
                          row.querySelectorAll('.edit-input').forEach(input => input.classList.add('hidden'));
                          row.querySelectorAll('.text-data').forEach(span => span.classList.remove('hidden'));
    
                          row.querySelector('.edit-btn').classList.remove('hidden');
                          row.querySelector('.save-form').classList.add('hidden');
                          row.querySelector('.cancel-btn').classList.add('hidden');
                          row.querySelector('.delete-btn').classList.remove('hidden');
    
                          // إعادة توجيه إلى نفس الصفحة بعد التحديث
                          window.location.reload();
                      } else {
                          // في حال حدوث خطأ
                          alert('فشل التحديث');
                      }
                  });
            });
        });
    
    
    
    
    
    </script>
</body>
</html>
