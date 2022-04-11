<?php

namespace App\Http\Controllers\Auth;

use App\Http\Actions\Auth\LoginAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Service\AsymmetricEncryptionService;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(LoginRequest $request, LoginAction $loginAction)
    {
       return $loginAction->execute($request);
    }

    public function generarteKey(AsymmetricEncryptionService $asymmetricEncryptionService)
    {
        $name = "felixayange";
        //$pubKey = "-----BEGIN PUBLIC KEY-----\nMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAvmcY95/EQedGH8nRWGaw\nsqDyVp/u+qdRg7UIrDHcRfVzrsMdfrD9UCLHWxZrl+B1Do08FPabhfO+Jc4SbNLg\nzgsGqPfZFJPhOB4SX1iZm3d22D03JHsy3Pu0vydPiSyw04NGRLUgRf8sFRgEYYCf\nLoz+OOYE9LmNg76xlZcXxCEv9BqPU5JhNN5bSycrNth+Uv3moP00/1yDet5eQHka\nkcSITDTCyH+CWRlH0EcpsMsUnhgO/Tmmav9veSJu0pMh7S1kmg/AHLtqBDER5kck\nBkouGtDWvs3NaGx3tBKzBfEZYaMXtIVKHABum8QypqowGSfPIJw2oGg76YRfJxFm\nQQIDAQAB\n-----END PUBLIC KEY-----\n";
        $privateKey = "-----BEGIN PRIVATE KEY-----\nMIIEvAIBADANBgkqhkiG9w0BAQEFAASCBKYwggSiAgEAAoIBAQC+Zxj3n8RB50Yf\nydFYZrCyoPJWn+76p1GDtQisMdxF9XOuwx1+sP1QIsdbFmuX4HUOjTwU9puF874l\nzhJs0uDOCwao99kUk+E4HhJfWJmbd3bYPTckezLc+7S/J0+JLLDTg0ZEtSBF/ywV\nGARhgJ8ujP445gT0uY2DvrGVlxfEIS/0Go9TkmE03ltLJys22H5S/eag/TT/XIN6\n3l5AeRqRxIhMNMLIf4JZGUfQRymwyxSeGA79OaZq/295Im7SkyHtLWSaD8Acu2oE\nMRHmRyQGSi4a0Na+zc1obHe0ErMF8Rlhoxe0hUocAG6bxDKmqjAZJ88gnDagaDvp\nhF8nEWZBAgMBAAECggEAPdgw9OWRErLzRQoBlIwuYqcCb/6c2g+U24nm2j+Lw7F5\nNM+teeQ1M11IkZ6Trg47F1HqrQh49aZ5IcBwnaZVXLeaHzH58cQiyF6EKzIVGrlQ\nAebITXIy0DJ1wA0duXmpqdoe7dxDMlky0VsuuRjVG4KyZHraKz9F5v/+oI8mKg7q\nFuUj8wJg8ch63hgqZs3RFZoPLvRajJ9PqUs6PZ8gDqAashIycEePznHA1aXhYKcb\nIn6EyHngS7AP+CjuVGzJcKcYp8T7LqezCCVZJwHTwYeBBVvG83xgvDPNtubqxZiA\nEvA0BlfHQMWi4Zy20WSL5yqPDph56I/fvmLEWdeKzQKBgQDhe1Ebas1TTIdiEyOz\nl0R6eS31pSrw89oPDbSj5pT4pfuixwkEbiJhbR2tUJl8MDaXv0Oo2y+AquPmJfpQ\n9ZrzW4OwQ5EpnfeYzUjv86CaqhopZ5Fb6rhUmzpNsjq41xLTn2Al597ejaE8X2sv\n5nBsJWICWTfFA6mrnUHhczyGOwKBgQDYLFWI7dpUPxQ7lYQnHvG2PcJ2b/aRDGnJ\nKs3gxsJa4TY78yaplAFFpkXQNu+UoDcF+RY9Fn+oTJembOTQBp1QbeQKGQV2HPth\ntc1DPnB7ZLwqBNXpKjkXMMov8IrhulHiMHcspg+FcRbvectEBwHK1aptAEHpJsVR\nlBwSHAbxswKBgHJO2edUVZMNEPUfTtIUtZqBJFOL0CEm/jzzbchJdOw4+UCkNmYQ\nj01ky865NZZHuuVjCSHpPEO2XqKmTigM2ujUVAZfuo+mjYbhS0CZ+alu4qRq5L38\nWEZMC1qoKCzcm6a8/Tk6OzoIAt1gYi5+XC/3I6CdKjCukq11o5hvmxdRAoGAQ7Yf\nVLSsHpdjjwZWTqqyq5LMxqxrXyO0Pv7ZXf7kAfNpOX4ALj3d6CMc2wtaIAPPOF+9\nR4U0l1LmbYrOYRqxS/Af7cnInCaX1xNLKDT2pq/3AHJjTpWbLFhr/HgsCGiEHYVw\nztt1ISc7N+e+c6B+PzqOF3ZtLsqmI9dws3tz8WECgYBDsl1O0a4WiCFxSPvjl/tA\nMAC9NYoiobQqJifkjwZtURouyF3M9hdrk+94Lfcdjn6hmGkvg5pZc1lTWfbDIqRL\nhJl4DiiYWt57qehEO970EGwEk0xgljFC6osXMVYW82UvYYwq68SlhXOIV8DD+4v7\nRXCklKQiOqPslrapoBzdZw==\n-----END PRIVATE KEY-----\n";
        return $asymmetricEncryptionService->asymmetricDecrypt($name, $privateKey, 'test');
    }
}
