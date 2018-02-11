<?php

namespace Lpp\Service;

class Validator {

    public function checkUrl($url) {
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            return $url;
        } else {
            throw new \Exception(sprintf('Url nie poprawny'));
        }
    }

}
