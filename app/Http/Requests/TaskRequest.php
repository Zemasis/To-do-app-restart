<?php
    namespace App\Http\Requests;
    use Illuminate\Foundation\Http\FormRequest;
    class TaskRequest extends FormRequest
    {
        public function authorize()
        {
            return true; //mặc định ai cũng có thể tạo được
        }
        public function rules()
        {
            return [
                'name' => 'required|max:20',
                'description' => 'required|min:3|max:255',
                'state' => 'required|min:1|max:255',
            ];
        }
    }
?>
