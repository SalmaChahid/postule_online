<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class demandeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    public function accepter()
    {
        $candidates = Candidat::where('status', 'accepté')
        ->orderBy('created_at', 'desc')
        ->paginate(10);
        return view('livewire.accepter', compact('candidates'));
     }
     public function refuser()
     {
        $candidates = Candidat::where('status', 'refusé')
        ->orderBy('created_at', 'desc')
        ->paginate(10);
        return view('livewire.refuser' , compact('candidates'));
      }
      
     public function departement(Request $request)
     {
        $selectedFonction = $request->query('fonction');

        // جلب المترشحين الذين لديهم نفس الوظيفة المحددة
        $candidates = Candidat::where('fonction', $selectedFonction)
        ->where('status', 'en attente') 
        ->orderBy('created_at', 'desc') // إضافة شرط للـ status
        ->paginate(10);
    
        
        // عرض الصفحة وتمرير البيانات
        return view('livewire.departement', compact('candidates', 'selectedFonction'));   
       }
}
