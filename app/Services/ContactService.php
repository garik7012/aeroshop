<?php

namespace App\Services;

use Exception;
use App\Models\Contact;
use Illuminate\Database\DatabaseManager;
use Illuminate\Log\Logger;
use Mail;

class ContactService extends BaseService
{

    /**
     * ContactService constructor.
     * @param DatabaseManager $databaseManager
     * @param Logger $logger
     * @param Contact $contact
     */
    public function __construct(DatabaseManager $databaseManager, Logger $logger, Contact $contact)
    {
        parent::__construct($databaseManager, $logger);
        $this->contact = $contact;
    }

    /**
     * store contact
     * @param $request
     * @return bool
     * @throws Exception
     */
    public function storeContact($request)
    {
        $this->beginTransaction();
        $contact = $this->contact;
        try {
            $contact->fill($request->only(['name', 'email', 'message']));
            if (!$contact->save()) {
                throw new Exception('Contact was not saved');
            }

        } catch (Exception $e) {
            return $this->rollback($e, 'Message send failed');
        }
        $this->commit();

        $txt = '';
        $txt .= "<b>Было оставленно сообщение от</b> \r\n";
        $txt .= "<b>Имя:</b> " . htmlspecialchars($contact->name) . "\r\n";
        $txt .= "<b>email:</b> " . $contact->email . "\r\n";
        $txt .= "<b>Сообщение:</b> " . htmlspecialchars($contact->message) . "\r\n";

        $token = env('TG_BOT');
        $chat_id = env('TG_CHAT');
        $website="https://api.telegram.org/bot" . $token;
        $params=[
            'chat_id' => $chat_id,
            'parse_mode' => 'HTML',
            'text' => $txt,
        ];
        $ch = curl_init($website . '/sendMessage');
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close($ch);

        Mail::raw($txt, function ($m) {
            $m->from('inbox@aeroshop.com.ua');
            $m->to('inbox@aeroshop.com.ua')->subject('Сообщение из связаться с нами');
        });

        return true;
    }
}
