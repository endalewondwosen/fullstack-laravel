<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class ExportStaticHtml extends Command
{
    protected $signature = 'export:html';
    protected $description = 'Export Blade templates to static HTML files';

    public function handle()
    {
        $routes = Route::getRoutes();

        foreach ($routes as $route) {
            $uri = $route->uri();
            $html = View::make($uri)->render();

            File::put(public_path($uri . '.html'), $html);

            $this->info("Exported: {$uri}.html");
        }

        $this->info('Export complete.');
    }
}
