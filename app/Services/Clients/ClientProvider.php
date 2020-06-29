<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 3/19/20
 * Time: 12:02 AM
 */

namespace App\Services\Clients;

use App\Exceptions\GeneralException;
use App\Services\Clients\Providers\CamtelAfrikpayClient;
use App\Services\Clients\Providers\MtnAfrikpayClient;
use App\Services\Clients\Providers\NexttelAfrikpayClient;
use App\Services\Clients\Providers\OrangeAfrikpayClient;
use App\Services\Clients\Providers\YoomeeAfrikpayClient;
use App\Services\Constants\ErrorCodesConstants;

trait ClientProvider
{
    /**
     * @param $serviceCode
     * @return AbstractClient
     * @throws GeneralException
     */
    public function client($serviceCode)
    {
        $config['afrikpay_key'] = config('app.services.afrikpay.key');
        $config['afrikpay_url'] = config('app.services.afrikpay.url');
        $config['afrikpay_platform'] = config('app.services.afrikpay.platform');
        
        switch ($serviceCode) {
            case config('app.services.afrikpay.mtn_code'):
                return new MtnAfrikpayClient($config);
                break;
            case config('app.services.afrikpay.orange_code'):
                return new OrangeAfrikpayClient($config);
                break;
            case config('app.services.afrikpay.camtel_code'):
                return new CamtelAfrikpayClient($config);
            case config('app.services.afrikpay.yoomee_code'):
                return new YoomeeAfrikpayClient($config);
                break;
            case config('app.services.afrikpay.nexttel_code'):
                return new NexttelAfrikpayClient($config);
                break;
            default:
                throw new GeneralException(ErrorCodesConstants::SERVICE_NOT_FOUND, 'Unknown Micro Service');
        }
    }
}