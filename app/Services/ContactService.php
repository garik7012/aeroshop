<?php

namespace App\Services;

use Exception;
use App\Models\Contact;
use Illuminate\Database\DatabaseManager;
use Illuminate\Log\Logger;

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
            $txt = '';
            $txt .= "<b>Было оставленно сообщение от</b> %0A";
            $txt .= "<b>Имя:</b>" . $contact->name . "%0A";
            $txt .= "<b>email:</b>" . $contact->email . "%0A";
            $txt .= "<b>Сообщение:</b>" . $contact->message . "%0A";

            $token = env('TG_BOT');
            $chat_id = env('TG_CHAT');
            $fp=fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");
            mail('inbox@aeroshop.com.ua', 'сообщение с сайта', $txt);

        } catch (Exception $e) {
            return $this->rollback($e, 'Message send failed');
        }
        $this->commit();

        return true;
    }
}
