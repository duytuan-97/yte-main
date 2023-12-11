<?php

namespace App\Observers;

use DOMDocument;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     */
    public function created(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "updated" event.
     */
    public function updated(Product $product): void
    {
        //

        if ($product->isDirty('images')) {
            $diff1 = array_diff($product->images, $product->getOriginal('images'));//giá trị array image thay đổi nhiều hơn
            $diff2 = array_diff($product->getOriginal('images'), $product->images);//giá trị array image thay đổi ít hơn thì xóa thay đổi
            // $result = array_merge($diff1, $diff2);
            // dd($product,$result, "diff1", $diff1, "diff2", $diff2, $product->images, $product->getOriginal('images'));
            // Product::disk('public')->delete($product->getOriginal('images'));

            Storage::disk('public')->delete($diff2);
        }
        if ($product->isDirty('content')) {
            // // Tạo một đối tượng DOMDocument
            // $dom_before = new DOMDocument();
            // $dom_after = new DOMDocument();
            // libxml_use_internal_errors(true);
            // $dom_before->loadHTML(mb_convert_encoding($product->getOriginal('content'), 'HTML-ENTITIES', 'UTF-8'));
            // $dom_after->loadHTML(mb_convert_encoding($product->content, 'HTML-ENTITIES', 'UTF-8'));
            // // Lấy tất cả các thẻ <img> trong văn bản
            // $images_before = $dom_before->getElementsByTagName('img');
            // $images_after = $dom_after->getElementsByTagName('img');
            // // Loại bỏ phần "http://yte.test/storage/" từ đường dẫn
            // $basePath = env('APP_URL').'/storage';
            // // Duyệt qua các thẻ <img> và lấy đường dẫn hình ảnh
            // $imageUrls_before = [];
            // foreach ($images_before as $image) {
            //     $src = $image->getAttribute('src');

            //     $relativePath_before = str_replace($basePath, '', $src);
            //     $imageUrls_before[] = $relativePath_before;
            // }
            // $imageUrls_after = [];
            // foreach ($images_after as $image) {
            //     $src = $image->getAttribute('src');

            //     $relativePath_after = str_replace($basePath, '', $src);
            //     $imageUrls_after[] = $relativePath_after;
            // }

            $basePath = env('APP_URL').'/storage';//media/product_images
            $html_text_before = $product->getOriginal('content');
            $html_text_after = $product->content;
            $imageUrls_before = imageUrls($basePath, $html_text_before);
            $imageUrls_after = imageUrls($basePath, $html_text_after);

            $diff_images = array_diff($imageUrls_before, $imageUrls_after);

            Storage::disk('public')->delete($diff_images);
            // dd($imageUrls_before, $imageUrls_after, $diff_images);
            // dd($images_before, $imageUrls_before, $images_after, $imageUrls_after, $diff_images);
        }
    }

    // //edit
    // public function saved(Product $product): void
    // {

    // }

    /**
     * Handle the Product "deleted" event.
     */
    public function deleted(Product $product): void
    {
        //
        if (! is_null($product->images)) {
            Storage::disk('public')->delete($product->images);
        }
        if (! is_null($product->content)) {
            // $dom = new DOMDocument();
            // libxml_use_internal_errors(true);
            // $dom->loadHTML(mb_convert_encoding($product->content, 'HTML-ENTITIES', 'UTF-8'));
            // $images = $dom->getElementsByTagName('img');
            // $imageUrls = [];
            // foreach ($images as $image) {
            //     $src = $image->getAttribute('src');

            //     $basePath = env('APP_URL').'/storage';
            //     $relativePath = str_replace($basePath, '', $src);
            //     $imageUrls[] = $relativePath;
            // }
            $basePath = env('APP_URL').'/storage';
            $html_text = $product->content;
            $imageUrls = imageUrls($basePath, $html_text);

            // Storage::disk('public')->delete($product->content);
            Storage::disk('public')->delete($imageUrls);
        }
    }

    /**
     * Handle the Product "restored" event.
     */
    public function restored(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     */
    public function forceDeleted(Product $product): void
    {
        //
    }
}
