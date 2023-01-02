<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class Students extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'major_id',
    ];
    
    public function major() {
        return $this->belongsTo(Majors::class,'major_id');
    }

    public static function sendStudentEmail($student,$pdf) {
        $path = Storage::put('public/storage/uploads/'.'-'.rand().'_'.time().'.'.'pdf',$pdf->output());
        Storage::put($path,$pdf->output());
        $viewData['name'] = $student->name;
        $viewData['email'] = $student->email;
        $viewData['phone'] = $student->phone;
        $viewData['address'] = $student->address;
        $viewData['major'] = $student->major->name;

        Mail::send('emailTemplate.emailStudentDetails',$viewData,function($msg) use($student,$pdf,$path){
            $msg->from('thethtarsoe2761@gmail.com',env('Laravel'));
            $msg->to($student->email)->subject($student->name)->attachData($pdf->output(),$path,[
                'mime' => 'application/pdf',
                'as' => $student->name.'.'.'pdf',
            ]);
        });
    }
}
