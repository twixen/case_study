<?php

namespace Lpp\Service;

class Validator {

    public function checkUrl(string $url): string {
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            return $url;
        } else {
            throw new \UnexpectedValueException(sprintf('url "%s" validation failed', $url));
        }
    }

}
