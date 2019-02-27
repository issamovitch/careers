<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Field;
use App\Subscriber;
use App\Meta;
use App\Setting;
use App\Job;
use Exporter;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except("add", "index");
    }

    public function add(Request $request){

        $files = [];
        $location = $request->location;
        foreach ($request->all() as $k=>$v) {
            $filename = $k;
            echo $filename;
            if (strpos($k, 'file' . $location . '_') !== false) {
                $id = str_replace('file' . $location . '_', "", $k);
                $path = $request->file($filename)->store('uploads/metas');
                array_push($files, [$id,$path]);
            }
        }

        $files2 = [];
        $location2 = 0;
        foreach ($request->all() as $k=>$v) {
            $filename = $k;
            echo $filename;
            if (strpos($k, 'file' . $location2 . '_') !== false) {
                $id = str_replace('file' . $location2 . '_', "", $k);
                $path = $request->file($filename)->store('uploads/metas');
                array_push($files2, [$id,$path]);
            }
        }

        /*$others = Subscriber::where("email", $request->Email)->first();
        if($others)
            return redirect()->back()->with('error' ,"عذرا البريد الإلكتروني مستعمل !");
        */

        $subscriber = new Subscriber;
        $subscriber->firstname = $request->Firstname;
        $subscriber->lastname = $request->Lastname;
        $subscriber->email = $request->Email;
        $subscriber->job_id = $request->location;
        $subscriber->street = $request->Street;
        $subscriber->nstreet = $request->Nstreet;
        $subscriber->city = $request->City;
        $subscriber->country = $request->Country;

        if($request->hasFile("monfichier")){
                $path = $request->file('monfichier')->store('uploads/subscribers');
                $subscriber->image = $path;
            }

         $subscriber->save();

         $location = $request->location;

        foreach ($files as $v) {
            $meta = new Meta;
            $meta->subscriber_id = $subscriber->id;
            $meta->field_id = $v[0];
            $meta->value = $v[1];
            $meta->save();
        }

        foreach ($request->all() as $k=>$v) {
            echo "$k<br>";
            if (strpos($k, 'field' . $location . '_') !== false) {
                $id = str_replace('field' . $location . '_', "", $k);
                $meta = new Meta;
                $meta->subscriber_id = $subscriber->id;
                $meta->field_id = $id;
                $meta->value = (is_array($v)) ? (implode(";", $v)) : $v;
                $meta->save();
            }
        }

        foreach ($files2 as $v) {
            $meta = new Meta;
            $meta->subscriber_id = $subscriber->id;
            $meta->field_id = $v[0];
            $meta->value = $v[1];
            $meta->save();
        }

        foreach ($request->all() as $k=>$v) {
            echo "$k<br>";
            if (strpos($k, 'field' . $location2 . '_') !== false) {
                $id = str_replace('field' . $location2 . '_', "", $k);
                $meta = new Meta;
                $meta->subscriber_id = $subscriber->id;
                $meta->field_id = $id;
                $meta->value = (is_array($v)) ? (implode(";", $v)) : $v;
                $meta->save();
            }
        }


        $settings = Setting::all()->keyby("key");
        return redirect()->back()->with('success' ,@$settings["success_message"]->value);
    }

    public function index(){
        $fields = Field::orderby("id", "asc")->get();
        $jobs = Job::with("fields")->get();
        $settings = Setting::all()->keyby("key");
        $fields2 = Field::where("location", 0)->orderby("id", "asc")->get();

        return view('welcome', compact("jobs", "settings", "fields2"));
    }

    public function home(){
        $num1 = Subscriber::count();
        $num2 = Subscriber::where("nominated", 1)->count();
        $num3 = Subscriber::where("nominated", 0)->count();
        $num4 = Job::count();
        $last = Subscriber::where("nominated", 1)->orderby("id", "desc")->limit(5)->get();
        $jobs = Job::with("fields")->orderby("id", "desc")->get();

        return view("home", compact("num1", "num2", "num3", "num4", "last", "jobs"));
    }

    public function subs(){
        $subscribers = Subscriber::with("job")->orderby("id", "desc")->get();
        $jobs = Job::orderby("id", "desc")->get();
        $cities = Subscriber::select('city')->distinct()->get();
        $registered_cities = Meta::whereHas('field', function($q) {$q->where("type","country");})->get();

        foreach ($subscribers as $subscriber){
            $m = Meta::where("subscriber_id", $subscriber->id)->whereHas('field', function($q) {$q->where("type","name");})->first();
            $subscriber->name = @$m->value;
            $m = Meta::where("subscriber_id", $subscriber->id)->whereHas('field', function($q) {$q->where("type","email");})->first();
            $subscriber->email = @$m->value;
            $m = Meta::where("subscriber_id", $subscriber->id)->whereHas('field', function($q) {$q->where("type","country");})->first();
            $subscriber->country = @$m->value;
        }

        return view("sub.index", compact("subscribers", "jobs", "cities", "registered_cities"));
    }

    public function show_sub($id){
        $subscriber = Subscriber::with("job", "metas.field")->where("id", $id)->first();
        if(!$id or !$subscriber)
            return redirect()->back();

        return view("sub.show", compact("subscriber"));
    }

    public function edit_sub($id){
        $subscriber = Subscriber::with("metas.field")->where("id", $id)->first();
        if(!$id or !$subscriber)
            return redirect()->back();

        return view("sub.edit", compact("subscriber"));
    }

    public function update_sub(Request $request, $id){
        $subscriber = Subscriber::with("metas.field")->where("id", $id)->first();
        if(!$id or !$subscriber)
            return redirect()->back();

        $other = Subscriber::where("email", $request->email)->where("id", "!=", $subscriber->id)->first();
        if($other)
            return redirect()->back()->with("error", "عذرا البريد الإلكتروني مستعمل !");

        $subscriber->firstname = $request->firstname;
        $subscriber->lastname = $request->lastname;
        $subscriber->email = $request->email;
        $subscriber->street = $request->street;
        $subscriber->nstreet = $request->nstreet;
        $subscriber->city = $request->city;
        $subscriber->country = $request->country;
        if($request->hasFile("image")){
            $request->validate(["image"=>"required|image"]);
            $path = $request->image->store('uploads/subscribers');
            $subscriber->image = $path;
        }
        $subscriber->save();

        return redirect()->back()->with("success", "تم تعديل الحساب");
    }

    public function delete_sub($id){
        $subscriber = Subscriber::with("metas.field")->where("id", $id)->first();
        if(!$id or !$subscriber)
            return redirect()->back();

        Meta::where("subscriber_id", $id)->delete();
        $subscriber->delete();

        return redirect()->back()->with("success", "تم حذف الحساب");
    }

    public function nominate($id){
        $subscriber = Subscriber::find($id);
        if(!$id or !$subscriber)
            return redirect()->back();

        $subscriber->nominated = 1;
        $subscriber->save();

        return redirect()->back()->with("success", "تم ترشيح الحساب");
    }

    public function unnominate($id){
        $subscriber = Subscriber::find($id);
        if(!$id or !$subscriber)
            return redirect()->back();

        $subscriber->nominated = 0;
        $subscriber->save();

        return redirect()->back()->with("success", "تم إلغاء ترشيح الحساب");
    }

    public function denominate($id){
        $subscriber = Subscriber::find($id);
        if(!$id or !$subscriber)
            return redirect()->back();

        $subscriber->nominated = 2;
        $subscriber->save();

        return redirect()->back()->with("success", "تم إستبعاد الحساب");
    }

    public function undenominate($id){
        $subscriber = Subscriber::find($id);
        if(!$id or !$subscriber)
            return redirect()->back();

        $subscriber->nominated = 0;
        $subscriber->save();

        return redirect()->back()->with("success", "تم إلغاء إستبعاد الحساب");
    }

    public function save_note(Request $request, $id){
        $subscriber = Subscriber::find($id);
        if(!$id or !$subscriber)
            return redirect()->back();

        $subscriber->note = $request->note;
        $subscriber->save();

        return redirect()->back()->with("success", "تم حفظ الملاحظة");
    }

    public function users()
    {
        $users = User::all();

        return view('users.users', compact("users"));
    }

    public function add_user(){
        return view("users.add_user");
    }

    public function save_user(Request $request){
        $request->validate(["email"=>"required|email|unique:users"]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->back()->with("success", "تم إضافة المستخدم");
    }

    public function edit_user($id){
        $user = User::find($id);

        return view("users.edit_user", compact("user"));
    }

    public function update_user(Request $request){
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        if($user->password!="")
            $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->back()->with("success", "تم تعديل المستخدم");
    }

    public function delete_user($id){
        $user = User::find($id);
        $user->delete();
        Meta::where("subscriber_id", $id)->delete();

        return redirect()->back()->with("success", "تم حذف المستخدم");
    }

    public function fields(){
        $fields = Field::with("job")->get();

        return view("fields.index", compact("fields"));
    }

    public function fields_add(){
        $jobs = Job::orderby("id", "desc")->get();

        return view("fields.add", compact("jobs"));
    }

    public function fields_save(Request $request){
        $field              = new Field;
        $field->name        = $request->name;
        $field->type        = $request->type;
        $field->job_id      = $request->job_id;
        $field->location    = $request->location;
        if (!empty(@$request->options))
            $field->options     = implode(",", $request->options);
        $field->placeholder = $request->placeholder;
        $field->required    = $request->required;
        $field->save();

        return redirect()->route("fields")->with("success", "تم حفظ الحقل");
    }

    public function fields_delete($id){
        $field = Field::find($id);
        $field->delete();

        return redirect()->back()->with("success", "تم حذف الحقل");
    }

    public function fields_edit($id){
        $jobs = Job::orderby("id", "desc")->get();
        $field = Field::find($id);

        return view("fields.edit", compact("field", "jobs"));
    }

    public function fields_update(Request $request){

        $field              = Field::find($request->id);
        $field->name        = $request->name;
        $field->type        = $request->type;
        $field->job_id      = $request->job_id;
        $field->location    = $request->location;
        if (!empty(@$request->options))
            $field->options     = implode(",", $request->options);
        $field->placeholder = $request->placeholder;
        $field->required    = $request->required;
        $field->save();

        return redirect()->back()->with("success", "تم تعديل الحقل");
    }

    public function export(Request $request){
        //dd($request->all());
        $subscribers = Subscriber::with("job", "metas.field")->orderby("id", "desc");
        if(@$request->job and @$request->job!="0")
            $subscribers = $subscribers->where("job_id", @$request->job);
        if(@$request->country and @$request->country!="0")
            $subscribers = $subscribers->where("country", @$request->country);
        if(@$request->nominated and @$request->nominated!="all")
            $subscribers = $subscribers->where("nominated", @$request->nominated);
        if(@$request->nominated=="0")
            $subscribers = $subscribers->where("nominated", 0);

        if(@$request->date1 and !@$request->date2){
            $subscribers = $subscribers->where("created_at", ">=", $request->date1.' 00:00:00');
        }
        elseif(!@$request->date1 and @$request->date2){
            $subscribers = $subscribers->where("created_at", "<=", $request->date2.' 00:00:00');
        }
        elseif(@$request->date1 and @$request->date2){
            $subscribers = $subscribers->whereBetween("created_at", [$request->date1.' 00:00:00', $request->date2.' 00:00:00']);
        }

        $subscribers = $subscribers->get();

        //dd($subscribers);

        $fields = Field::orderby("id", "asc")->get();
        $headers = [];
        foreach ($fields as $f)
            array_push($headers, $f->name);

        $name = public_path()."/tmp/".time().".xlsx";

        $serialiser = new CustomSerialiser($headers);

        //$query = \DB::table('users')->select('name','email');
        $excel = Exporter::make('Excel');
        $excel->load($subscribers);
        $excel->setSerialiser($serialiser);
        return $excel->stream($name);



        /*$fp = fopen($name, 'w');
        foreach($this->getData($subscribers) as $line){
            fputcsv($fp, $line);
        }
        */
        //return response()->download($name);
    }

    public function export2(Request $request){
        //dd($request->all());
        $subscribers = Subscriber::with("job", "metas.field")->orderby("id", "desc");
        if(@$request->job and @$request->job!="0")
            $subscribers = $subscribers->where("job_id", @$request->job);
        if(@$request->country and @$request->country!="0")
            $subscribers = $subscribers->where("country", @$request->country);
        if(@$request->nominated and @$request->nominated!="all")
            $subscribers = $subscribers->where("nominated", @$request->nominated);
        if(@$request->nominated=="0")
            $subscribers = $subscribers->where("nominated", 0);

        if(@$request->date1 and !@$request->date2){
            $subscribers = $subscribers->where("created_at", ">=", $request->date1.' 00:00:00');
        }
        elseif(!@$request->date1 and @$request->date2){
            $subscribers = $subscribers->where("created_at", "<=", $request->date2.' 00:00:00');
        }
        elseif(@$request->date1 and @$request->date2){
            $subscribers = $subscribers->whereBetween("created_at", [$request->date1.' 00:00:00', $request->date2.' 00:00:00']);
        }

        $subscribers = $subscribers->get();

        //dd($subscribers);

        $fields = Field::orderby("id", "asc")->get();

        //$data = [ 'subscribers' => $subscribers ];
        //$pdf = \PDF::loadView('sub.pdf', $data);
        //return $pdf->stream('document.pdf');

        return view("sub.pdf", compact("subscribers"));
    }

    public function getData($subscribers){
        $data = [];
        $data[0][0] = "التاريخ";
        $data[0][1] = "الصورة";
        $data[0][2] = "الوظيفة";
        /*$x = 3;
        $arr = [];
        foreach($subscribers[0]->metas as $meta):
            if(@$meta->field->location==0):
                $arr[$x] = @$meta->field_id;
                $data[0][$x++] = @$meta->field->name. " --".@$meta->field_id;
            endif;
        endforeach;
        $data[0][$x++] = "بيانات الوظيفة";
        */
        $data[0][3] = "البيانات الشخصية";
        $data[0][4] = "بيانات الوظيفة";
        $l = 1;

        foreach ($subscribers as $s){
            $data[$l][0] = $s->created_at->format("Y-m-d");
            $data[$l][1] = ($s->image)?asset("storage/app/".$s->image):"";
            $data[$l][2] = @$s->job->name;

            /*foreach ($arr as $k=>$id):
                foreach($s->metas as $meta):
                    $val = " ";
                    if(@$meta->field_id==$id):
                        if(@$meta->field->type=="file"):
                            $val = asset("storage/app/".$meta->value);
                        else:
                            $val = $meta->value;
                        endif;
                    endif;
                    $data[$l][$k] = $val;
                endforeach;
            endforeach;*/

            $string = " ";
            foreach($s->metas as $meta):
                if(@$meta->field->location==0):
                    $string .= @$meta->field->name. ":\n";
                    if(@$meta->field->type=="file"):
                        $string.=asset("storage/app/".$meta->value)."\n";
                    else:
                        $string.= $meta->value."\n";
                    endif;
                endif;
            endforeach;
            $data[$l][3] = $string;

            $string = " ";
            foreach($s->metas as $meta):
                if(@$meta->field->location==1):
                    $string .= @$meta->field->name. ":\n";
                    if(@$meta->field->type=="file"):
                        $string.=asset("storage/app/".$meta->value)."\n";
                    else:
                        $string.= $meta->value."\n";
                    endif;
                endif;
            endforeach;
            $data[$l][4] = $string;
            $l++;
        }



        //dd($data);
        return$data;
    }

}
