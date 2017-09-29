# Laravel Faultline


# Install



# Basic Usage

```.env
FAULTLINE_API_KEY=<api key>
FAULTLINE_ENDPOINT=https://xxXXxxXX.execute-api.ap-northeast-1.amazonaws.com/v0
```

## Exception Handler

```php
<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler


class Handler extends ExceptionHandler
{

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        if ($this->shouldReport($e)) {
            app(\Faultline\Notifier::class)->notify($e);
        }
    
        parent::report($e);
    }

}
```


### Custom Monolog Configuration

```php
//bootstrap/app.php

$app->configureMonologUsing(function($monolog) use ($app) {
    $FaultlineNotifier = (new Faultline\Laravel\FaultlineHandler($app))->handle();
    $monologHandler = new Faultline\MonologHandler($FaultlineNotifier, Monolog\Logger::ERROR);
    $monolog->pushHandler($monologHandler);
});
```