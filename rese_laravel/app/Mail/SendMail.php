<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected string $test;
    public function __construct(string $test)
    {
        $this->content = $test;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('hoge@hoge.com') // 送信元
            ->subject('テスト送信') // メールタイトル
            ->view('mails.test') // どのテンプレートを呼び出すか
            ->with([
                'mail' => $this->content
            ]);
    }
}
