<?php
use Illuminate\Support\Facades\Route;
use App\Models\FFonction;
use App\Models\typefonction;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\CandidatController;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\demandeController;
use App\Http\Controllers\FonctionController;

Route::get('/',[CandidatController::class, 'index'])->name('index');

Route::post('/store', [CandidatController::class, 'store'])->name('candidature.store');

// إعادة التوجيه إلى صفحة تسجيل الدخول إذا لم يكن المسؤول قد سجل دخوله
Route::get('/admin', function () {
    return redirect()->route('login');
});


// مسار أنواع الوظائف بناءً على الوظيفة
Route::get('/types-par-nom/{nom}', function ($nom) {
    // البحث عن الوظيفة بناءً على الاسم
    $fonction = FFonction::where('nom', $nom)->first();
    // جلب الأنواع المرتبطة بهذه الوظيفة
    $types = TypeFonction::where('f_fonction_id', $fonction->id)->get();
    return response()->json($types);
});

// مسارات تسجيل الدخول للمسؤول
Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
// مسار تسجيل الخروج للمسؤول
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

// حماية المسارات الخاصة بالمشرف من خلال middleware
Route::middleware(['auth:admin'])->group(function () {
        
    Route::resource('admin/dashboard', AdminController::class)
    ->only(['index', 'create', 'store'])
    ->names([
        'index' => 'admin.dashboard',
        'create' => 'ajouter',
        'store' => 'save-user',
    ]);
    Route::get('/admin/dashboard/liste', [AdminController::class, 'liste'])->name('liste');
    Route::post('/admin/update/{id}', [AdminController::class, 'listeUpdate'])->name('admin.update');
    Route::delete('/admin/dashboard/liste/{admin}', [AdminController::class, 'listeDelete'])->name('admin.delete');

    Route::get('/admin/dashboard/accepter',[demandeController::class, 'accepter'])->name('accepter');
    Route::get('/admin/dashboard/refuser',[demandeController::class, 'refuser'])->name('refuser');
    Route::get('/admin/dashboard/departement',[demandeController::class, 'departement'])->name('departement');

    Route::get('/admin/dashboard/compte', [CompteController::class, 'index'])->name('compte');
    Route::put('/admin/dashboard/compte', [CompteController::class, 'updateCompte'])->name('compte.update');

    Route::post('/candidates/update-status/{id}', [CandidatController::class, 'updateStatus'])->name('update.candidat');
    Route::delete('/candidates/delete/{id}', [CandidatController::class, 'deleteCandidate'])->name('delete.candidat');
    Route::get('/historique', [AdminController::class, 'showHistorique'])->name('historique');
    Route::get('/fonctions', [FonctionController::class, 'index'])->name('ajoufonction');
    Route::delete('/fonction/{id}', [FonctionController::class, 'delete'])->name('fonction.delete');
    Route::post('/fonctions/update', [FonctionController::class, 'update'])->name('fonctions.update');
    Route::post('/fonctions/store', [FonctionController::class, 'store'])->name('fonctions.store');
    // إضافة Route للتحقق من الاسم
Route::post('/fonctions/checkUnique', [FonctionController::class, 'checkUnique'])->name('fonctions.checkUnique');


});
















