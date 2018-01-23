SF3 API POC
========================

Small POC.

Run
--------------

Install dependences and set database configuration
```
composer install
```

Load example data
```
bin/console doctrine:fixtures:load
```

Run server
```
bin/console server:run 0.0.0.0:8000
```
