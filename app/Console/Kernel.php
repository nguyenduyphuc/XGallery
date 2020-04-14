<?php
/**
 * Copyright (c) 2020 JOOservices Ltd
 * @author Viet Vu <jooservices@gmail.com>
 * @package XGallery
 * @license GPL
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

/**
 * Class Kernel
 * @package App\Console
 */
class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        /**
         * Schedule with daily
         */

        $schedule->command('onejav daily')
            ->daily()
            ->withoutOverlapping()->runInBackground();
        //->emailOutputOnFailure(config('mail.to'));

        $schedule->command('r18 daily')
            ->daily()
            ->withoutOverlapping()->runInBackground();
        //->emailOutputOnFailure(config('mail.to'));

        /**
         * Schedule everyMinute
         */

        $schedule->command('onejav fully')
            ->everyMinute()
            ->withoutOverlapping()->runInBackground();
        //->emailOutputOnFailure(config('mail.to'));

        $schedule->command('batdongsan --url=https://batdongsan.com.vn/nha-dat-ban')
            ->everyMinute()
            ->withoutOverlapping()->runInBackground();

        $schedule->command('truyenchon fully')
            ->everyMinute()
            ->withoutOverlapping()->runInBackground();
        //->emailOutputOnFailure(config('mail.to'));

        /**
         * Schedule everyFiveMinutes
         */

        $schedule->command('r18 fully --url=https://www.r18.com/videos/vod/movies/list/pagesize=30/price=all/sort=new/type=all')
            ->everyFiveMinutes()
            ->withoutOverlapping()->runInBackground();
        //->emailOutputOnFailure(config('mail.to'));

        $xcityProfiles = [
            'https://xxx.xcity.jp/idol/?kana=%E3%81%82',
            'https://xxx.xcity.jp/idol/?kana=%E3%81%8B',
            'https://xxx.xcity.jp/idol/?kana=%E3%81%95',
            'https://xxx.xcity.jp/idol/?kana=%E3%81%9F',
            'https://xxx.xcity.jp/idol/?kana=%E3%81%AA',
            'https://xxx.xcity.jp/idol/?kana=%E3%81%AF',
            'https://xxx.xcity.jp/idol/?kana=%E3%81%BE',
            'https://xxx.xcity.jp/idol/?kana=%E3%82%84',
            'https://xxx.xcity.jp/idol/?kana=%E3%82%89',
            'https://xxx.xcity.jp/idol/?kana=%E3%82%8F'
        ];

        foreach ($xcityProfiles as $xcityProfile) {
            $schedule->command('xcity:profile fully --url="'.urldecode($xcityProfile).'"')
                ->everyFiveMinutes()
                ->withoutOverlapping()->runInBackground();
            //->emailOutputOnFailure(config('mail.to'));
        }

        $schedule->command('xcity:video')
            ->everyFiveMinutes()
            ->withoutOverlapping()->runInBackground();
        //->emailOutputOnFailure(config('mail.to'));

        $schedule->command('xiuren fully --url=http://www.xiuren.org/')
            ->everyFiveMinutes()
            ->withoutOverlapping()->runInBackground();
        //->emailOutputOnFailure(config('mail.to'));

        $schedule->command('flickr:photos')
            ->everyFiveMinutes()
            ->withoutOverlapping()->runInBackground();
        $schedule->command('flickr:photossizes')
            ->everyFiveMinutes()
            ->withoutOverlapping()->runInBackground();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
