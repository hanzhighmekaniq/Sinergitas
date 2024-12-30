<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendWelcomeEmail(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Data untuk email
        $data = [
            'full_name' => $validated['full_name'],
            'mailMessage' => $validated['email'],
            'subject' => $validated['subject'],
            'messageContent' => $validated['message'],
        ];

        // Kirim email
        Mail::send('emails.contact', $data, function ($message) use ($validated) {
            $message->to('gadismp04@gmail.com') // Ubah dengan email tujuan
                ->subject($validated['subject']);
        });

        // Redirect dengan notifikasi
        return redirect()->back()->with('success', 'Pesan Anda berhasil dikirim. Terima kasih!');
    }
}
