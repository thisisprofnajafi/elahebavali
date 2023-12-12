<?php

namespace App\Http\Controllers;

use App\Models\MessageLog;
use Exception;
use App\Models\Channel;
use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

class HookController extends Controller
{
    public function getMessage(Request $request)
    {
        Telegram::sendMessage(['chat_id' => 683977320, 'text' => "new hook call " . $request->getContent()]);

        try {
            $update = json_decode($request->getContent(), true);

            if (isset($update)) {
                $channel_post = $update;

                if (isset($channel_post['message'])) {
                    $messageId = $channel_post['message']['message_id'];
                } else {
                    $messageId = $channel_post[0]['message_id'];
                }

                // Save the message ID to the database
                MessageLog::create(['message_id' => $messageId]);

                if (isset($channel_post['message']['chat']['type']) && $channel_post['message']['chat']['type'] == "group") {
                    $channel = Channel::query()->where('chat_id', $channel_post['message']['chat']['id'])->first();
                    if (!$channel && !$channel_post['message']['from']['is_bot']) {
                        try {
                            Telegram::sendMessage(['chat_id' => $channel_post['message']['chat']['id'], 'text' => "برای مدیریت برنامه توسط ربات این ایدی را در برنامه اضافه کنید "]);
                            Telegram::sendMessage(['chat_id' => $channel_post['message']['chat']['id'], 'text' => $channel_post['message']['chat']['id']]);
                        } catch (\Exception $e) {
                            Telegram::sendMessage(['chat_id' => 683977320, 'text' => "Exception :" . $e->getMessage()]);
                        }
                        return;
                    }

                    if ($channel) {
                        $mediaTypes = ['text', 'photo', 'document', 'video'];

                        $type = null;
                        if (isset($channel_post['message']['document'])) {
                            $type = "document";
                        }
                        if (isset($channel_post['message']['text'])) {
                            $type = "text";
                        }
                        if (isset($channel_post['message']['photo'])) {
                            $type = "photo";
                        }
                        if (isset($channel_post['message']['video'])) {
                            $type = "video";
                        }


                        if ($type) {
                            if ($type == "text") {
                                $channel->saveText($channel_post);
                            }
                            if ($type == "photo") {
                                $channel->savePhoto($channel_post);
                            }
                            if ($type == "video") {
                                $channel->saveVideo($channel_post);
                            }
                            if ($type == "document") {
                                $channel->saveDocument($channel_post);
                            }

                            Telegram::sendMessage(['chat_id' => 683977320, 'text' => "A " . $type . "  saved"]);

                        }
                    } else {
                        \Log::warning('Channel not detected for ID: ' . $channel_post['sender_chat']['id']);
                        Telegram::sendMessage(['chat_id' => 683977320, 'text' => "Channel Not Detected"]);
                    }
                } else {
                    Telegram::sendMessage(['chat_id' => 683977320, 'text' => "Did not detect channel"]);
                }
            } else {
                Telegram::sendMessage(['chat_id' => 683977320, 'text' => "Channel post is not defined"]);
            }
        } catch (Exception $e) {
            \Log::error('Error processing Telegram message: ' . $e->getMessage());
            Telegram::sendMessage(['chat_id' => 683977320, 'text' => "An error occurred " . $e->getMessage()]);
        }
    }


    public function checkUpdates()
    {
        try {
            // Get updates from the Telegram Bot
            $updates = Telegram::getUpdates();

            // Handle updates
            foreach ($updates as $update) {
                // Your logic to handle each update
                $message = $update->getMessage();
                $chatId = $message->getChat()->getId();
                $text = $message->getText();
                echo $text;
            }

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            // Handle any exceptions
            return response()->json(['error' => 'Error checking updates']);
        }
    }
}
