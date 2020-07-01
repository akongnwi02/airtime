<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 3/19/20
 * Time: 12:02 AM
 */

namespace App\Services\Clients;

use App\Exceptions\BadRequestException;
use App\Services\Clients\Providers\Afrikpay\CamtelAfrikpayClient;
use App\Services\Clients\Providers\Afrikpay\MtnAfrikpayClient;
use App\Services\Clients\Providers\Afrikpay\MtnDataAfrikpayClient;
use App\Services\Clients\Providers\Afrikpay\NexttelAfrikpayClient;
use App\Services\Clients\Providers\Afrikpay\OrangeAfrikpayClient;
use App\Services\Clients\Providers\Afrikpay\YoomeeAfrikpayClient;
use App\Services\Constants\ErrorCodesConstants;

trait ClientProvider
{
    /**
     * @param $serviceCode
     * @return AbstractClient
     * @throws BadRequestException
     */
    public function client($serviceCode)
    {
        $config['afrikpay_key'] = config('app.services.afrikpay.key');
        $config['afrikpay_url'] = config('app.services.afrikpay.url');
        $config['afrikpay_pwd'] = config('app.services.afrikpay.pwd');
        $config['afrikpay_platform'] = config('app.services.afrikpay.platform');
        $config['afrikpay_status_url'] = config('app.services.afrikpay.status_url');
    
        switch ($serviceCode) {
            case config('app.services.afrikpay.mtn_code'):
                $config['afrikpay_operator'] = 'mtn';
                $config['afrikpay_service'] = config('app.services.afrikpay.mtn_code');
                return new MtnAfrikpayClient($config);
                break;
            case config('app.services.afrikpay.mtn_data_code'):
                $config['afrikpay_operator'] = 'mtn_data';
                $config['afrikpay_service'] = config('app.services.afrikpay.mtn_data_code');
                return new MtnDataAfrikpayClient($config);
                break;
            case config('app.services.afrikpay.orange_code'):
                $config['afrikpay_operator'] = 'orange';
                $config['afrikpay_service'] = config('app.services.afrikpay.orange_code');
                return new OrangeAfrikpayClient($config);
                break;
            case config('app.services.afrikpay.camtel_code'):
                $config['afrikpay_service'] = config('app.services.afrikpay.camtel_code');
                $config['afrikpay_operator'] = 'camtel';
                return new CamtelAfrikpayClient($config);
            case config('app.services.afrikpay.yoomee_code'):
                $config['afrikpay_service'] = config('app.services.afrikpay.yoomee_code');
                $config['afrikpay_operator'] = 'yoomee';
                return new YoomeeAfrikpayClient($config);
                break;
            case config('app.services.afrikpay.nexttel_code'):
                $config['afrikpay_service'] = config('app.services.afrikpay.nexttel_code');
                $config['afrikpay_operator'] = 'nexttel';
                return new NexttelAfrikpayClient($config);
                break;
            default:
                throw new BadRequestException(ErrorCodesConstants::SERVICE_NOT_FOUND, 'Unknown Micro Service');
        }
    }
}