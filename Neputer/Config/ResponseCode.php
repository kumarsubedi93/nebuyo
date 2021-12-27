<?php

namespace Neputer\Config;

final class ResponseCode
{
    const RESPONSE_OK = 'ok';

    /**
     * Form Validation errors
     */
    const VALIDATOR_FAILS = 'form_validation_error';

    /**
     * Server Error
     */
    const SERVER_ERROR = 'server_error';

    /**
     * Anything can be empty
     */
    const EMPTY = null;

    /**
     * Model Not Found
     */
    const MODEL_NOT_FOUND = 'model_not_found';
}