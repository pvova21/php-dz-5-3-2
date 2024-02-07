<?php

trait AppUserAuthentication {
    private $appUserLogin = 'app_user';
    private $appUserPassword = 'app_password';

    public function authenticate($login, $password) {
        if ($login === $this->appUserLogin && $password === $this->appUserPassword) {
            echo "Пользователь приложения успешно авторизован.\n";
        } else {
            echo "Ошибка авторизации пользователя приложения.\n";
        }
    }
}

trait MobileUserAuthentication {
    private $mobileUserLogin = 'mobile_user';
    private $mobileUserPassword = 'mobile_password';

    public function authenticateMobileUser($login, $password) {
        if ($login === $this->mobileUserLogin && $password === $this->mobileUserPassword) {
            echo "Пользователь мобильного приложения успешно авторизован.\n";
        } else {
            echo "Ошибка авторизации пользователя мобильного приложения.\n";
        }
    }
}

class User {
    use AppUserAuthentication, MobileUserAuthentication {
        AppUserAuthentication::authenticate insteadof MobileUserAuthentication;
        MobileUserAuthentication::authenticateMobileUser as authenticateMobileUserAlias; 
    }

    public function performAuthentication($login, $password, $appOrMobile) {
        if ($appOrMobile === 'app') {
            $this->authenticate($login, $password);
        } elseif ($appOrMobile === 'mobile') {
            $this->authenticateMobileUserAlias($login, $password);
        } else {
            echo "Неверный тип пользователя.\n";
        }
    }
}
