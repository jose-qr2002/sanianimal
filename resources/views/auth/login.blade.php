@extends('cabecera')

@section('body')
    <div class="fondo-secundario center-content">
        <div class="shadow-xl login-contenedor bg-slate-100 rounded-md border-cyan-700 md:grid md:grid-cols-2">
            <div class="hidden md:block login__card-image" style="background-image: linear-gradient(rgba(0,0,0,.3),rgba(0,0,0,.3)), url('{{asset('img/login-card.webp')}}')">
            </div>
            <div class="px-2 py-4">
                <div class="login__logo flex justify-center">
                    <img class="w-6/12 max-w-48" src="{{ asset('img/logo.webp') }}" alt="logo">
                </div>
                <form action="" class="login__form flex flex-col gap-6 max-w-96 mt-4 mx-auto">
                    <div class="relative h-11 w-full">
                        <input
                            type="text" 
                            placeholder="Username"
                            class="peer h-full w-full border-b border-blue-gray-200 bg-transparent pt-4 pb-1.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border-blue-gray-200 focus:border-gray-900 focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50" />
                        <label
                          class="after:content[' '] pointer-events-none absolute left-0  -top-2.5 flex h-full w-full select-none !overflow-visible truncate text-sm font-normal leading-tight text-gray-500 transition-all after:absolute after:-bottom-2.5 after:block after:w-full after:scale-x-0 after:border-b-2 after:border-gray-500 after:transition-transform after:duration-300 peer-placeholder-shown:leading-tight peer-placeholder-shown:text-blue-gray-500 peer-focus:text-sm peer-focus:leading-tight peer-focus:text-gray-900 peer-focus:after:scale-x-100 peer-focus:after:border-gray-900 peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                          Username
                        </label>
                    </div>
                    <div class="relative h-11 w-full">
                        <input 
                            type="password"
                            placeholder="Password"
                            class="peer h-full w-full border-b border-blue-gray-200 bg-transparent pt-4 pb-1.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border-blue-gray-200 focus:border-gray-900 focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50" />
                        <label
                          class="after:content[' '] pointer-events-none absolute left-0  -top-2.5 flex h-full w-full select-none !overflow-visible truncate text-sm font-normal leading-tight text-gray-500 transition-all after:absolute after:-bottom-2.5 after:block after:w-full after:scale-x-0 after:border-b-2 after:border-gray-500 after:transition-transform after:duration-300 peer-placeholder-shown:leading-tight peer-placeholder-shown:text-blue-gray-500 peer-focus:text-sm peer-focus:leading-tight peer-focus:text-gray-900 peer-focus:after:scale-x-100 peer-focus:after:border-gray-900 peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                          Password
                        </label>
                    </div>
                    <button class="bg-cyan-500 px-4 py-2 text-white rounded-sm w-7/12 mx-auto hover:bg-cyan-900 hover:text-cyan-100 transition ease-in-out">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection