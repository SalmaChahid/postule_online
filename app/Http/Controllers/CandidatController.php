<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Candidat;
use App\Models\FFonction;

class CandidatController extends Controller
{
    public function index()
    {
        $fonctions = FFonction::all();
        return view('welcome', compact('fonctions'));   
     }



        public function store(Request $request)
    {
        // التحقق من صحة البيانات
        $validated = $request->validate([
            'nom' => 'required|string|max:255|',
            'prenom' => 'required|string|max:255',
            'tel' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'ville' => 'required|string',
            'type_piece' => 'required|string',
            'num_piece' => 'required|string',
            'offre_d_emploi' => 'required|string',
            'fonction' => 'required|string',
            'type_de_fonction' => 'required|string',
            'niveau_d_étude' => 'required|string',
            'cv' => 'required|mimes:pdf,doc,docx|max:10240',
            'message' => 'nullable|string',
        ]);
    
        if ($validated['type_piece'] === 'Autre') {
            $validated['type_piece'] = $request->input('autre');  // نأخذ القيمة من حقل "autre"
        }
        // تحميل الملف
        $cvPath = $request->file('cv')->store('cv_files', 'public');
    
        // تخزين البيانات في قاعدة البيانات
        Candidat::create([
            'nom' => ucfirst(strtolower($validated['nom'])),
            'prenom' => ucfirst(strtolower($validated['prenom'])),
            'tel' => $validated['tel'],
            'email' => strtolower($validated['email']),
            'ville' => $validated['ville'],
            'type_piece' => $validated['type_piece'],
            'num_piece' => $validated['num_piece'],
            'offre_d_emploi' => $validated['offre_d_emploi'],
            'fonction' => $validated['fonction'],
            'type_de_fonction' => $validated['type_de_fonction'],
            'niveau_d_étude' => $validated['niveau_d_étude'],
            'cv' => $cvPath,
            'message' => $validated['message'],
        ]);
    
        // إرجاع رد أو إعادة توجيه
        return redirect()->back()->with('success', 'Votre demande a été envoyée avec succès.');
    }

    // دالة لتحديث حالة المرشح
    public function updateStatus(Request $request,$id)
    {
        $candidate = Candidat::findOrFail($id);

        // التحقق من نوع العملية (accept أو reject)
        if ($request->input('action') === 'accept') {
            // منطق القبول
            $candidate->status = 'accepté';
            $candidate->save();
            $message = 'تم قبول المرشح بنجاح!';
        } elseif ($request->input('action') === 'reject') {
            // منطق الرفض
            $candidate->status = 'refusé';
            $candidate->save();
            $message = 'تم رفض المرشح بنجاح!';
        }

        return redirect()->back()->with('message', $message);
    }

    // دالة لحذف المرشح
    public function deleteCandidate($id)
    {
        $candidate = Candidat::findOrFail($id);
        if ($candidate->cv && Storage::disk('public')->exists($candidate->cv)) {
            Storage::disk('public')->delete($candidate->cv);
        }
        // منطق الحذف
        $candidate->delete();

        return redirect()->back()->with('message', 'تم حذف المرشح بنجاح!');

    }
    
}
