<?php

/**
 * Функции и константы, общие для всех остальных классов плагина
 */
class DDeliveryWooCommerceBase
{
    const ID = 'ddelivery';

    // Директория плагина
    const PLUGIN_DIR = 'wp-content/plugins/ddelivery-woocommerce/';

    // Абсолютный путь к директории плагина плагина
    const PLUGIN_DIR_ABS = ABSPATH . self::PLUGIN_DIR;

    // Имя параметра 'API-ключ' в БД WordPress
    const API_KEY_OPTION = 'ddelivery_api_key';

    // Имя мета-параметра DDelivery ID заказа
    const DDELIVERY_ID_META_KEY = '_order_ddelivery_id';

    // Имя мета-параметра трек-номера заказа
    const TRACKING_NUMBER_META_KEY = 'order_tracking_number';

    // Имя мета-параметра флага переноса заказа в ЛК
    const IN_DDELIVERY_CABINET_META_KEY = '_order_in_ddelivery_cabinet';

    // Имя мета-параметра штрих-кода у товара
    const PRODUCT_BARCODE_META_KEY =  'barcode';

    // Text Domain плагина
    const TEXT_DOMAIN = 'ddelivery_woocommerce';
    
    // URL ЛК DDelivery
    const DDELIVERY_CABINET_URL = 'https://ddelivery.ru/cabinet/';
    
    
    /**
     * Проверяет, активирован ли WooCommerce
     *
     * @return bool
     */
    public static function checkWooCommerce()
    {
        return in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')));
    }

    /**
     * Проверяет, сохранен ли в настройках плагина API-ключ
     *
     * @return bool
     */
    public function checkApiKey()
    {
        return (bool) strlen(get_option(self::API_KEY_OPTION));
    }

    /**
     * Возвращает массив всех возможных статусов поста/заказа (статусы WP + статусы WC)
     *
     * @return array
     */
    public static function getAllStatuses()
    {
        return array_merge(array_keys(wc_get_order_statuses()), array_keys(get_post_statuses()));
    }
}