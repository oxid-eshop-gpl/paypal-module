@echo off

setlocal enableextensions

echo reading env variables...
for /f "usebackq tokens=*" %%a in (
   `php -r "include '../oxideshop/vendor/autoload.php'; $dotenv = Dotenv\Dotenv::create(dirname(__DIR__)); $dotenv->overload(); echo getenv('WINDOWS_PROXY_IP');"`
) do set "WINDOWS_PROXY_IP=%%a"
echo read WINDOWS_PROXY_IP: %WINDOWS_PROXY_IP%
IF [%WINDOWS_PROXY_IP%] == [] GOTO NO_VARS_ERROR

for /f "usebackq tokens=*" %%a in (
   `php -r "include '../oxideshop/vendor/autoload.php'; $dotenv = Dotenv\Dotenv::create(dirname(__DIR__)); $dotenv->overload(); echo getenv('DOMAIN');"`
) do set "DOMAIN=%%a"
echo read DOMAIN: %DOMAIN%
IF [%DOMAIN%] == [] GOTO NO_VARS_ERROR

for /f "usebackq tokens=*" %%a in (
   `php -r "include '../oxideshop/vendor/autoload.php'; $dotenv = Dotenv\Dotenv::create(dirname(__DIR__)); $dotenv->overload(); echo getenv('OXID_PORT');"`
) do set "OXID_PORT=%%a"
echo read OXID_PORT: %OXID_PORT%
IF [%OXID_PORT%] == [] GOTO NO_VARS_ERROR

for /f "usebackq tokens=*" %%a in (
   `php -r "include '../oxideshop/vendor/autoload.php'; $dotenv = Dotenv\Dotenv::create(dirname(__DIR__)); $dotenv->overload(); echo getenv('SSL_OXID_PORT');"`
) do set "SSL_OXID_PORT=%%a"
echo read SSL_OXID_PORT: %SSL_OXID_PORT%
IF [%SSL_OXID_PORT%] == [] GOTO NO_VARS_ERROR

echo Updating hosts file...
FIND /C /I "%WINDOWS_PROXY_IP%" %WINDIR%\system32\drivers\etc\hosts
IF %ERRORLEVEL% NEQ 0 (
        (
            echo.
            echo #Added by update-hosts-windows.bat
            echo %WINDOWS_PROXY_IP% %DOMAIN%
            echo.
        )>>%WINDIR%\System32\drivers\etc\hosts
    ) ELSE echo Hosts file already up to date!

echo Updating portproxy...
netsh interface portproxy add v4tov4 listenport=80 listenaddress=%WINDOWS_PROXY_IP% connectport=%OXID_PORT% connectaddress=127.0.0.1
netsh interface portproxy add v4tov4 listenport=443 listenaddress=%WINDOWS_PROXY_IP% connectport=%SSL_OXID_PORT% connectaddress=127.0.0.1

echo finished!
GOTO END

:NO_VARS_ERROR
    echo Please define all variables in .env file!

:END
pause