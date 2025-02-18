<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;

class Article extends Model
{
    use HasFactory , SoftDeletes;

    public function __construct(array $attributes = [])
    {
        $this->table = config('database.models.' . class_basename(__CLASS__) . '.table');
        $this->fillable = config('database.models.' . class_basename(__CLASS__) . '.fillable');
        $this->hidden = config('database.models.' . class_basename(__CLASS__) . '.hidden');

        parent::__construct($attributes);
    }

    public static function createArticle(Request $request){

        $data = $request->only((new self)->getFillable());

        return self::create($data);
    }

    public static function activity(){

        $someContentModel =new self();

        activity()
            ->causedBy(new User())
            ->performedOn($someContentModel)
            ->tap(function(Activity $activity) {
                $activity->my_custom_field = 'my special value';
            })
            ->log('edited');

        $lastActivity = Activity::all()->last();

        return $lastActivity->my_custom_field;

//         activity()
//
//             ->by(new User())
//
//            ->on($someContentModel)
//
////             ->withProperties(['title' => 'rohail is here'])
//
//             ->event('verified')
//
//             ->log('The user has verified the content model.');

//            ->log('edited');


//        $lastActivity = Activity::all()->last();

//        return $lastActivity->where('properties->title', 'rohail is here')->get();

//        return $lastActivity->getExtraProperty('title');

//        return $lastActivity->causer;
    }

}
