<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class BooksTableSeeder extends Seeder {

	public function run()
	{
            DB::table('books')->delete();

            $books = [
                ['id'=>1, 'title'=>'Kupinang Engkau dengan Hamdalah', 'author_id'=>2, 'amount'=>3, 'created_at'=>'2014-05-16 11:15:22', 'updated_at'=>'2014-05-16 11:15:22'],
                ['id'=>2, 'title'=>'Jalan Cinta Para Pejuang', 'author_id'=>3, 'amount'=>2, 'created_at'=>'2014-05-16 11:15:22', 'updated_at'=>'2014-05-16 11:15:22'],
                ['id'=>3, 'title'=>'Membingkai Surga dalam Rumah Tangga', 'author_id'=>4, 'amount'=>4, 'created_at'=>'2014-05-16 11:15:22', 'updated_at'=>'2014-05-16 11:15:22'],
                ['id'=>4, 'title'=>'Cinta & Seks Rumah Tangga Muslim', 'author_id'=>4, 'amount'=>3, 'created_at'=>'2014-05-16 11:15:22', 'updated_at'=>'2014-05-16 11:15:22']

            ];
            
            DB::table('books')->insert($books);
	}

}