<?php

namespace mhmudhsham\IOSNotification;

class IOSNotification
{
    protected $to;
    protected $msg;
    protected $notificationBody;

    public function to($to)
    {
        $this->to = $to;

        return $this;
    }

    public function msg(array $msg = [])
    {
        $this->data = $msg;

        return $this;
    }

    public function notificationBody(array $notificationBody = [])
    {
        $this->notificationBody = $notificationBody;

        return $this;
    }

    public function send()
    {
        $fcmEndpoint = 'https://fcm.googleapis.com/fcm/send';

        $dat = ['notificationBody' => $this->notificationBody];

        $fields = ['to' => $this->to, 'notification' => $this->msg, 'data' => $dat];

        $serverKey = config('ios-notification.server_key');

        $headers = [
            'Authorization:key=' . $serverKey,
            'Content-Type:application/json'
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $fcmEndpoint);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, CURL_IPRESOLVE_V4);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = json_decode(curl_exec($ch));
        curl_close($ch);
        return $result;
    }
}