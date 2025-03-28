<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Web Agency</title>

  
  @livewireStyles

</head>
<body>
  <div class=" h-screen">
    <!-- Sidebar -->
   <div class="flex h-screen ">
@livewire('side')

<main id="main-content" class=" flex-1 ml-64 bg-white my-6">
  <!-- component -->
  <div class="w-[94%] m-auto rounded-sm bg-[#003366]">        
    <h1 class="text-2xl font-semibold mb-1  text-white p-2">Ajouter utilisateur</h1>
    <hr class="text-gray-200" >
</div>
  <div class="flex flex-col  rounded-lg"  >
      
  
      <div class=" pt-9  flex flex-col  w-[65%] m-auto" >
      <form action="{{ route('save-user') }}" method="POST">
  @csrf
  <!-- Nom & Prénom -->
  <div class="flex -mx-3 md:flex mb-2 ">
      <div class="md:w-1/2 px-2 mb-4 md:mb-0">
          <label class="block tracking-wide text-gray-600 text-sm font-bold mb-2" for="grid-first-name">
              Nom
          </label>
          <input name="nom" class="shadow shadow-[#0033661a] appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-2 px-3 mb-2 text-sm" id="grid-first-name" type="text" required>
      </div>
      <div class="md:w-1/2 px-2">
          <label class="block tracking-wide text-gray-600 text-sm font-bold mb-2" for="grid-last-name">
              Prénom 
          </label>
          <input name="prenom" class="shadow shadow-[#0033661a] appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-2 px-3 text-sm" id="grid-last-name" type="text" required>
      </div>
  </div>

  <!-- Mot de passe & Confirmer mot de passe -->
  <div class="flex -mx-3 md:flex mb-2">
      <div class="md:w-1/2 px-2 mb-4 md:mb-0">
          <label class="block tracking-wide text-gray-600 text-sm font-bold mb-2" for="grid-password">
              Mot de passe
          </label>
          <input name="password" class="shadow shadow-[#0033661a] appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-2 px-3 text-sm mb-2" id="grid-password" type="password" required>
      </div>
      <div class="md:w-1/2 px-2">
          <label class="block tracking-wide text-gray-600 text-sm font-bold mb-2" for="grid-confirm-password">
              Confirmer mot de passe
          </label>
          <input name="password_confirmation" class="shadow shadow-[#0033661a] appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-2 px-3 text-sm mb-2" id="grid-confirm-password" type="password" required>
      </div>
  </div>

  <!-- Email & Nom d'utilisateur -->
  <div class="flex -mx-3 md:flex mb-4">
      <div class="md:w-1/2 px-2">
          <label class="block tracking-wide text-gray-600 text-sm font-bold mb-2" for="email">
              E-mail
          </label>
          <input name="email" type="email" class="shadow shadow-[#0033661a] appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-2 px-3 text-sm" required>
      </div>
      <div class="md:w-1/2 px-2">
          <label class="block tracking-wide text-gray-600 text-sm font-bold mb-2" for="username">
              Username
          </label>
          <input name="username" type="text" class="shadow shadow-[#0033661a] appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-2 px-3 text-sm" >
      </div>
  </div>

  <div class="flex -mx-3 md:flex mb-4 items-center justify-between">
  <div class="md:w-1/3 px-2">
    <label class="block tracking-wide text-gray-600 text-sm font-bold mb-2" for="role-select">
        Role
    </label>
    <div class="relative md:w-1/2">
        <select name="role" class="shadow shadow-[#0033661a] appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-2 px-3 text-sm pr-10" id="role-select">
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select>
        <!-- أيقونة السهم -->
        <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none ">
            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </div>
    </div>
</div>


      <button type="submit" class="cursor-pointer font-bold bg-[#003366] text-white px-4 py-2 rounded text-sm hover:bg-blue-600 focus:outline-none md:w-1/6 mt-8 mr-20">
          Ajouter
      </button>
</div>


@if(session('success'))
    <div class="bg-green-500 text-center mb-4 text-white p-3 ">
      {{ session('success') }}
    </div>
@endif
@if ($errors->any())
    <div class="bg-red-500 text-center mb-4 text-white p-3">
@foreach ($errors->all() as $error)
    <p>{{ $error }}</p>
@endforeach
</div>
@endif
</form>
  </div>
  
      </div>
  </div>
  </main>
</div>
</div>
  
</body>
</html>