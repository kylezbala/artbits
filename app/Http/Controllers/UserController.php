<?php

namespace App\Http\Controllers;

use App\Art;
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
            'Address' => 'required|min:5|max:500',
            'MobileNo' => 'required||min:11|max:13',
            'Email' => 'required|email',
            'Terms&Conditions' => 'required',
            'recaptcha' => 'required|recaptcha'
        ]);

        $user = $request->except('_token');
        $user['role'] = 3;
        $user['status'] = 0;
        $id = Users::create($user)->id;


        $bodyhtml = 'Welcome to Artbits!';
        //https://stackoverflow.com/questions/38309422/phpmailer-server-smtp-error-password-command-failed-smtp-connect-failed
        $mail = new PHPMailer(true);
        $mail->isSMTP();                       // telling the class to use SMTP
        $mail->SMTPDebug = 0;
        // 0 = no output, 1 = errors and messages, 2 = messages only.
        $mail->SMTPAuth = true;                // enable SMTP authentication
        $mail->SMTPSecure = "tls";              // sets the prefix to the servier
        $mail->Host = "smtp.gmail.com";        // sets Gmail as the SMTP server
        $mail->Port = 587;                     // set the SMTP port for the GMAIL
        $mail->Username = "AAAPToday@gmail.com";  // Gmail username
        $mail->Password = "AAAP4lyf";      // Gmail password
        $mail->CharSet = 'windows-1250';
        $mail->SetFrom($request->Email); // send to mail
        /*   $mail->AddBCC(); // send to mail*/
        $mail->Subject = 'Registration Successful';
        $mail->ContentType = 'text/plain';
        $mail->isHTML(true);
        $mail->Body = $bodyhtml;
        // you may also use $mail->Body =       file_get_contents('your_mail_template.html');
        $mail->AddAddress($request->Email);
        // you may also use this format $mail->AddAddress ($recipient);
        if($mail->Send()){
            return redirect('/home');
        }



    }
}

