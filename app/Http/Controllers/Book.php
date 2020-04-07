<?php

namespace App\Http\Controllers;

use App\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Book extends Controller
{
    /**
     * @param Books $model
     * @param Request $request
     */
    function key(){
        return response(Str::random(32));
    }

    public function show(Books $model)
    {
        $count = $model->count();
        
        if($count == 0){
            $success = false;
            $message = "Data not found";
            $books = [];            
        }else{
            $success = true;
            $message = "Success, show all books";
            $books = $model->all();
        }
        return response()->json([
            "success" => $success,
            "message" => $message,
            "total_row" => $count,
            "data" => $books
        ], 200);
    }

    public function getBook(Books $model, $id)
    {
        
        $findBook = $model->find($id);
        if($findBook){
            $success = true;
            $message = "Success, Book with id ". $id;
            $book = $model->find($id);  
        }else{
            $success = false;
            $message = "Book with id ". $id ." not found";
            $book = [];      
        }
        return response()->json([
            "success" => $success,
            "message" => $message,
            "data" => $book
        ], 200);
    }

    public function store(Books $model, Request $request)
    {
        $this->validate($request, [
            "title" => "required",
            "author" => "required",
            "publisher" => "required",
            "year" => "required",
            "page" => "required"
        ]);

        $book = $model->create($request->all());

        if ($book) {
            return response()->json([
                "success" => true,
                "message" => "Success add book",
                "data" => $book
            ], 201);
        } else {
            return response()->json([
                "success" => false,
                "message" => "Fail, book not added",
                "data" => []
            ], 400);
        }
    }

    public function update(Books $model, Request $request, $id)
    {
        $book  = $model->find($id);
        
        $updateBook = $book->update($request->all());
        
        if (!$book) {
            return response()->json([
                "success" => false,
                "message" => "Book with id ". $id ." not found",
            ], 404);
        }

        if($updateBook){
            $success = true;
            $message = "Success, book has been updated";
            $status = 200;
        }else{
            $success = false;
            $message = "Fail, book not updated";
            $status = 404;
        }
        return response()->json([
            "success" => $success,
            "message" => $message,
            "data" => $book
        ], $status);
    }

    public function delete(Books $model, Request $request, $id)
    {
        $book  = $model->find($id);

        if (!$book) {
            return response()->json([
                "success" => false,
                "message" => "Book with id ". $id ." not found",
            ], 404);
        }

        $deleteBook = $book->delete();

        if($deleteBook){
            $success = true;
            $message = "Success, book has been deleted";            
        }else{
            $success = false;
            $message = "Fail, Book not deleted";
        }

        return response()->json([
            "success" => $success,
            "message" => $message,
        ], 200);
    }
}
