<?php
namespace App\Console\Command;

use App;
use App\Sync\Runner;
use Azura\Console\Command\CommandAbstract;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SyncCommand extends CommandAbstract
{
    public function __invoke(
        Runner $sync,
        string $task = 'nowplaying'
    ) {
        switch ($task) {
            case 'long':
                $sync->syncLong();
                break;

            case 'medium':
                $sync->syncMedium();
                break;

            case 'short':
                $sync->syncShort();
                break;

            case 'nowplaying':
            default:
                define('NOWPLAYING_SEGMENT', 1);
                $sync->syncNowplaying();
                break;
        }

        return 0;
    }
}