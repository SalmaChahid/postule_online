<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;

class CompteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    // عرض صفحة الحساب
    public function index()
    {
        $user = Auth::guard('admin')->user();
        return view('livewire.compte', compact('user'));
    }

    // تحديث معلومات الحساب
    public function updateCompte(Request $request)
    {
         /** @var \App\Models\Admin $user */
    $user = Auth::guard('admin')->user();


    // التحقق من المدخلات
    $validator = Validator::make(request()->all(), [
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'username' => 'nullable|string|max:255|unique:admins,username,' . $user->id, // جعل اسم المستخدم اختياريًا
        'email' => 'required|email|max:255|unique:admins,email,' . $user->id,
        'current_password' => 'nullable|string', // جعل كلمة السر الحالية اختياريًا
        'new_password' => 'nullable|string|min:8|confirmed', // جعل كلمة السر الجديدة اختياريًا
    ], [
        'username.unique' => 'Le nom d\'utilisateur que vous avez saisi existe déjà, veuillez en choisir un autre.',
        'email.unique' => 'L\'adresse email que vous avez saisie existe déjà, veuillez en choisir une autre.',
        'nom.required' => 'Le nom est obligatoire.',
        'email.required' => 'Email est obligatoire.',
        'prenom.required' => 'Le prénom est obligatoire.',
        'new_password.confirmed' => 'Le mot de passe ne correspond pas à la confirmation.',
        'current_password.required' => 'Veuillez saisir votre mot de passe actuel.',
        'new_password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // إذا تم إدخال كلمة السر الحالية، التحقق من أنها صحيحة
    if (request('current_password') && !Hash::check(request('current_password'), $user->password)) {
        return redirect()->back()->withErrors(['current_password' => 'La mot de passe actuelle est incorrecte']);
    }

    // تحديث البيانات
    $user->nom = request('nom');
    $user->prenom = request('prenom');
    $user->username = request('username') ; // إذا لم يتم إدخال اسم مستخدم جديد، يبقى القديم
    $user->email = request('email');

    // إذا تم تغيير كلمة المرور
    if (request('new_password')) {
        $user->password = bcrypt(request('new_password')); // تحديث كلمة المرور
    }

    // حفظ التغييرات
    $user->save();

    // التوجيه مع رسالة النجاح
    return redirect()->route('compte')->with('success', 'Les informations ont été mises à jour avec succès');   
 }
}

