<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>


    <div class="min-h-screen bg-[#FAFAFA] flex flex-col justify-center py-12 sm:px-6 lg:px-8 ">
        <div class="sm:mx-auto w-full md:w-[40%] m-auto sm:max-w-md">
          <div
            class="bg-white py-8 px-4 shadow-lg sm:rounded-lg sm:px-10">
            <!-- Header -->
            <div class="text-center mb-8">
              <h2 class="text-4xl md:text-3xl font-bold text-[#003366]">
                Bienvenue           </h2>
            </div>
    
            <form class="space-y-6" method="POST" action="{{ route('admin.login.submit') }}">
                @csrf
                <!-- Email -->
                <div>
                  <label class="block text-sm font-medium text-gray-700" for="email">E-mail / Username</label>
                  <input
                    type="text"
                    id="email"
                    name="email"
                    class="mt-1 block w-full px-3 py-1.5 border border-gray-300 rounded-lg focus:border-[#003366] outline-none focus:border-2 "
                    required
                  />

                  @error('email')
            <div class="text-red-600 text-sm">{{ $message }}</div>
        @enderror
                </div>
              
                <!-- Password -->
                <div>
                  <label class="block text-sm font-medium text-gray-700" for="password">Mot de passe</label>
                  <div class="mt-1 relative">
                    <input
                      type="password"
                      id="password"
                      name="password"
                      class="block w-full px-3 py-1.5 border border-gray-300 rounded-lg focus:border-[#003366] outline-none focus:border-2 pr-10"
                      required
                    />
                    <button type="button" onclick="togglePassword()" class="cursor-pointer absolute inset-y-0 right-3 flex items-center">
                      <svg id="eyeIcon" class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z" />
                      </svg>
                    </button>
                  </div>
                  
                </div>
              
                <button
                  type="submit"
                  class="w-full flex justify-center py-2 px-4 sm:py-3 border border-transparent rounded-lg shadow-sm sm:text-base font-semibold text-white bg-[#003366] hover:bg-blue-500 focus:outline-none focus:bg-blue-500 cursor-pointer"
                >
                  <span>Se connecter</span>
                </button>
              </form>
              
          </div>
        </div>
      </div>
      <script>
         function togglePassword() {
    const passwordInput = document.getElementById("password");
    const eyeIcon = document.getElementById("eyeIcon");

    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      eyeIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z" />
      <line x1="4" y1="4" x2="20" y2="20" stroke="currentColor" stroke-width="2"/>`; // إضافة خط للإشارة إلى إخفاء كلمة المرور
    } else {
      passwordInput.type = "password";
      eyeIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z" />`;
    }
  }
      </script>
</body>
</html>