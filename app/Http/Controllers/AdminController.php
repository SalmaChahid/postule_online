<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Candidat;
use App\Models\FFonction;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    public function index()
    {
         $userId = Auth::guard('admin')->id();
        $departements = FFonction::all();
        $demandes = Candidat::all();
        $admins = Admin::all();
        $historique= Admin::whereNotNull('last_login_at')
        ->where('id', '!=', $userId)
        ->orderBy('last_login_at', 'desc') // ترتيب النتائج حسب آخر تسجيل دخول
        ->take(4) // أو limit(5)
        ->get();
        return view('livewire.dashboard' , compact('departements','admins','demandes','historique'));
    }

    public function create()
    {
        return view('livewire.ajouter');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'username' => 'nullable|string|unique:admins,username',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,user',
        ], [
            'username.unique' => 'Le nom d\'utilisateur que vous avez saisi existe déjà, veuillez en choisir un autre.',
            'email.unique' => 'L\'adresse email que vous avez saisie existe déjà, veuillez en choisir une autre.',
            'nom.required' => 'Le nom est obligatoire.',
            'email.required' => 'Email est obligatoire.',
            'prenom.required' => 'Le prénom est obligatoire.',
            'password.confirmed' => 'Le mot de passe ne correspond pas à la confirmation.',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'role.required' => 'Le role est obligatoire.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // حفظ العضو الجديد في قاعدة البيانات
        Admin::create([
            'nom' => ucfirst(strtolower($request->input('nom'))),
            'prenom' => ucfirst(strtolower($request->input('prenom'))),
            'username' => $request->input('username'),
            'email' => strtolower($request->input('email')),
            'password' => Hash::make($request->input('password')),
            'role' => $request->input('role'),

        ]);

        // إعادة التوجيه بعد الحفظ مع رسالة نجاح
        return redirect()->route('ajouter')->with('success', 'Membre ajouté avec succès');
    }



    
    public function liste()
    {

        $userId = Auth::guard('admin')->id();


        // جلب جميع الإداريين مع استبعاد المسؤول الحالي
        $admins = Admin::where('id', '!=', $userId)
        ->orderBy('created_at', 'desc') // ترتيب النتائج حسب آخر تسجيل دخول
        ->paginate(10);
    
        // تمرير الإداريين إلى العرض
        return view('livewire.liste', compact('admins')); // عرض التفاصيل
    }


    public function listeUpdate(Request $request, $id)
    {
        // جلب الإداري من قاعدة البيانات
        $admin = Admin::findOrFail($id);
    
        // تحديث البيانات
        $admin->nom = ucfirst(strtolower($request->input('nom')));
        $admin->prenom = ucfirst(strtolower($request->input('prenom')));
        $admin->email = strtolower($request->input('email'));
        $admin->role = $request->input('role');
    
        // حفظ التحديثات في قاعدة البيانات
        $admin->save();
    
        // إعادة التوجيه مع رسالة نجاح
        return response()->json(['success' => true, 'message' => 'تم التحديث بنجاح!']);
    }
    



    public function listeDelete($adminId)
{
    $admin = Admin::find($adminId);

    if ($admin) {
        $admin->delete();
        // إعادة التوجيه إلى نفس الصفحة بعد الحذف
        return redirect()->back()->with('success', 'Admin deleted successfully.');
        
    }

    // العودة إلى نفس الصفحة بعد الحذف مع رسالة خطأ
}

public function showHistorique()
{
    $userId = Auth::guard('admin')->id();

    // جلب كل البيانات مع تاريخ وIP آخر دخول
    $admins = Admin::whereNotNull('last_login_at')
    ->where('id', '!=', $userId)
    ->orderBy('last_login_at', 'desc') // ترتيب النتائج حسب آخر تسجيل دخول
    ->paginate(10);

    return view('livewire.historique', compact('admins'));
}


}
