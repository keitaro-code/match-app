<?php

namespace App\Http\Controllers;

use App\Models\UserList;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userLists = UserList::latest()->get();

        return view('users.user_list')
            ->with(['userLists' => $userLists]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userList = new UserList();
        $userList->title = $request->title;
        $userList->body = $request->body;


        // 追加（画像機能）
        $request->validate([
			'image' => 'required|file|image|mimes:png,jpeg'
		]);
		$upload_image = $request->file('image');

		if($upload_image) {
			//アップロードされた画像を保存する
			$path = $upload_image->store('uploads',"public");
			//画像の保存に成功したらDBに記録する
			if($path){
                $userList->file_name = $upload_image->getClientOriginalName();
                $userList->file_path = $path;
			}
		}

        $userList->save();
        
        return redirect()
            ->route('users.user_list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserList  $userList
     * @return \Illuminate\Http\Response
     */
    public function show(UserList $userList)
    {
        return view('users.show')
            ->with(['userList' => $userList]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserList  $userList
     * @return \Illuminate\Http\Response
     */
    public function edit(UserList $userList)
    {
        return view('users.edit')
            ->with(['userList' => $userList]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserList  $userList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserList $userList)
    {
        $userList->title = $request->title;
        $userList->body = $request->body;
        $userList->save();

        return redirect()
            ->route('users.show', $userList);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserList  $userList
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserList $userList)
    {
        $userList->delete();

        return redirect()
            ->route('users.user_list');
    }
}
