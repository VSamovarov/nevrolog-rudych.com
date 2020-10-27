<?php

namespace App\Services\Translation;

/**
 * https://github.com/Astrotomic/laravel-translatable
 *
 * Организуем связь один ко многим
 * по умолчанию таблица имеет название {название модели}_translations
 * столбец, по которому связываем {название модели}_id
 *
 * Эти значения можно менять в классе Модели, которую делаем многоязычной
 * с помощью переменных
 * $this->translationModel, $this->translationForeignKey
 *
 * Поле язык можно задать в переменной $this->localeKey
 *
 * Первичный ключ должен быть id - мы его не задаем
 *
 *
 */

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Services\Translation\Scopes;

trait Translatable
{
    use Scopes;
    /**
     * Возвращаем модель переводов для данной локали
     *
     * @param string|null $locale
     * @return Model
     */
    public function translate(?string $locale = null): Model
    {
        if (empty($locale)) $locale = $this->getLocale();
        if (
            $this->relationLoaded('translations')
            && $this->translations
            && $this->translations->getAttribute($this->getLocaleKey()) == $locale
        ) {
            return $this->translations->firstWhere($this->getLocaleKey(), $locale);
        } else {
            /** Возвращаем пустую модель */
            return $this->getNewTranslation($locale);
        }
    }

    /**
     * Возвращаем модель переводов для данной локали
     * Если поля пустые - заполняем атрибутами,
     * которые соответствуют языку по умолчанию
     */

    public function translateOrDefault(?string $locale = null): Model
    {
        if (empty($locale)) $locale = $this->getLocale();
        $content = $this->translate($locale);
        $contentDefault = $this->translate($this->getDefaultLocale());
        foreach ($content->attributes as $key => $value) {
            if (empty($value)) {
                $content->$key = $contentDefault->$key;
            }
        }
        return $content;
    }

    /**
     * Создаем пустую модель
     *
     * @param string $locale
     * @return Model
     */
    private function getNewTranslation(string $locale): Model
    {
        $modelName = $this->getTranslationModelName();

        /** @var Model $translation */
        $translation = new $modelName();
        $translation->setAttribute($this->getLocaleKey(), $locale);
        $this->translations->add($translation);

        return $translation;
    }
    /**
     * Связываем модели
     * Все языки
     *
     * @return HasMany
     */
    public function translations(): HasMany
    {
        return $this->hasMany($this->getTranslationModelName(), $this->getTranslationRelationKey());
    }

    /**
     * Связываем модели
     * Один язык
     *
     * @return HasOne
     */
    public function translation(): HasOne
    {
        return $this
            ->hasOne($this->getTranslationModelName(), $this->getTranslationRelationKey())
            ->where($this->getLocaleKey(), $this->getLocale());
    }

    /**
     * Название поля язык в базе
     *
     * @return string
     */
    public function getLocaleKey(): string
    {
        return $this->localeKey ?: 'lang';
    }

    /**
     * Название Модели с переводами
     * Генерим по имени класса
     *
     * @return string
     */
    private function getTranslationModelName(): string
    {
        return get_class($this) . 'Translation';
    }

    /**
     * Ключ, по которому связываем
     *
     * @return string
     */
    private function getTranslationRelationKey(): string
    {
        return $this->getForeignKey(); //из Illuminate\Database\Eloquent\Model
    }

    /**
     * Текущая локаль
     *
     * @return string
     */
    public function getLocale(): string
    {
        return app()->getLocale();
    }


    /**
     * Локаль по умолчанию
     *
     * @return string
     */
    public function getDefaultLocale(): string
    {
        return app('localizer')->getDefaultLocale();
    }
}