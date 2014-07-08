<?php

class BooksController extends \BaseController {

    
        public function __construct() {
            $this->beforeFilter('regular', array('only' => array('borrow')));
        }

        /**
	 * Display a listing of books
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Datatable::shouldHandle())
                {
                    return Datatable::collection(Book::with('author')->get())
                            ->showColumns('id', 'title', 'amount')
                            ->addColumn('author', function($model){
                                return $model->author->name;
                            })
                            ->addColumn('', function($model){
                                $html = '<a href="'.route('admin.books.edit', ['books'=>$model->id]).'" class="uk-button uk-button-small uk-button-link">edit</a> ';
                                $html .= Form::open(array('url' => route('admin.books.destroy', ['authors'=>$model->id]), 'method'=>'delete', 'class'=>'uk-display-inline'));
                                    $html .= Form::submit('delete', array('class' => 'uk-button uk-button-small'));
                                $html .= Form::close();
                                
                                return $html;
                                //return 'edit | delete';
                            })
                            ->searchColumns('id', 'title', 'author')
                            ->orderColumns('id', 'title', 'author')
                            ->make();
                }
                
                return View::make('books.index')->withTitle('Buku');
	}

	/**
	 * Show the form for creating a new book
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('books.create')->withTitle('Tambah Buku');
	}

	/**
	 * Store a newly created book in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Book::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$book = Book::create($data);

		return Redirect::route('admin.books.index')->with('successMessage', "Berhasil menyimpan $book->title");
	}

	/**
	 * Display the specified book.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$book = Book::findOrFail($id);

		return View::make('books.show', compact('book'));
	}

	/**
	 * Show the form for editing the specified book.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$book = Book::find($id);

		return View::make('books.edit', ['book' => $book])->withTitle("Ubah $book->name");
	}

	/**
	 * Update the specified book in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$book = Book::findOrFail($id);

		$validator = Validator::make($data = Input::all(), $book->updateRules());

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$book->update($data);

		return Redirect::route('admin.books.index')->with('successMessage', "Berhasil Menyimpan $book->title");
	}

	/**
	 * Remove the specified book from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Book::destroy($id);

		return Redirect::route('admin.books.index')->with('successMessage', "Berhasil Menghapus");
	}
        
        
        /**
         * Borrow book using login id
         * 
         * @param type $id
         * @return Response
         */
        public function borrow($id)
        {
            $book = Book::findOrFail($id);
            $book->borrow();
            return Redirect::back()->with('successMessage', "Berhasil meminjam $book->title");
        }
        
        
        public function borrowDataTable()
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

}
