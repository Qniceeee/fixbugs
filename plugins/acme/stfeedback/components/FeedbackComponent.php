<?php namespace Acme\StFeedBack\Components;

use Cms\Classes\ComponentBase;
use Acme\StFeedBack\Models\FeedBack;
use October\Rain\Validation\Validator;
use October\Rain\Exception\ValidationException;
use October\Rain\Support\Facades\Flash;
use Mail;

class FeedbackComponent extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'FeedbackComponent Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onSendMessage()
    {
        $validation = validator($postParams = [
            'name' => $name = post('name'),
            'email' => $email = post('email'),
            'message' => $description = post('message'),
        ], $rules = [
            'email'=> 'required|email',
            'name'=> 'required|max:32|min:3',
            'message' => 'required|max:2000|min:3',
        ]);

        if ($validation->fails()) {
            throw new ValidationException($validation);
        }else {
            $vars = ['name' => $name, 'email' => $email, 'description' => $description];
            Mail::send('acme.stfeedback::mail.message', $vars, function ($message) {

                $message->to('s.qniceeee@gmail.com', 'Admin Person');
                $message->subject('Feed back message');
            });
            $letter = new FeedBack;
            $letter->name = $name;
            $letter->email = $email;
            $letter->message = $description;
            $letter->save();

            Flash::success('Ваше сообщение отправлено!');
        }
    }
}
