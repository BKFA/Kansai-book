<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    //Ở đây ta ko cần kiểm tra quyền user nên chỉ việc return true luôn, neu can thi de false va check
    public function authorize() 
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){

        $regex = '/^[A-Za-z0-9-éèàù]{1,50}?(,[A-Za-z0-9-éèàù]{1,50})*$/';
        $id = $this->post ? ',' . $this->post->id : '';

        return $rules = [
            'title' => 'bail|required|min:10|max:255',
            'content' => 'bail|required|max:65000',
            'slug' => 'bail|required|max:255|unique:post,ansititle' . $id,
            'description' => 'bail|required|max:65000',
            'metades' => 'bail|required|max:65000',
            'metakey' => 'bail|required|regex:' . $regex,
            'seotitle' => 'bail|required|max:255',
            'idTopic' => 'required',
            'addtag' => 'nullable|regex:' . $regex,
            'idTag' => 'required',
        ];
    }

    // public function messages(){
    //     return [
    //         'idTopic.required' => 'Bạn chưa chọn topic',
    //         'title.required' => 'Bạn chưa nhap title',
    //         'idTag.required' => 'Bạn chưa chọn tag',
    //         'description.required' => 'Bạn chưa nhập mo ta',
    //         'content.required' => 'Bạn chưa nhập content',
    //     ];
    // }

}
