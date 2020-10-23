<?php

namespace App\Http\Controllers;

use App\Area;
use App\Category;
use App\NewsPost;
use Illuminate\Http\Request;
use App\Subcategory;
use Illuminate\Support\Facades\Validator;

class NewsPostController extends Controller
{
    public function getIndex(Request $request)
    {
        if (auth()->user()->can('news.manage')) {
            $users = User::orderBy('first_name', 'asc');
            if ($request->get('name')) {
                $users->where(function($q) use($request) {
                    $q->where('first_name', 'LIKE', '%' . $request->get('name') . '%');
                    $q->orWhere('last_name', 'LIKE', '%' . $request->get('name') . '%');
                });
            }
            if ($request->get('email')) {
                $users->where(function($q) use($request) {
                    $q->where('email', 'LIKE', '%' . $request->get('email') . '%');
                });
            }
        }
        else{
         $users = NewsPost::orderBy('first_name', 'asc')->whereId(auth()->user()->id);


        }
        return view('news.index')->withUsers($users->paginate(10));
    }

    public function postIndex(Request $request)
    {
        $params = array_filter($request->only($this->searchParams));
        return redirect()->action('NewsPostController@getIndex', $params);
    }


    public function getNewsPost(Request $request)
    {
        $timeToday =  date('Y-m-d\TH:i:s');

        $news = new NewsPost();
        $categories = Category::all();
        $areas= Area::all();

        return view('news.form',compact('news','categories' ,'areas', 'timeToday'  ));

    }

    public function getEditNews(NewsPost $news){
        $timeToday =  date('Y-m-d\TH:i:s');

        $news = new NewsPost();
        $categories = Category::all();
        $areas= Area::all();

        return view('news.form',compact('news','categories' ,'areas', 'timeToday'  ));
    }



    public function postNewsPost (Request $request, NewsPost $news)
    {
        $rules = [
            'title' => 'required|max:255',
            'image' => 'required',
            'content' => 'required|min:10',
            'categories' => 'required',
        ];


        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('news.new')->withMessage($validator->getMessageBag());

            //return response()->json(collect($validator->getMessageBag())->flatten()->toArray(), 403);
        }

       // $table->integer('user_id')->unsigned();
        //$table->string('post_by')->nullable();


        $exists = $news->exists();

     $news->user_id = \Auth::user()->id;
        $news->title = $request->get('title');
        $news->title_color = $request->get('title_color');
        $news->sub_title = $request->get('sub_title');
        $news->content = $request->get('content');
        $news->img_caption = $request->get('reporter_name');
        $news->video_caption = $request->get('video_caption');
        $news->video_url = $request->get('video_url');
        $news->img_caption = $request->get('img_caption');
        if($request->hasFile('image')){
            $file = $request->file('image');
            $file_extension = $file->getClientOriginalExtension();
            $random_name = str_random(12);
            $destination_path = public_path().'/uploads/profiles/';
            $filename = $random_name.'.'.$file_extension;
            $request->file('image')->move($destination_path,$filename);
            $news->image = $filename;
        }


        $news->save();

        if ($request->get('categories')) {
            $news->categories()->sync($request->get('categories'));
        }

        if ($request->get('categories')) {
            $news->areas()->sync($request->get('area'));
        }



        $message = trans('core.changes_saved');

        return redirect()->route('user.index')->withMessage($message);
    }


}
