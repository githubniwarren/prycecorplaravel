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
        $to = 'john.magday@prycegases.com, paul.casilla@prycegases.com, earl.lerio@prycegases.com';
        $subject = 'Pryce Corporation';
        $message = 'Full Name: ' . $validatedData['fullname'] . "\r\n";
        $message .= 'Email: ' . $validatedData['email'] . "\r\n";
        $message .= 'Phone Number: ' . $validatedData['number'] . "\r\n";
        $message .= 'Message: ' . $validatedData['message'] . "\r\n";
    
        // Send the email using PHP's mail function
        $headers = "From: no-reply@pryce.com.ph";

        $success = mail($to, $subject, $message, $headers);
    
        if ($success) {
            // Return a response to the frontend
            return response()->json(['message' => 'Email sent successfully!']);
        } else {
            // Return an error response to the frontend
            return response()->json(['message' => 'Failed to send email!']);
        }
       
      
    }
    
}



