<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Models\News;
use App\Traits\ImageUploader;
use App\Traits\Responser;
use Illuminate\Http\Request;
use PHPUnit\Exception;

class NewsController extends Controller
{
    use ImageUploader;
    use Responser;


    public function index(){
        $News = News::query()->paginate(10);
        return ($News);
    }
    public function selectOne($id){
        $news = News::find($id);
        return response()->json($news);
    }

    public function AddNews(NewsRequest $request ){
        try {
            $news = News::create([
                'name'=>$request['name'],
                'description'=>$request['description'],
//                'image'=>$request['image'],

            ]);
            if ($request->has('image')){
                $this->uploadImage($request , 'news' , $news , 'image');
            }
            return response()->json($news);

        }catch (Exception $e){
             return $this->responseFailed('Something went wrong' , $e);

        }

    }


    public function delete($id)
    {
        try {
            News::find($id)->delete();
            //
            return \response()->json(['Message' => 'deleted', 'status' => '200']);
        } catch (\Exception $e) {
            return $this->responseFailed('Failed', $e);
        }
    }


}
