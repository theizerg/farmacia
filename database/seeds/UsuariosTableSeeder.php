<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       
        
        $user = new User;
        $user->name     = 'Theizer';
        $user->username = 'laradmin';
        $user->genero   = 'M';
        $user->lastname = 'Gonzalez';
        $user->email    = 'admin@mail.com';
        $user->password = 'admin';
        $user->status   = 1; // (1) active (0)disabled
        $user->sucursal_id   = 1;
        $user->save();

        $user->assignRole('Super Administrador');


        $user = new User;
        $user->name     = 'Ada';
        $user->username = 'laragerente';
        $user->genero   = 'F';
        $user->lastname = 'Tovar';
        $user->email    = 'gerente@mail.com';
        $user->password = 'admin';
        $user->status   = 1; // (1) active (0)disabled
        $user->sucursal_id   = 2;
        $user->save();

        $user->assignRole('Gerente');


        $user = new User;
        $user->name     = 'Luis';
        $user->username = 'larausuario';
        $user->genero   = 'F';
        $user->lastname = 'Hernandez';
        $user->email    = 'usuario@mail.com';
        $user->password = 'admin';
        $user->status   = 1; // (1) active (0)disabled
        $user->sucursal_id   = 2;
        $user->save();

        $user->assignRole('Usuario');
    }
}
