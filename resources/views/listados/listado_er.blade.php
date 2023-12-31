@extends('layouts.app')

@section('titulo')
    Listado de Empresas Receptoras
@endsection

@section('contenido_top')
    <div
        class="absolute bg-y-50 w-full top-0 bg-[url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg')] min-h-75">
        <span class="absolute top-0 left-0 w-full h-full bg-blue-500 opacity-60"></span>
    </div>
@endsection

@section('contenido')
    <br> <br>
    <div class="relative w-full mx-auto mt-500 ">

        <div
            class="relative flex flex-col flex-auto min-w-0 p-4 mx-6 overflow-hidden break-words bg-white border-0 dark:bg-slate-850 dark:shadow-dark-xl shadow-3xl rounded-2xl bg-clip-border">
            <div class="flex flex-wrap -mx-3">
                <div class="flex-none w-auto max-w-full px-3">
                    <div
                        class="relative inline-flex items-center justify-center text-white transition-all duration-200 ease-in-out text-base h-19 w-19 rounded-xl">
                        <img src="{{ asset('img/admin.png') }}" alt="profile_image" class="w-full shadow-2xl rounded-xl" />
                    </div>
                </div>
                <div class="flex-none w-auto max-w-full px-3 my-auto">
                    <div class="h-full">
                        <h5 class="mb-1 dark:text-white">Administrador</h5>
                        <p class="mb-0 font-semibold leading-normal dark:text-white dark:opacity-60 text-sm">Admin</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <br>

    <div class="relative w-full mx-auto mt-500 ">
        <div class="flex-none w-full max-w-full px-6">
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="dark:text-white">Listado de Empresas Receptoras</h6>
                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                        <table
                            class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        ID</th>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Nombre</th>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Dirección</th>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        RFC</th>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Email</th>

                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    </th>
                                </tr>
                            </thead>

                            @if ($empresa_receptora->count())
                                <tbody>

                                    @foreach ($empresa_receptora as $receptora)
                                        <tr>

                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <p
                                                    class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-slate-400">
                                                    {{ $receptora->id }} </p>
                                            </td>

                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <p
                                                    class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-slate-400">
                                                    {{ $receptora->nombre }}</p>
                                            </td>

                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <p
                                                    class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-slate-400">
                                                    {{ $receptora->direccion }}</p>
                                            </td>

                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <p
                                                    class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-slate-400">
                                                    {{ $receptora->rfc_receptor }}</p>
                                            </td>

                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <p
                                                    class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-slate-400">
                                                    {{ $receptora->email }}</p>
                                            </td>

                                            <form action="{{ route('receptora.destroy', $receptora->id) }}" method="POST"
                                                id="form-delete">
                                                @csrf
                                                @method('DELETE')
                                                <td
                                                    class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                    <button type="submit"
                                                        class="eliminar-factura px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-200 hover:bg-red-500 hover:border-red-500 hover:text-white focus:outline-none">
                                                        Eliminar
                                                    </button>
                                                </td>
                                            </form>

                                        </tr>
                                    @endforeach
                                </tbody>
                            @else
                                <p class="p-10 text-center">No hay Empresas Receptoras Registradas</p>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
