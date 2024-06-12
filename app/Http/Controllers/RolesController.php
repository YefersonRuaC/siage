<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Rol = 1
     */
    public function aprendiz()
    {
        return view('aprendiz.index');
    }

    /**
     * Rol = 2
     */
    public function instructor()
    {
        return view('instructor.index');
    }

    /**
     * Rol = 3
     */
    public function admin()
    {
        return view('admin.index');
    }

    /**
     * Rol = 4
     */
    public function apoyo()
    {
        return view('apoyo.index');
    }

    /**
     * Rol = 5
     */
    public function practica()
    {
        return view('practica.index');
    }
}
