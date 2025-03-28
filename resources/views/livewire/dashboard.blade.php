
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web Agency</title>



    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

</head>
<body class="bg-white ">
    @livewireScripts
    <div class=" h-screen">
       <div class="flex h-screen overflow-y-auto">
        @livewire('side')

        <main id="main-content" class=" flex-1 ml-64 bg-white  my-6 ">
          <div class="w-[94%] m-auto rounded-sm  bg-[#003366]">        
              <h1 class="text-2xl font-semibold mb-1 text-white p-2">Dashboard</h1>
              <hr class="text-gray-200" >
          </div>

            <div class="grid grid-cols-3 gap-4 mt-4  mb-4 sm:grid-cols-3 w-[94%] m-auto">
                <div class="flex items-center p-5  justify-center bg-white border border-gray-200   rounded overflow-hidden shadow-sm">
                    <div class="pr-4 ">
                        <svg class="h-8 w-8 text-blue-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                        </svg>
                    </div>
                    <div class=" text-gray-600 text-center">
                        <h3 class="text-l tracking-wide">Departements</h3>
                        <p class="text-2xl text-gray-700 font-bold">{{ $departements->count() }}</p>
                    </div>
                </div>
            
                <div class="flex items-center p-5 justify-center bg-white border border-gray-200  rounded overflow-hidden shadow-sm">
                    <div class="pr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2">
                            </path>
                        </svg>
                    </div>
                    <div class=" text-gray-700 text-center">
                        <h3 class="text-l tracking-wide">Demandes</h3>
                        <p class="text-2xl text-gray-700 font-bold">{{ $demandes->count() }}</p>
                    </div>
                </div>
            
                <div class="flex items-center p-5 bg-white justify-center border border-gray-200  rounded overflow-hidden shadow-sm">
                    <div class="pr-4">
                        <svg class="h-8 w-8 text-blue-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                          </svg>
                    </div>
                    <div class=" text-gray-700 text-center">
                        <h3 class="text-l tracking-wide">Utilisateurs</h3>
                        <p class="text-2xl text-gray-700 font-bold">{{ $admins->count() }}</p>
                    </div>
                </div>
            </div>
            

            <div class="flex md:grid-cols-2 lg:grid-cols-2 justify-center gap-4  w-[94%]  m-auto">
              <div class="bg-white  rounded-sm shadow-sm border border-gray-200   w-full">
              <div class="flex justify-between py-2 px-4">
                <h3 class="text-l font-semibold  text-[#003366]">Graphique</h3>

                      {{-- <div class="flex items-center space-x-2">
                          <span class="text-sm text-gray-600">12, Mar 24 - 31, Mar 24</span>
                          <button class="bg-blue-500 text-white px-2 py-1 rounded-lg hover:bg-blue-600">
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 9.5L12 14l-4.5-4.5" />
                              </svg>
                          </button>
                      </div> --}}
                  </div>
                  <hr class="text-gray-200 mb-3" >

                  <canvas id="orderReportChart1" class="w-full  px-3"></canvas>
              </div>
          
              <div class="bg-white rounded-sm shadow-sm border border-gray-200  w-full ">
              <div class="flex justify-between py-2 px-4">
                <h3 class="text-l font-semibold  text-[#003366]">Graphique</h3>


                      {{-- <div class="flex items-center space-x-2">
                          <span class="text-sm text-gray-600">12, Mar 24 - 31, Mar 24</span>
                          <button class="bg-blue-500 text-white px-2 py-1 rounded-lg hover:bg-blue-600">
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 9.5L12 14l-4.5-4.5" />
                              </svg>
                          </button>
                      </div> --}}
                  </div>
                  <hr class="text-gray-200 mb-3" >

                  <canvas id="orderReportChart2" class="w-full h-80 p-3"></canvas>
              </div>
          </div>
          
            
          <div class="grid  md:grid-cols-2 lg:grid-cols-2 justify-between gap-4 w-[94%] m-auto mt-4 mb-20">
            <div class="bg-white rounded-sm shadow-sm border border-gray-200 h-64  ">
              <div class="flex justify-between py-2 px-4">
                <h3 class="text-l font-semibold  text-[#003366]">Nombre des demandes par type</h3>
                </div>
                <hr class="text-gray-200" >
                <div class="p-5">
                <table class="w-full">
                  <tr class="text-left  text-gray-500">
                    <th class="p-1">Catégorie</th>
                    <th class="text-center">Nombre</th>
                  </tr>
                  <tr class=" text-center">
                    <td class="text-left p-1 ">les demandes en attentes</td>
                    <td >{{ $demandes->where('status', 'en attente')->count() }}</td>
                  </tr>
                  <tr class="text-center ">
                    <td class="text-left p-1">les demandes acceptées</td>
                    <td >{{ $demandes->where('status', 'accepté')->count() }}</td>
                  </tr>
                  <tr class="text-center  ">
                    <td class="text-left p-1">les demandes refusées</td>
                    <td >{{ $demandes->where('status', 'refusé')->count() }}</td>
                  </tr>

                </table>
              </div>
            </div>
            <div class="bg-white rounded-sm shadow-sm border border-gray-200  ">
              
              <div class="flex justify-between py-2 px-4">

              <h3 class="text-l font-semibold  text-[#003366]">Utilisateurs récemment connectés</h3>
              <a href="{{ route('historique') }}" class="text-blue-600 cursor-pointer">Plus</a>
            </div>
              <hr class="text-gray-200" >
              <div class="p-5">
                <table class="w-full">
                  <tr class="text-left   text-gray-500">
                    <th class="p-1 ">Nom</th>
                    <th class="text-left px-10">Role</th>
                    <th class="text-center">Historique de Connexion</th>
                  </tr>
                  @foreach ($historique as $user)
                  <tr class="text-center">
                    <td class="text-left p-1 ">{{ $user->prenom }}</td>
                    <td class="text-left  px-10">{{ $user->role }}</td>
                    <td class="text-center">{{ $user->last_login_at }}</td>
                  </tr>
                  @endforeach



                </table>
              </div>
          </div>

        </div>

        </main>
    </div> 
    </div>



   <script>
    
 // Get context
const ctx1 = document.getElementById('orderReportChart1').getContext('2d');
const ctx2 = document.getElementById('orderReportChart2').getContext('2d');

// Data for the first chart (Shipping - Line Chart)
const data1 = {
  labels: ['Sat', 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
  datasets: [
    {
      label: 'Shipping',
      data: [400, 600, 800, 850, 900, 700, 500],
      type: 'line',
      borderColor: '#3b82f6',
      borderWidth: 2,
      tension: 0.4,
      fill: true,
      backgroundColor: 'rgba(59, 130, 246, 0.1)',
    }
  ],
};

// Data for the second chart (Delivered - Bar Chart)
const data2 = {
  labels: ['Sat', 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
  datasets: [
    {
      label: 'Delivered',
      data: [800, 500, 1000, 1100, 950, 700, 600],
      type: 'bar',
      backgroundColor: '#3b82f6',
      borderWidth: 0,
      borderRadius: 5,
      barThickness: 20, // جعل الأعمدة مرئية بشكل أفضل
    }
  ],
};

// Chart configurations
const config1 = {
  type: 'line', // ✅ تصحيح الخطأ
  data: data1, // ✅ تصحيح الخطأ
  options: {
    responsive: true,
    plugins: {
      legend: {
        display: true,
        position: 'top',
      },
    },
    scales: {
      x: {
        grid: { display: false },
      },
      y: {
        beginAtZero: true,
        grid: { drawBorder: false },
      },
    },
  },
};

const config2 = {
  type: 'bar', 
  data: data2, // ✅ تصحيح الخطأ
  options: {
    responsive: true,
    plugins: {
      legend: {
        display: true,
        position: 'top',
      },
    },
    scales: {
      x: {
        grid: { display: false },
      },
      y: {
        beginAtZero: true,
        grid: { drawBorder: false },
      },
    },
  },
};

// Create the charts
new Chart(ctx1, config1);
new Chart(ctx2, config2);


    </script>
</body>
</html>

