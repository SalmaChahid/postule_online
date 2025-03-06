<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-[#FAFAFA]">
    <!-- Navbar -->
    <header class="body-font bg-[#003366]">
        <div class="container mx-auto flex flex-wrap px-8 py-4 flex-col md:flex-row items-center">
            <h1 class="flex title-font items-center text-[#f1f1f1] md:mb-0 text-3xl font-extrabold ml-3">
                Job Web Agency
            </h1>
        </div>
    </header>

    <!-- Section 1 -->
    <div class="py-12 sm:py-16 lg:py-20 mt-10">
        <div class="mx-auto max-w-5xl px-6 md:px-10">
            <div class="grid gap-6 md:grid-cols-2">
                <div>
                    <div class="h-72  md:h-80">
                        <img src="{{ asset('img/Faire_le_vide_en_soi.jpg') }}" loading="lazy"
                            class="h-full object-cover object-center w-[90%]" />
                    </div>
                </div>

                <div class="md:pt-8">
                    <h1 class="mb-6 text-center text-3xl font-extrabold text-gray-900 md:text-left">
                        Titre
                    </h1>
                    <p class="text-gray-700 leading-relaxed">
                        Vous pouvez soumettre votre candidature pour toute opportunité disponible
                        au sein de notre entreprise en remplissant le formulaire.
                        Chaque demande sera examinée avec attention.
                    </p>
                    <button onclick="document.getElementById('form').scrollIntoView({ behavior: 'smooth' });"
                        class="py-1.5 px-4 transition-colors bg-[#003366]  active:hover:bg-[#0055A4] font-medium  text-white rounded-lg hover:bg-[#0055A4] disabled:opacity-50 cursor-pointer mt-2.5">
                        Créer votre demande
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Form -->
    <div class="max-w-4xl mx-auto  p-10 mt-12" id="form">
        <!-- <h1 class="text-2xl font-extrabold mb-8 text-center text-gray-900">Votre Demande</h1> -->

        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid md:grid-cols-2 lg:gap-50 gap-8 justify-center">
                <!-- Informations Personnelles -->
                <div>
                    <h2 class="text-xl font-semibold mb-6 text-gray-800">Informations Personnelles</h2>

                    <div class="space-y-4">
                        <div>
                            <label for="nom" class="text-sm block font-medium text-gray-800 mb-2">Nom</label>
                            <input type="text" name="nom" id="nom" required
                                class="w-full  rounded-lg border-gray-300 shadow-sm focus:border-blue-500  py-1 px-3">
                        </div>

                        <div>
                            <label for="prenom" class="block font-medium text-gray-800 mb-2 text-sm">Prénom</label>
                            <input type="text" name="prenom" id="prenom" required
                                class="w-full  rounded-lg border-gray-300 shadow-sm focus:border-blue-500 py-1 px-3">
                        </div>

                        <div>
                            <label for="tel" class="block font-medium text-gray-800 mb-2 text-sm">Téléphone</label>
                            <input type="tel" name="tel" id="tel" required
                                class="w-full  rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring py-1 px-3">
                        </div>

                        <div>
                            <label for="email" class="block font-medium text-gray-800 mb-2 text-sm">E-mail</label>
                            <input type="email" name="email" id="email" required
                                class="w-full  rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring  py-1 px-3">
                        </div>

                        <div>
                            <label for="ville" class="block font-medium text-gray-800 mb-2 text-sm">Ville</label>
                            <input type="text" name="ville" id="ville" required
                                class="w-full  rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring  py-1 px-3">
                        </div>
                    </div>
                </div>

                <!-- Informations Professionnelles -->
                <div>
                    <h2 class="text-xl font-semibold mb-6 text-gray-800">Informations Professionnelles</h2>

                    <div class="space-y-4">
                    <div x-data="{ open: false }" class="relative w-full ">
    <label class="block font-medium text-gray-800 mb-2 text-sm  ">Type de Demande</label>
    
    <!-- Button to trigger dropdown -->
    <button @click="open = !open" class="w-full flex justify-between items-center rounded-lg border border-gray-300 shadow-sm focus:border-blue-500 py-1 px-3 text-left">
        <span x-text="selected"></span>
        <!-- Chevron Icon (Rotates when clicked) -->
        <svg :class="open ? 'rotate-180' : 'rotate-0'" class="w-4 h-4 transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <!-- Dropdown menu -->
    <div x-show="open" @click.away="open = false" class="absolute w-full mt-1 bg-white border border-gray-300 shadow-lg rounded-lg z-10">
        <div @click="selected = 'Demande d\'emploi'; open = false" class="px-4 py-2 hover:bg-gray-100 cursor-pointer">Demande d'emploi</div>
        <div @click="selected = 'Demande de stage'; open = false" class="px-4 py-2 hover:bg-gray-100 cursor-pointer">Demande de stage</div>
        <div @click="selected = 'Freelance'; open = false" class="px-4 py-2 hover:bg-gray-100 cursor-pointer">Freelance</div>
        <div @click="selected = 'Formations'; open = false" class="px-4 py-2 hover:bg-gray-100 cursor-pointer">Formations</div>
    </div>
</div>



                        <!-- select with Dropdown -->
                        <div x-data="{ open: false, subOpen: null }" class="relative w-full">
    <label class="block font-medium text-gray-800 mb-2 text-sm">Fonction</label>
    
    <!-- Button with Icon -->
    <button @click="open = !open" class="w-full flex justify-between items-center rounded-lg border border-gray-300 shadow-sm focus:border-blue-500 py-1 px-3 text-left">
        <span x-text="selected"></span>
        <!-- Chevron Icon -->
        <svg :class="open ? 'rotate-180' : 'rotate-0'" class="w-4 h-4 transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <!-- Dropdown Menu -->
    <div x-show="open" @click.away="open = false" class="absolute w-full mt-1 bg-white border border-gray-300 shadow-lg rounded-lg z-10">
        <!-- Développement -->
        <div @mouseenter="subOpen = 'dev'" @mouseleave="subOpen = null" class="relative px-4 py-2 hover:bg-gray-100 cursor-pointer flex justify-between">
            Développement
            <span>&#9656;</span> <!-- Mini arrow for sub-dropdown -->
            <div x-show="subOpen === 'dev'" class="absolute left-full top-0 w-40 bg-white border border-gray-300 shadow-lg rounded-lg">
                <div @click="selected = 'Développeur'; open = false" class="px-4 py-2 hover:bg-gray-100">Développeur</div>
                <div @click="selected = 'Front-end Developer'; open = false" class="px-4 py-2 hover:bg-gray-100">Front-end Developer</div>
                <div @click="selected = 'Back-end Developer'; open = false" class="px-4 py-2 hover:bg-gray-100">Back-end Developer</div>
            </div>
        </div>

        <!-- Design -->
        <div @mouseenter="subOpen = 'design'" @mouseleave="subOpen = null" class="relative px-4 py-2 hover:bg-gray-100 cursor-pointer flex justify-between">
            Design
            <span>&#9656;</span>
            <div x-show="subOpen === 'design'" class="absolute left-full top-0 w-40 bg-white border border-gray-300 shadow-lg rounded-lg">
                <div @click="selected = 'Designer'; open = false" class="px-4 py-2 hover:bg-gray-100">Designer</div>
                <div @click="selected = 'UI/UX Designer'; open = false" class="px-4 py-2 hover:bg-gray-100">UI/UX Designer</div>
            </div>
        </div>

        <!-- Management -->
        <div @mouseenter="subOpen = 'management'" @mouseleave="subOpen = null" class="relative px-4 py-2 hover:bg-gray-100 cursor-pointer flex justify-between">
            Management
            <span>&#9656;</span>
            <div x-show="subOpen === 'management'" class="absolute left-full top-0 w-40 bg-white border border-gray-300 shadow-lg rounded-lg">
                <div @click="selected = 'Manager'; open = false" class="px-4 py-2 hover:bg-gray-100">Manager</div>
                <div @click="selected = 'Project Manager'; open = false" class="px-4 py-2 hover:bg-gray-100">Project Manager</div>
            </div>
        </div>

        <!-- Autre -->
        <div @click="selected = 'Autre'; open = false" class="px-4 py-2 hover:bg-gray-100 cursor-pointer">
            Autre
        </div>
    </div>
</div>



<div x-data="{ open: false}" class="relative w-full">
    <label class="block font-medium text-gray-800 mb-2 text-sm">Niveau d'Études</label>
    
    <!-- Button to trigger dropdown -->
    <button @click="open = !open" class="w-full flex justify-between items-center rounded-lg border border-gray-300 shadow-sm focus:border-blue-500 py-1 px-3 text-left">
        <span x-text="selected"></span>
        <!-- Chevron Icon (Rotates when clicked) -->
        <svg :class="open ? 'rotate-180' : 'rotate-0'" class="w-4 h-4 transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <!-- Dropdown menu -->
    <div x-show="open" @click.away="open = false" class="absolute w-full mt-1 bg-white border border-gray-300 shadow-lg rounded-lg z-10">
        <div @click="selected = 'Bac'; open = false" class="px-4 py-2 hover:bg-gray-100 cursor-pointer">Bac</div>
        <div @click="selected = 'Bac+2'; open = false" class="px-4 py-2 hover:bg-gray-100 cursor-pointer">Bac+2</div>
        <div @click="selected = 'Licence'; open = false" class="px-4 py-2 hover:bg-gray-100 cursor-pointer">Licence</div>
        <div @click="selected = 'Master'; open = false" class="px-4 py-2 hover:bg-gray-100 cursor-pointer">Master</div>
        <div @click="selected = 'Doctorat'; open = false" class="px-4 py-2 hover:bg-gray-100 cursor-pointer">Doctorat</div>
    </div>
</div>

                        <div>
                            <label for="cv" class="block font-medium text-gray-800 mb-2 text-sm">Télécharger CV</label>
                            <input type="file" name="cv" id="cv" accept=".pdf,.doc,.docx" required
                                class="w-full  text-gray-600 file:mr-4 file:py-1 file:px-4 file:rounded-lg file:border-0 
                                file:font-semibold file:bg-blue-100 file:text-blue-600 hover:file:bg-blue-200">
                        </div>

                        <div>
                            <label for="message" class="block font-medium text-gray-800 mb-2 text-sm">Message De motivation</label>
                            <textarea name="message" id="message" rows="3"
                                class="w-full  rounded-lg border-gray-300 shadow-sm focus:border-blue-500  px-3 py-1"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex lg:justify-end sm:justify-center space-x-4 mt-7">
                <button type="submit"
                    class="px-8 py-2 bg-[#003366]  active:hover:bg-[#0055A4] text-white rounded-lg  font-semibold hover:bg-[#0055A4] focus:ring-2 cursor-pointer">
                    Envoyer
                </button>
            </div>
        </form>
    </div>



</body>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</html>