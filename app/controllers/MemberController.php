<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class MemberController extends BaseController{
    
    public function books()
    {
        return View::make('books.borrow')->withTitle('Pilih Buku');
        /*if(Datatable::shouldHandle())
        {
            return Datatable::collection(Book::with('author')->get())
                    ->showColumns('id', 'title', 'amount')
                    ->addColumn('author', function($model){
                        return $model->author->name;
                    })
                    ->addColumn('', function($model){
                        return link_to_route('books.borrow', 'Pinjam', ['book' => $model->id]);
                    })
                    ->searchColumns('title', 'amount', 'author')
                    ->orderColumns('title', 'amount', 'author')
                    ->make();
        }
        return View::make('books.borrow')->withTitle('Pilih Buku');*/
    }
}
