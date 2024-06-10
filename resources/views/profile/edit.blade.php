@extends('layouts.app')


<hr>
<br>
<x-slot name="header">
    <h2 class="font-semibold text-2xl text-white bg-dark-700 p-4 rounded-md shadow-md leading-tight">
        {{ __('Profile') }}
    </h2>
</x-slot>

<div class="py-12 bg-gray-100 min-h-screen">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow-md rounded-lg">
            <div class="max-w-xl mx-auto">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow-md rounded-lg">
            <div class="max-w-xl mx-auto">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow-md rounded-lg">
            <div class="max-w-xl mx-auto">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</div>

<style>
    header {
        background-color: #f8f9fa;

        padding: 1rem;
        border-bottom: 1px solid #dee2e6;

    }

    header h2 {
        font-size: 1.5rem;
        color: #343a40;

    }


    .profile-section {
        padding: 1.5rem;
        background-color: #ffffff;

        border-radius: 0.5rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .profile-section .form-container {
        max-width: 40rem;
        margin: 0 auto;
    }


    body {
        background-color: #e9ecef;

        font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        color: #495057;

    }

    button,
    .btn {
        display: inline-block;
        padding: 0.75rem 1.25rem;
        border-radius: 0.375rem;
        font-size: 1rem;
        font-weight: 500;
        text-align: center;
        text-decoration: none;
        color: #ffffff;
        background-color: #CB4335;
        /* Fondo azul */
        border: none;
        transition: background-color 0.3s ease-in-out, transform 0.2s ease-in-out;
    }

    button:hover,
    .btn:hover {
        background-color: #0056b3;
        /* Fondo azul más oscuro en hover */
        transform: translateY(-2px);
        /* Efecto de elevar al pasar el mouse */
    }

    button:active,
    .btn:active {
        background-color: #004085;
        /* Fondo azul más oscuro en active */
        transform: translateY(0);
        /* Sin efecto de elevar en active */
    }

    button:disabled,
    .btn:disabled {
        background-color: #6c757d;
        /* Fondo gris para botones deshabilitados */
        cursor: not-allowed;
    }

    /* Estilos para enlaces con apariencia de botón */
    a.btn {
        color: #ffffff;
        /* Asegurar que el texto de los enlaces también sea blanco */
    }
</style>
