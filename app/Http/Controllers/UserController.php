<?php

namespace App\Http\Controllers;

use App\Address;
use App\Art;
use App\Region;
use App\User;
use App\Users;
use Illuminate\Http\Request;
use Mail;
use PHPMailer\PHPMailer\PHPMailer;

class UserController extends Controller
{
    public function index()
    {

        $art = Art::all();
        return view('index')->with('art', $art);
    }

    public function store(Request $request)
    {


        $request->validate([
            'Lastname' => 'required|string|max:50',
            'Firstname' => 'required|string|max:50',
            'Middlename' => 'required|string|max:50',
            'Username' => 'required|min:5|max:30',
            'Password' => 'required|min:8|max:200',

            'MobileNo' => 'required|numeric|digits_between:10,11|regex:/^[09]{2}[0-9]{9}$/',
            'Email' => 'required|unique:user,Email|email',
            'Terms&Conditions' => '',
            'g-recaptcha-response' => 'required'

        ]);

        $user = $request->except('_token');
        $user['role'] = 3;
        $user['status'] = 0;
        $user['Password'] = bcrypt($request['Password']);
        $user['region_id'] = Region::create($user)->id;
        $user['address_id'] = Address::create($user)->id;
        $id = Users::create($user)->id;


        $email = $request->Email;
        $link = "<a href=" . url('/verify/' . $email) . ">Click Here</a>";
        $bodyhtml = 'Welcome to Artbits!<br>Please click the link below to confirm your registration.<br> ' . $link . '';
        //https://stackoverflow.com/questions/38309422/phpmailer-server-smtp-error-password-command-failed-smtp-connect-failed
        $mail = new PHPMailer(true);
        $mail->isSMTP();                       // telling the class to use SMTP
        $mail->SMTPDebug = 0;
        // 0 = no output, 1 = errors and messages, 2 = messages only.
        $mail->SMTPAuth = true;                // enable SMTP authentication
        $mail->SMTPSecure = "tls";              // sets the prefix to the servier
        $mail->Host = "smtp.gmail.com";        // sets Gmail as the SMTP server
        $mail->Port = 587;                     // set the SMTP port for the GMAIL
        $mail->Username = "artbitspinas@gmail.com";  // Gmail username
        $mail->Password = "Arts123123";      // Gmail password
        $mail->CharSet = 'windows-1250';
        $mail->SetFrom($email); // send to mail
        /*   $mail->AddBCC(); // send to mail*/
        $mail->Subject = 'Registration Successful';
        $mail->ContentType = 'text/plain';
        $mail->isHTML(true);
        $mail->Body = $bodyhtml;
        // you may also use $mail->Body =       file_get_contents('your_mail_template.html');
        $mail->AddAddress($email);
        // you may also use this format $mail->AddAddress ($recipient);

        if($mail->send()){
            return redirect('/home');
        }else{
            return redirect()->back();
        }

    }



    public function verify($code)
    {

        if ($code) {
            $check = Users::where('Email', $code)->first();
            if ($check) {
                $check->status = 1;
                $check->save();
                return redirect('/login');
            }
        } else {
            $error = 'Your link is invalid';
            return redirect('/login')->withErrors($error);
        }
    }
}

