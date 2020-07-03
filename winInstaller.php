<?php

/**
 * Class winInstaller
 *
 * Docker Edeka Project installer for Windows 10 users with the xdebug support.
 * It is required to have a php installed and available in your system.
 * The installation steps:
 * 1. Get the current DockerNat ip address
 * 2. Put this ip into xdebug.ini configuration file
 * 3. Remove all containers ( not optimal solution, can be improved to remove only Edeka related ones )
 * 4. Build Edeka project
 * 5. Start the configured containers
 *
 */
class winInstaller
{
    /*
     * Docker NAT ip address
     */
    public $dockerNatIp = '0.0.0.0';

    /*
     * Temp file location (make sure there is not permission issues with that file)
     */
    public $tmpFilePath = "./temp-edeka-installer";

    /*
     * Location of the xdebug.ini that is used in building process
     */
    public $debuginiFilePath = "./docker/php/xdebug.ini";

    /*
     * Command line commands
     */
    public $cmd = [
        'stopAllContainers' => 'FOR /f "tokens=*" %i IN (\'docker ps -q\') DO docker stop %i',
        'removeAllContainers' => 'FOR /f "tokens=*" %i IN (\'docker ps -q\') DO docker rm %i',
        'buildContainers' => 'docker-compose build --force-rm --no-cache --pull',
        'composeUp' => 'docker-compose up -d',
    ];

    /*
     * Regular expressions
     */
    public $regExp = [
        'ip' => '/((25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)/m',
        'dockernat' => '/DockerNAT/m',
        'xdebugini__remotehost' => '/xdebug.remote_host=.*$/m'
    ];

    /*
     * Installation process starter
     */
    public function install()
    {
        $this->updateXdebugIni();
        $this->stopAllContainers();
        $this->removeAllContainers();
        $this->buildContainers();
        $this->startContainers();
        $this->cleanup();
    }

    /*
     * Clean after install is complete
     */
    public function cleanup()
    {
        //remove temp file
        $tmpFilePath = $this->getTmpFilePath();
        if (is_file($tmpFilePath)) {
            unlink($tmpFilePath);
        }
    }

    public function startContainers()
    {
        echo 'Starting containers ... ';
        exec($this->getCmd('composeUp'));
        echo 'Done' . "\n";
    }

    public function buildContainers()
    {
        echo 'Building containers ... ';
        exec($this->getCmd('buildContainers'));
        echo 'Done' . "\n";
    }

    public function removeAllContainers()
    {
        echo 'Removing containers ... ';
        exec($this->getCmd('removeAllContainers'));
        echo 'Done' . "\n";
    }

    public function stopAllContainers()
    {
        echo 'Stopping containers ... ';
        exec($this->getCmd('stopAllContainers'));
        echo 'Done' . "\n";
    }

    /*
     * Finds a remote host line in xdebug.ini file, replace it with current DockerNAT Ip address and save the ini file
     */
    public function updateXdebugIni()
    {
        echo 'Updating `xdebug.ini` file ... ';
        $debuginiFilePath = $this->getDebuginiFilePath();
        $debugFileCon = file_get_contents($this->debuginiFilePath);
        $ip = $this->getDockerNatIp();
        $regExp = $this->getRegExp('xdebugini__remotehost');

        preg_match_all($regExp, $debugFileCon, $matches, PREG_SET_ORDER, 0);
        if ($matches) {
            $subst = 'xdebug.remote_host=' . $ip;
            $result = preg_replace($regExp, $subst, $debugFileCon);
        }

        if ($result) {
            file_put_contents($debuginiFilePath, $result);
            echo 'Done' . "\n";
        } else {
            echo 'Fatal error, cant writo to: `' . $debuginiFilePath . '`. Please check file permissions.' . "\n";
            return false;
        }

        return true;
    }

    /*
     * Fetch the current DockerNAT ip from `ipconfig` command results
     */
    public function fetchNatIp()
    {
        echo 'Fetching current DockerNAT IP ... ';
        $tmpFilePath = $this->getTmpFilePath();
        exec("ipconfig > " . $tmpFilePath);
        $ipconfig = file($tmpFilePath);
        $max = count($ipconfig);
        $test = false;

        for ($i = 0; $i < $max; $i++) {

            //look for DockerNAT line
            preg_match_all('/DockerNAT/m', $ipconfig[$i], $matches, PREG_SET_ORDER, 0);
            if ($matches) {
                $test = true;
            }

            //look for the ip line
            if ($test) {
                preg_match_all($this->getRegExp('ip'), $ipconfig[$i], $matches, PREG_SET_ORDER, 0);
                //line found, echo it and close session
                if ($matches) {
                    $this->setDockerNatIp($matches[0][0]);
                    echo 'Done' . "\n";
                    return true;
                }
            }
        }

        echo 'Fatal error: DockerNAT IP unknown' . "\n";
        return false;
    }

    /**
     * winInstaller constructor.
     */
    public function __construct()
    {
        $this->fetchNatIp();
    }

    /**
     * @return string
     */
    public function getDockerNatIp()
    {
        return $this->dockerNatIp;
    }

    /**
     * @return string
     */
    public function getTmpFilePath()
    {
        return $this->tmpFilePath;
    }

    /**
     * @return string
     */
    public function getDebuginiFilePath()
    {
        return $this->debuginiFilePath;
    }

    /**
     * @return mixed
     */
    public function getRegExp($index = NULL)
    {
        if (isset($index) && array_key_exists($index, $this->regExp)) {
            return $this->regExp[$index];
        }
        return $this->regExp;
    }


    /**
     * @return mixed
     */
    public function getCmd($index = NULL)
    {
        if (isset($index) && array_key_exists($index, $this->cmd)) {
            return $this->cmd[$index];
        }
        return $this->cmd;
    }

    /**
     * @param string $dockerNatIp
     */
    public function setDockerNatIp($dockerNatIp)
    {
        $this->dockerNatIp = $dockerNatIp;
    }
}

$installer = new winInstaller();
$installer->install();

