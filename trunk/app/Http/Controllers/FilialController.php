<?php

namespace App\Http\Controllers;

use App\Filial;
use Illuminate\Http\Request;

class FilialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $filialAll = \App\Model\Filial::all();
        $data = array( 'filialAll' =>  $filialAll );
        return view( 'filial.index' , $data );
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
     * @param  \App\Filial  $filial
     * @return \Illuminate\Http\Response
     */
    public function show(Filial $filial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Filial  $filial
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\Model\Filial $filial , $id )
    {
        //
        if( 'new' == $id ){
            $filialOne = new \App\Model\Filial();
            $filialOne->setAttribute( $filialOne->getKeyName() , 'new' );
        }
        else{
            $filialOne = \App\Model\Filial::find(  $id   );
        }
        $data = array( 'filialOne' =>  $filialOne );
        return view( 'filial.edit' , $data );     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Filial  $filial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id )
    {
        //
        $errors = array();
        $errors = $this->validate($request , array(
            'Name' => 'required|max:50',
            'Adress' => 'required|max:100',
        ));

        if( empty($errors) ){
            //дергаем запись
            if( 'new' == $id ){
                $filialOne = new \App\Model\Filial();
            }
            else{
                $filialOne = \App\Model\Filial::find(  $id   );
            }
            if( empty($filialOne) ){
                $this->throwValidationException($request,  array( 'Нет записи' ) );
            }

            $post = $request->input();
            $post =  $filialOne->parseData( $post );
            //$filialOne->validSave( $post );
            $filialOne->setFieldAll($post);
            $filialOne->save();

        }
        //проверка данных
        //запись данынх
        return  redirect('/filial/'.$filialOne->getId() )->withInput( array( 'flash' => 'Сохранено' ) );    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Filial  $filial
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        //
        $filialOne = \App\Model\Filial::find(  $id   );
        if( empty($filialOne) ){
            $this->throwValidationException($request,  array( 'Нет записи' ) );
        }
        $filialOne->delete();
        return  redirect('/filial/'.$filialOne->getId() )->withInput( array( 'flash' => 'Сохранено' ) );
    }
}
