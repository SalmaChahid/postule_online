<?php

namespace App\Http\Controllers;

use App\Models\FFonction;
use App\Models\typefonction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FonctionController extends Controller
{
    public function index()
    {
        $fonctionTypes = DB::table('f_fonctions')
            ->join('typefonctions', 'f_fonctions.id', '=', 'typefonctions.f_fonction_id')
            ->select(
                'f_fonctions.id as fonction_id',
                'f_fonctions.nom as fonction_nom',
                DB::raw("GROUP_CONCAT(typefonctions.nom SEPARATOR ' - ') as type_nom")
            )
            ->groupBy('f_fonctions.id', 'f_fonctions.nom')
            ->paginate(10);

        return view('livewire.fonction', compact('fonctionTypes'));
    }





    public function delete($nom)
    {
        // العثور على الـ Fonction باستخدام الـ ID
        $fonction = FFonction::where('nom', $nom)->first();  // البحث باستخدام 'nom'

        if ($fonction) {
            // حذف السوس فونكشن المرتبطة باستخدام الـ 'id' من الـ Fonction
            $fonction->types()->delete();
    
            // حذف الـ Fonction نفسها
            $fonction->delete();  
            
            return redirect()->back()->with('success', 'Fonction supprimée avec succès!');
        }
    
    }


    public function update(Request $request)
{
        $request->validate([
        'fonction_nom' => 'required|max:255',
        'types_json' => 'required', // التأكد أن الأنواع هي JSON صحيح
    ]);
    // 1️⃣ البحث عن الوظيفة باستخدام الاسم القديم
    $fonction = FFonction::where('nom', $request->old_fonction_nom)->firstOrFail();

    // 2️⃣ تحديث الاسم فقط إذا تغيّر
    if ($fonction->nom !== $request->fonction_nom) {
        $fonction->nom = strtoupper($request->fonction_nom);
        $fonction->save();
    }

    // 3️⃣ تحديث الأنواع (sous fonctions)
    $types = json_decode($request->types_json, true);
    $types = array_map(function($type) {
        return ucwords(strtolower($type)); // تحويل كل اسم إلى "أول حرف كبير"
    }, $types);
    DB::transaction(function () use ($fonction, $types) {
        $fonction->types()->delete(); // حذف القديم
        foreach ($types as $typeName) {
            $fonction->types()->create(['nom' => $typeName]);
        }
    });

    return redirect()->back()->with('success', 'تم تحديث الوظيفة بنجاح');
}


    public function store(Request $request)
    {
        $request->validate([
            'fonction_nom' => 'required|max:255|unique:f_fonctions,nom',
            'types_json' => 'required',
        ]);
    
        DB::transaction(function () use ($request) {
            // إنشاء الوظيفة الجديدة
            $fonction = FFonction::create(['nom' => strtoupper($request->fonction_nom)]);
    
            // تحويل الـ JSON إلى Array
            $types = json_decode($request->types_json, true);
            $types = array_map(function($type) {
                return ucwords(strtolower($type)); // تحويل كل اسم إلى "أول حرف كبير"
            }, $types);
            // إنشاء sous fonctions
            foreach ($types as $typeName) {
                $fonction->types()->create(['nom' => $typeName]);
            }
        });
    
        return redirect()->back()->with('success', 'Fonction ajoutée avec succès.');
    }
    
    public function checkUnique(Request $request)
    {
        // التحقق إذا كان الاسم موجودًا في قاعدة البيانات
        $isUnique = FFonction::where('nom', $request->fonction_nom)->doesntExist();
    
        // إرجاع النتيجة كـ JSON
        return response()->json(['isUnique' => $isUnique]);
    }
    
}

