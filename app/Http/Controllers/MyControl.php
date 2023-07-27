<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyControl extends Controller
{
   
    public function inscrire()
    {
        return view("welcome",["titre"=>"inscrire "]);
    }
    public function connexion()
    {
        return view("welcome",["titre"=>"connexion"]);
    }
    public function admin()
    {
        return view("welcome",["titre"=>"admin"]);
    }
    public function creation()
    {
        return view("page.page",["titre"=>"creation"]);
    }
    public function acceuil()
    {
        return view("page.page",["titre"=>"article"]);
    }
    public function compte()
    {
        return view("page.page",["titre"=>"connexion success"]);
    }
}
