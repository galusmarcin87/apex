<?php

namespace app\components;

use Yii;
use app\models\mgcms\db\Setting;

/**
 * Helpers class
 * @author marcin
 */
class ProjectHelper extends \yii\base\Component
{

    static function getFormFieldConfig($withPlaceholders = true)
    {
        if ($withPlaceholders) {
            return [


                'options' => [
                    'class' => "Contact-form__form-group form-group",
                    'tag' => 'div',
                ],
                'template' => "{beginLabel}{labelTitle}{input}\n\n{error}{endLabel}",
                'inputOptions' => ['class' => 'Contact-form__input form-control'],
                'labelOptions' => [
                    'class' => "Contact-form__label",
                ],
                'wrapperOptions' => [
                    'class' => "Contact-form__label",

                ]
            ];
        } else {
            return [


                'options' => [
                    'class' => "Contact-form__form-group form-group",
                    'tag' => 'div',
                ],
                'template' => "{beginLabel}{input}\n\n{error}{endLabel}",
                'inputOptions' => ['class' => 'Contact-form__input form-control'],
                'labelOptions' => [
                    'class' => "Contact-form__label",
                ],
                'wrapperOptions' => [
                    'class' => "Contact-form__label",

                ]
            ];
        }
    }
}
