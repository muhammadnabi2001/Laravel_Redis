<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Kafka\Producer;
use Kafka\ProducerConfig;

class KafkaProducer extends Command
{
    protected $signature = 'kafka:produce';
    protected $description = 'Kafka orqali xabar yuborish';

    public function handle()
    {
        $config = ProducerConfig::getInstance();
        $config->setMetadataBrokerList('localhost:9092');

        $producer = new Producer(
            function () {
                return [
                    [
                        'topic' => 'test_topic',
                        'value' => 'Salom, bu Kafka orqali yuborilgan xabar!',
                        'key' => 'test_key',
                    ],
                ];
            }
        );

        $producer->success(function ($result) {
            $this->info("Xabar yuborildi!");
        });

        $producer->error(function ($errorCode) {
            $this->error("Xatolik: " . $errorCode);
        });

        $producer->send(true);
    }
}
