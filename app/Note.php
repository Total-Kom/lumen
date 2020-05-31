<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected static $active = 'active';
    protected static $deactive = 'deactive';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'note'
    ];

    // /**
    //  * The attributes excluded from the model's JSON form.
    //  *
    //  * @var array
    //  */
    // protected $hidden = [
    //     'choices',
    // ];

    static public function get_active()
    {
        return Note::where('choices', Note::$active)->get();
    }

    static public function get_deactive()
    {
        return Note::where('choices', Note::$deactive)->get();
    }

    public function note_close()
    {
        $this->choices = Note::$deactive;
        $this->save();
        return $this;
    }

    public function note_restore()
    {
        $this->choices = Note::$active;
        $this->save();
        return $this;
    }
}
