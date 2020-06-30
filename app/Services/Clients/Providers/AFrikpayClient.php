<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 6/29/20
 * Time: 10:44 PM
 */

namespace App\Services\Clients\Providers;

use App\Exceptions\GeneralException;
use App\Models\Transaction;
use App\Services\Clients\AbstractClient;
use App\Services\Constants\ErrorCodesConstants;
use App\Services\Objects\Airtime;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Log;

class AFrikpayClient extends AbstractClient
{
    /**
     * @param Airtime $airtime
     * @return mixed
     * @throws GeneralException
     */
    public function buy(Airtime $airtime): string
    {
        $reference = substr($airtime->getPhone(), -9);
        
        $json = [
            'operator' => $this->config['afrikpay_operator'],
            'reference' => $reference,
            'amount'     => $airtime->getAmount(),
            'mode' => 'cash',
            'agentid' => $this->config['afrikpay_platform'],
            'agentpwd' => md5($this->config['afrikpay_pwd']),
            'hash' => md5($this->config['afrikpay_operator'] . $reference . $airtime->getAmount() . $this->config['afrikpay_key']),
            'agentplatform' => $this->config['afrikpay_platform'],
            'provider' => 'afrikpay',
            'code' => null,
            'account' => null,
            'processingnumber'=> $airtime->getIntId(),
        ];
    
        Log::debug("{$this->getClientName()}: Sending request to service provider",[
            'json' => $json,
            'url' => $this->config['afrikpay_url']
        ]);
    
        $httpClient = $this->getHttpClient();
    
        try {
            $response = $httpClient->request('POST', $this->config['afrikpay_url'], [
                'json' => $json
            ]);
        } catch (ClientException $exception) {
            $response = $exception->getResponse();
        
        } catch (\Exception $exception) {
            throw new GeneralException(ErrorCodesConstants::SERVICE_PROVIDER_CONNECTION_ERROR,
                'Error connecting to service provider: ' . $exception->getMessage()
            );
        }
    
        $content = $response->getBody()->getContents();
    
        Log::debug("{$this->getClientName()}: Response from service provider", [
            'service' => $this->config['afrikpay_service'],
            'phone number' => $airtime->getPhone(),
            'id' => $airtime->getIntId(),
            'body' => json_decode($content),
            'response' => $content
        ]);
    
        $body = json_decode($content);
    
        if ($response->getStatusCode() == 200 || $body->code == 200) {
        
            if (!empty($body->result)) {
                return $body->result;
            }
        }
    
        throw new GeneralException(ErrorCodesConstants::GENERAL_CODE, 'Error processing response from service provider for credit transfer');
    }
    
    /**
     * @param $transaction
     * @return Transaction
     * @throws GeneralException
     */
    public function status($transaction): string
    {
        Log::info("{$this->getClientName()}: Sending status check request to service provider", [
            'phone number' => $transaction->destination,
            'service' => $this->config['afrikpay_service'],
            'transaction.id' => $transaction->id,
            'transaction.uuid' => $transaction->internal_id,
            'transaction.status' => $transaction->status,
        ]);
        
        $json = [
            'processingnumber' => $transaction->internal_id,
            'agentplatform' => $this->config['afrikpay_platform'],
            'agentid' => $this->config['afrikpay_platform'],
            'hash' => md5($transaction->internal_id . $this->config['afrikpay_key'])
        ];
    
        Log::debug("{$this->getClientName()}: Sending request to service provider",[
            'json' => $json,
            'url' => $this->config['afrikpay_status_url']
        ]);
        
        $httpClient = $this->getHttpClient();
        
        try {
            $response = $httpClient->request('POST', $this->config['afrikpay_status_url'], [
                'json' => $json
            ]);
        } catch (\Exception $exception) {
            Log::error("{$this->getClientName()}: Error Response from service provider", [
                'service' => $this->config['afrikpay_service'],
                'phone number' => $transaction->destination,
                'transaction.uuid' => $transaction->internal_id,
                'transaction.id' => $transaction->id,
                'amount' => $transaction->amount,
                'error message' => $exception->getMessage(),
            ]);
            throw new GeneralException(ErrorCodesConstants::GENERAL_CODE, $exception->getMessage());
        }
        
        $content = $response->getBody()->getContents();
        
        Log::debug("{$this->getClientName()}: Response from service provider", [
            'service' => $this->config['afrikpay_service'],
            'phone number' => $transaction->destination,
            'transaction.uuid' => $transaction->internal_id,
            'transaction.id' => $transaction->id,
            'amount' => $transaction->amount,
            'body' => json_decode($content),
            'response' => $content,
        ]);
    
        $body = json_decode($content);
    
        if ($response->getStatusCode() == 200 || $body->code == 200) {
        
            if (!empty($body->result)) {
                return $body->result->txnid;
            }
        }
    
        throw new GeneralException(ErrorCodesConstants::GENERAL_CODE, 'Error processing response from service provider for status check');
    }
    
    /**
     * @return Client
     */
    public function getHttpClient()
    {
        return new Client([
            'timeout'         => 120,
            'connect_timeout' => 120,
            'allow_redirects' => true,
        ]);
    }
}
