<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Web Agency</title>
</head>
<body>
    <div class="h-screen flex">
      @livewire('side')

      <main id="main-content" class="flex-1 ml-64 bg-white my-6">
        <div class="w-[94%] m-auto rounded-sm bg-[#003366]">        
            <h1 class="text-2xl font-semibold mb-1 text-white p-2">Les departements</h1>
            <hr class="text-gray-200" >
        </div>
        <div class=" m-auto w-[75%]  py-3 ">
            <!-- Search and Add User (Static) -->
            <div class="relative h-13">
                {{-- @can('isAdmin') --}}
                  <button onclick="openAddModal()" class="absolute right-0 top-0 bg-[#003366] active:hover:bg-blue-700 text-white font-semibold cursor-pointer px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300">
                    Ajouter Fonction
                </button>
                {{-- @else
                <a href="#">
                    <button class="absolute right-0 top-0 bg-[#003366] active:hover:bg-blue-700 text-white font-semibold pointer-events-none opacity-50 cursor-not-allowed disabled px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300">
                        Ajouter membre
                    </button>
                </a>
                @endcan --}}
            </div>
  
          <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="w-full table-auto">
                <thead>
                  <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Fonctions</th>
                    <th class="py-3 px-6 text-center">Sous-Fonctions</th>
                    <th class="py-3 px-6 text-center">Actions</th>
                  </tr>
                </thead>
                <tbody class="text-gray-600 text-sm">
                  @foreach($fonctionTypes as $item)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                      <td class="py-3 px-6 text-left fonction-nom">{{ $item->fonction_nom }}</td>
                      <td class="py-3 px-6 text-left">
                        @php
                          $truncated = \Illuminate\Support\Str::limit($item->type_nom, 50);
                        @endphp
                        <span class="short-text">{{ $truncated }}</span>
                        <span class="full-text hidden">{{ $item->type_nom }}</span>
                        @if(strlen($item->type_nom) > 55)
                          <a href="#" class="toggle-text text-blue-500 ml-2 ">plus</a>
                        @endif
                      </td>
                      
                      <td class="py-3 px-6 text-center">
                        <div class="flex items-center justify-center space-x-2">
                          <!-- Edit Button -->
                          <button class="edit-btn w-4.5 mr-2 transform hover:scale-110 text-green-500 inline-flex items-center cursor-pointer">
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                              </svg>
                          </button>
                          <!-- Delete Button with Form -->
                          <form action="{{ route('fonction.delete', $item->fonction_nom) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette fonction ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class=" w-4.5 mr-2 transform hover:scale-110 text-red-500 inline-flex items-center cursor-pointer">
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                              </svg>
                            </button>
                          </form>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              
            
          </div>

        </div>
  
        <!-- Modal de modification -->
        <div id="modal" class=" hidden">
        <div  class="fixed inset-0 flex items-center justify-center bg-[#000000B3]  ">
            <div class="bg-white rounded-lg pb-6 px-6 w-1/3 ">
              <h2 class="  text-center  rounded-sm my-1  p-2 text-[#003366] text-xl font-bold">Modifier Fonction </h2>
              <hr class="text-gray-300 mb-2">
              <form id="edit-form" method="POST" action="{{ route('fonctions.update') }}">
                @csrf
                <input type="hidden" name="old_fonction_nom" id="old_fonction_nom"> <!-- الاسم القديم -->
                <input type="hidden" name="fonction_nom" id="fonction_nom"> <!-- الاسم الجديد -->
            
                <!-- رسائل الخطأ -->
            
                <label class="tracking-wide text-gray-600 text-sm font-bold">Nom de Fonction :</label>
                <input type="text" name="fonction_nom_display" id="fonction_nom_display" class="shadow appearance-none w-full bg-grey-lighter text-grey-darker border rounded py-2 px-3 my-2 text-sm" required>
            
                <label class="tracking-wide text-gray-600 text-sm font-bold">Les types :</label>
                <div class="flex gap-2 mb-2">
                    <input type="text" id="new_type_input" class="shadow appearance-none w-full bg-grey-lighter text-grey-darker border rounded py-2 px-3 my-2 text-sm" placeholder="Ajouter nouveau type">
                    <button type="button" id="add_type_btn" class="cursor-pointer transform  bg-blue-600 text-white py-1 px-3 my-2 rounded-xl">+</button>
                </div>
                <div id="type_tags" class="flex flex-wrap gap-2 mb-4"></div>
            
                <input type="hidden" name="types_json" id="types_json"> <!-- سيتم تحديثه تلقائيًا -->
            
                <div class="flex justify-end gap-2">
                    <button type="button" onclick="closeModal()" class="cursor-pointer bg-gray-300 px-4 py-2 rounded">Annuler</button>
                    <button type="submit" class="bg-green-600 cursor-pointer text-white px-4 py-2 rounded">Enregistrer</button>
                </div>
            </form>
            
            
                                             

            </div>
          </div>
        </div>

        <!-- Modal لإضافة Fonction -->
        <div id="addModal" class=" hidden">
          <div  class="fixed inset-0 flex items-center justify-center bg-[#000000B3]  ">
              <div class="bg-white pb-6 px-6 rounded-lg shadow-lg w-full max-w-md relative">
                <h2 class="text-center   rounded-sm my-1  p-2 text-[#003366] text-xl font-bold">Ajouter Fonction </h2>
                <hr class="text-gray-300 mb-2">
      <form id="addForm" method="POST" action="{{ route('fonctions.store') }}">
          @csrf

          <label class="tracking-wide text-gray-600 text-sm font-bold">Nom de la Fonction:</label>
          <input type="text" name="fonction_nom" required class="shadow shadow-[#0033661a] appearance-none w-full bg-grey-lighter text-grey-darker border border-red rounded py-2 px-3 my-2 text-sm">

          <label class="tracking-wide text-gray-600 text-sm font-bold">Les types :</label>
          <div class="flex gap-2 mb-2">
              <input type="text" id="new_type_add" class="shadow shadow-[#0033661a] appearance-none w-full bg-grey-lighter text-grey-darker border border-red rounded py-2 px-3 my-2 text-sm" placeholder="Ajouter nouveau type">
              <button type="button" id="add_type_btn_add" class="cursor-pointer bg-blue-600 text-white py-1 px-3 my-2 rounded-xl">+</button>
          </div>
          <div id="type_tags_add" class="flex flex-wrap gap-2 mb-4"></div>

          <input type="hidden" name="types_json" id="types_json_add" >

          <div class="flex justify-end gap-2">
              <button type="button" onclick="closeAddModal()" class="cursor-pointer bg-gray-300 px-4 py-2 rounded">Annuler</button>
              <button type="submit" class="cursor-pointer bg-green-600 text-white px-4 py-2 rounded">Enregistrer</button>
          </div>
      </form>
  </div>
</div>



      </main>
    </div>

      <script>
      
      let typeList = [];


    
        // 🟢 تحديث العرض عند تعديل الاسم
        document.getElementById('fonction_nom_display').addEventListener('input', function () {
            document.getElementById('fonction_nom').value = this.value;
        });
        
        // 🟢 فتح المودال وتعبئته بالبيانات الصحيحة
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function () {
                let parent = this.closest('tr');
                let fonctionNom = parent.querySelector('.fonction-nom').textContent;
                let typeNom = parent.querySelector('.full-text').textContent || parent.querySelector('.short-text').textContent;
        
                // 🟠 تخزين الاسم القديم والجديد
                document.getElementById('old_fonction_nom').value = fonctionNom;
                document.getElementById('fonction_nom_display').value = fonctionNom;
                document.getElementById('fonction_nom').value = fonctionNom;
        
                // 🟠 تحويل قائمة الأنواع إلى مصفوفة
                typeList = typeNom ? typeNom.split(' - ').map(t => t.trim()) : [];
                renderTags();

                document.getElementById('modal').classList.remove('hidden');
            });
        });
        

        // 🟢 إضافة نوع جديد إلى القائمة
        document.getElementById('add_type_btn').addEventListener('click', () => {
            const input = document.getElementById('new_type_input');
            const value = input.value.trim();
            if (value !== '' && !typeList.includes(value)) { // منع التكرار
                typeList.push(value);
                input.value = '';
                renderTags();
            }

        });
        
        // 🟢 عرض الأنواع داخل المودال
        function renderTags() {
            const tagContainer = document.getElementById('type_tags');
            tagContainer.innerHTML = '';
        
            typeList.forEach((type, index) => {
                const tag = document.createElement('span');
                tag.className = 'bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1 rounded-full flex items-center gap-2';
                tag.innerHTML = `${type} <button type="button" class="text-red-500 font-bold cursor-pointer" onclick="removeTag(${index})">&times;</button>`;
                tagContainer.appendChild(tag);
            });
        }
        
        // 🟢 حذف نوع معين
        function removeTag(index) {
            typeList.splice(index, 1);
            renderTags();
        }
        
        // 🟢 عند إرسال الفورم، تخزين الأنواع في input مخفي
        document.getElementById('edit-form').addEventListener('submit', function(event) {
        if (typeList.length === 0) {
            // إذا كانت قائمة الأنواع فارغة، لا نسمح بالإرسال
            event.preventDefault();
            alert('Veuillez ajouter au moins un type avant de soumettre le formulaire.');
        } else {
            // إذا كان هناك أنواع، نقوم بتحديث hidden input
            document.getElementById('types_json').value = JSON.stringify(typeList);
        }
    });




        document.querySelectorAll('.toggle-text').forEach(link => {
          link.addEventListener('click', function(e) {
            e.preventDefault();
            let parent = this.parentElement;
            let shortText = parent.querySelector('.short-text');
            let fullText = parent.querySelector('.full-text');
            if(fullText.classList.contains('hidden')) {
              fullText.classList.remove('hidden');
              shortText.classList.add('hidden');
              this.textContent = 'Moins';
            } else {
              fullText.classList.add('hidden');
              shortText.classList.remove('hidden');
              this.textContent = 'Plus';
            }
            
          });
        });


        function closeModal() {
      document.getElementById('modal').classList.add('hidden');
  }



  let typeListAdd = [];

function openAddModal() {
    typeListAdd = [];
    document.getElementById('new_type_add').value = '';
    document.getElementById('type_tags_add').innerHTML = '';
    document.getElementById('addModal').classList.remove('hidden');
}

function closeAddModal() {
    document.getElementById('addModal').classList.add('hidden');
}

function renderTagsAdd() {
    const tagContainer = document.getElementById('type_tags_add');
    tagContainer.innerHTML = '';

    typeListAdd.forEach((type, index) => {
        const tag = document.createElement('span');
        tag.className = 'bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1 rounded-full flex items-center gap-2';
        tag.innerHTML = `${type} <button type="button" class="cursor-pointer text-red-500 font-bold" onclick="removeTagAdd(${index})">&times;</button>`;
        tagContainer.appendChild(tag);
    });
}

function removeTagAdd(index) {
    typeListAdd.splice(index, 1);
    renderTagsAdd();
}

document.getElementById('add_type_btn_add').addEventListener('click', () => {
    const input = document.getElementById('new_type_add');
    const value = input.value.trim();
    if (value !== '') {
        typeListAdd.push(value);
        input.value = '';
        renderTagsAdd();
    }
});

document.getElementById('addForm').addEventListener('submit', function(event) {
    // منع الإرسال افتراضيًا حتى نتحقق من كل شيء
    event.preventDefault(); 

    const fonctionNom = document.querySelector('[name="fonction_nom"]').value.trim();
    
    // التحقق من تفرد الاسم قبل إرسال النموذج
    checkUniqueNom(fonctionNom).then(isUnique => {
        if (!isUnique) {
            // إذا لم يكن الاسم فريدًا، نعرض تحذيرًا
            alert('Ce nom de fonction existe déjà. Veuillez en choisir un autre.');
        } else {
            // إذا كان الاسم فريدًا، نواصل التحقق من الأنواع
            if (typeListAdd.length === 0) {
                // إذا كانت قائمة الأنواع فارغة، لا نسمح بالإرسال
                alert('Veuillez ajouter au moins un type avant de soumettre le formulaire.');
            } else {
                // إذا كانت هناك أنواع، نقوم بتحديث hidden input
                document.getElementById('types_json_add').value = JSON.stringify(typeListAdd);

                // الآن نرسل النموذج بعد التحقق
                event.target.submit();
            }
        }
    })
});

// دالة للتحقق من تفرد الاسم باستخدام Fetch
async function checkUniqueNom(nom) {
    try {
        const response = await fetch('{{ route("fonctions.checkUnique") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ fonction_nom: nom })
        });

        const data = await response.json();
        return data.isUnique; // إذا كان الاسم فريدًا
    } catch (error) {
        console.error('Error:', error);
        return false;
    }
}


</script>

      
  </body>
</html>