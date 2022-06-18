<?php

namespace App\Handler;
 use Spatie\WebhookClient\Jobs\ProcessWebhookJob;


class ProcessWebHook extends ProcessWebhookJob {

        public function Handle()
        {
            $datas = json_decode($this->webhookCall, true);
            // $datas['payload']['event'];
            logger($datas['payload']);
            http_response_code(200);
            session(['payload' => $datas['payload']]);
        }
}
