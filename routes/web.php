<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Ruta de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Ruta para el dashboard (requiere autenticación y verificación de email)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grupo de rutas protegidas por autenticación
Route::middleware('auth')->group(function () {

    // Rutas para el perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas para Customers
    Route::resource('customers', CustomerController::class);

    // Rutas para Employees
    Route::resource('employees', EmployeeController::class);

    // Rutas para Orders
    Route::resource('orders', OrderController::class);

    // Rutas para OrderItems
    Route::resource('order-items', OrderItemController::class);

    // Rutas para Products
    Route::resource('products', ProductController::class);
});

// Rutas de autenticación
require __DIR__ . '/auth.php';
