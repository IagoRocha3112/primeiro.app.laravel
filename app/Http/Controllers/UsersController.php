<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function index() 
    {
        // Get all users of model (database)
        $users = User::paginate(5);
        // return list of users to view
        return view('users.index', compact('users'));

    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        if($user->save()) {
            echo '
            <script>
                alert("Usuário cadastrado!");
                location.href="/users";
            </script>
            ';
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if($user) {
            if($user->delete()) {
                echo '
                <script>
                    alert("Usuário apagado!");
                    location.href="/users";
                </script>
                ';
            }
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        if($user) {
            return view('users.edit', compact('user'));
        } else {
            echo '
                <script>
                    alert("Usuário não encontrado!");
                    location.href="/users";
                </script>
                ';
        }
    }

    public function update($id, Request $request)
    {        
        $user = User::find($id);
        if($user) {
            $user->name = $request->name;
            $user->email = $request->email;
            if($request->password != '') {
                $user->password = bcrypt($request->password); 
            }
            if ($user->save()) {
                echo '
                <script>
                    alert("Usuário atualizado!");
                    location.href="/users";
                </script>
                ';
            }
        } else {
            echo '
                <script>
                    alert("Usuário não encontrado!");
                    location.href="/users";
                </script>
                ';
        }
               
    }
}
