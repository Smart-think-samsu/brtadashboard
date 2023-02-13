<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\RolePermission;

class PermissionController extends Controller
{
    public function index($id)
    {
      
        $role = Role::findOrFail($id);
        $menus = config('permissions');
        $permissionsAlreadySaved = RolePermission::where('role_id', $id)->orderBy('menu_name')->get()->toArray();

        foreach ($menus as $key => $value) {
            foreach ($permissionsAlreadySaved as $permission) {
                if ($permission['menu_name'] == $menus[$key]['menu_name']) {
                    $menus[$key]['create'] = $permission['create'];
                    $menus[$key]['view'] = $permission['view'];
                    $menus[$key]['edit'] = $permission['edit'];
                    $menus[$key]['delete'] = $permission['delete'];
                }
            }
        }

        return view('backend.permission.index',compact('role', 'menus'));
        
    }

    public function store(Request $request, $id)
    {
        //return $request;

        foreach ($request->menus as $key => $value) {
            $insert = true;
            $crud = [$value['create'], $value['view'], $value['edit'], $value['delete']];

            if (in_array($insert, $crud)) {
                RolePermission::updateOrCreate([
                    'role_id' => $id,
                    'menu_name' =>  $value['menu_name'],
                ], [
                    'role_id'  =>  $id,
                    'menu_name' =>  $value['menu_name'],
                    'create' =>  $value['create'] ? 1 : 0,
                    'edit'   =>  $value['edit'] ? 1 : 0,
                    'delete' =>  $value['delete'] ? 1 : 0,
                    'view'   =>  $value['view'] ? 1 : 0,
                ]);
            } else {
                $permissionToDelete = RolePermission::whereRoleId($id)->whereMenuName($value['menu_name'])->first();
                if ($permissionToDelete) {
                    $permissionToDelete->delete();
                }
            }
        }
        //return "successfully create";
        return redirect()->route('role_add.index');
    }


}
