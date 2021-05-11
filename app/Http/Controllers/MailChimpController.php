<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mailchimp\Mailchimp\Mailchimp;

class MailChimpController extends Controller
{
    public function send_mail(Request $request)
    {
        $listId = env('MAILCHIMP_LIST_ID');

        $mailchimp = new Mailchimp(env('MAILCHIMP_KEY'));

        $campaign = $mailchimp->campaigns->create('regular', [
            'list_id' => $listId,
            'subject' => 'Example Mail',
            'from_email' => $request->email,
            'from_name' => 'Aleksandr',
            'to_name' => 'Nazreen'

        ], [
            'html' => "<h1>Test<h1>",
            'text' => strip_tags("Test")
        ]);

        //Send campaign
        $mailchimp->campaigns->send($campaign['id']);

        dd('Campaign send successfully.');
    }
}
