<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Exceptions\PostTooLargeException;

class Handler extends Exception
{

    public function register()
    {
        $this->renderable(function (PostTooLargeException $e, $request) {
            return back()
                ->withErrors(['profile_photo' => 'Ukuran file terlalu besar. Maksimal 5MB.'])
                ->withInput();
        });
    }

}
