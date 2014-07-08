<?php

class Author extends BaseModel {

        protected $table = 'authors';


        // Add your validation rules here
	public static $rules = [
		'name' => 'required|unique:authors,name,:id'
	];

	// Don't forget to fill this array
	protected $fillable = ['name'];
        
        
        public function Books()
        {
            return $this->hasMany('Book');
        }
        
        public static function boot()
        {
            parent::boot();
            
            self::deleting(function($author){
                if($author->books->count() > 0){
                    $html = 'Penulis tidak bisa dihapus karena masih memiliki buku : ';
                    $html .= '<ul>';
                    foreach ($author->books as $book)
                    {
                        $html .= "<li>$book->title</li>";
                    }
                    $html .= '</ul>';
                    Session::flash('errorMessage', $html);
                    return false;
                }
                return true;
            });
        }

}