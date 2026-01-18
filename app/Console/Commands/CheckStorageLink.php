<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CheckStorageLink extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'storage:check {--fix : Automatically fix broken symlink}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check if the storage symlink exists and is valid. Use --fix to recreate if broken.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $link = public_path('storage');
        $target = storage_path('app/public');

        $this->info('Checking storage symlink...');
        $this->line("Link path: {$link}");
        $this->line("Target path: {$target}");

        // Check if link exists
        if (!file_exists($link) && !is_link($link)) {
            $this->error('Storage symlink does NOT exist!');
            
            if ($this->option('fix') || $this->confirm('Would you like to create it now?')) {
                return $this->createLink($link, $target);
            }
            return 1;
        }

        // Check if it's a valid symlink pointing to the right location
        if (is_link($link)) {
            $currentTarget = readlink($link);
            
            // Normalize paths for comparison
            $normalizedTarget = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, realpath($target) ?: $target);
            $normalizedCurrent = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, realpath($currentTarget) ?: $currentTarget);
            
            if ($normalizedCurrent === $normalizedTarget || realpath($currentTarget) === realpath($target)) {
                $this->info('✓ Storage symlink is valid and pointing to the correct location.');
                return 0;
            } else {
                $this->warn('Storage symlink exists but points to wrong location!');
                $this->line("Current target: {$currentTarget}");
                $this->line("Expected target: {$target}");
                
                if ($this->option('fix') || $this->confirm('Would you like to fix it?')) {
                    // Remove old link
                    if (is_link($link)) {
                        unlink($link);
                    } elseif (is_dir($link)) {
                        // On Windows, symlinks to directories can appear as directories
                        rmdir($link);
                    }
                    return $this->createLink($link, $target);
                }
                return 1;
            }
        }

        // It exists but is not a symlink (could be a directory)
        if (is_dir($link)) {
            $this->warn('A directory exists at the symlink location (not a symlink).');
            $this->line('This can happen when the project is copied instead of moved.');
            
            if ($this->option('fix') || $this->confirm('Would you like to remove it and create a proper symlink?')) {
                // Check if directory is empty
                $files = scandir($link);
                if (count($files) > 2) { // . and ..
                    $this->warn('Directory is not empty. Please backup files first.');
                    if (!$this->confirm('Continue anyway? Files will be lost!')) {
                        return 1;
                    }
                    // Recursively delete directory
                    File::deleteDirectory($link);
                } else {
                    rmdir($link);
                }
                return $this->createLink($link, $target);
            }
            return 1;
        }

        $this->error('Unknown state at symlink location.');
        return 1;
    }

    /**
     * Create the symlink
     */
    protected function createLink(string $link, string $target): int
    {
        // Ensure target directory exists
        if (!is_dir($target)) {
            mkdir($target, 0755, true);
            $this->line("Created target directory: {$target}");
        }

        // Create symlink
        if (symlink($target, $link)) {
            $this->info('✓ Storage symlink created successfully!');
            return 0;
        } else {
            $this->error('Failed to create symlink. On Windows, try running as Administrator.');
            return 1;
        }
    }
}
