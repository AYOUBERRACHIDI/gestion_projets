<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\SettingsController;

// Page d'accueil avant la connexion
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Authentification et routes protégées
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('projects.index');
    })->name('dashboard');

    Route::resource('projects', ProjectController::class);
    Route::resource('tasks', TaskController::class);
    

// Routes pour les tâches
Route::post('/projects/{project}/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/projects/{projectId}/tasks/{taskId}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/projects/{project}/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/projects/{project}/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::post('/settings/profile', [SettingsController::class, 'updateProfile'])->name('settings.profile.update');
    Route::post('/settings/password', [SettingsController::class, 'updatePassword'])->name('settings.password.update');
    Route::post('/settings/delete-account', [SettingsController::class, 'deleteAccount'])->name('settings.account.delete');
    Route::post('/settings/preferences', [SettingsController::class, 'updatePreferences'])->name('settings.preferences.update');
// Route pour mettre à jour le statut via glisser-déposer
Route::post('/tasks/{task}/update-status', [TaskController::class, 'updateStatus'])->name('tasks.updateStatus');
});

Route::get('/tasks/{projectId}/{taskId}/edit', [TaskController::class, 'edit'])->name('tasks.edit');

// Page après connexion
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();  

// Déconnexion
Route::post('/logout', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');
// Route pour afficher le formulaire (optionnel)
Route::get('/newsletter', [NewsletterController::class, 'show'])->name('newsletter.show');

// Route pour traiter la soumission du formulaire
Route::post('/newsletter', [NewsletterController::class, 'store'])->name('newsletter.store');
