<?php

namespace App\Http\Controllers;

use App\Usluga;
use Illuminate\Http\Request;

class UslugaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//        $user =  \Illuminate\Support\Facades\Auth::user();
//echo $user->hasRole('owner')."\n";   // false
//echo $user->hasRole('admin')."\n";   // true
//echo $user->can('edit-user')."\n";   // false
//echo $user->can('create-post')."\n"; // true
//$t =  $user->can('create-post');


//$owner->attachPermissions(array($createPost, $editUser));
// equivalent to $owner->perms()->sync(array($createPost->id, $editUser->id));




        $uslugaAll = \App\Model\Usluga::all();
        $data = array( 'uslugaAll' =>  $uslugaAll );
        return view( 'usluga.index' , $data );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usluga  $usluga
     * @return \Illuminate\Http\Response
     */
    public function show(Usluga $usluga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usluga  $usluga
     * @return \Illuminate\Http\Response
     */
    public function edit( \App\Model\Usluga $usluga , $id )
    {
        //        
        $uslugaOne = \App\Model\Usluga::find(  $id   );
        $data = array( 'uslugaOne' =>  $uslugaOne );
        return view( 'usluga.edit' , $data );        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usluga  $usluga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $errors = array();
        $errors = $this->validate($request , array(
            'Name' => 'required|max:10',
        ));
            
        if( empty($errors) ){
            //дергаем запись
            if( 'new' == $id ){
                $uslugaOne = new \App\Model\Usluga();
            }
            else{
                $uslugaOne = \App\Model\Usluga::find(  $id   );
            }
            if( empty($uslugaOne) ){
                $this->throwValidationException($request,  array( 'Нет записи' ) );
            }
        
            $post = $request->input();
            $post =  $uslugaOne->parseData( $post );
            //$uslugaOne->validSave( $post );
            $uslugaOne->setFieldAll($post);
            $uslugaOne->save();
            
        }
        //проверка данных
        //запись данынх
        return  redirect('/usluga/'.$uslugaOne->getId() )->withInput( array( 'flash' => 'Сохранено' ) );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usluga  $usluga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usluga $usluga)
    {
        //
    }
}
