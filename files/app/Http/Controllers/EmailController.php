<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'fullname' => 'required|string',
            'email' => 'required|email',
            'number' => 'required|string',
            'message' => 'required|string',
        ]);
    
        // Build the email message
        $to = 'warren.payot@prycegases.com';
        $subject = 'Contact Us Email';
        $message = 'Full Name: ' . $validatedData['fullname'] . "\r\n";
        $message .= 'Email: ' . $validatedData['email'] . "\r\n";
        $message .= 'Phone Number: ' . $validatedData['number'] . "\r\n";
        $message .= 'Message: ' . $validatedData['message'] . "\r\n";
    
        // Send the email using PHP's mail function
        $headers = 'From: ' . $validatedData['email'] . "\r\n" .
                   'Reply-To: ' . $validatedData['email'] . "\r\n" .
                   'X-Mailer: PHP/' . phpversion();
    
        $success = mail($to, $subject, $message, $headers);
    
        if ($success) {
            // Return a response to the frontend
            return response()->json(['message' => 'Email sent successfully!'])
                ->header('Access-Control-Allow-Origin', 'http://prycecorp.prycegases.com')
                ->header('Access-Control-Allow-Methods', 'POST')
                ->header('Access-Control-Allow-Headers', 'Content-Type');
        } else {
            // Return an error response to the frontend
            return response()->json(['message' => 'Failed to send email!'], 500)
                ->header('Access-Control-Allow-Origin', 'http://prycecorp.prycegases.com')
                ->header('Access-Control-Allow-Methods', 'POST')
                ->header('Access-Control-Allow-Headers', 'Content-Type');
        }
       
      
    }
    
}



