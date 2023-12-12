<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Telegram\Bot\Laravel\Facades\Telegram;

class Channel extends Model
{
    use HasFactory;


    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function messages(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Message::class);
    }

    public function updateChannel()
    {
        $channel = Telegram::getChat(['chat_id' => '@' . $this->channel_id]);
        if ($channel) {
            $channelName = $channel['title'];
            $channelId = $channel['id'];
            $profilePhoto = $channel->getPhoto();
            $this->title = $channelName;
            $this->chat_id = $channelId;
            $members = Telegram::getChatMemberCount(['chat_id' => '@' . $this->channel_id]);
            $this->members_count = $members;
            if ($profilePhoto) {
                $profilePhotoFile = Telegram::getFile(['file_id' => $profilePhoto['big_file_id']]);
                $profilePhotoUrl = 'https://api.telegram.org/file/bot' . env('TELEGRAM_BOT_TOKEN') . '/' . $profilePhotoFile->getFilePath();
                $localFilePath = public_path('media/channels/' . $this->channel_id . '.jpg');
                file_put_contents($localFilePath, file_get_contents($profilePhotoUrl));
                $this->profile_path = $localFilePath;
            } else {
                $this->profile_path = null;
            }
            $this->save();
        }
    }

    public function saveMessage($post, $type)
    {
        $message = new Message();
        $message->message_id = $post['message']['message_id'];
        $message->type = $type;

        if (isset($post['caption'])) {
            $message->caption = $post['caption'];
        }

        // Handle different types of media
        switch ($type) {
            case 'text':
                $message->text = $post['text'];
                break;
            case 'location':
                $message->text = $post['latitude'] . '/' . $post['longitude'];
                break;
            case 'photo':
            case 'document':
            case 'gif':
            case 'video':
            case 'audio':
            case 'voice':
            case 'sticker':
                $fileId = '';


                // Determine the file ID based on the media type
                switch ($type) {
                    case 'photo':
                        $fileId = $post['photo'][count($post['photo']) - 1]['file_id'];
                        break;
                    case 'gif':
                    case 'document':
                        $fileId = $post['document']['file_id'];
                        break;
                    case 'video':
                        $fileId = $post['video']['file_id'];
                        break;
                    case 'audio':
                        $fileId = $post['audio']['file_id'];
                        break;
                    case 'voice':
                        $fileId = $post['voice']['file_id'];
                        break;
                    case 'sticker':
                        $fileId = $post['sticker']['file_id'];

                        break;
                }

                // Download and save the file
                $message->path = $this->downloadGetFile($fileId);
                break;
        }

        $this->messages()->save($message);
    }

    public function saveText($post)
    {
        $message = new Message();
        $message->message_id = $post['message']['message_id'];
        $message->type = "text";
        $message->text = $post['message']['text'];
        $this->messages()->save($message);
    }

    public function savePhoto($post)
    {
        $message = new Message();
        $message->message_id = $post['message']['message_id'];
        $message->type = "photo";

        if (isset($post['message']['photo']['caption'])) {
            $message->caption = $post['message']['photo']['caption'];
        }
        $message->path = $this->downloadGetFile($post['message']['photo'][0]['file_id']);
        $this->messages()->save($message);
    }

    public function saveDocument($post)
    {
        $message = new Message();
        $message->message_id = $post['message']['message_id'];
        $message->type = "document";

        if (isset($post['message']['document']['caption'])) {
            $message->caption = $post['message']['document']['caption'];
        }
        $message->path = $this->downloadGetFile($post['message']['document']['file_id']);
        $this->messages()->save($message);
    }

    public function saveVideo($post)
    {
        $message = new Message();
        $message->message_id = $post['message']['message_id'];
        $message->type = "video";
        if (isset($post['message']['video']['caption'])) {
            $message->caption = $post['message']['video']['caption'];
        }
        $message->path = $this->downloadGetFile($post['message']['video']['file_id']);
        $this->messages()->save($message);
    }

    private function downloadGetFile($param): string
    {
        $profilePhotoFile = Telegram::getFile(['file_id' => $param]);
        $profilePhotoUrl = 'https://tapi.bale.ai/file/bot' . env('TELEGRAM_BOT_TOKEN') . '/' . $profilePhotoFile->getFilePath();
        Telegram::sendMessage(['chat_id' => 683977320, 'text' => $profilePhotoFile->getFilePath()]);
        $localFilePath = public_path('media/messages/' . $param . '.' . explode('.', $profilePhotoFile->getFilePath())[0]);
        file_put_contents($localFilePath, file_get_contents($profilePhotoUrl));
        return 'media/messages/' . $param . '.' . explode('.', $profilePhotoFile->getFilePath())[1];
    }
}
