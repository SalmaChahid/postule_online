<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Web Agency</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />


    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>


    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-white">
    <!-- Navbar -->
    <header class="body-font bg-[#003366] mb-2">
        <div class="container mx-auto flex flex-wrap px-8 py-4 flex-col md:flex-row items-center">
            <h1 class="flex title-font  items-center text-[#f1f1f1] md:mb-0 text-3xl font-extrabold ml-7">
                Web Agency
            </h1>
        </div>
    </header>

    <section class="text-gray-600 body-font bg-[#FAFAFA]">
        <div class=" mx-auto flex px-2 sm:px-8 md:px-12 py-3 md:flex-row flex-col  ">
            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-full   md:mb-0 p-4 sm:p-6 ">
                <div class="lg:pl-6 md:pl-8 flex flex-col md:text-left items-center justify-center">
                    <h1 class="text-center title-font sm:text-3xl text-3xl mb-3 font-medium text-gray-900">Agence web d'emploi</h1>
                    <p class="leading-relaxed text-center text-sm w-[90%] mb-2 ">Vous pouvez soumettre votre candidature pour toute opportunité disponible au sein de notre entreprise.</p>
                </div>
                <!-- تعديل حجم الصورة وإضافة ظل وتأثيرات -->
                <div class="">
                    <img class="object-cover object-center w-4xl mt-2 m-auto" 
                         alt="hero" 
                         src="{{ asset('img/img1.png') }}" 
                         alt="Profile Image">
                </div>
            </div>
    
            <!-- Form -->
            <div class="w-full mx-auto p-4 sm:p-6" id="form">
                <form action="{{ route('candidature.store') }}#demande" method="POST" enctype="multipart/form-data" id="demande">
                    @csrf
                    <div class="grid md:grid-cols-2 gap-8 justify-center">
                        <!-- Informations Personnelles -->
                        <div>
                            <h2 class="text-lg font-semibold mb-3 text-[#003366]">Informations Personnelles</h2>
                
                            <div class="space-y-2">
                                <div>
                                    <label for="nom" class="text-xs block font-medium text-gray-800 mb-1">Nom</label>
                                    <input type="text" name="nom" id="nom" required
                                        class="w-full border-black border-1 focus:border-[#003366] py-1 px-2 outline-none focus:border-2 text-sm">
                                </div>
                
                                <div>
                                    <label for="prenom" class="block font-medium text-gray-800 mb-1 text-xs">Prénom</label>
                                    <input type="text" name="prenom" id="prenom" required
                                        class="w-full border-black border-1 focus:border-[#003366] py-1 px-2 outline-none focus:border-2 text-sm">
                                </div>
                
                                <div>
                                    <label for="tel" class="block font-medium text-gray-800 mb-1 text-xs">Téléphone</label>
                                    <input type="tel" name="tel" id="tel" required
                                        class="w-full border-black border-1 focus:border-[#003366] py-1 px-2 outline-none focus:border-2 text-sm">
                                </div>
                
                                <div>
                                    <label for="email" class="block font-medium text-gray-800 mb-1 text-xs">E-mail</label>
                                    <input type="email" name="email" id="email" required
                                        class="w-full border-black border-1 focus:border-[#003366] py-1 px-2 outline-none focus:border-2 text-sm">
                                </div>
                
                                <div>
                                    <label for="ville" class="block font-medium text-gray-800 mb-1 text-xs">Ville</label>
                                    <select name="ville" id="ville" required
                                        class="select2 w-full border-black border-1 focus:border-[#003366] py-1 px-2 outline-none focus:border-2 text-sm">
                                        <option value="" selected disabled hidden></option>
                                    </select>
                                </div>
                
                                <div>
                                    <label for="type_piece" class="block font-medium text-gray-800 mb-1 text-xs">Type de Piece</label>
                                    <select name="type_piece" id="type_piece" required
                                        class="select2 w-full border-black border-1 focus:border-[#003366] py-1 px-2 outline-none focus:border-2 text-sm">
                                        <option value="" selected disabled hidden></option>
                                        <option value="CIN">CIN</option>
                                        <option value="Passport">Passport</option>
                                        <option value="Freelance">Carte Sejour</option>
                                        <option value="Autre">Autre</option>
                                    </select>
                                </div>
                                <div id="otherField" style="display:none">
                                    <label for="autre" class="block font-medium text-gray-800 mb-1 text-xs">Autre</label>
                                    <input type="text" name="autre" id="autre" class="w-full border-black border-1 focus:border-[#003366] py-1 px-2 outline-none focus:border-2 text-sm">
                                </div>
                
                                <div>
                                    <label for="num_piece" class="block font-medium text-gray-800 mb-1 text-xs">Num Piece</label>
                                    <input type="text" name="num_piece" required
                                        class="w-full border-black border-1 focus:border-[#003366] py-1 px-2 outline-none focus:border-2 text-sm">
                                </div>
                            </div>
                        </div>
                
                        <!-- Informations Professionnelles -->
                        <div>
                            <h2 class="text-lg font-semibold mb-3 text-[#003366]">Informations Professionnelles</h2>
                
                            <div class="space-y-2">
                                <div>
                                    <label for="offre_d_emploi" class="block font-medium text-gray-800 mb-1 text-xs">Offre d'emploi</label>
                                    <select name="offre_d_emploi" id="offre_d_emploi" required
                                        class="select2 w-full border-black border-1 focus:border-[#003366] py-1 px-2 outline-none focus:border-2 text-sm">
                                        <option value="" selected disabled hidden></option>
                                        <option value="Demande_d'emploi">Demande d'emploi</option>
                                        <option value="Demande_de_stage">Demande de stage</option>
                                        <option value="Freelance">Freelance</option>
                                        <option value="Formation">Formation</option>
                                    </select>
                                </div>
                
                                <div>
                                    <label for="fonction" class="block font-medium text-gray-800 mb-1 text-xs">Fonction</label>
                                    <select name="fonction" id="fonction" required
                                        class="select2 w-full border-black border-1 focus:border-[#003366] py-1 px-2 outline-none focus:border-2 text-sm">
                                        <option value="" selected disabled hidden></option>
                                        @foreach($fonctions as $fonction)
                                            <option value="{{ $fonction->nom }}">{{ $fonction->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                
                                <div>
                                    <label for="type_de_fonction" class="block font-medium text-gray-800 mb-1 text-xs">Type de fonction</label>
                                    <select name="type_de_fonction" id="type_de_fonction" required
                                        class="select2 w-full border-black border-1 focus:border-[#003366] py-1 px-2 outline-none focus:border-2 text-sm">
                                        <option value="" selected disabled hidden></option>
                                    </select>
                                </div>
                
                                <div>
                                    <label for="niveau_d_étude" class="block font-medium text-gray-800 mb-1 text-xs">Niveau d'étude</label>
                                    <select name="niveau_d_étude" id="niveau_d_étude" required
                                        class="select2 w-full border-black border-1 focus:border-[#003366] py-1 px-2 outline-none focus:border-2 text-sm">
                                        <option value="" selected disabled hidden></option>
                                        <option value="Bac">Bac</option>
                                        <option value="Bac+2">Bac+2</option>
                                        <option value="Bac+3">Bac+3</option>
                                        <option value="Bac+4">Bac+4</option>
                                        <option value="Bac+5">Bac+5</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="cv" class="block font-medium text-gray-800 mb-1 text-xs">Télécharger CV</label>
                                    <input type="file" name="cv" id="cv" accept=".pdf,.doc,.docx" required
                                        class="w-full text-xs text-gray-600 file:mr-3 file:py-1 file:px-3 file:rounded-lg file:border-0 file:font-semibold file:bg-blue-100 file:text-blue-600 hover:file:bg-blue-200">
                                </div>
                
                                <div>
                                    <label for="message" class="block font-medium text-gray-800 mb-1 text-xs">Message De motivation</label>
                                    <textarea name="message" maxlength="1081" id="message" rows="3"
                                        class="w-full border-black border-1 focus:border-[#003366] px-2 py-1 outline-none focus:border-2 text-sm"></textarea>
                                </div>
                                
                                <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
                               
                                <div class=" flex justify-center">
                                <button type="submit" class="px-6 py-1.5 bg-[#003366] text-white rounded-lg font-semibold hover:bg-blue-700 cursor-pointer text-sm">
                                    Envoyer
                                </button>
                            </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="flex lg:justify-end sm:justify-center space-x-3 mt-4">
                        <!-- رسالة النجاح أو الخطأ على الجهة اليسرى -->
                        <div class="flex items-center space-x-3 mr-3">
                            @if(session('success'))
                                <div class="bg-green-500 text-center text-white p-2 rounded text-xs">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="bg-red-500 text-center text-white p-2 rounded text-xs">
                                    @foreach ($errors->all() as $error)
                                        <p>{{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                
                        <!-- الزر في الجهة اليمنى -->

                    </div>
                </form>
            </div>
        </div>
    </section>


 

    <footer class=" w-full text-white py-8 bg-[#003366]  ">

        <div class="container mx-auto flex flex-wrap justify-between  ">
            <!-- Colonne 1 -->
            <div class="w-full sm:w-1/2  md:w-1/4 lg:w-1/6 px-4 mb-4 ">
                <h2 class="text-md font-bold mb-4">À propos</h2>
                <ul>
                    <li><a href="#" class=" block hover:text-gray-300 text-sm">Qui sommes-nous?</a></li>
                    <li><a href="#" class="block hover:text-gray-300 text-sm">Notre équipe</a></li>
                    <li><a href="#" class="block hover:text-gray-300 text-sm">Nos valeurs</a></li>
                </ul>
            </div>

            <!-- Colonne 2 -->
            <div class="w-full sm:w-1/2 md:w-1/4 lg:w-1/6 px-4 mb-4">
                <h2 class="text-md font-bold mb-4">Services</h2>
                <ul>
                    @foreach($fonctions as $fonction)
                    <li><a href="#" class="block hover:text-gray-300 text-sm">{{ ucfirst(strtolower($fonction->nom ))}}</a></li>
                @endforeach
                </ul>
            </div>

            <!-- Colonne 3 -->
            <div class="w-full sm:w-1/2 md:w-1/4 lg:w-1/6 px-4 mb-4">
                <h2 class="text-md font-bold mb-4">Contact</h2>
                <ul>
                    <li><a href="#" class="block hover:text-gray-300 text-sm">Contactez-nous</a></li>
                    <li><a href="#" class="block hover:text-gray-300 text-sm">Support</a></li>
                    <li><a href="#" class="block hover:text-gray-300 text-sm">FAQ</a></li>
                </ul>
            </div>

            <!-- Colonne 4 -->
            <div class="w-full sm:w-1/2 md:w-1/4 lg:w-1/6 px-4 mb-4">
                <h2 class="text-md font-bold mb-4">Réseaux sociaux</h2>
                <ul>
                    <li class="flex align-items"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-facebook mt-1" viewBox="0 0 16 16">
                            <path
                                d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                        </svg><a href="#" class="block hover:text-gray-300 ml-2 text-sm">Facebook</a></li>
                    <li class="flex align-items"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-twitter-x mt-1" viewBox="0 0 16 16">
                            <path
                                d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z" />
                        </svg><a href="#" class="block hover:text-gray-300 ml-2 text-sm">Twitter</a></li>
                    <li class="flex align-items"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-instagram mt-1 " viewBox="0 0 16 16">
                            <path
                                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                        </svg><a href="#" class="block hover:text-gray-300 ml-2 text-sm">Instagram</a></li>
                </ul>
            </div>
        </div>
        <hr class="w-4/5 mt-2 mx-auto">

        <!-- Bas de page -->
        <div class="text-center mt-8 text-xs">
            <p>&copy; 2025 Tous droits réservés.</p>
        </div>
    </footer>



</body>

</html>
