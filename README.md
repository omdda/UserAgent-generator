# Class User Agent generator PHP
* This class is simple and can be developed according to your needs

### Basic usage

```PHP
$generator = new UserAgentGenerator();

try{
    echo $generator->generate();
}catch(Exception $e){
    echo $e->getMessage();
}
```

### Example of generating a User Agent customized for a platform or browser

```PHP
$generator = new UserAgentGenerator("windows", "firefox");
$generator = new UserAgentGenerator(false, "firefox");
$generator = new UserAgentGenerator("windows");
```

#### Platforms List
* windows
* windows
* macos
* linux
* android
* ios
* ipados

#### Browsers List
* chrome
* firefox
* safari
* edge
* opera
* brave
* vivaldi
* ucBrowser
* samsungBrowser

