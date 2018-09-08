<?php

namespace App;

use Carbon\Carbon;

class Post extends Model
{
    // protected $fillable = ['title', 'body'];
    // protected $guarded = ['user_id']; // guarded is inverse of protected; fields not allowed
    // protected $guarded = []; // empty array means we aren't guarding anything
    // Alternatively, we can create a parent class. See app/Model.php

    public function comments()
    {
      return $this->hasMany(Comment::class); // full string representation of the full class
    }
    // using $post-comments in tinker will return a string of all comments

    public function user() // $comment->post->user
    {
      return $this->belongsTo(User::class);
    }

    public function addComment($body)
    {
      // We could use the long-form way from CommentsContrller; instead we use Eloquent:
      $this->comments()->create(compact('body'));
    }

    public function scopeFilter($query, $filters)
    {
      if (isset($filters['month'])){
        if ($month = $filters['month']) {
          $query->whereMonth('created_at', Carbon::parse($month)->month);
        }
      }

      if (isset($filters['year'])){
        if ($year = $filters['year']) {
          $query->whereYear('created_at', $year);
        }
      }
    }

    public static function archives()
    {
      // MySQL version
      return static::selectRaw(
                'year(created_at) year,
                monthname(created_at) month,
                count(*) published'
                )
                ->groupBy('year', 'month')
                ->orderByRaw('min(created_at) desc')
                ->get()
                ->toArray();

      /*
      // SQLite version
      return static::selectRaw(
               'strftime("%Y", created_at) as year,
               rtrim(
                 substr(
                   "January  February March    April    May     June     July     August   September
                   October  November December",
                   strftime("%m", created_at) * 9 - 9, 9)) as month,
               count(*) published'
             )
             ->groupBy('year', 'month')
             ->orderByRaw('min(created_at) desc')
             ->get()
             ->toArray();
      */

             /*
               // Substring for short month names rather than long
               substr(
                 "  JanFebMarAprMayJunJulAugSepOctNovDec",
                 strftime("%m", created_at) * 3, 3)
                 as month,
             */

    }




}
