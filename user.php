<?php

trait AppUserAuthentication {
    private $appUserLogin = 'app_user';
    private $appUserPassword = 'app_password';

    public function authenticateAppUser($login, $password) {
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
        AppUserAuthentication::authenticateAppUser as authenticateAppUserTrait;
        MobileUserAuthentication::authenticateMobileUser as authenticateMobileUserTrait;
    }

    public function performAuthentication($login, $password, $appOrMobile) {
        if ($appOrMobile === 'app') {
            $this->authenticateAppUserTrait($login, $password);
        } elseif ($appOrMobile === 'mobile') {
            $this->authenticateMobileUserTrait($login, $password);
        } else {
            echo "Неверный тип пользователя.\n";
        }
    }
}


