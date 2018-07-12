<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ {
    Post,
    Tag,
    Comment
};

class post extends Model
{
    //
    protected $table = "post";
    protected $primaryKey = 'idpost';

    protected $fillable = [
        'idpost', 'idtopic', 'iduser', 'title', 'ansititle', 'seotitle', 'description', 'contentpost', 'metades', 'metakeyword', 'active', 'urlimage', 'view', 'status', 'type', 'parent', 'rate', 'created_at', 'updated_at',
    ];

    public function topic(){
        return $this->belongsTo('App\Models\topic', 'idtopic');
    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'iduser');
    }

    public function comment(){
        return $this->hasMany('App\Models\comment', 'idpost', 'idcomment');
    }

    public function tag(){
        return $this->belongsToMany('App\Models\tag', 'post_tag', 'idpost', 'idtag')->withTimestamps();
    }

    public function getListPost(){
        return $this->get();
    }

    public function getPost($idpost){

        return $this->where('idpost', $idpost)->with('topic')->first();
    }

    // public function createPost($input, $img){
    //     $id = 1;
    //     $tags = $input->get('idTag');
    //     // $this->create([
    //     //     'idtopic' => $input->get("idTopic"),
    //     //     'iduser' => $id,
    //     //     'title' => $input->get('title'),
    //     //     'ansititle' => changeTitle($input->get('title')),
    //     //     'description' => $input->get('description'),
    //     //     'contentpost' => $input->get('content'),
    //     //     'urlimage' => $img,
    //     // ]);

    //     $this->idtopic = $input->get('idTopic');
    //     $this->iduser = $id;
    //     $this->title = $input->get('title');
    //     $this->ansititle = changeTitle($input->get('title'));
    //     $this->description = $input->get('description');
    //     $this->contentpost = $input->get('content');
    //     $this->urlimage = $img;

    //     $this->save();
        
    //     $this->tag()->sync($tags);

    //     return  true;
    // }

     /**
     * Create post.
     *
     * @param  \App\Http\Requests\PostRequest  $request
     * @return void
     */

    public function createPost($request, $img)
    {
        $request->replace([
            'idtopic' => $request->idTopic,
            'iduser' => "1",
            'idTag' => $request->idTag,
            'title' => $request->title,
            'ansititle' => $request->slug,
            'seotitle' => $request->seotitle,
            'description' => $request->description,
            'contentpost' => $request->content,
            'active' => isset($request->active) ? $request->active : false,
            'metades' => $request->metades,
            'metakeyword' => $request->metakey,
            'seotitle' => $request->seotitle,
            'urlimage' => $img,
            'addTag' => $request->addTag,
        ]);
        
        $post = $this->create($request->all());
        $this->saveTags($post, $request);
    }

    /**
     * Save categories and tags.
     *
     * @param  \App\Models\Post  $post
     * @param  \App\Http\Requests\PostRequest  $request
     * @return void
     */
    protected function saveTags($post, $request)
    {
        $tags_id = $request->idTag;
       
        if ($request->addTag) {
            $tags = explode(',', $request->addTag);
            foreach ($tags as $tg) {
                $tag_ref = tag::firstOrCreate(['tag' => $tg, 'ansitag' => changeTitle($tg)]);
                $tags_id[] = $tag_ref->idtag;
            }
        }

        $post->tag()->sync($tags_id);
    }

    public function updatePost($input, $idpost, $img){
        $post = $this->getPost($idpost);
        $id = 1;
        $tags = $input->get('idTag');
        $post->idtopic = $input->get('idTopic');
        $post->iduser = $id;
        $post->title = $input->get('title');
        $post->ansititle = changeTitle($input->get('title'));
        $post->description = $input->get('description');
        $post->contentpost = $input->get('content');
        $post->urlimage = $img;

        $post->save();
        
        $post->tag()->sync($tags);

        return  true;
    }

    public function deletePost($idpost){
        return $this->find($idpost)->delete();
    }

}
