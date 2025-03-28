<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Web Agency</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white">
    <div class=" h-screen">
        <!-- Sidebar -->
       <div class="flex h-screen ">
    @livewire('side')
    
    <main id="main-content" class=" flex-1 ml-64 bg-white my-6" >
      <div class="w-[94%] m-auto rounded-sm bg-[#003366]">        
        <h1 class="text-2xl font-semibold mb-1 text-white p-2">Votre compte</h1>
        <hr class="text-gray-200" >
    </div>
<section class="py-5 flex justify-center" >
  <div class="w-[70%]  ">

      <div class="  ">
        <form method="POST" action="{{ route('compte.update') }}">
          @csrf
          @method('PUT')

          <h6 class="text-[#003366] text-lg font-bold mb-3">Informations sur l'utilisateur</h6>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label class="block text-gray-600 text-sm font-bold mb-2">Nom</label>
              <input type="text" name="nom" value="{{ old('nom', $user->nom) }}" class="border-1 border-[#003366] px-3 py-2 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow shadow-[#0033661a] focus:outline-none focus:ring w-full">
          </div>
          <div>
              <label class="block text-gray-600 text-sm font-bold mb-2">Prénom</label>
              <input type="text" name="prenom" value="{{ old('prenom', $user->prenom) }}" class="border-1 border-[#003366] px-3 py-2 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow shadow-[#0033661a] focus:outline-none focus:ring w-full">
          </div>
          <div>
              <label class="block text-gray-600 text-sm font-bold mb-2">Username</label>
              <input type="text" name="username" value="{{ old('username', $user->username) }}" class="border-1 border-[#003366] px-3 py-2 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow shadow-[#0033661a] focus:outline-none focus:ring w-full">
          </div>
          <div>
              <label class="block text-gray-600 text-sm font-bold mb-2">E-mail</label>
              <input type="email" name="email" value="{{ old('email', $user->email) }}" class="border-1 border-[#003366] px-3 py-2 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow shadow-[#0033661a] focus:outline-none focus:ring w-full">
          </div>
          
          </div>

          <hr class="my-3 border-gray-300 ">

          <h6 class="text-[#003366] text-lg font-bold mb-6">Changer le mot de passe</h6>
          <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
              <label class="block text-gray-600 text-sm font-bold mb-2">Mot de passe actuel</label>
              <input type="password" name="current_password" class="border-1 border-[#003366] px-3 py-2 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow shadow-[#0033661a] focus:outline-none focus:ring w-full">
          </div>
          
          <div>
              <label class="block text-gray-600 text-sm font-bold mb-2">Nouveau mot de passe</label>
              <input type="password" name="new_password" class="border-1 border-[#003366] px-3 py-2 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow shadow-[#0033661a] focus:outline-none focus:ring w-full">
          </div>
          
          <div>
              <label class="block text-gray-600 text-sm font-bold mb-2">Confirmer le mot de passe</label>
              <input type="password" name="new_password_confirmation" class="border-1 border-[#003366] px-3 py-2 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow shadow-[#0033661a] focus:outline-none focus:ring w-full">
          </div>
          
          </div>
          <br>
          <hr class="my-3 border-gray-300">
       
<!-- عرض الرسائل في حالة النجاح أو الخطأ -->
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


          <div class="flex justify-end mt-6">
            <button type="submit" class="bg-[#003366] text-white font-bold px-4 py-2 rounded shadow hover:bg-[#007BFF] transition cursor-pointer">
              Enregistrer
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
    </main>
       </div>
    </div>

</body>
</html>
