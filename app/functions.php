<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Events\LivewireEmitEvent;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Broadcast;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

if (!function_exists('array_custom_merge')) {
    /**
     * Array custom merge. Preserve indexed array key (numbers) but overwrite string key (same as PHP's `array_merge()` function).
     *
     * If the another array key is string, it will be overwrite the first array.<br>
     * If the another array key is integer, it will be add to first array depend on duplicated key or not.
     * If it is not duplicate key with the first, the key will be preserve and add to the first array.
     * If it is duplicated then it will be re-index the number append to the first array.
     *
     * @param array $array1 The first array is main array.
     * @param array ...$arrays The another arrays to merge with the first.
     * @return array Return merged array.
     */
    function array_custom_merge(array $array1, array ...$arrays): array
    {
        foreach ($arrays as $additionalArray) {
            foreach ($additionalArray as $key => $item) {
                if (is_string($key)) {
                    // if associative array.
                    // item on the right will always overwrite on the left.
                    $array1[$key] = $item;
                } elseif (is_int($key) && !array_key_exists($key, $array1)) {
                    // if key is number. this should be indexed array.
                    // and if array 1 is not already has this key.
                    // add this array with the key preserved to array 1.
                    $array1[$key] = $item;
                } else {
                    // if anything else...
                    // get all keys from array 1 (numbers only).
                    $array1Keys = array_filter(array_keys($array1), 'is_int');
                    // next key index = get max array key number + 1.
                    $nextKeyIndex = (intval(max($array1Keys)) + 1);
                    unset($array1Keys);
                    // set array with the next key index.
                    $array1[$nextKeyIndex] = $item;
                    unset($nextKeyIndex);
                }
            } // endforeach; $additionalArray
            unset($item, $key);
        } // endforeach;
        unset($additionalArray);
        return $array1;
    } // arrayCustomMerge
}

if (!function_exists('merge_parameters_to_url')) {
    function merge_parameters_to_url($url, array $parameters = [])
    {
        foreach ($parameters as $key => $value) {
            $value = urlencode($value);
            $url = preg_replace('/(.*)(?|&)' . $key . '=[^&]+?(&)(.*)/i', '$1$2$4', $url . '&');
            $url = substr($url, 0, -1);
            if (strpos($url, '?') === false) {
                $url = $url . '?' . $key . '=' . $value;
            } else {
                $url = $url . '&' . $key . '=' . $value;
            }
        }
        return $url;
    }
}

if (!function_exists('bytesToHuman')) {
    function bytesToHuman($bytes)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];
        for ($i = 0; $bytes > 1024; $i++) {
            $bytes /= 1024;
        }
        return round($bytes, 2) . ' ' . $units[$i];
    }
}

if (!function_exists('localizedMarkdownPath')) {
    /**
     * $termsFile = localizedMarkdownPath('terms.md');
     * 'terms' => Str::markdown(file_get_contents($termsFile))
     */
    function localizedMarkdownPath($name)
    {
        $localName = preg_replace('#(\.md)$#i', '.' . app()->getLocale() . '$1', $name);
        return Arr::first([
            resource_path('markdown/' . $localName),
            resource_path('markdown/' . $name),
        ], function ($path) {
            return file_exists($path);
        });
    }
}

if (!function_exists('getBetweenDates')) {
    function getBetweenDates($startDate, $endDate)
    {
        $rangArray = [];
        $startDate = strtotime($startDate);
        $endDate = strtotime($endDate);
        for ($currentDate = $startDate; $currentDate <= $endDate; $currentDate += (86400)) {
            $date = date('Y-m-d', $currentDate);
            $rangArray[] = $date;
        }
        return $rangArray;
    }
}

if (!function_exists('groupDatesByMonth')) {
    function groupDatesByMonth($startDate, $endDate)
    {
        $months = collect();
        $dates = getBetweenDates($startDate, $endDate);
        foreach ($dates as $date) {
            $timestamp = strtotime($date);
            $month = date('m', $timestamp);
            if (!$months->has($month)) {
                $months->put($month, collect());
                //$months[$month] = collect();
            }
            $months->get($month)->push($date);
        }
        return $months;
    }
}

if (!function_exists('broadcastIsReady')) {
    function broadcastIsReady()
    {
        try {
            $pusher = Broadcast::pusher(config('broadcasting.connections.pusher'));
            $pusher->getChannels();
            return true;
        } catch (Exception $ex) {
            return false;
        }
    }
}

if (!function_exists('can')) {
    /**
     * Check if a user has permission or not
     *
     * @param string|array $permission The string or array of permission to check
     * @return boolean Return true or false
     */
    function can($permission)
    {
        if (is_iterable($permission)) {
            return Auth::user()->hasAnyPermission($permission) || Auth::user()->can('do anything');
        }
        return Auth::user()->can($permission);
    }
}

if (!function_exists('notSuperAdmin')) {
    function notSuperAdmin()
    {
        return !Auth::user()->can('do anything');
    }
}

// if (!function_exists('logging')) {
//     function logging($event, $model, $message)
//     {
//         activity()->event($event)->performedOn($model)->log($message);
//     }
// }

// if (!function_exists('dispatchLivewireEvent')) {
//     function dispatchLivewireEvent(array $events, $notify = true, $message = null)
//     {
//         LivewireEmitEvent::dispatch([
//             'notify' => $notify,
//             'message' => $message,
//             'events' => $events,
//         ]);
//     }
// }

if (!function_exists('livewireAlert')) {
    function livewireAlert(Livewire\Component $component, $message, $icon = 'info', $title = '', $html = false)
    {
        $component->dispatchBrowserEvent('swal', [
            'icon'  => $icon,
            'title' => $title,
            ($html) ? 'html' : 'text'  => $message,
        ]);
    }
}

if (!function_exists('livewireAlertReload')) {
    function livewireAlertReload(Livewire\Component $component, $message, $icon = 'info', $title = '')
    {
        $component->dispatchBrowserEvent('swal-reload', [
            'icon'  => $icon,
            'title' => $title,
            'text'  => $message,
        ]);
    }
}

if (!function_exists('livewireRedirect')) {
    function livewireRedirect(Livewire\Component $component, $url)
    {
        $component->dispatchBrowserEvent('redirect', [
            'url'  => $url,
        ]);
    }
}

if (!function_exists('backWithSwal')) {
    function backWithSwal($type, $message, $title = '', $options = [])
    {
        return redirect()->back()->withSwal(array_custom_merge([
            'icon' => $type,
            'title' => $title,
            'html' => $message
        ], $options));
    }
}

if (!function_exists('backWithError')) {
    function backWithError($message, $options = [])
    {
        return redirect()->back()->withSwal(array_custom_merge([
            'icon' => 'error',
            'title' => 'Oops!',
            'html' => $message
        ], $options));
    }
}

if (!function_exists('redirectWithSwal')) {
    function redirectWithSwal($path, $type, $message, $title = '', $options = [])
    {
        return redirect()->to($path)->withSwal(array_custom_merge([
            'icon' => $type,
            'title' => $title,
            'html' => $message
        ], $options));
    }
}

if (!function_exists('fileExist')) {
    function fileExist($path, $disk = 'public')
    {
        return Storage::disk($disk)->exists($path);
    }
}

if (!function_exists('fileStore')) {
    function fileStore(UploadedFile $file, $folder, $disk = 'public')
    {
        return $file->store($folder, $disk);
    }
}

if (!function_exists('fileStoreAs')) {
    function fileStoreAs(UploadedFile $file, $filename, $folder, $disk = 'public')
    {
        return $file->storeAs($folder, $filename, $disk);
    }
}

if (!function_exists('fileMove')) {
    function fileMove($from, $to, $disk = 'public')
    {
        return Storage::disk($disk)->move($from, $to);
    }
}

if (!function_exists('fileDelete')) {
    function fileDelete($path, $disk = 'public')
    {
        return Storage::disk($disk)->delete($path);
    }
}

if (!function_exists('imageUrls')) {
    function imageUrls($basePath, $html_text, $disk = 'public')
    {
        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML(mb_convert_encoding($html_text, 'HTML-ENTITIES', 'UTF-8'));
        $images = $dom->getElementsByTagName('img');
        $imageUrls = [];
            foreach ($images as $image) {
                $src = $image->getAttribute('src');
                // $relativePath = str_replace($basePath, '', $src);
                $relativePath = Str::after($src, $basePath);
                $imageUrls[] = $relativePath;
            }
        return $imageUrls;
        // return Storage::disk($disk)->delete($path);
    }
}

if (!function_exists('chartOptions')) {
    function chartOptions($type, $series, $labels, $colors = [])
    {
        $options = [
            'chart' => [
                'type'  => $type,
            ],
            'series' => $series,
            'labels' => $labels,
            'plotOptions' => [
                'pie' => [
                    'dataLabels' => [
                        'offset' => ($type == 'pie') ? -15 : -2,
                        'minAngleToShowLabel' => 30,
                    ],
                    'donut' => [
                        'size' => '40%',
                    ]
                ]
            ],
            'dataLabels' => [
                'style' => [
                    'fontSize' => '10px',
                    'fontFamily' => 'inherit'
                ]
            ],
            'legend' => [
                'position' => 'bottom',
                'labels' => [
                    'colors' => 'dark'
                ]
            ],
        ];
        if (count($colors) > 0) {
            $options = array_custom_merge($options, ['colors' => $colors]);
        }
        //dd($options);
        return $options;
    }
}

// if (!function_exists('datatableConfiguration')) {
//     function datatableConfiguration(DataTableComponent $table)
//     {
//         $table
//             ->setHideConfigurableAreasWhenReorderingEnabled()
//             ->setHideBulkActionsWhenEmptyEnabled()
//             ->setSingleSortingDisabled()
//             ->setSearchEnabled()
//             ->setSearchDebounce(1000)
//             ->setTableAttributes([
//                 'default' => false,
//                 'class' => 'table table-row-dashed table-hover g-2 align-middle',
//             ])
//             ->setTheadAttributes([
//                 'class' => 'fw-bold fs-6 text-nowrap border-bottom border-gray-200',
//             ])
//             ->setThAttributes(function (Column $column) {
//                 if ($column->getTitle() === 'Thao tác') {
//                     return ['class' => 'w-fit'];
//                 }
//                 return [];
//             })
//             ->setTdAttributes(function (Column $column, $row, $columnIndex, $rowIndex) {
//                 return ['default' => true];
//             });
//     }
// }

if (!function_exists('tooltipIcon')) {
    function tooltipIcon($icon, $title, $class = '')
    {
        return "<i class='fs-5 bi {$icon} {$class}' data-bs-toggle='tooltip' title='{$title}'></i>";
    }
}
