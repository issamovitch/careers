<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Cyberduck\LaravelExcel\Contract\SerialiserInterface;
use App\Field;

class CustomSerialiser implements SerialiserInterface{

    public $headers = [];

    public function __construct($headers){
        $this->headers = $headers;
    }

    public function getData($s)
    {
        $data = [];
        

            $data[0] = $s->created_at->format("Y-m-d");
            $data[1] = ($s->image)?asset("storage/app/".$s->image):"";
            $data[2] = @$s->job->name;
            $c = 3;
            $fields = Field::orderby("id", "asc")->get();
            foreach ($fields as $field){
                $string = " ";
                foreach($s->metas as $meta):
                    if(@$meta->field->id==$field->id):
                        if(@$meta->field->type=="file"):
                            $string.=asset("storage/app/".$meta->value);
                        else:
                            $string.= $meta->value;
                        endif;
                    endif;
                endforeach;
                $data[$c] = $string;
                $c++;
            }

/*
            $data[3] = $string;

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
            $data[4] = $string;



        //dd($data);
*/
        return$data;
    }

    public function getHeaderRow()
    {
        $data = [
            "التاريخ",
            "الصورة",
            "الوظيفة",
        ];
        return array_merge($data, $this->headers);
    }
}