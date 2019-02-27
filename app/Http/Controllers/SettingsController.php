<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Job;

class SettingsController extends Controller
{
    public function index(){
        $settings = Setting::all()->keyby("key");
        $jobs = Job::orderby("id", "desc")->get();

        return view("settings", compact("settings", "jobs"));
    }

    public function save_settings1(Request $request){
        if($request->hasFile("bg")){
            $request->validate(["bg"=>"required|image"]);
            $path = $request->bg->store("uploads");
            $this->s_save("bg", $path);
        }

        foreach ($request->except("_token", "bg") as $k=>$v){
            $this->s_save($k, $v);
        }

        return redirect()->back()->with("success", "تم حفظ البيانات بنجاح !");
    }

    public function save_settings2(Request $request){
        if($request->hasFile("loading_image")){
            $request->validate(["loading_image"=>"required|image"]);
            $path = $request->loading_image->store("uploads");
            $this->s_save("loading_image", $path);
        }

        if($request->hasFile("success_image")){
            $request->validate(["success_image"=>"required|image"]);
            $path = $request->success_image->store("uploads");
            $this->s_save("success_image", $path);
        }

        $this->s_save("color", $request->color);
        $this->s_save("upload_photo", $request->upload_photo);

        return redirect()->back()->with("success", "تم حفظ البيانات بنجاح !");
    }

    public function s_save($k, $v){
        $s = Setting::where("key", $k)->first();
        if($s){
            $s->value = $v;
            $s->save();
        }
    }

    public function save_job(Request $request){
        $job = new Job;
        $job->name = $request->name;
        $job->icon = $request->icon;
        $job->save();

        return redirect()->back()->with("success", "تم حفظ الوظيفة بنجاح !");
    }

    public function delete_job($id){
        $count = Job::count();
        if($count<=1)
            return redirect()->back()->with("error", "لا يمكن الحذف, لا يوجد سوى وظيفة واحدة !");

        $job = Job::find($id);
        $job->delete();

        return redirect()->back()->with("success", "تم حذف الوظيفة");
    }

    public function update_job(Request $request){
        $job = Job::find($request->id);

        $job->name = $request->name;
        $job->icon = $request->icon;
        $job->save();

        return redirect()->back()->with("success", "تم تعديل الوظيفة");
    }

}
