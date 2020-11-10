<?php

namespace App\Entity\Post\Traits;

use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Image\Manipulations;

/**
 * Настраивает laravel-medialibrary - коллекции и конверсии
 */
trait RegisterMediaCollectionsAndConversion
{
    /**
     * Задаем коллекции
     *
     * https://spatie.be/docs/laravel-medialibrary/v8/working-with-media-collections/defining-media-collections
     *
     * @return void
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('thumbnail')
            // ->useFallbackPath(public_path('/images/anonymous-user.jpg')) //Заглушка
            ->singleFile();

        $this->addMediaCollection('page-thumbnail')
            ->singleFile();
    }

    /**
     * Задаем преобразования
     *
     * Использование
     * $media->getPath();  // the path to the where the original image is stored
     * $media->getPath('thumb'); // the path to the converted image with `$this->addMediaConversion('thumb')`
     *
     * https://spatie.be/docs/laravel-medialibrary/v9/converting-images/defining-conversions
     *
     * Восстановление изображений
     * https://spatie.be/docs/laravel-medialibrary/v9/converting-images/regenerating-images
     *
     * Все возможные манипуляции
     * https://spatie.be/docs/image/v1/introduction
     *
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            //->border(10, 'black', Manipulations::BORDER_OVERLAY) //дополнительные манипуляции с изображением
            //->nonOptimized() // Не делать дополнительных оптимизаций изображения, по умолчанию. https://spatie.be/docs/laravel-medialibrary/v9/converting-images/optimizing-converted-images
            ->performOnCollections('thumbnail', 'page-thumbnail') //для других коллекций не будет выполняться
            ->width(700)
            ->height(350)
            ->sharpen(10)
            ->withResponsiveImages();
    }

    /**
     * Шпаргалка
     *
     * Получение преобразованных изображений
     *
     * $mediaItems = $yourModel->getMedia('images'); - выборка всех изображений модели коллекции 'images'
     * $mediaItems[0]->getUrl('thumb'); - получаем Url 1-го изображения, преобразованного по правилам `$this->addMediaConversion('thumb')`
     * $mediaItems[0]->getPath('thumb'); // Absolute path on its disk
     * $mediaItems[0]->getTemporaryUrl(Carbon::now()->addMinutes(5), 'thumb'); // Temporary S3 url
     *
     * Есть короткая запись, для первых изображений коллекции (с индексом [0])
     *
     * $urlToFirstListImage = $yourModel->getFirstMediaUrl('images', 'thumb');
     * $fullPathToFirstListImage = $yourModel->getFirstMediaPath('images', 'thumb');
     * $urlToFirstTemporaryListImage = $yourModel->getFirstTemporaryUrl(Carbon::now()->addMinutes(5), 'images', 'thumb');
     *
     * Если преобразование поставлено в очередь, и могло быть еще не преобразовано, проверяем так
     * $yourModel->getMedia('images')[0]->hasGeneratedConversion('thumb'); // returns true or false
     *
     */
}