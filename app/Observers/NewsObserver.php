<?php

namespace App\Observers;

use App\Models\News;
use Illuminate\Support\Facades\Storage;

// php artisan make:observer NewsObserver --model=News

class NewsObserver
{
    /**
     * Handle the News "created" event.
     */
    public function created(News $news): void
    {
        //
        // dd($news->getOriginal('description_images'));
    }

    /**
     * Handle the News "updated" event.
     */
    public function updated(News $news): void
    {
        //
        if ($news->isDirty('description_images')) {
            Storage::disk('public')->delete($news->getOriginal('description_images'));
        }

        if ($news->isDirty('content')) {
            $basePath = env('APP_URL').'/storage';//media/news_images
            $html_text_before = $news->getOriginal('content');
            $html_text_after = $news->content;
            $imageUrls_before = imageUrls($basePath, $html_text_before);
            $imageUrls_after = imageUrls($basePath, $html_text_after);

            // $diff_images = array_diff($imageUrls_before, $imageUrls_after);
            $diff_images = array_diff($imageUrls_before, $imageUrls_after);

            Storage::disk('public')->delete($diff_images);
            // dd($imageUrls_before, $imageUrls_after, $diff_images);
            // dd($images_before, $imageUrls_before, $images_after, $imageUrls_after, $diff_images);
        }
    }

    /**
     * Handle the News "deleted" event.
     */
    public function deleted(News $news): void
    {
        //
        if (! is_null($news->description_images)) {
            Storage::disk('public')->delete($news->description_images);
        }
        if (! is_null($news->content)) {
            $basePath = env('APP_URL').'/storage';
            $html_text = $news->content;
            $imageUrls = imageUrls($basePath, $html_text);
            Storage::disk('public')->delete($imageUrls);
        }
    }

    /**
     * Handle the News "restored" event.
     */
    public function restored(News $news): void
    {
        //
    }

    /**
     * Handle the News "force deleted" event.
     */
    public function forceDeleted(News $news): void
    {
        //
    }
}
