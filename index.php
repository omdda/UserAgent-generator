<?php

class UserAgentGenerator {
    private $platform;
    private $browser;

    public function __construct($platform = false, $browser = false){
        $this->platform = $platform;
        $this->browser = $browser;
    }

    /**
     * @throws Exception
     */
    public function generate(){
        $platforms = [
            'windows' => [
                'Windows NT 10.0', // Windows 10
                'Windows NT 5.1', // Windows XP
                'Windows NT 6.1', // Windows 7
                'Windows NT 6.0', // Windows Vista
                'Windows NT 6.2', // Windows 8
                'Windows NT 6.3', // Windows 8.1
                'Windows Phone 10', // Windows Phone, Add more versions here
            ], // Windows
            'macos' => [
                'Macintosh; Intel Mac OS X 10_15_7', // macOS Catalina
                'Macintosh; Intel Mac OS X 11_0_1', // macOS Big Sur
                'Macintosh; Intel Mac OS X 12_0', // macOS Monterey, Add more versions here

            ], // macOS Catalina
            'linux' => [
                'X11; Linux x86_64',
                'Linux i686',
                'X11; Linux armv7l', // ARM architecture
                'X11; Linux ppc64le', // PowerPC architecture
                'X11; Linux s390x', // IBM Z architecture
                'X11; Linux aarch64', // ARM 64-bit architecture
                'X11; Linux mips', // MIPS architecture
                'X11; Linux mips64', // MIPS 64-bit architecture
                'X11; Linux riscv64', // RISC-V architecture
                'X11; Linux sparc', // SPARC architecture
            ], // Linux
            'android' => [
                'Android 10',
                'Android 11',
                'Android 12',
                'Android 13', // Add more versions here
            ], // Android
            'ios' => [
                'iPhone; CPU iPhone OS 17_0 like Mac OS X',
                'iPhone; CPU iPhone OS 16_0 like Mac OS X',
                'iPhone; CPU iPhone OS 15_0 like Mac OS X',
                'iPhone; CPU iPhone OS 14_0 like Mac OS X',
                'iPhone; CPU iPhone OS 13_0 like Mac OS X', // Add more versions here
            ], // IOS
            'ipados' => [
                'iPad; CPU OS 17_0 like Mac OS X',
                'iPad; CPU OS 16_0 like Mac OS X',
                'iPad; CPU OS 15_0 like Mac OS X',
                'iPad; CPU OS 14_0 like Mac OS X',
                'iPad; CPU OS 13_0 like Mac OS X', // Add more versions here
            ], // iPadOS
        ];

        $browsers = [
            'chrome' => 'Chrome/' . rand(70, 100) . '.0.' . rand(1000, 9999) . '.0',
            'firefox' => 'Firefox/' . rand(60, 90) . '.0',
            'safari' => 'Safari/' . rand(10, 15) . '.0',
            'edge' => 'Edge/' . rand(40, 90) . '.0',
            'opera' => 'Opera/' . rand(60, 80) . '.0',
            'brave' => 'Brave/' . rand(1, 3) . '.' . rand(0, 9) . '.' . rand(0, 99) . '.' . rand(0, 999),
            'vivaldi' => 'Vivaldi/' . rand(2, 4) . '.' . rand(0, 99) . '.' . rand(0, 999) . '.' . rand(0, 99),
            'ucBrowser' => 'UCBrowser/' . rand(10, 15) . '.' . rand(0, 9) . '.' . rand(0, 99) . '.' . rand(0, 99),
            'samsungBrowser' => 'SamsungBrowser/' . rand(10, 20) . '.0'
        ];

        if(!$this->getPlatform())
            $this->setPlatform(array_rand($platforms));

        $getPlatforms = $platforms[$this->getPlatform()][array_rand($platforms[$this->getPlatform()])];
        $userAgent = "Mozilla/5.0 ($getPlatforms) ";

        if($this->getBrowser())
            $userAgent .= $browsers[$this->getBrowser()];
        else
            $userAgent .= $browsers[array_rand($browsers)];

        return $userAgent;
    }

    /**
     * @return false|mixed
     */
    public function getBrowser(){
        return $this->browser;
    }

    /**
     * @return false|mixed
     */
    public function getPlatform(){
        return $this->platform;
    }

    /**
     * @param false|mixed $platform
     */
    public function setPlatform($platform){
        $this->platform = $platform;
    }
}

$generator = new UserAgentGenerator(false, "edge");

try{
    echo $generator->generate();
}catch(Exception $e){
    echo $e->getMessage();
}